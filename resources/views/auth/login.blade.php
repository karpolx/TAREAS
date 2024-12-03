<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TareKar - Iniciar Sesión</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            25% { transform: translate(10px, 10px) rotate(5deg) scale(1.05); }
            50% { transform: translate(0, 20px) rotate(0deg) scale(1); }
            75% { transform: translate(-10px, 10px) rotate(-5deg) scale(0.95); }
        }
        .content {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            width: 100%;
            max-width: 500px;
            margin: 2rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .logo {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
        }
        .logo::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.5rem;
            display: block;
            font-weight: 500;
        }
        .input-group {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .input-group-text {
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            padding: 0.75rem 1rem;
        }
        .form-control {
            background: transparent;
            border: none;
            color: white;
            padding: 0.75rem 1rem;
            width: 100%;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        .form-control:focus {
            box-shadow: none;
            background: transparent;
            outline: none;
        }
        .btn {
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .btn-primary {
            background: var(--accent-color);
            color: white;
            width: 100%;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.4);
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 1rem;
        }
        .remember-me input[type="checkbox"] {
            margin-right: 0.5rem;
            accent-color: var(--accent-color);
        }
        .remember-me label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.875rem;
        }
        .forgot-password {
            text-align: right;
            margin-top: 1rem;
        }
        .forgot-password a {
            font-size: 0.875rem;
            color: var(--accent-color);
        }
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: rgba(255, 255, 255, 0.7);
        }
        a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        a:hover {
            color: white;
        }
        .invalid-feedback {
            color: #ff6b6b;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
        }
    </style>
</head>
<body>
    <div class="background-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <div class="content">
        <div class="logo">
            TareKar
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="Ingresa tu correo">
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="current-password"
                           placeholder="Ingresa tu contraseña">
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Iniciar Sesión
                </button>
            </div>

            <div class="register-link">
                ¿No tienes una cuenta? 
                <a href="{{ route('register') }}">
                    Regístrate aquí
                </a>
            </div>
        </form>
    </div>
</body>
</html>