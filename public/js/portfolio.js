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

    // Lanyard photo — draggable like a slingshot, springs back when released
    initLanyard();

    function initLanyard() {
        const stage = document.getElementById('lanyardStage');
        const rope = document.getElementById('lanyardRope');
        const cardWrap = document.getElementById('lanyardCardWrap');
        if (!stage || !rope || !cardWrap) return;

        // Must mirror the .lanyard-rope height set in CSS at each breakpoint
        // (not read via getComputedStyle — once JS sets an inline height,
        // that would shadow the CSS class value on every future read).
        const mobileMq = window.matchMedia('(max-width: 768px)');
        function getRestLength() {
            return mobileMq.matches ? 54 : 68;
        }
        let restLength = getRestLength();

        let dx = 0, dy = 0;   // current offset from rest, px
        let vx = 0, vy = 0;   // velocity, px/s
        let tiltX = 0, tiltY = 0; // 3D hover tilt, degrees
        let dragging = false;
        let rafId = null;
        let lastTime = 0;
        let startPointer = { x: 0, y: 0 };
        let startOffset = { x: 0, y: 0 };
        let prevMove = { x: 0, y: 0, t: 0 };

        const MAX_RADIUS = 130;  // how far the photo can be flung, px — flexible pull
        const OMEGA = 11;        // spring stiffness — snappy
        const ZETA = 0.13;       // underdamped — a few real slingshot bounces before settling
        const MAX_TILT = 14;     // 3D hover-tilt clamp, degrees

        function setSnappy() {
            cardWrap.style.transition = 'none';
        }

        function setSmooth() {
            cardWrap.style.transition = 'transform 0.25s ease';
        }

        function render() {
            cardWrap.style.transform =
                `translate(calc(-50% + ${dx}px), ${dy}px) perspective(900px) rotateX(${tiltX}deg) rotateY(${tiltY}deg)`;
            // The strap is a rigid rod pivoting from the fixed mount: point it
            // straight at the card and stretch it to the true distance so it
            // always visually connects mount -> hook, at any angle.
            const runY = restLength + dy;
            const dist = Math.max(Math.hypot(dx, runY), 8);
            const angleDeg = Math.atan2(dx, runY) * (180 / Math.PI);
            rope.style.height = `${dist}px`;
            rope.style.transform = `translateX(-50%) rotate(${angleDeg}deg)`;
        }

        function stopSpring() {
            if (rafId) {
                cancelAnimationFrame(rafId);
                rafId = null;
            }
        }

        function springStep(timestamp) {
            if (!lastTime) lastTime = timestamp;
            const dt = Math.min((timestamp - lastTime) / 1000, 0.032);
            lastTime = timestamp;

            const ax = -(OMEGA * OMEGA) * dx - 2 * ZETA * OMEGA * vx;
            const ay = -(OMEGA * OMEGA) * dy - 2 * ZETA * OMEGA * vy;
            vx += ax * dt;
            vy += ay * dt;
            dx += vx * dt;
            dy += vy * dt;
            render();

            if (Math.hypot(dx, dy) < 0.3 && Math.hypot(vx, vy) < 3) {
                dx = 0;
                dy = 0;
                vx = 0;
                vy = 0;
                render();
                rafId = null;
                setSmooth();
                return;
            }
            rafId = requestAnimationFrame(springStep);
        }

        function startSpring() {
            stopSpring();
            setSnappy();
            lastTime = 0;
            rafId = requestAnimationFrame(springStep);
        }

        function onPointerMove(e) {
            if (!dragging) return;
            let nx = startOffset.x + (e.clientX - startPointer.x);
            let ny = startOffset.y + (e.clientY - startPointer.y);
            const dist = Math.hypot(nx, ny);
            if (dist > MAX_RADIUS) {
                const scale = MAX_RADIUS / dist;
                nx *= scale;
                ny *= scale;
            }
            dx = nx;
            dy = ny;
            render();

            const now = performance.now();
            const dt = Math.max((now - prevMove.t) / 1000, 0.001);
            vx = (dx - prevMove.x) / dt;
            vy = (dy - prevMove.y) / dt;
            prevMove = { x: dx, y: dy, t: now };
        }

        function onPointerUp(e) {
            if (!dragging) return;
            dragging = false;
            cardWrap.classList.remove('dragging');
            try { cardWrap.releasePointerCapture(e.pointerId); } catch (err) { /* noop */ }
            startSpring();
        }

        cardWrap.addEventListener('pointerdown', (e) => {
            stopSpring();
            setSnappy();
            dragging = true;
            tiltX = 0;
            tiltY = 0;
            cardWrap.classList.add('dragging');
            startPointer = { x: e.clientX, y: e.clientY };
            startOffset = { x: dx, y: dy };
            prevMove = { x: dx, y: dy, t: performance.now() };
            vx = 0;
            vy = 0;
            try { cardWrap.setPointerCapture(e.pointerId); } catch (err) { /* noop */ }
            e.preventDefault();
        });

        cardWrap.addEventListener('pointermove', onPointerMove);
        cardWrap.addEventListener('pointerup', onPointerUp);
        cardWrap.addEventListener('pointercancel', onPointerUp);

        // Subtle 3D tilt toward the cursor — mouse only, so it never fights
        // the touch/pointer drag-and-fling above.
        stage.addEventListener('mousemove', (e) => {
            if (dragging || rafId) return;
            const rect = stage.getBoundingClientRect();
            const relX = (e.clientX - rect.left) / rect.width - 0.5;
            const relY = (e.clientY - rect.top) / rect.height - 0.5;
            tiltY = relX * MAX_TILT * 2;
            tiltX = -relY * MAX_TILT * 2;
            render();
        });

        stage.addEventListener('mouseleave', () => {
            if (dragging || rafId) return;
            tiltX = 0;
            tiltY = 0;
            render();
        });

        render();

        let resizeTimer = null;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                restLength = getRestLength();
                if (!dragging) render();
            }, 150);
        });
    }
});
