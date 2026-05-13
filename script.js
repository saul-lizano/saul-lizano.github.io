const starCanvas = document.getElementById('starfield');
const starCtx = starCanvas ? starCanvas.getContext('2d') : null;
const cursorFollower = document.getElementById('cursor-follower');
const cursorGlow = document.getElementById('cursor-glow');
const buttons = document.querySelectorAll('.btn, .project-link, .contact-card a, nav a');
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('nav a');
let mouseX = window.innerWidth / 2;
let mouseY = window.innerHeight / 2;
let targetX = mouseX;
let targetY = mouseY;

const stars = [];
const starCount = 90;
const starSize = 1.6;
const maxDistance = 140;
const pointer = { x: mouseX, y: mouseY, radius: 180 };

function resizeStarfield() {
    if (!starCanvas) return;
    starCanvas.width = window.innerWidth;
    starCanvas.height = window.innerHeight;
}

function random(min, max) {
    return Math.random() * (max - min) + min;
}

function createStars() {
    if (!starCtx) return;
    stars.length = 0;
    for (let i = 0; i < starCount; i++) {
        stars.push({
            x: random(0, window.innerWidth),
            y: random(0, window.innerHeight),
            vx: random(-0.2, 0.2),
            vy: random(-0.2, 0.2),
            radius: random(0.9, starSize),
            baseAlpha: random(0.08, 0.22)
        });
    }
}

function drawStarfield() {
    if (!starCtx) return;
    const time = performance.now() * 0.0015;
    starCtx.clearRect(0, 0, starCanvas.width, starCanvas.height);
    stars.forEach((star, index) => {
        star.x += star.vx;
        star.y += star.vy;

        if (star.x < 0) star.x = window.innerWidth;
        if (star.x > window.innerWidth) star.x = 0;
        if (star.y < 0) star.y = window.innerHeight;
        if (star.y > window.innerHeight) star.y = 0;

        const dx = pointer.x - star.x;
        const dy = pointer.y - star.y;
        const dist = Math.sqrt(dx * dx + dy * dy);

        if (dist < pointer.radius) {
            const angle = Math.atan2(dy, dx);
            const force = (1 - dist / pointer.radius) * 0.18;
            star.vx -= Math.cos(angle) * force;
            star.vy -= Math.sin(angle) * force;
        }

        star.vx *= 0.98;
        star.vy *= 0.98;

        starCtx.beginPath();
        starCtx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
        starCtx.fillStyle = `rgba(255,255,255,${star.baseAlpha})`;
        starCtx.fill();

        const offsetX = Math.sin(time + index) * 3;
        const offsetY = Math.cos(time + index) * 3;

        for (let j = index + 1; j < stars.length; j++) {
            const distant = stars[j];
            const dx2 = star.x - distant.x;
            const dy2 = star.y - distant.y;
            const distBetween = Math.sqrt(dx2 * dx2 + dy2 * dy2);
            if (distBetween < maxDistance) {
                const lineAlpha = 0.18 * (1 - distBetween / maxDistance);
                starCtx.strokeStyle = `rgba(180, 180, 180, ${lineAlpha})`;
                starCtx.lineWidth = 1;
                starCtx.beginPath();
                starCtx.moveTo(star.x + offsetX, star.y + offsetY);
                starCtx.lineTo(distant.x + Math.cos(time + j) * 3, distant.y + Math.sin(time + j) * 3);
                starCtx.stroke();
            }
        }
    });

    starCtx.beginPath();
    stars.forEach(star => {
        const dx = pointer.x - star.x;
        const dy = pointer.y - star.y;
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < pointer.radius) {
            const alpha = 0.28 * (1 - dist / pointer.radius);
            starCtx.strokeStyle = `rgba(255,255,255,${alpha})`;
            starCtx.lineWidth = 1;
            starCtx.beginPath();
            starCtx.moveTo(star.x, star.y);
            starCtx.lineTo(pointer.x + Math.sin(time) * 8, pointer.y + Math.cos(time) * 8);
            starCtx.stroke();
        }
    });
}

function animateStarfield() {
    drawStarfield();
    requestAnimationFrame(animateStarfield);
}

window.addEventListener('resize', () => {
    resizeStarfield();
    createStars();
});

if (starCanvas) {
    resizeStarfield();
    createStars();
    animateStarfield();
}

function updateCursor(event) {
    targetX = event.clientX;
    targetY = event.clientY;
    pointer.x = event.clientX;
    pointer.y = event.clientY;
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
