<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TareKar - Gestión de Tareas</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --gradient-start: #2B2D42;
            --gradient-end: #1A1B2E;
            --accent-color: #6C63FF;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .background-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            animation: float 20s infinite;
        }

        .shape:nth-child(1) {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle at 30% 30%, rgba(108, 99, 255, 0.08) 0%, rgba(108, 99, 255, 0) 70%);
            top: -200px;
            right: -100px;
            animation-duration: 25s;
        }

        .shape:nth-child(2) {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle at 70% 70%, rgba(108, 99, 255, 0.08) 0%, rgba(108, 99, 255, 0) 70%);
            bottom: -150px;
            left: -50px;
            animation-duration: 30s;
            animation-delay: -5s;
        }

        .shape:nth-child(3) {
            width: 250px;
            height: 250px;
            background: radial-gradient(circle at 50% 50%, rgba(108, 99, 255, 0.08) 0%, rgba(108, 99, 255, 0) 70%);
            top: 50%;
            right: 15%;
            animation-duration: 20s;
            animation-delay: -10s;
        }

        .shape:nth-child(4) {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle at 40% 60%, rgba(108, 99, 255, 0.06) 0%, rgba(108, 99, 255, 0) 70%);
            top: 20%;
            left: 10%;
            animation-duration: 22s;
            animation-delay: -15s;
        }

        .shape:nth-child(5) {
            width: 150px;
            height: 150px;
            background: radial-gradient(circle at 60% 40%, rgba(108, 99, 255, 0.06) 0%, rgba(108, 99, 255, 0) 70%);
            bottom: 20%;
            right: 10%;
            animation-duration: 28s;
            animation-delay: -7s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg) scale(1);
            }
            25% {
                transform: translate(10px, 10px) rotate(5deg) scale(1.05);
            }
            50% {
                transform: translate(0, 20px) rotate(0deg) scale(1);
            }
            75% {
                transform: translate(-10px, 10px) rotate(-5deg) scale(0.95);
            }
        }

        .content {
            text-align: center;
            padding: 2rem;
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .logo {
            font-size: 6rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
            letter-spacing: -2px;
            position: relative;
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
            animation: expandWidth 0.8s ease forwards 0.8s;
        }

        @keyframes expandWidth {
            from {
                width: 0;
            }
            to {
                width: 100px;
            }
        }

        .description {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto 3rem;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards 0.3s;
            line-height: 1.6;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .buttons {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards 0.6s;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .btn {
            display: inline-block;
            padding: 1rem 3rem;
            border-radius: 9999px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            position: relative;
            overflow: hidden;
            width: 250px;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }

        .btn:hover::before {
            transform: translateX(100%);
        }

        .btn-primary {
            background: var(--accent-color);
            color: white;
            box-shadow: 0 4px 15px rgba(108, 99, 255, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="background-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="content">
        <h1 class="logo">TareKar</h1>
        <p class="description">
            Transforma tu productividad con una experiencia de gestión 
            de tareas elegante y eficiente.
        </p>
        <div class="buttons">
            <a href="{{ route('login') }}" class="btn btn-primary">
                Inicia tu experiencia
            </a>
            <a href="{{ route('register') }}" class="btn btn-secondary">
                Regístrate
            </a>
        </div>
    </div>
</body>
</html>
