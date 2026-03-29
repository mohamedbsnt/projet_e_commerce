{{--
    Fichier : resources/views/components/chatbot.blade.php
    Structure HTML pure. La logique est dans app.js.
--}}
<div x-data="chatbot()" x-init="init()" class="fixed z-50 bottom-5 right-5">
    
    <!-- Fenêtre du chat -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-5"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-5"
         @click.away="open = false"
         class="absolute bottom-[80px] right-0 w-[calc(100vw-40px)] sm:w-[400px] h-[70vh] max-h-[600px] bg-white rounded-2xl shadow-2xl flex flex-col border border-gray-100">
        
        <!-- En-tête -->
        <div class="flex items-center justify-between flex-shrink-0 p-5 bg-white border-b border-gray-100 rounded-t-2xl">
            <div>
                <h3 class="text-lg font-bold text-gray-800">FurniBot Assistant</h3>
                <p class="flex items-center gap-2 text-sm text-gray-500">
                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                    En ligne
                </p>
            </div>
            <button @click="toggle" class="text-gray-400 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>

        <!-- Corps des messages -->
        <div x-ref="messages" class="flex-1 p-5 space-y-5 overflow-y-auto">
            <template x-for="message in messages" :key="message.id">
                <div class="flex gap-3" :class="message.role === 'user' ? 'flex-row-reverse' : 'flex-row'">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full" :class="message.role === 'user' ? 'bg-brand-primary/20' : 'bg-gray-200'">
                        <svg x-show="message.role === 'assistant'" class="w-8 h-8 p-1.5 text-brand-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg>
                        <svg x-show="message.role === 'user'" class="w-8 h-8 p-1.5 text-brand-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="max-w-[80%] px-4 py-3 rounded-2xl" 
                         :class="message.role === 'user' ? 'bg-brand-primary text-white rounded-br-none' : 'bg-gray-100 text-gray-800 rounded-bl-none'">
                        <p class="text-base" x-html="message.content.replace(/\n/g, '  
')"></p>
                    </div>
                </div>
            </template>
            <div x-show="loading" class="flex gap-3">
                {{-- ... (indicateur de frappe) ... --}}
            </div>
        </div>

        <!-- Zone de saisie -->
        <div class="flex-shrink-0 p-4 bg-white border-t border-gray-100 rounded-b-2xl">
            <form @submit.prevent="sendMessage" class="flex items-center space-x-3">
                <input x-model="question" type="text" placeholder="Posez votre question..." :disabled="loading"
                       class="flex-1 px-4 py-3 text-base bg-gray-100 border-transparent rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-transparent">
                <button type="submit" :disabled="loading || !question.trim()" 
                        class="p-3 text-white transition-colors rounded-lg bg-brand-primary disabled:bg-gray-300 disabled:cursor-not-allowed">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <!-- ================================================== -->
    <!-- BOUTON CIRCULAIRE CORRIGÉ -->
    <!-- ================================================== -->
    <button @click="toggle" 
        class="flex items-center justify-center w-16 h-16 text-white transition-transform transform rounded-full shadow-lg bg-brand-primary hover:scale-110">
    
    <!-- Icône "Chat" (quand le chatbot est fermé) -->
    <svg x-show="!open" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
    </svg>

    <!-- Icône "Croix" (quand le chatbot est ouvert) -->
    <svg x-show="open" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
</button>
</div>
