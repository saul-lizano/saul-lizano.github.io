const cursorFollower = document.getElementById('cursor-follower');
const cursorGlow = document.getElementById('cursor-glow');
const buttons = document.querySelectorAll('.btn, .project-link, .contact-card a, nav a');
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('nav a');
let mouseX = window.innerWidth / 2;
let mouseY = window.innerHeight / 2;
let targetX = mouseX;
let targetY = mouseY;

function updateCursor(event) {
    targetX = event.clientX;
    targetY = event.clientY;
}

function animateCursor() {
    mouseX += (targetX - mouseX) * 0.18;
    mouseY += (targetY - mouseY) * 0.18;
    cursorFollower.style.transform = `translate(${mouseX}px, ${mouseY}px) translate(-50%, -50%)`;
    cursorGlow.style.transform = `translate(${mouseX}px, ${mouseY}px) translate(-50%, -50%)`;
    requestAnimationFrame(animateCursor);
}

animateCursor();

document.addEventListener('mousemove', event => {
    updateCursor(event);
});

buttons.forEach(button => {
    button.addEventListener('mouseenter', () => {
        cursorFollower.style.width = '36px';
        cursorFollower.style.height = '36px';
        cursorFollower.style.background = 'rgba(255,255,255,0.2)';
        cursorGlow.style.width = '160px';
        cursorGlow.style.height = '160px';
    });
    button.addEventListener('mouseleave', () => {
        cursorFollower.style.width = '22px';
        cursorFollower.style.height = '22px';
        cursorFollower.style.background = 'rgba(255,255,255,0.14)';
        cursorGlow.style.width = '120px';
        cursorGlow.style.height = '120px';
    });
});

document.querySelectorAll('.btn, .project-link').forEach(link => {
    link.addEventListener('click', event => {
        const rect = link.getBoundingClientRect();
        const ripple = document.createElement('span');
        ripple.className = 'ripple';
        link.appendChild(ripple);
        ripple.style.left = `${event.clientX - rect.left}px`;
        ripple.style.top = `${event.clientY - rect.top}px`;
        ripple.addEventListener('animationend', () => ripple.remove());
    });
});

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.16 });

document.querySelectorAll('section, .project-card, .skill-card, .contact-card, .experience-card').forEach(element => {
    element.classList.add('fade-in-section');
    observer.observe(element);
});

navLinks.forEach(link => {
    link.addEventListener('click', event => {
        event.preventDefault();
        const targetId = link.getAttribute('href').slice(1);
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

window.addEventListener('scroll', () => {
    const fromTop = window.scrollY + 120;
    navLinks.forEach(link => {
        const section = document.querySelector(link.hash);
        if (!section) return;
        if (section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
});

window.addEventListener('load', () => {
    document.body.classList.add('page-loaded');
});
