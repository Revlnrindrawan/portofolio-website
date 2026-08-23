document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    const navToggle = document.getElementById('navToggle');
    const navLinks = document.getElementById('navLinks');

    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });

    navToggle?.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    navLinks?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
        });
    });

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px',
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.glass-card, .featured-cert, .project-tile').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // Language switcher
    const langSwitch = document.getElementById('langSwitch');
    const langSwitchBtn = document.getElementById('langSwitchBtn');
    const langSwitchLabel = document.getElementById('langSwitchLabel');
    const langOptions = document.querySelectorAll('.lang-option');

    function getStoredLang() {
        try {
            return localStorage.getItem('site-lang') || 'en';
        } catch (e) {
            return 'en';
        }
    }

    function setLang(lang) {
        document.documentElement.setAttribute('data-lang', lang);
        try {
            localStorage.setItem('site-lang', lang);
        } catch (e) { /* ignore storage errors */ }
        if (langSwitchLabel) {
            langSwitchLabel.textContent = lang.toUpperCase();
        }
        langOptions.forEach(opt => {
            opt.classList.toggle('active', opt.dataset.langValue === lang);
        });
    }

    setLang(getStoredLang());

    langSwitchBtn?.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = langSwitch.classList.toggle('open');
        langSwitchBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    langOptions.forEach(opt => {
        opt.addEventListener('click', () => {
            setLang(opt.dataset.langValue);
            langSwitch.classList.remove('open');
            langSwitchBtn?.setAttribute('aria-expanded', 'false');
        });
    });

    document.addEventListener('click', (e) => {
        if (langSwitch && !langSwitch.contains(e.target)) {
            langSwitch.classList.remove('open');
            langSwitchBtn?.setAttribute('aria-expanded', 'false');
        }
    });
});
