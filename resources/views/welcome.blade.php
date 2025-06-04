<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgriSync - Smart Farming Revolution</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <style>
        :root {
            --primary-green: #22c55e;
            --dark-green: #16a34a;
            --light-green: #86efac;
            --accent-yellow: #fbbf24;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #bbf7d0 100%);
            min-height: 100vh;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Animated background elements */
        .bg-decoration {
            position: fixed;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
            z-index: -1;
        }

        .bg-decoration:nth-child(1) {
            background: var(--primary-green);
            top: 10%;
            left: -10%;
            animation-delay: 0s;
        }

        .bg-decoration:nth-child(2) {
            background: var(--accent-yellow);
            top: 60%;
            right: -10%;
            animation-delay: -4s;
        }

        .bg-decoration:nth-child(3) {
            background: var(--light-green);
            bottom: 20%;
            left: 20%;
            animation-delay: -2s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }

        /* Header */
        header {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.9);
            border-bottom: 1px solid rgba(34, 197, 94, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
            animation: slideDown 0.8s ease-out;
        }

        @keyframes slideDown {
            from { transform: translateY(-100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        .brand-name {
            font-size: 1.75rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            color: white;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(34, 197, 94, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-dark);
            border: 2px solid rgba(34, 197, 94, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(34, 197, 94, 0.1);
            border-color: var(--primary-green);
        }

        /* Hero Section */
        .hero {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            min-height: 80vh;
        }

        .hero-content {
            opacity: 0;
            animation: fadeInUp 1s ease-out 0.3s forwards;
        }

        .hero-visual {
            opacity: 0;
            animation: fadeInUp 1s ease-out 0.6s forwards;
            position: relative;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--text-dark), var(--primary-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .highlight {
            position: relative;
            display: inline-block;
        }

        .highlight::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--accent-yellow), var(--primary-green));
            border-radius: 4px;
            animation: expandWidth 1.5s ease-out 1.5s forwards;
            transform: scaleX(0);
            transform-origin: left;
        }

        @keyframes expandWidth {
            to { transform: scaleX(1); }
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 2.5rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-cta {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 16px;
        }

        /* Feature Cards */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
            opacity: 0;
            animation: fadeInUp 1s ease-out 1.2s forwards;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.8);
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid rgba(34, 197, 94, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(34, 197, 94, 0.15);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-green), var(--light-green));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .feature-card h3 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .feature-card p {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        /* Hero Visual */
        .hero-image {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            aspect-ratio: 4/3;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(134, 239, 172, 0.1));
            z-index: 1;
        }

        .farm-visual {
            width: 80%;
            height: 80%;
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            z-index: 2;
            position: relative;
        }

        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 4rem;
            opacity: 0;
            animation: fadeInUp 1s ease-out 1.8s forwards;
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-green);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-light);
            font-weight: 500;
        }

        /* Footer */
        footer {
            margin-top: 6rem;
            padding: 2rem;
            text-align: center;
            border-top: 1px solid rgba(34, 197, 94, 0.1);
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }

            .nav-container {
                padding: 1rem;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .nav-buttons {
                gap: 0.5rem;
            }

            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .cta-buttons {
                justify-content: center;
            }
        }

        /* Scroll animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.8s ease-out;
        }
    </style>
</head>
<body>
    <!-- Animated background elements -->
    <div class="bg-decoration"></div>
    <div class="bg-decoration"></div>
    <div class="bg-decoration"></div>

    <!-- Navigation -->
    <header>
        <div class="nav-container">
            <div class="logo-section">
                <div class="logo">A</div>
                <span class="brand-name">AgriSync</span>
            </div>
            <nav class="nav-buttons">
                <a href="{{ route('login') }}" class="btn btn-secondary">Log In</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="hero">
        <div class="hero-content">
            <h1>
                Revolutionizing <br>
                <span class="highlight">Smart Farming</span>
            </h1>
            <p>
                Transform your agricultural practices with cutting-edge technology, 
                data-driven insights, and a thriving community of innovative farmers.
            </p>
            <div class="cta-buttons">
                <a href="#" class="btn btn-primary btn-cta">Start Your Journey</a>
                <a href="#" class="btn btn-secondary btn-cta">Learn More</a>
            </div>

            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">🚜</div>
                    <h3>IoT Integration</h3>
                    <p>Connect and control your farm</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Data Insights</h3>
                    <p>Make informed decisions with real-time analytics</p>
                </div>
            </div>

        </div>

        <div class="hero-visual">
            <div class="hero-image">
                <div>
                    <img src="{{ asset('images/logo.svg') }}" alt="Application Logo" style="width:100%; height:100%; object-fit:contain; overflow:hidden; border-style: double;">
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 <strong>AgriSync</strong>. Cultivating the future of agriculture.</p>
    </footer>

    <script>
        // Enhanced animations with GSAP
        document.addEventListener('DOMContentLoaded', function() {
            // Stagger animation for feature cards
            gsap.fromTo('.feature-card', 
                { opacity: 0, y: 50, scale: 0.8 },
                { 
                    opacity: 1, 
                    y: 0, 
                    scale: 1,
                    duration: 0.6,
                    stagger: 0.2,
                    delay: 1.5,
                    ease: "back.out(1.7)"
                }
            );

            // Stats counter animation
            gsap.fromTo('.stat-number',
                { textContent: 0 },
                {
                    textContent: function(i, target) {
                        return target.textContent;
                    },
                    duration: 2,
                    delay: 2,
                    ease: "power2.out",
                    snap: { textContent: 1 },
                    stagger: 0.3
                }
            );

            // Floating animation for hero visual
            gsap.to('.hero-image', {
                y: -20,
                duration: 3,
                repeat: -1,
                yoyo: true,
                ease: "power2.inOut"
            });

            // Button hover effects
            document.querySelectorAll('.btn').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    gsap.to(this, { scale: 1.05, duration: 0.3 });
                });
                
                btn.addEventListener('mouseleave', function() {
                    gsap.to(this, { scale: 1, duration: 0.3 });
                });
            });

            // Feature card interactions
            document.querySelectorAll('.feature-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    gsap.to(this.querySelector('.feature-icon'), {
                        rotation: 360,
                        scale: 1.1,
                        duration: 0.5
                    });
                });
                
                card.addEventListener('mouseleave', function() {
                    gsap.to(this.querySelector('.feature-icon'), {
                        rotation: 0,
                        scale: 1,
                        duration: 0.3
                    });
                });
            });
        });
    </script>
</body>
</html>