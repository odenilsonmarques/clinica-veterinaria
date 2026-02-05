<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HelpPet - Sistema de Gestão Veterinária</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        
        <style>
            :root {
                --primary-purple: #b0a7e8;
                --secondary-purple: #8F7FEE;
                --light-purple: #e9e3ff;
                --dark-purple: #5a3fd9;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                padding-top: 0 !important;
                background: #f9fafb;
            }

            /* Navbar Override */
            .navbar {
                padding: 1rem 2rem !important;
                background-color: var(--primary-purple) !important;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .navbar-brand {
                font-size: 1.5rem !important;
                font-weight: 700 !important;
                color: white !important;
                letter-spacing: -0.5px;
            }

            /* Hero Section */
            .hero {
                background: linear-gradient(135deg, var(--primary-purple) 0%, var(--secondary-purple) 100%);
                color: white;
                padding: 120px 20px;
                text-align: center;
                margin-top: 60px;
            }

            .hero h1 {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 20px;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .hero p {
                font-size: 1.3rem;
                margin-bottom: 40px;
                opacity: 0.95;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }

            .btn-primary-custom {
                background-color: var(--secondary-purple);
                color: white;
                border: none;
                padding: 12px 32px;
                font-size: 1rem;
                border-radius: 8px;
                transition: all 0.3s ease;
                font-weight: 600;
                text-decoration: none;
                display: inline-block;
            }

            .btn-primary-custom:hover {
                background-color: var(--dark-purple);
                transform: translateY(-2px);
                box-shadow: 0 8px 16px rgba(90, 63, 217, 0.3);
                color: white;
            }

            .btn-secondary-custom {
                background-color: transparent;
                color: white;
                border: 2px solid white;
                padding: 11px 30px;
                font-size: 1rem;
                border-radius: 8px;
                transition: all 0.3s ease;
                font-weight: 600;
                text-decoration: none;
                display: inline-block;
                margin-left: 15px;
            }

            .btn-secondary-custom:hover {
                background-color: white;
                color: var(--secondary-purple);
            }

            /* Features Section */
            .features {
                padding: 80px 20px;
                background: white;
            }

            .section-title {
                text-align: center;
                margin-bottom: 60px;
                font-size: 2.5rem;
                color: #1f2937;
                font-weight: 700;
            }

            .section-subtitle {
                text-align: center;
                color: #6b7280;
                font-size: 1.1rem;
                margin-bottom: 40px;
            }

            .feature-card {
                background: white;
                border-radius: 12px;
                padding: 30px;
                text-align: center;
                transition: all 0.3s ease;
                border: 2px solid transparent;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            }

            .feature-card:hover {
                border-color: var(--primary-purple);
                box-shadow: 0 12px 24px rgba(176, 167, 232, 0.2);
                transform: translateY(-8px);
            }

            .feature-icon {
                width: 80px;
                height: 80px;
                background-color: var(--light-purple);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 20px;
                font-size: 40px;
            }

            .feature-card h3 {
                font-size: 1.3rem;
                color: #1f2937;
                margin-bottom: 15px;
                font-weight: 600;
            }

            .feature-card p {
                color: #6b7280;
                line-height: 1.6;
            }

            /* How It Works Section */
            .how-it-works {
                padding: 80px 20px;
                background: linear-gradient(135deg, rgba(176, 167, 232, 0.1) 0%, rgba(143, 127, 238, 0.1) 100%);
            }

            .step {
                text-align: center;
                padding: 30px;
                position: relative;
            }

            .step-number {
                width: 60px;
                height: 60px;
                background-color: var(--secondary-purple);
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
                font-weight: 700;
                margin: 0 auto 20px;
            }

            .step h3 {
                font-size: 1.2rem;
                color: #1f2937;
                margin-bottom: 10px;
                font-weight: 600;
            }

            .step p {
                color: #6b7280;
                line-height: 1.6;
            }

            /* CTA Section */
            .cta-section {
                background: linear-gradient(135deg, var(--primary-purple) 0%, var(--secondary-purple) 100%);
                color: white;
                padding: 80px 20px;
                text-align: center;
            }

            .cta-section h2 {
                font-size: 2.5rem;
                margin-bottom: 20px;
                font-weight: 700;
            }

            .cta-section p {
                font-size: 1.1rem;
                margin-bottom: 40px;
                opacity: 0.95;
            }

            /* Footer */
            footer {
                background-color: var(--primary-purple) !important;
            }

            footer p {
                color: white;
                margin: 0;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .hero h1 {
                    font-size: 2rem;
                }

                .hero p {
                    font-size: 1rem;
                }

                .btn-secondary-custom {
                    margin-left: 0;
                    margin-top: 15px;
                    display: block;
                }

                .section-title {
                    font-size: 2rem;
                }

                .hero {
                    padding: 80px 20px;
                    margin-top: 60px;
                }
            }

            .navbar-dark .navbar-nav .nav-link {
                color: rgba(255, 255, 255, 0.9) !important;
                transition: color 0.3s ease;
            }

            .navbar-dark .navbar-nav .nav-link:hover {
                color: white !important;
            }

            .nav-link.fw-bold {
                display: flex;
                align-items: center;
                gap: 8px;
            }
        </style>
    </head>
    <body>
        @include('layouts.header')

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <h1>Bem-vindo ao HelpPet</h1>
                <p>A plataforma completa para gerenciar a saúde e bem-estar do seu pet</p>
                
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/tutors') }}" class="btn-primary-custom">Ir para Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn-primary-custom">Acessar Sistema</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-secondary-custom">Criar Conta</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="container">
                <h2 class="section-title">Nossas Funcionalidades</h2>
                <p class="section-subtitle">Tudo que você precisa para cuidar melhor do seu pet em um único lugar</p>

                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">🐾</div>
                            <h3>Cadastro de Pets</h3>
                            <p>Mantenha um registro completo de todos os seus animais de estimação com informações detalhadas</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">💉</div>
                            <h3>Controle de Vacinação</h3>
                            <p>Acompanhe todas as vacinas e receba notificações de atualizações necessárias</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">👨‍⚕️</div>
                            <h3>Veterinários</h3>
                            <p>Registre e gerencie informações dos profissionais veterinários que atendem seu pet</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">📋</div>
                            <h3>Carteira Digital</h3>
                            <p>Acesse todos os documentos e registros de saúde do seu pet em um só lugar</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="how-it-works">
            <div class="container">
                <h2 class="section-title">Como Funciona</h2>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="step">
                            <div class="step-number">1</div>
                            <h3>Criar Conta</h3>
                            <p>É rápido e fácil! Registre-se em poucos minutos e tenha acesso a todas as funcionalidades.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="step">
                            <div class="step-number">2</div>
                            <h3>Registrar Pets</h3>
                            <p>Adicione todos os seus animais de estimação com suas informações pessoais.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="step">
                            <div class="step-number">3</div>
                            <h3>Acompanhar Saúde</h3>
                            <p>Mantenha todas as informações de vacinação e saúde atualizadas e organizadas.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="step">
                            <div class="step-number">4</div>
                            <h3>Cuidado Total</h3>
                            <p>Acesse tudo quando precisar e ofereça o melhor cuidado ao seu pet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <h2>Pronto para começar?</h2>
                <p>Junte-se a milhares de tutores que já confiam no HelpPet</p>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-primary-custom" style="background-color: white; color: var(--secondary-purple);">
                        Criar Conta Gratuita
                    </a>
                @endif
            </div>
        </section>

        @include('layouts.footer')

        <!-- Bootstrap JS -->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
