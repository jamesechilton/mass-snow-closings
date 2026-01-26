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

        .empty-state {
            text-align: center;
            padding: 3rem;
        }

        .empty-state h2 {
            font-family: 'Oswald', sans-serif;
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--snow);
        }

        .empty-state p {
            font-size: 1.1rem;
            color: rgba(255,255,255,0.7);
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
        <div class="video-wrapper">
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
            closures: [],
            currentIndex: 0,
            pollInterval: 30000,
            townNameEl: null,
            townStatusEl: null,
            countEl: null,
            overlayEl: null,
            muteBtnEl: null,
            started: false,
            isMuted: false,

            init() {
                this.container = document.getElementById('video-container');
                this.townNameEl = document.getElementById('town-name');
                this.townStatusEl = document.getElementById('town-status');
                this.countEl = document.getElementById('closure-count');
                this.overlayEl = document.getElementById('start-overlay');
                this.muteBtnEl = document.getElementById('mute-btn');

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
                        this.closures = data.closures;
                        this.currentIndex = 0;

                        if (this.closures.length === 0) {
                            this.showEmptyState();
                        } else if (this.started && !this.currentVideo) {
                            this.startPlayback();
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
                this.townNameEl.textContent = '--';
                this.townStatusEl.textContent = '--';
                this.container.innerHTML = `
                    <div class="empty-state">
                        <h2>No Closings Currently Reported</h2>
                        <p>Check back during winter weather events</p>
                    </div>
                `;
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