
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#84beee">
    <title>ALIVARE - Memuat...</title>

    <link rel="preload" as="image"
          href="{{ asset('images/login-background.png') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            width: 100%;
            min-height: 100%;
            overflow: hidden;
            background: #84beee;
            font-family: 'Instrument Sans', -apple-system,
                BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .splash {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            min-height: 100dvh;
            padding: 20px;
            overflow: hidden;
            isolation: isolate;
        }

.splash-background {
    position: absolute;
    inset: 0;
    z-index: -2;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
    display: block;
}

        .splash-overlay {
            position: absolute;
            inset: 0;
            z-index: -1;
            background: radial-gradient(
                circle at center,
                rgba(15, 23, 42, 0.08) 0%,
                rgba(15, 23, 42, 0.22) 100%
            );
            backdrop-filter: blur(1px);
            -webkit-backdrop-filter: blur(1px);
        }

        .splash-card {
            width: min(90vw, 400px);
            padding: 40px 32px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.85);
            border-radius: 22px;
            box-shadow:
                0 18px 36px -10px rgba(15, 23, 42, 0.14),
                0 0 0 1px rgba(255, 255, 255, 0.6) inset;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 18px;
            opacity: 1;
            transform: translateY(0) scale(1);
            transition:
                opacity 0.35s ease,
                transform 0.35s ease,
                filter 0.35s ease;
            animation: rise-in 0.7s
                cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .splash-card.fade-out {
            opacity: 0;
            transform: scale(0.96);
            filter: blur(2px);
        }

        .splash-logo {
            display: block;
            height: clamp(75px, 10vw, 95px);
            width: auto;
            max-width: 100%;
            object-fit: contain;
        }

        .splash-divider {
            width: 36px;
            height: 3px;
            background: #1479ed;
            border-radius: 99px;
            opacity: 0.85;
        }

        .splash-content h1 {
            margin: 0;
            color: #101d49;
            font-size: clamp(20px, 4.5vw, 23px);
            font-weight: 800;
            line-height: 1.3;
            letter-spacing: -0.4px;
        }

        .splash-content h1 span {
            display: block;
            color: #1479ed;
        }

        .loading-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            width: 100%;
            margin-top: 4px;
        }

        .progress-container {
            width: 100%;
            max-width: 180px;
            height: 4px;
            background: rgba(20, 121, 237, 0.15);
            border-radius: 99px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, #1479ed, #2563eb);
            border-radius: 99px;
            animation: progress-fill 2.5s
                cubic-bezier(0.25, 0.8, 0.25, 1) forwards;
        }

        .loading-text {
            font-size: 11px;
            font-weight: 600;
            color: #64748b;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        @keyframes rise-in {
            from {
                opacity: 0;
                transform: translateY(16px) scale(0.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes progress-fill {
            0% { width: 0; }
            60% { width: 70%; }
            100% { width: 100%; }
        }

        @media (max-height: 650px) {
            .splash-card {
                padding: 28px 22px;
                gap: 14px;
            }

            .splash-logo {
                height: 65px;
            }

            .splash-content h1 {
                font-size: 18px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .splash-card {
                animation: none;
                transition: opacity 0.2s ease;
            }

            .progress-bar {
                animation-duration: 1.5s;
            }
        }
    </style>
</head>

<body>
    <main class="splash">
        <img
            class="splash-background"
            src="{{ asset('images/login-background.png') }}"
            alt=""
        >

        <div class="splash-overlay"></div>

        <div class="splash-card" id="splashCard">
            <img
                class="splash-logo"
                src="{{ asset('images/alivare-logo.png') }}"
                alt="ALIVARE"
            >

            <div class="splash-divider"></div>

            <section class="splash-content">
                <h1>
                    Hunian Nyaman,
                    <span>Hidup Lebih Tenang.</span>
                </h1>
            </section>

            <div class="loading-section"
                 aria-label="Memuat aplikasi">
                <div class="progress-container">
                    <div class="progress-bar"></div>
                </div>
                <span class="loading-text">Memuat ALIVARE...</span>
            </div>
        </div>
    </main>

   
<script>
    (() => {
       const destination = "{{ url('/login') }}";
        let hasNavigated = false;

        function navigateOnce() {
            if (hasNavigated) return;
            hasNavigated = true;

            const card = document.getElementById('splashCard');

            if (card) {
                card.classList.add('fade-out');
            }

            window.setTimeout(() => {
    window.location.href = '/login';
}, 350);
        }

        window.setTimeout(navigateOnce, 2500);
    })();
</script>

</body>
</html>
