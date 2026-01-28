<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mass Snow Closings - Live Massachusetts School & Business Closures</title>
    <meta name="description" content="Live snow day closings for Massachusetts schools and businesses. Real-time updates from WCVB during winter weather events.">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Mass Snow Closings">
    <meta property="og:description" content="Live snow day closings for Massachusetts schools and businesses. Wicked pissah updates during winter storms.">
    <meta property="og:image" content="{{ url('/og-image.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mass Snow Closings">
    <meta name="twitter:description" content="Live snow day closings for Massachusetts schools and businesses. Wicked pissah updates during winter storms.">
    <meta name="twitter:image" content="{{ url('/og-image.png') }}">

    <!-- Theme color for mobile browsers -->
    <meta name="theme-color" content="#0a2240">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BVEVEE432V"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-BVEVEE432V');
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #0a2240;
            --navy-light: #1a3a5c;
            --red: #c8102e;
            --gold: #d4af37;
            --snow: #f0f4f8;
            --ice: #e8f1f8;
        }

        body {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
            color: #fff;
            font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(180deg, rgba(0,0,0,0.4) 0%, transparent 100%);
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: var(--red);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .logo-text {
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .logo-text span {
            color: var(--red);
        }

        .status-bar {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            font-size: 0.9rem;
        }

        .status-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.1);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #4ade80;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .closure-count {
            font-family: 'Oswald', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gold);
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem 2rem 2rem;
            position: relative;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            max-width: 1500px;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            border: 3px solid rgba(255,255,255,0.1);
        }

        .video-container {
            width: 100%;
            aspect-ratio: 16/9;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(45deg, #111 0%, #222 100%);
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: contain;
            cursor: pointer;
        }

        .mute-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 44px;
            height: 44px;
            background: rgba(0,0,0,0.6);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: white;
            z-index: 15;
            transition: background 0.2s;
        }

        .mute-btn:hover {
            background: rgba(0,0,0,0.8);
        }

        .current-town {
            background: linear-gradient(90deg, var(--navy) 0%, var(--navy-light) 100%);
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 2px solid var(--red);
        }

        .town-name {
            font-family: 'Oswald', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .town-status {
            background: var(--red);
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .empty-state-wrapper {
            width: 100%;
            max-width: 1500px;
            background: linear-gradient(45deg, #111 0%, #222 100%);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            border: 3px solid rgba(255,255,255,0.1);
            aspect-ratio: 16/9;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 300px;
        }

        .empty-state h2 {
            font-family: 'Oswald', sans-serif;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: var(--snow);
        }

        .empty-state p {
            font-size: 1rem;
            color: rgba(255,255,255,0.7);
        }

        /* Melting Snowman */
        .snowman-container {
            position: relative;
            width: 120px;
            height: 180px;
            margin-bottom: 1rem;
        }

        .snowman-body {
            position: absolute;
            background: radial-gradient(circle at 30% 30%, #fff, #e0e8f0);
            border-radius: 50%;
            box-shadow: inset -5px -5px 15px rgba(0,0,0,0.1);
        }

        .snowman-head {
            width: 50px;
            height: 50px;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            animation: melt-head 3s ease-in-out infinite;
        }

        .snowman-middle {
            width: 70px;
            height: 65px;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            animation: melt-middle 3s ease-in-out infinite;
        }

        .snowman-bottom {
            width: 90px;
            height: 75px;
            top: 95px;
            left: 50%;
            transform: translateX(-50%);
            animation: melt-bottom 3s ease-in-out infinite;
        }

        @keyframes melt-head {
            0%, 100% { transform: translateX(-50%) scaleY(1); }
            50% { transform: translateX(-50%) scaleY(0.92); }
        }

        @keyframes melt-middle {
            0%, 100% { transform: translateX(-50%) scaleY(1) scaleX(1); }
            50% { transform: translateX(-50%) scaleY(0.9) scaleX(1.05); }
        }

        @keyframes melt-bottom {
            0%, 100% { transform: translateX(-50%) scaleY(1) scaleX(1); }
            50% { transform: translateX(-50%) scaleY(0.85) scaleX(1.1); }
        }

        .snowman-face {
            position: absolute;
            top: 12px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 25px;
        }

        .snowman-eye {
            position: absolute;
            width: 6px;
            height: 6px;
            background: #333;
            border-radius: 50%;
            top: 5px;
        }

        .snowman-eye.left { left: 4px; }
        .snowman-eye.right { right: 4px; }

        .snowman-frown {
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            width: 14px;
            height: 7px;
            border: 2px solid #333;
            border-top: none;
            border-radius: 0 0 14px 14px;
        }

        .snowman-tear {
            position: absolute;
            width: 4px;
            height: 8px;
            background: #7dd3fc;
            border-radius: 50% 50% 50% 50%;
            top: 18px;
            left: 12px;
            animation: tear-fall 2s ease-in infinite;
            opacity: 0;
        }

        @keyframes tear-fall {
            0% { opacity: 0; transform: translateY(0); }
            20% { opacity: 1; }
            100% { opacity: 0; transform: translateY(30px); }
        }

        .puddle {
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 15px;
            background: radial-gradient(ellipse, rgba(125,211,252,0.5) 0%, transparent 70%);
            border-radius: 50%;
            animation: puddle-grow 3s ease-in-out infinite;
        }

        @keyframes puddle-grow {
            0%, 100% { transform: translateX(-50%) scaleX(1); }
            50% { transform: translateX(-50%) scaleX(1.2); }
        }

        .drip {
            position: absolute;
            width: 4px;
            height: 12px;
            background: linear-gradient(to bottom, rgba(125,211,252,0.8), rgba(125,211,252,0.3));
            border-radius: 0 0 4px 4px;
            animation: drip-fall 2.5s ease-in infinite;
        }

        .drip:nth-child(1) { left: 20px; bottom: 80px; animation-delay: 0s; }
        .drip:nth-child(2) { left: 55px; bottom: 95px; animation-delay: 0.8s; }
        .drip:nth-child(3) { right: 20px; bottom: 85px; animation-delay: 1.6s; }

        @keyframes drip-fall {
            0% { opacity: 0; height: 0; }
            10% { opacity: 1; height: 12px; }
            100% { opacity: 0; transform: translateY(90px); }
        }

        /* Bored Kid at Window */
        .window-container {
            position: relative;
            width: 160px;
            height: 160px;
            margin-bottom: 1rem;
        }

        .window-frame {
            position: absolute;
            width: 140px;
            height: 130px;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(180deg, #87CEEB 0%, #B0E0E6 50%, #90EE90 90%);
            border: 8px solid #8B4513;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: inset 0 0 20px rgba(255,255,255,0.3);
        }

        .window-cross-v {
            position: absolute;
            width: 6px;
            height: 100%;
            background: #8B4513;
            left: 50%;
            transform: translateX(-50%);
        }

        .window-cross-h {
            position: absolute;
            width: 100%;
            height: 6px;
            background: #8B4513;
            top: 50%;
            transform: translateY(-50%);
        }

        .sun {
            position: absolute;
            width: 35px;
            height: 35px;
            background: radial-gradient(circle, #FFD700, #FFA500);
            border-radius: 50%;
            top: 10px;
            right: 15px;
            box-shadow: 0 0 20px rgba(255,215,0,0.6);
            animation: sun-pulse 3s ease-in-out infinite;
        }

        .sun::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            background: radial-gradient(circle, rgba(255,215,0,0.3), transparent 70%);
            border-radius: 50%;
        }

        @keyframes sun-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .kid-silhouette {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .kid-head {
            width: 40px;
            height: 40px;
            background: #1a1a2e;
            border-radius: 50%;
            margin: 0 auto;
            position: relative;
        }

        .kid-hair {
            position: absolute;
            top: -5px;
            left: 5px;
            width: 30px;
            height: 15px;
            background: #1a1a2e;
            border-radius: 50% 50% 0 0;
        }

        .kid-body {
            width: 50px;
            height: 30px;
            background: var(--red);
            border-radius: 8px 8px 0 0;
            margin: -5px auto 0;
        }

        .kid-arms {
            position: relative;
            width: 70px;
            margin: -25px auto 0;
        }

        .kid-arm {
            position: absolute;
            width: 12px;
            height: 25px;
            background: var(--red);
            border-radius: 6px;
            top: 0;
        }

        .kid-arm.left {
            left: 0;
            transform: rotate(25deg);
        }

        .kid-arm.right {
            right: 0;
            transform: rotate(-25deg);
        }

        .kid-hand {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #1a1a2e;
            border-radius: 50%;
            bottom: -2px;
            left: 1px;
        }

        .chin-rest {
            position: absolute;
            bottom: 28px;
            left: 50%;
            transform: translateX(-50%);
            animation: head-bob 4s ease-in-out infinite;
        }

        @keyframes head-bob {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(3px); }
        }

        .sigh-bubble {
            position: absolute;
            top: -10px;
            right: -30px;
            font-size: 0.7rem;
            color: rgba(255,255,255,0.6);
            font-style: italic;
            animation: sigh 4s ease-in-out infinite;
        }

        @keyframes sigh {
            0%, 100% { opacity: 0; transform: translateY(5px); }
            50% { opacity: 1; transform: translateY(0); }
        }

        .loading {
            text-align: center;
            padding: 3rem;
        }

        .loading p {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.8);
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 3px solid rgba(255,255,255,0.2);
            border-top-color: var(--gold);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        footer {
            text-align: center;
            padding: 1rem;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.5);
            background: rgba(0,0,0,0.2);
        }

        footer a {
            color: var(--gold);
            text-decoration: none;
        }

        .snowflakes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }

        .snowflake {
            position: absolute;
            color: rgba(255,255,255,0.3);
            font-size: 1rem;
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% { transform: translateY(-10vh) rotate(0deg); }
            100% { transform: translateY(110vh) rotate(360deg); }
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .logo-text {
                font-size: 1.5rem;
            }

            .status-bar {
                flex-wrap: wrap;
                justify-content: center;
            }

            .town-name {
                font-size: 1.2rem;
            }
        }

        .start-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 20;
            border-radius: 12px;
        }

        .start-overlay:hover {
            background: rgba(0,0,0,0.7);
        }

        .start-button {
            width: 100px;
            height: 100px;
            background: var(--red);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            box-shadow: 0 8px 30px rgba(200,16,46,0.5);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .start-overlay:hover .start-button {
            transform: scale(1.1);
            box-shadow: 0 12px 40px rgba(200,16,46,0.6);
        }

        .start-text {
            margin-top: 1.5rem;
            font-family: 'Oswald', sans-serif;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.8);
        }
    </style>
</head>
<body>
    <div class="snowflakes" id="snowflakes"></div>

    <header>
        <div class="logo">
            <div class="logo-icon">&#10052;</div>
            <div class="logo-text">Mass <span>Snow</span> Closings</div>
        </div>
        <div class="status-bar">
            <div class="status-item">
                <div class="status-dot"></div>
                <span>Live Updates</span>
            </div>
            <div class="status-item">
                <span>Closures:</span>
                <span class="closure-count" id="closure-count">--</span>
            </div>
        </div>
    </header>

    <main>
        <div class="video-wrapper" id="video-wrapper">
            <div class="start-overlay" id="start-overlay">
                <div class="start-button">&#9658;</div>
                <div class="start-text">Wicked Pissah, Let's Go!</div>
            </div>
            <div class="video-container" id="video-container">
                <div class="loading" id="loading">
                    <div class="spinner"></div>
                    <p>Loading closings...</p>
                </div>
            </div>
            <button class="mute-btn" id="mute-btn" title="Toggle mute">&#128266;</button>
            <div class="current-town">
                <div class="town-name" id="town-name">--</div>
                <div class="town-status" id="town-status">--</div>
            </div>
        </div>
        <div class="empty-state-wrapper" id="empty-state-wrapper" style="display: none;"></div>
    </main>

    <footer>
        Data sourced from <a href="https://www.wcvb.com/weather/closings" target="_blank">WCVB</a> &bull; Massachusetts
        <br><span style="opacity: 0.6;">For entertainment and informational purposes only. Always verify closings with official sources.</span>
    </footer>

    <script>
        // Create snowflakes
        function createSnowflakes() {
            const container = document.getElementById('snowflakes');
            const flakes = ['&#10052;', '&#10053;', '&#10054;', '&bull;'];

            for (let i = 0; i < 90; i++) {
                const flake = document.createElement('div');
                flake.className = 'snowflake';
                flake.innerHTML = flakes[Math.floor(Math.random() * flakes.length)];
                flake.style.left = Math.random() * 100 + 'vw';
                flake.style.top = Math.random() * 100 + 'vh';
                flake.style.animationDuration = (Math.random() * 10 + 10) + 's';
                flake.style.animationDelay = '-' + (Math.random() * 20) + 's';
                flake.style.opacity = Math.random() * 0.5 + 0.1;
                flake.style.fontSize = (Math.random() * 10 + 8) + 'px';
                container.appendChild(flake);
            }
        }
        createSnowflakes();

        const VideoPlayer = {
            container: null,
            currentVideo: null,
            nextVideo: null,
            closures: null,
            currentIndex: 0,
            pollInterval: 30000,
            townNameEl: null,
            townStatusEl: null,
            countEl: null,
            overlayEl: null,
            muteBtnEl: null,
            videoWrapperEl: null,
            emptyStateWrapperEl: null,
            started: false,
            isMuted: false,

            init() {
                this.container = document.getElementById('video-container');
                this.townNameEl = document.getElementById('town-name');
                this.townStatusEl = document.getElementById('town-status');
                this.countEl = document.getElementById('closure-count');
                this.overlayEl = document.getElementById('start-overlay');
                this.muteBtnEl = document.getElementById('mute-btn');
                this.videoWrapperEl = document.getElementById('video-wrapper');
                this.emptyStateWrapperEl = document.getElementById('empty-state-wrapper');

                this.overlayEl.addEventListener('click', () => this.start());
                this.muteBtnEl.addEventListener('click', () => this.toggleMute());
                this.container.addEventListener('click', (e) => this.togglePause(e));

                this.fetchClosures();
                setInterval(() => this.fetchClosures(), this.pollInterval);
            },

            toggleMute() {
                this.isMuted = !this.isMuted;
                if (this.currentVideo) {
                    this.currentVideo.muted = this.isMuted;
                }
                this.muteBtnEl.innerHTML = this.isMuted ? '&#128264;' : '&#128266;';
            },

            togglePause(e) {
                if (!this.currentVideo || !this.started) return;
                if (this.currentVideo.paused) {
                    this.currentVideo.play();
                } else {
                    this.currentVideo.pause();
                }
            },

            start() {
                if (this.started) return;
                this.started = true;
                this.overlayEl.style.display = 'none';

                if (this.closures.length > 0) {
                    this.startPlayback();
                }
            },

            async fetchClosures() {
                try {
                    const response = await fetch('/api/closures');
                    const data = await response.json();

                    this.countEl.textContent = data.count;

                    if (JSON.stringify(data.closures) !== JSON.stringify(this.closures)) {
                        const wasEmpty = !this.closures || this.closures.length === 0;
                        this.closures = data.closures;
                        this.currentIndex = 0;

                        if (this.closures.length === 0) {
                            this.showEmptyState();
                        } else {
                            // Show video player if we were in empty state
                            if (wasEmpty || this.emptyStateWrapperEl.style.display !== 'none') {
                                this.showVideoPlayer();
                            }
                            if (this.started && !this.currentVideo) {
                                this.startPlayback();
                            }
                        }
                    }
                } catch (error) {
                    console.error('Failed to fetch closures:', error);
                }
            },

            formatTownName(slug) {
                return slug.split('-').map(word =>
                    word.charAt(0).toUpperCase() + word.slice(1)
                ).join(' ');
            },

            updateDisplay(closure) {
                this.townNameEl.textContent = this.formatTownName(closure.slug);
                this.townStatusEl.textContent = closure.status || 'Closed';
            },

            showEmptyState() {
                this.cleanup();
                this.videoWrapperEl.style.display = 'none';
                this.emptyStateWrapperEl.style.display = 'flex';

                const placeholders = [
                    // Sad melting snowman
                    `<div class="empty-state">
                        <div class="snowman-container">
                            <div class="snowman-body snowman-head">
                                <div class="snowman-face">
                                    <div class="snowman-eye left"></div>
                                    <div class="snowman-eye right"></div>
                                    <div class="snowman-frown"></div>
                                    <div class="snowman-tear"></div>
                                </div>
                            </div>
                            <div class="snowman-body snowman-middle"></div>
                            <div class="snowman-body snowman-bottom"></div>
                            <div class="drip"></div>
                            <div class="drip"></div>
                            <div class="drip"></div>
                            <div class="puddle"></div>
                        </div>
                        <h2>No Snow? Wicked Bummah!</h2>
                        <p>Check back when it actually snows</p>
                    </div>`,
                    // Bored kid at window
                    `<div class="empty-state">
                        <div class="window-container">
                            <div class="window-frame">
                                <div class="sun"></div>
                                <div class="window-cross-v"></div>
                                <div class="window-cross-h"></div>
                            </div>
                            <div class="chin-rest">
                                <div class="kid-silhouette">
                                    <div class="kid-head">
                                        <div class="kid-hair"></div>
                                    </div>
                                    <div class="kid-arms">
                                        <div class="kid-arm left"><div class="kid-hand"></div></div>
                                        <div class="kid-arm right"><div class="kid-hand"></div></div>
                                    </div>
                                    <div class="kid-body"></div>
                                    <div class="sigh-bubble">*sigh*</div>
                                </div>
                            </div>
                        </div>
                        <h2>Still No Snow Day...</h2>
                        <p>Maybe tomorrow will be wicked cold</p>
                    </div>`
                ];

                this.emptyStateWrapperEl.innerHTML = placeholders[Math.floor(Math.random() * placeholders.length)];
            },

            showVideoPlayer() {
                this.emptyStateWrapperEl.style.display = 'none';
                this.emptyStateWrapperEl.innerHTML = '';
                this.videoWrapperEl.style.display = '';
            },

            cleanup() {
                if (this.currentVideo) {
                    this.currentVideo.pause();
                    this.currentVideo.remove();
                    this.currentVideo = null;
                }
                if (this.nextVideo) {
                    this.nextVideo.remove();
                    this.nextVideo = null;
                }
            },

            startPlayback() {
                this.container.innerHTML = '';
                this.playVideo(this.currentIndex);
            },

            createVideo(slug, autoplay = false) {
                const video = document.createElement('video');
                video.src = `/videos/${slug}.mp4`;
                video.muted = this.isMuted;
                video.playsInline = true;

                if (autoplay) {
                    video.autoplay = true;
                }

                video.onerror = () => {
                    console.warn(`Video not found: ${slug}.mp4`);
                    this.advance();
                };

                return video;
            },

            playVideo(index) {
                if (this.closures.length === 0) {
                    this.showEmptyState();
                    return;
                }

                const closure = this.closures[index];
                this.updateDisplay(closure);
                this.currentVideo = this.createVideo(closure.slug, true);

                this.currentVideo.onended = () => this.advance();

                this.currentVideo.oncanplay = () => {
                    this.preloadNext();
                };

                this.container.appendChild(this.currentVideo);
            },

            preloadNext() {
                if (this.closures.length <= 1) return;

                const nextIndex = (this.currentIndex + 1) % this.closures.length;
                const nextClosure = this.closures[nextIndex];

                this.nextVideo = this.createVideo(nextClosure.slug);
                this.nextVideo.style.display = 'none';
                this.nextVideo.load();
            },

            advance() {
                this.currentIndex = (this.currentIndex + 1) % this.closures.length;

                if (this.currentVideo) {
                    this.currentVideo.remove();
                }

                if (this.nextVideo) {
                    this.currentVideo = this.nextVideo;
                    this.currentVideo.style.display = '';
                    this.currentVideo.autoplay = true;
                    this.currentVideo.onended = () => this.advance();
                    this.container.appendChild(this.currentVideo);
                    this.currentVideo.play().catch(() => {});
                    this.updateDisplay(this.closures[this.currentIndex]);
                    this.nextVideo = null;
                    this.preloadNext();
                } else {
                    this.playVideo(this.currentIndex);
                }
            }
        };

        document.addEventListener('DOMContentLoaded', () => VideoPlayer.init());
    </script>
</body>
</html>