<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcos Saúl Lizano Jaca - Desarrollador Web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            --accent-gradient: linear-gradient(135deg, #f0f0f0 0%, #e0e0e0 50%, #d0d0d0 100%);
            --card-gradient: linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.03) 100%);
            --text-dark: #1a1a1a;
            --text-light: #808080;
            --white: #ffffff;
            --accent: #e8e8e8;
            --accent-2: #c0c0c0;
            --success: #999999;
            --gray-dark: #2a2a2a;
            --gray-light: #f5f5f5;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #202020 100%);
            background-attachment: fixed;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(200, 200, 200, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(180, 180, 180, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
            animation: gradientShift 15s ease infinite;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle 200px at 10% 20%, rgba(200, 200, 200, 0.06) 0%, transparent 100%),
                radial-gradient(circle 300px at 90% 70%, rgba(180, 180, 180, 0.06) 0%, transparent 100%),
                radial-gradient(circle 150px at 50% 50%, rgba(220, 220, 220, 0.04) 0%, transparent 100%);
            pointer-events: none;
            z-index: -1;
            animation: gradientShift 20s ease-in-out infinite reverse;
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(0, 212, 255, 0.6);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }

        @keyframes orbitBg1 {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            50% {
                transform: translate(100px, -100px) rotate(180deg);
            }
            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        @keyframes orbitBg2 {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            50% {
                transform: translate(-80px, 120px) rotate(180deg);
            }
            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        @keyframes orbitBg3 {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            50% {
                transform: translate(150px, 80px) rotate(180deg);
            }
            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 0.5;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.1);
            }
        }

        @keyframes fillBar {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        /* Header y Navegación */
        header {
            background: rgba(26, 26, 26, 0.7);
            backdrop-filter: blur(20px);
            color: var(--white);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(200, 200, 200, 0.2);
            animation: fadeInDown 0.6s ease-out;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: 'Poppins', sans-serif;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2.5rem;
        }

        nav a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent-gradient);
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0, 212, 255, 0.15) 0%, transparent 70%);
            animation: float 8s ease-in-out infinite;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle 300px at 10% 40%, rgba(200, 200, 200, 0.1) 0%, transparent 100%),
                radial-gradient(circle 250px at 90% 60%, rgba(180, 180, 180, 0.1) 0%, transparent 100%);
            animation: orbitBg1 20s linear infinite;
            pointer-events: none;
        }

        .hero-decorative {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .hero-dot {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(200, 200, 200, 0.6), rgba(200, 200, 200, 0.1));
            opacity: 0.3;
            animation: pulse 4s ease-in-out infinite;
        }

        .dot-1 { width: 100px; height: 100px; top: 10%; left: 5%; animation-delay: 0s; }
        .dot-2 { width: 80px; height: 80px; top: 60%; right: 10%; animation-delay: 0.5s; }
        .dot-3 { width: 120px; height: 120px; bottom: 10%; left: 15%; animation-delay: 1s; }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            animation: fadeInUp 0.8s ease-out;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 8vw, 4.5rem);
            font-weight: 800;
            background: linear-gradient(135deg, var(--white) 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            font-family: 'Poppins', sans-serif;
            letter-spacing: -1px;
        }

        .hero .subtitle {
            font-size: clamp(1.2rem, 4vw, 2rem);
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        .hero p {
            font-size: 1.1rem;
            color: var(--white);
            opacity: 0.85;
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn {
            padding: 1rem 2.5rem;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--accent-gradient);
            color: var(--text-dark);
            box-shadow: 0 10px 40px rgba(0, 212, 255, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 50px rgba(0, 212, 255, 0.5);
        }

        .btn-secondary {
            background: transparent;
            color: var(--accent);
            border: 2px solid var(--accent);
            box-shadow: inset 0 0 20px rgba(0, 212, 255, 0.1);
        }

        .btn-secondary:hover {
            background: rgba(0, 212, 255, 0.1);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 212, 255, 0.3), inset 0 0 20px rgba(0, 212, 255, 0.1);
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Secciones */
        section {
            padding: 5rem 2rem;
            position: relative;
            z-index: 2;
        }

        section h2 {
            font-size: clamp(2rem, 5vw, 3.5rem);
            margin-bottom: 3.5rem;
            font-weight: 800;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--white) 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Sobre mí */
        .about {
            background: rgba(42, 42, 42, 0.3);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(200, 200, 200, 0.2);
            border-bottom: 1px solid rgba(200, 200, 200, 0.2);
            position: relative;
            overflow: hidden;
        }

        .about::before {
            content: '';
            position: absolute;
            top: 0;
            right: -100px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(180, 180, 180, 0.15) 0%, transparent 70%);
            animation: orbitBg2 25s linear infinite;
            pointer-events: none;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
            position: relative;
            z-index: 1;
        }

        .about-text {
            color: var(--white);
            line-height: 1.9;
            animation: slideInLeft 0.8s ease-out;
        }

        .about-text p {
            margin-bottom: 1.5rem;
            text-align: justify;
            font-size: 1.05rem;
            opacity: 0.9;
        }

        .experience-card {
            background: var(--card-gradient);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: 20px;
            border: 1px solid rgba(200, 200, 200, 0.3);
            animation: slideInRight 0.8s ease-out;
            transition: all 0.3s ease;
        }

        .experience-card:hover {
            border-color: rgba(200, 200, 200, 0.6);
            box-shadow: 0 0 40px rgba(200, 200, 200, 0.2);
            transform: translateY(-5px);
        }

        .experience-card h3 {
            color: var(--accent);
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            font-family: 'Poppins', sans-serif;
        }

        .experience-card h4 {
            color: var(--white);
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .experience-card ul {
            list-style: none;
        }

        .experience-card ul li {
            color: var(--white);
            margin-bottom: 0.8rem;
            padding-left: 1.5rem;
            position: relative;
            opacity: 0.85;
        }

        .experience-card ul li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--accent);
            font-weight: bold;
        }

        /* Skills */
        .skills {
            background: transparent;
        }

        .skills-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .skills-visual {
            position: relative;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .skills-chart {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .skill-bar-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .skill-item {
            animation: fadeInUp 0.6s ease-out;
        }

        .skill-item:nth-child(1) { animation-delay: 0.1s; }
        .skill-item:nth-child(2) { animation-delay: 0.2s; }
        .skill-item:nth-child(3) { animation-delay: 0.3s; }
        .skill-item:nth-child(4) { animation-delay: 0.4s; }
        .skill-item:nth-child(5) { animation-delay: 0.5s; }
        .skill-item:nth-child(6) { animation-delay: 0.6s; }

        .skill-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.8rem;
            color: var(--white);
        }

        .skill-name {
            font-weight: 600;
            font-size: 1rem;
            color: var(--accent);
        }

        .skill-percent {
            font-weight: 700;
            color: var(--accent);
            font-size: 1.1rem;
        }

        .skill-bar {
            width: 100%;
            height: 8px;
            background: rgba(200, 200, 200, 0.1);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid rgba(200, 200, 200, 0.2);
            position: relative;
        }

        .skill-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent) 0%, var(--accent-2) 100%);
            border-radius: 10px;
            width: 0%;
            animation: fillBar 1.5s ease-out forwards;
            position: relative;
            box-shadow: 0 0 20px rgba(200, 200, 200, 0.6);
        }

        .skill-bar-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 2s infinite;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .skill-card {
            background: var(--card-gradient);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(200, 200, 200, 0.2);
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            animation: fadeInUp 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }

        .skill-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(200, 200, 200, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .skill-card:nth-child(1) { animation-delay: 0.1s; }
        .skill-card:nth-child(2) { animation-delay: 0.2s; }
        .skill-card:nth-child(3) { animation-delay: 0.3s; }
        .skill-card:nth-child(4) { animation-delay: 0.4s; }
        .skill-card:nth-child(5) { animation-delay: 0.5s; }
        .skill-card:nth-child(6) { animation-delay: 0.6s; }

        .skill-card:hover {
            border-color: rgba(200, 200, 200, 0.6);
            box-shadow: 0 10px 40px rgba(200, 200, 200, 0.3);
            transform: translateY(-10px) scale(1.05);
        }

        .skill-card:hover::before {
            left: 100%;
        }

        .skill-card h3 {
            color: var(--accent);
            margin-bottom: 0.8rem;
            font-size: 1.3rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .skill-card p {
            color: var(--white);
            opacity: 0.8;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
        }

        .skill-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        /* Mejoras Visuales Generales */
        section:nth-child(even) {
            background: rgba(15, 52, 96, 0.2);
            backdrop-filter: blur(5px);
            border-bottom: 1px solid rgba(0, 212, 255, 0.1);
        }

        section:nth-child(odd) {
            background: transparent;
            border-bottom: 1px solid rgba(0, 212, 255, 0.1);
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: float 2s ease-in-out infinite;
            color: var(--accent);
            opacity: 0.7;
            z-index: 10;
        }

        /* Líneas decorativas */
        .section-divider {
            width: 100px;
            height: 4px;
            background: var(--accent-gradient);
            margin: 0 auto 2rem;
            border-radius: 2px;
            animation: fadeInUp 0.8s ease-out;
        }

        /* Glow Effect en Hover */
        a, button {
            position: relative;
        }

        a::before, button::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: var(--accent-gradient);
            border-radius: inherit;
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s ease;
        }

        a:hover::before, button:hover::before {
            opacity: 0.1;
        }

        /* Efecto en textos con gradiente */
        .gradient-text {
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Proyectos */
        .projects {
            background: rgba(42, 42, 42, 0.3);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(200, 200, 200, 0.2);
            border-bottom: 1px solid rgba(200, 200, 200, 0.2);
            position: relative;
            overflow: hidden;
        }

        .projects::after {
            content: '';
            position: absolute;
            top: -150px;
            left: -150px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(200, 200, 200, 0.1) 0%, transparent 70%);
            animation: orbitBg3 30s linear infinite;
            pointer-events: none;
            z-index: 0;
        }

        .projects > .container {
            position: relative;
            z-index: 2;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            position: relative;
            z-index: 1;
        }

        .project-card {
            background: var(--card-gradient);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(0, 212, 255, 0.2);
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease-out;
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .project-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 20px;
            padding: 1px;
            background: linear-gradient(135deg, rgba(0, 212, 255, 0.5), transparent);
            -webkit-mask: 
                linear-gradient(#fff 0 0) content-box, 
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .project-card:nth-child(1) { animation-delay: 0.1s; }
        .project-card:nth-child(2) { animation-delay: 0.2s; }
        .project-card:nth-child(3) { animation-delay: 0.3s; }

        .project-card:hover {
            border-color: rgba(0, 212, 255, 0.6);
            transform: translateY(-15px);
            box-shadow: 0 20px 60px rgba(0, 212, 255, 0.3);
        }

        .project-card:hover::before {
            opacity: 1;
        }

        .project-header {
            background: var(--accent-gradient);
            color: var(--text-dark);
            padding: 2.5rem;
            font-weight: 700;
        }

        .project-header h3 {
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            font-family: 'Poppins', sans-serif;
        }

        .project-header p {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .project-body {
            padding: 2.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .project-body p {
            color: var(--white);
            margin-bottom: 1.5rem;
            text-align: justify;
            opacity: 0.85;
            font-size: 1rem;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
            margin-top: auto;
        }

        .tech-tag {
            background: rgba(200, 200, 200, 0.15);
            color: var(--accent);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.85rem;
            border: 1px solid rgba(200, 200, 200, 0.3);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .tech-tag:hover {
            background: rgba(200, 200, 200, 0.3);
            border-color: rgba(200, 200, 200, 0.6);
        }

        .project-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .project-link:hover {
            color: var(--accent-2);
            transform: translateX(5px);
        }

        /* Contacto */
        .contact {
            background: transparent;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .contact-card {
            background: var(--card-gradient);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: 15px;
            border: 1px solid rgba(200, 200, 200, 0.2);
            text-align: center;
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease-out;
        }

        .contact-card:nth-child(1) { animation-delay: 0.1s; }
        .contact-card:nth-child(2) { animation-delay: 0.2s; }
        .contact-card:nth-child(3) { animation-delay: 0.3s; }
        .contact-card:nth-child(4) { animation-delay: 0.4s; }

        .contact-card:hover {
            border-color: rgba(200, 200, 200, 0.6);
            transform: translateY(-8px);
            box-shadow: 0 10px 40px rgba(200, 200, 200, 0.2);
        }

        .contact-card:hover {
            border-color: rgba(200, 200, 200, 0.6);
            transform: translateY(-8px);
            box-shadow: 0 10px 40px rgba(200, 200, 200, 0.2);
        }

        .contact-card h3 {
            color: var(--accent);
            margin-bottom: 1rem;
            font-size: 1.3rem;
            font-family: 'Poppins', sans-serif;
        }

        .contact-card a, .contact-card p {
            color: var(--white);
            text-decoration: none;
            opacity: 0.9;
            transition: all 0.3s ease;
        }

        .contact-card a:hover {
            color: var(--accent);
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background: rgba(26, 26, 26, 0.5);
            backdrop-filter: blur(10px);
            color: var(--white);
            text-align: center;
            padding: 3rem 2rem;
            border-top: 1px solid rgba(200, 200, 200, 0.2);
            animation: fadeInUp 0.8s ease-out 0.3s backwards;
        }

        footer p {
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        footer p:first-child {
            font-weight: 700;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            nav ul {
                gap: 1.5rem;
            }

            .about-content {
                grid-template-columns: 1fr;
            }

            .skills-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            section {
                padding: 3rem 1.5rem;
            }
        }

        @media (max-width: 768px) {
            nav ul {
                gap: 1rem;
                font-size: 0.9rem;
            }

            .logo {
                font-size: 1.3rem;
            }

            .hero {
                min-height: 80vh;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero .subtitle {
                font-size: 1.2rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }

            .about-content {
                gap: 2rem;
            }

            .skills-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .skills-grid {
                grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
                gap: 1.5rem;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            section {
                padding: 2.5rem 1rem;
            }

            section h2 {
                margin-bottom: 2rem;
            }

            .skill-label {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            nav {
                flex-direction: column;
                gap: 1rem;
            }

            nav ul {
                gap: 0.8rem;
                flex-wrap: wrap;
                justify-content: center;
            }

            .logo {
                font-size: 1rem;
            }

            .hero h1 {
                font-size: 1.5rem;
            }

            .hero .subtitle {
                font-size: 0.95rem;
            }

            .hero p {
                font-size: 0.9rem;
            }

            .cta-buttons {
                gap: 1rem;
            }

            .btn {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }

            .skills-container {
                grid-template-columns: 1fr;
            }

            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .skill-card {
                padding: 1.5rem;
            }

            section {
                padding: 2rem 0.5rem;
            }

            section h2 {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .dot-1 { width: 60px; height: 60px; }
            .dot-2 { width: 50px; height: 50px; }
            .dot-3 { width: 70px; height: 70px; }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">MSL</div>
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#sobre">Sobre Mí</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#proyectos">Proyectos</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="inicio">
        <div class="hero-decorative">
            <div class="hero-dot dot-1"></div>
            <div class="hero-dot dot-2"></div>
            <div class="hero-dot dot-3"></div>
        </div>
        <div class="hero-content">
            <h1>Marcos Saúl Lizano Jaca</h1>
            <p class="subtitle">Desarrollador Web & Técnico en Sistemas</p>
            <p>Transformando ideas complejas en soluciones digitales eficientes y modernas</p>
            <div class="cta-buttons">
                <a href="#proyectos" class="btn btn-primary">Ver Mis Proyectos</a>
                <a href="#contacto" class="btn btn-secondary">Contáctame</a>
            </div>
        </div>
    </section>

    <!-- Sobre Mí -->
    <section class="about" id="sobre">
        <div class="container">
            <h2>Sobre Mí</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        Soy un desarrollador web naturalmente entusiasta y curioso, con una mentalidad enfocada en encontrar soluciones eficientes. Me considero una persona analítica y orientada a los detalles, capaz de transformar problemas complejos en código limpio y funcional.
                    </p>
                    <p>
                        Gracias a mi experiencia trabajando en entornos digitales, he desarrollado una gran capacidad de adaptación y un fuerte sentido del trabajo en equipo. Disfruto afrontar nuevos desafíos técnicos sin perder de vista la comunicación clara y la empatía con el usuario.
                    </p>
                    <p>
                        <strong>Formación:</strong> Actualmente cursando Grado Superior en Desarrollo de Aplicaciones Web en CampusDigital (2025 - Actualidad). Técnico en Sistemas Microinformáticos y redes completado en IES Santiago Hernández.
                    </p>
                </div>
                <div>
                    <div class="experience-card">
                        <h3>🚀 Experiencia Laboral</h3>
                        <h4>Técnico en Sistemas Microinformáticos y Redes</h4>
                        <p style="color: var(--accent); font-size: 0.9rem; margin-bottom: 1.5rem;">CampusDigital | 20/03/2026 - 26/06/2026</p>
                        <ul>
                            <li>Ensamblé, diagnostiqué y reparé hardware y software informático</li>
                            <li>Gestioné instalación y configuración de servidores Linux</li>
                            <li>Brindé soporte técnico y resolución de incidencias</li>
                            <li>Configuré entornos informáticos para uso académico</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills -->
    <section class="skills" id="skills">
        <div class="container">
            <h2>Skills & Competencias</h2>
            <div class="skills-container">
                <!-- Barras de Progreso -->
                <div class="skill-bar-container">
                    <div class="skill-item">
                        <div class="skill-label">
                            <span class="skill-name">🌐 Frontend (HTML, CSS, JS)</span>
                            <span class="skill-percent">85%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-bar-fill" style="width: 85%; animation-delay: 0s;"></div>
                        </div>
                    </div>

                    <div class="skill-item">
                        <div class="skill-label">
                            <span class="skill-name">⚙️ Backend (PHP)</span>
                            <span class="skill-percent">75%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-bar-fill" style="width: 75%; animation-delay: 0.2s;"></div>
                        </div>
                    </div>

                    <div class="skill-item">
                        <div class="skill-label">
                            <span class="skill-name">🗄️ Bases de Datos (MySQL)</span>
                            <span class="skill-percent">80%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-bar-fill" style="width: 80%; animation-delay: 0.4s;"></div>
                        </div>
                    </div>

                    <div class="skill-item">
                        <div class="skill-label">
                            <span class="skill-name">💻 C++ (POO)</span>
                            <span class="skill-percent">70%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-bar-fill" style="width: 70%; animation-delay: 0.6s;"></div>
                        </div>
                    </div>

                    <div class="skill-item">
                        <div class="skill-label">
                            <span class="skill-name">🛠️ Linux & Sistemas</span>
                            <span class="skill-percent">78%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-bar-fill" style="width: 78%; animation-delay: 0.8s;"></div>
                        </div>
                    </div>

                    <div class="skill-item">
                        <div class="skill-label">
                            <span class="skill-name">🎨 Diseño & UX</span>
                            <span class="skill-percent">82%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-bar-fill" style="width: 82%; animation-delay: 1s;"></div>
                        </div>
                    </div>
                </div>

                <!-- Tarjetas de Habilidades -->
                <div>
                    <div class="skills-grid">
                        <div class="skill-card">
                            <div class="skill-icon">🌐</div>
                            <h3>HTML/CSS</h3>
                            <p>Estructura semántica y diseño responsivo</p>
                        </div>
                        <div class="skill-card">
                            <div class="skill-icon">⚡</div>
                            <h3>JavaScript</h3>
                            <p>Interactividad y lógica dinámica</p>
                        </div>
                        <div class="skill-card">
                            <div class="skill-icon">🔧</div>
                            <h3>PHP</h3>
                            <p>Backend y lógica de servidor</p>
                        </div>
                        <div class="skill-card">
                            <div class="skill-icon">💾</div>
                            <h3>MySQL</h3>
                            <p>Bases de datos y SQL</p>
                        </div>
                        <div class="skill-card">
                            <div class="skill-icon">🖥️</div>
                            <h3>C++</h3>
                            <p>POO y programación avanzada</p>
                        </div>
                        <div class="skill-card">
                            <div class="skill-icon">🐧</div>
                            <h3>Linux</h3>
                            <p>Administración de sistemas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Proyectos -->
    <section class="projects" id="proyectos">
        <div class="container">
            <h2>Mis Proyectos</h2>
            <div class="projects-grid">
                <!-- Proyecto 1 -->
                <div class="project-card">
                    <div class="project-header">
                        <h3>Gestión de Equipos</h3>
                        <p style="font-size: 0.9rem; opacity: 0.9;">proyecto01-gestion-equipos</p>
                    </div>
                    <div class="project-body">
                        <p>
                            Sistema completo de gestión de equipos informáticos. Permite registrar, clasificar y administrar el inventario de hardware en una organización. Facilita el seguimiento de reparaciones, mantenimiento y asignación de equipos.
                        </p>
                        <div class="project-tech">
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">HTML</span>
                            <span class="tech-tag">CSS</span>
                            <span class="tech-tag">JavaScript</span>
                            <span class="tech-tag">MySQL</span>
                        </div>
                        <a href="https://github.com/saul-lizano/proyecto01-gestion-equipos" class="project-link" target="_blank">
                            Ver en GitHub →
                        </a>
                    </div>
                </div>

                <!-- Proyecto 2 -->
                <div class="project-card">
                    <div class="project-header">
                        <h3>Gestión de Biblioteca</h3>
                        <p style="font-size: 0.9rem; opacity: 0.9;">proyecto02-gestion-biblioteca-escolar</p>
                    </div>
                    <div class="project-body">
                        <p>
                            Plataforma de gestión de biblioteca escolar. Administra catálogos de libros, préstamos. Proporciona funcionalidades para estudiantes y personal administrativo con control de acceso.
                        </p>
                        <div class="project-tech">
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">HTML</span>
                            <span class="tech-tag">CSS</span>
                            
                            <span class="tech-tag">MySQL</span>
                        </div>
                        <a href="https://github.com/saul-lizano/proyecto02-gestion-biblioteca-escolar" class="project-link" target="_blank">
                            Ver en GitHub →
                        </a>
                    </div>
                </div>

                <!-- Proyecto 3 -->
                <div class="project-card">
                    <div class="project-header">
                        <h3>Médicas Mundo</h3>
                        <p style="font-size: 0.9rem; opacity: 0.9;">proyecto03-blog-medicas-mundo</p>
                    </div>
                    <div class="project-body">
                        <p>
                            Plataforma con artículos pensados en la reintegracion laboral y a reconocer los derechos laborales.
                        </p>
                        <div class="project-tech">
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">HTML</span>
                            <span class="tech-tag">CSS</span>
                            <span class="tech-tag">MySQL</span>
                        </div>
                        <a href="https://github.com/saul-lizano/proyecto03-blog-medicas-mundo" class="project-link" target="_blank">
                            Ver en GitHub →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section class="contact" id="contacto">
        <div class="container">
            <h2>Ponte en Contacto</h2>
            <div class="contact-info">
                <div class="contact-card">
                    <h3>✉️ Gmail</h3>
                    <a href="mailto:slizanojaca">slizanojaca@gmail.com</a>
                </div>
                <div class="contact-card">
                    <h3>📱 Teléfono</h3>
                    <a href="tel:+34627223905">(+34) 627-22-39-05</a>
                </div>
                <div class="contact-card">
                    <h3>📍 Ubicación</h3>
                    <p>Zaragoza, Spain</p>
                </div>
                <div class="contact-card">
                    <h3>💼 LinkedIn</h3>
                    <a href="https://www.linkedin.com/in/marcos-sa%C3%BAl-lizano-jaca-4956b5369/" target="_blank">Mi perfil</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© 2026 Marcos Saúl Lizano Jaca. Todos los derechos reservados.</p>
            <p>Desarrollador Web | Técnico en Sistemas | Apasionado por la Tecnología</p>
        </div>
    </footer>

    <!-- Cursor Follower -->
    <div id="cursor-follower"></div>
    <div id="cursor-glow"></div>

    <script>
        // ========== CURSOR FOLLOWER ==========
        const cursorFollower = document.getElementById('cursor-follower');
        const cursorGlow = document.getElementById('cursor-glow');
        let mouseX = 0;
        let mouseY = 0;
        let followerX = 0;
        let followerY = 0;
        let glowX = 0;
        let glowY = 0;

        // Estilos para el cursor follower
        cursorFollower.style.cssText = `
            position: fixed;
            width: 30px;
            height: 30px;
            border: 2px solid rgba(232, 232, 232, 0.8);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            display: none;
            transition: all 0.1s ease-out;
        `;

        cursorGlow.style.cssText = `
            position: fixed;
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, rgba(200, 200, 200, 0.3), transparent);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9998;
            display: none;
            filter: blur(20px);
        `;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            
            // Mostrar los cursores
            cursorFollower.style.display = 'block';
            cursorGlow.style.display = 'block';
        });

        // Animar el seguimiento del cursor
        function animateCursor() {
            followerX += (mouseX - followerX) * 0.3;
            followerY += (mouseY - followerY) * 0.3;
            glowX += (mouseX - glowX) * 0.15;
            glowY += (mouseY - glowY) * 0.15;

            cursorFollower.style.left = followerX - 15 + 'px';
            cursorFollower.style.top = followerY - 15 + 'px';

            cursorGlow.style.left = glowX - 30 + 'px';
            cursorGlow.style.top = glowY - 30 + 'px';

            requestAnimationFrame(animateCursor);
        }

        animateCursor();

        // ========== HOVER INTERACTIVITY ==========
        const interactiveElements = document.querySelectorAll('a, button, .btn, .skill-card, .project-card, .contact-card, .experience-card');

        interactiveElements.forEach(element => {
            element.addEventListener('mouseenter', () => {
                cursorFollower.style.borderColor = 'rgba(200, 200, 200, 1)';
                cursorFollower.style.boxShadow = '0 0 20px rgba(200, 200, 200, 0.8)';
                cursorFollower.style.transform = 'scale(1.5)';
                cursorGlow.style.background = 'radial-gradient(circle, rgba(200, 200, 200, 0.5), transparent)';
                cursorGlow.style.transform = 'scale(1.2)';
            });

            element.addEventListener('mouseleave', () => {
                cursorFollower.style.borderColor = 'rgba(232, 232, 232, 0.8)';
                cursorFollower.style.boxShadow = 'none';
                cursorFollower.style.transform = 'scale(1)';
                cursorGlow.style.background = 'radial-gradient(circle, rgba(200, 200, 200, 0.3), transparent)';
                cursorGlow.style.transform = 'scale(1)';
            });
        });

        // ========== SCROLL ANIMATIONS ==========
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observar todos los elementos con animación
        document.querySelectorAll('.skill-item, .project-card, .contact-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });

        // ========== SMOOTH SCROLL BEHAVIOR ==========
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // ========== PARALLAX EFFECT ==========
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.hero::before, .hero-dot');
            
            parallaxElements.forEach(el => {
                el.style.transform = `translateY(${scrolled * 0.5}px)`;
            });
        });

        // ========== BUTTON RIPPLE EFFECT ==========
        function createRipple(event) {
            const button = event.currentTarget;
            const circle = document.createElement('span');
            
            const diameter = Math.max(button.clientWidth, button.clientHeight);
            const radius = diameter / 2;

            circle.style.width = circle.style.height = diameter + 'px';
            circle.style.left = (event.clientX - button.offsetLeft - radius) + 'px';
            circle.style.top = (event.clientY - button.offsetTop - radius) + 'px';
            circle.classList.add('ripple');
            circle.style.cssText += `
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;

            // Agregar animación de ripple si no existe
            if (!document.getElementById('ripple-style')) {
                const style = document.createElement('style');
                style.id = 'ripple-style';
                style.textContent = `
                    @keyframes ripple {
                        to {
                            transform: scale(4);
                            opacity: 0;
                        }
                    }
                `;
                document.head.appendChild(style);
            }

            button.appendChild(circle);
            setTimeout(() => circle.remove(), 600);
        }

        document.querySelectorAll('.btn, button').forEach(btn => {
            btn.style.position = 'relative';
            btn.style.overflow = 'hidden';
            btn.addEventListener('click', createRipple);
        });

        // ========== ACTIVE LINK HIGHLIGHT ==========
        window.addEventListener('scroll', () => {
            let current = '';
            const sections = document.querySelectorAll('section');

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            document.querySelectorAll('nav a').forEach(link => {
                link.style.color = '#ffffff';
                link.style.opacity = '0.7';
                if (link.getAttribute('href').slice(1) === current) {
                    link.style.opacity = '1';
                    link.style.textShadow = '0 0 10px rgba(200, 200, 200, 0.5)';
                }
            });
        });

        // ========== HEADER ANIMATION ON SCROLL ==========
        const header = document.querySelector('header');
        let lastScrollTop = 0;

        window.addEventListener('scroll', () => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 100) {
                header.style.boxShadow = '0 10px 40px rgba(200, 200, 200, 0.1)';
            } else {
                header.style.boxShadow = 'none';
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });

        // ========== PAGE LOAD ANIMATION ==========
        window.addEventListener('load', () => {
            document.querySelectorAll('.hero h1, .hero .subtitle, .hero p, .btn').forEach((el, index) => {
                el.style.animation = `fadeInUp 0.8s ease-out ${index * 0.1}s backwards`;
            });
        });

        // ========== KEYBOARD NAVIGATION ==========
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                cursorFollower.style.display = 'none';
                cursorGlow.style.display = 'none';
            }
        });

        document.addEventListener('keyup', (e) => {
            if (e.key === 'Escape') {
                cursorFollower.style.display = 'block';
                cursorGlow.style.display = 'block';
            }
        });
    </script>
</body>
</html>
