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
    const typingElement = document.querySelector('.typed-text');
    if (!typingElement) return;

    const phrases = [
        'experiencias con impacto',
        'interfaces rápidas y fluidas',
        'proyectos que impresionan al cliente'
    ];
    let phraseIndex = 0;
    let letterIndex = 0;
    let deleting = false;
    let currentText = '';

    const type = () => {
        const currentPhrase = phrases[phraseIndex];
        if (!deleting) {
            currentText = currentPhrase.slice(0, letterIndex + 1);
            letterIndex += 1;
            if (letterIndex === currentPhrase.length) {
                deleting = true;
                setTimeout(type, 1600);
                return;
            }
        } else {
            currentText = currentPhrase.slice(0, letterIndex - 1);
            letterIndex -= 1;
            if (letterIndex === 0) {
                deleting = false;
                phraseIndex = (phraseIndex + 1) % phrases.length;
            }
        }

        typingElement.textContent = currentText;
        setTimeout(type, deleting ? 80 : 120);
    };
    type();
});

// Secret Mode Logic
let secretModeActive = false;
let shipX = window.innerWidth / 2;
let shipY = window.innerHeight - 100;
let shipVelX = 0;
let shipVelY = 0;
let bullets = [];
let destroyedElements = 0;
let score = 0;
let elementHealth = new Map();

document.getElementById('secret-trigger').addEventListener('click', () => {
    if (secretModeActive) return;
    secretModeActive = true;
    score = 0;
    elementHealth.clear();

    // Show overlay, ship and score
    document.getElementById('secret-overlay').style.display = 'block';
    const ship = document.getElementById('secret-ship');
    ship.style.display = 'block';
    ship.style.left = shipX + 'px';
    ship.style.bottom = '20px';
    document.getElementById('secret-score').style.display = 'block';
    document.getElementById('secret-score').textContent = 'Score: 0';

    // Add key listeners
    document.addEventListener('keydown', handleKeyDown);
    document.addEventListener('keyup', handleKeyUp);

    // Start game loop
    gameLoop();
});

let keys = {};
function handleKeyDown(e) {
    keys[e.code] = true;
    if (e.code === 'Space') {
        e.preventDefault();
        shoot();
    }
}

function handleKeyUp(e) {
    keys[e.code] = false;
}

function shoot() {
    const ship = document.getElementById('secret-ship');
    const shipRect = ship.getBoundingClientRect();
    const bullet = document.createElement('div');
    bullet.className = 'secret-bullet';
    bullet.style.position = 'fixed';
    const startX = shipRect.left + shipRect.width / 2 - 2;
    const startY = shipRect.top - 16;
    bullet.style.left = startX + 'px';
    bullet.style.top = startY + 'px';
    document.body.appendChild(bullet);
    bullets.push({ element: bullet, x: startX, y: startY, age: 0 });
}

function createExplosion(x, y) {
    const explosion = document.createElement('div');
    explosion.className = 'secret-explosion';
    explosion.style.left = x + 'px';
    explosion.style.top = y + 'px';
    document.body.appendChild(explosion);
    setTimeout(() => explosion.remove(), 600);
}

function gameLoop() {
    if (!secretModeActive) return;

    // Apply forces based on keys (difficult controls with inertia)
    let accelX = 0;
    let accelY = 0;
    if (keys['ArrowLeft']) accelX -= 0.3;
    if (keys['ArrowRight']) accelX += 0.3;
    if (keys['ArrowUp']) accelY += 0.3;
    if (keys['ArrowDown']) accelY -= 0.3;

    // Update velocity with acceleration
    shipVelX += accelX;
    shipVelY += accelY;

    // Apply friction/damping
    shipVelX *= 0.98;
    shipVelY *= 0.98;

    // Update position
    shipX += shipVelX;
    shipY += shipVelY;

    // Keep ship in bounds (but allow some freedom)
    if (shipX < -50) shipX = window.innerWidth + 50;
    if (shipX > window.innerWidth + 50) shipX = -50;
    if (shipY < -50) shipY = window.innerHeight + 50;
    if (shipY > window.innerHeight + 50) shipY = -50;

    document.getElementById('secret-ship').style.left = shipX + 'px';
    document.getElementById('secret-ship').style.bottom = (window.innerHeight - shipY - 60) + 'px';

    // Move bullets
    bullets.forEach((bullet, index) => {
        bullet.age += 1;
        bullet.y -= 10;
        bullet.element.style.top = bullet.y + 'px';

        // Check collision with page elements after bullet is visible for ~0.5s
        const canHit = bullet.age > 30;
        if (canHit) {
            const elements = document.querySelectorAll('section, .project-card, .skill-card, .contact-card, .experience-card, nav, footer');
            elements.forEach(element => {
                const rect = element.getBoundingClientRect();
                if (bullet.x >= rect.left && bullet.x <= rect.right && bullet.y >= rect.top && bullet.y <= rect.bottom) {
                    createExplosion(bullet.x, bullet.y);
                    if (!elementHealth.has(element)) {
                        elementHealth.set(element, 1.0); // Full health
                    }
                    let health = elementHealth.get(element);
                    health -= 0.12; // Reduce health by 12%
                    health = Math.max(0, health);
                    elementHealth.set(element, health);
                    element.style.opacity = Math.max(0.15, health);
                    score += 10; // Increase score
                    document.getElementById('secret-score').textContent = 'Score: ' + score;

                    if (health <= 0) {
                        element.style.transition = 'all 0.5s ease';
                        element.style.transform = 'scale(0) rotate(360deg)';
                        setTimeout(() => element.remove(), 500);
                    }

                    bullet.element.remove();
                    bullets.splice(index, 1);
                    return;
                }
            });
        }

        // Remove bullet if off screen
        if (bullet.y < -20) {
            bullet.element.remove();
            bullets.splice(index, 1);
        }
    });

    requestAnimationFrame(gameLoop);
}

// Exit secret mode on ESC
document.addEventListener('keydown', (e) => {
    if (e.code === 'Escape' && secretModeActive) {
        secretModeActive = false;
        document.getElementById('secret-overlay').style.display = 'none';
        document.getElementById('secret-ship').style.display = 'none';
        document.getElementById('secret-score').style.display = 'none';
        bullets.forEach(bullet => bullet.element.remove());
        bullets = [];
        document.removeEventListener('keydown', handleKeyDown);
        document.removeEventListener('keyup', handleKeyUp);
    }
});
