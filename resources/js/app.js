// =====================================================================
//  IMPORTS ET INITIALISATION
// =====================================================================
import './bootstrap'; // Laissez cette ligne si elle existe déjà
import '../css/app.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// =====================================================================
//  DÉFINITION DE LA LOGIQUE DU CHATBOT
//  On la met sur l'objet "window" pour être sûr qu'elle soit globale.
// =====================================================================
window.chatbot = function() {
    return {
        open: false,
        loading: false,
        question: '',
        messages: [
            { id: Date.now(), role: 'assistant', content: 'Bonjour ! Je suis FurniBot. Comment puis-je vous aider ?' }
        ],
        
        init() {
            // Ce message est la preuve que le composant est bien initialisé.
            console.log('Chatbot Alpine component initialized successfully!'); 
        },

        toggle() { 
            this.open = !this.open;
        },

        async sendMessage() {
            if (this.loading || !this.question.trim()) return;

            this.loading = true;
            this.messages.push({ id: Date.now(), role: 'user', content: this.question });
            const userQuestion = this.question;
            this.question = '';
            this.scrollToBottom();

            try {
                const response = await fetch('/api/chatbot', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ question: userQuestion })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.error || 'Server response was not ok.');
                }

                const data = await response.json();
                this.messages.push({ id: Date.now(), role: 'assistant', content: data.reply || 'Désolé, je n\'ai pas de réponse.' });

            } catch (error) {
                console.error('Chatbot Error:', error);
                this.messages.push({ id: Date.now(), role: 'assistant', content: 'Oups ! Une erreur technique est survenue.' });
            } finally {
                this.loading = false;
                this.scrollToBottom();
            }
        },

        scrollToBottom() {
            this.$nextTick(() => {
                if (this.$refs.messages) {
                    this.$refs.messages.scrollTop = this.$refs.messages.scrollHeight;
                }
            });
        }
    }
}

// =====================================================================
//  DÉMARRAGE D'ALPINE.JS (À la toute fin)
// =====================================================================
Alpine.start();

window.toggleDropdown = function (id) {
  const panels  = document.querySelectorAll('.dropdown-panel');
  const buttons = document.querySelectorAll('.nav-btn');

  const panel = document.getElementById(id);
  const btn   = document.getElementById('btn-' + id);

  if (!panel || !btn) return;

  const isOpen = !panel.classList.contains('hidden');

  // Fermer tous les dropdowns + désactiver tous les boutons
  panels.forEach(p => p.classList.add('hidden'));
  buttons.forEach(b => b.classList.remove('active'));

  // Ouvrir si ce n'était pas déjà ouvert
  if (!isOpen) {
    panel.classList.remove('hidden');
    btn.classList.add('active');
  }
};


window.toggleWhySection = function (key) {
  const panels = document.querySelectorAll('.why-panel');
  const items  = document.querySelectorAll('.why-item');

  panels.forEach(p => p.classList.add('hidden'));
  items.forEach(i => i.classList.remove('ring-2', 'ring-brand-orange', 'bg-yellow-50'));

  const targetPanel = document.getElementById('why-panel-' + key);
  const activeItem  = document.querySelector('[data-why-target="' + key + '"]');

  if (targetPanel) targetPanel.classList.remove('hidden');
  if (activeItem) {
    activeItem.classList.add('bg-yellow-50', 'ring-2', 'ring-brand-orange');
  }
};

// Option: sélectionner par défaut "product-finding" quand on ouvre le dropdown Why
document.addEventListener('DOMContentLoaded', () => {
  toggleWhySection('product-finding');
});

// Toggle pour les subsections du dropdown "Why"
window.toggleWhySubsection = function (subsectionKey) {
  const contents = document.querySelectorAll('.why-subsection-content');
  const buttons = document.querySelectorAll('.why-subsection');

  // Fermer tous les contenus
  contents.forEach(c => c.classList.add('hidden'));
  buttons.forEach(b => b.classList.remove('ring-2', 'ring-offset-2', 'ring-blue-400', 'bg-blue-50'));

  // Ouvrir le contenu sélectionné
  const targetContent = document.getElementById('why-subsection-' + subsectionKey);
  const activeButton = document.querySelector('[data-subsection="' + subsectionKey + '"]');

  if (targetContent) {
    targetContent.classList.remove('hidden');
  }
  if (activeButton) {
    activeButton.classList.add('ring-2', 'ring-offset-2', 'ring-blue-400', 'bg-blue-50');
  }
};

// Par défaut, afficher la première subsection au chargement
document.addEventListener('DOMContentLoaded', () => {
  setTimeout(() => {
    const firstBtn = document.querySelector('[data-subsection="optimization-grilles"]');
    if (firstBtn) {
      toggleWhySubsection('optimization-grilles');
    }
  }, 100);
});




// Fermeture au clic extérieur
// Fermeture au clic extérieur
document.addEventListener('click', (e) => {
  const panels  = document.querySelectorAll('.dropdown-panel');
  const buttons = document.querySelectorAll('.nav-btn');
  const whyItems = document.querySelectorAll('.why-item');

  let clickedInside = false;

  panels.forEach(panel => {
    if (panel.contains(e.target)) clickedInside = true;
  });

  buttons.forEach(btn => {
    if (btn.contains(e.target)) clickedInside = true;
  });

  whyItems.forEach(item => {
    if (item.contains(e.target)) clickedInside = true;
  });

  if (!clickedInside) {
    panels.forEach(p => p.classList.add('hidden'));
    buttons.forEach(b => b.classList.remove('active'));
  }
});

// =====================================================================
//  DÉMARRAGE D'ALPINE.JS (UNE SEULE FOIS À LA FIN)
// =====================================================================