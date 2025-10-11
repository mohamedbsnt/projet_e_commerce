window.toggleSection = function(id) {
    document.querySelectorAll('.hidden-section').forEach(el => {
      el.style.display = 'none';
    });
    const target = document.getElementById(id);
    if (target) {
      target.style.display = 'block';
      target.scrollIntoView({ behavior: 'smooth' });
    }
  };
  