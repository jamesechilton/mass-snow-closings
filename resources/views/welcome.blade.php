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

        /* Sad Snow Plow */
        .plow-container {
            position: relative;
            width: 160px;
            height: 100px;
            margin-bottom: 1rem;
        }
        .plow-body {
            position: absolute;
            bottom: 10px;
            left: 30px;
            width: 90px;
            height: 45px;
            background: #d97706;
            border-radius: 6px 12px 4px 4px;
        }
        .plow-cab {
            position: absolute;
            bottom: 35px;
            left: 75px;
            width: 40px;
            height: 35px;
            background: #b45309;
            border-radius: 4px 8px 0 0;
        }
        .plow-window {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 28px;
            height: 18px;
            background: rgba(135,206,235,0.4);
            border-radius: 2px 4px 0 0;
        }
        .plow-blade {
            position: absolute;
            bottom: 5px;
            left: 10px;
            width: 8px;
            height: 50px;
            background: #94a3b8;
            border-radius: 2px;
            transform: rotate(15deg);
            transform-origin: bottom center;
        }
        .plow-blade-edge {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 25px;
            height: 6px;
            background: #64748b;
            border-radius: 2px;
            transform: translateX(-8px);
        }
        .plow-wheel {
            position: absolute;
            bottom: 0;
            width: 20px;
            height: 20px;
            background: #1a1a2e;
            border-radius: 50%;
            border: 3px solid #333;
        }
        .plow-wheel.front { left: 35px; }
        .plow-wheel.rear { right: 15px; }
        .plow-exhaust {
            position: absolute;
            top: -5px;
            left: 85px;
            width: 8px;
            height: 12px;
            background: #555;
            border-radius: 2px 2px 0 0;
        }
        .plow-puff {
            position: absolute;
            width: 12px;
            height: 12px;
            background: rgba(150,150,150,0.5);
            border-radius: 50%;
            top: -15px;
            left: 83px;
            animation: puff-rise 2s ease-out infinite;
        }
        .plow-puff:nth-child(2) { animation-delay: 0.7s; left: 88px; }
        .plow-puff:nth-child(3) { animation-delay: 1.4s; left: 80px; }
        @keyframes puff-rise {
            0% { opacity: 0.6; transform: translateY(0) scale(0.5); }
            100% { opacity: 0; transform: translateY(-30px) scale(1.5); }
        }
        .plow-container { animation: plow-idle 2s ease-in-out infinite; }
        @keyframes plow-idle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(2px); }
        }

        /* Space Saver */
        .spacesaver-container {
            position: relative;
            width: 140px;
            height: 120px;
            margin-bottom: 1rem;
        }
        .parking-lines {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 8px;
            border-left: 4px solid #facc15;
            border-right: 4px solid #facc15;
        }
        .folding-chair {
            position: absolute;
            bottom: 12px;
            left: 50%;
            transform: translateX(-50%);
            animation: chair-wobble 3s ease-in-out infinite;
        }
        .chair-seat {
            width: 35px;
            height: 4px;
            background: #ef4444;
            border-radius: 1px;
        }
        .chair-back {
            width: 4px;
            height: 30px;
            background: #b91c1c;
            position: absolute;
            top: -28px;
            left: 2px;
        }
        .chair-back-rest {
            width: 30px;
            height: 4px;
            background: #ef4444;
            position: absolute;
            top: -28px;
            left: 2px;
        }
        .chair-leg-front {
            position: absolute;
            width: 3px;
            height: 20px;
            background: #b91c1c;
            bottom: -18px;
        }
        .chair-leg-front.l { left: 3px; transform: rotate(8deg); }
        .chair-leg-front.r { right: 3px; transform: rotate(-8deg); }
        @keyframes chair-wobble {
            0%, 100% { transform: translateX(-50%) rotate(0deg); }
            25% { transform: translateX(-50%) rotate(1deg); }
            75% { transform: translateX(-50%) rotate(-1deg); }
        }
        .dry-road {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 30px;
            background: #374151;
            border-radius: 2px;
        }

        /* Iced Coffee */
        .coffee-container {
            position: relative;
            width: 80px;
            height: 140px;
            margin-bottom: 1rem;
        }
        .coffee-cup {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 90px;
            background: linear-gradient(180deg, transparent 0%, transparent 10%, #7c3aed 10%, #7c3aed 15%, #fff 15%, #fff 85%, #7c3aed 85%, #7c3aed 90%, transparent 90%);
            border-radius: 4px 4px 8px 8px;
            overflow: hidden;
        }
        .coffee-cup::before {
            content: '';
            position: absolute;
            top: 15%;
            left: 0;
            width: 100%;
            height: 70%;
            background: linear-gradient(180deg, rgba(139,90,43,0.6) 0%, rgba(101,67,33,0.9) 100%);
        }
        .coffee-lid {
            position: absolute;
            bottom: 90px;
            left: 50%;
            transform: translateX(-50%);
            width: 55px;
            height: 12px;
            background: #7c3aed;
            border-radius: 4px 4px 2px 2px;
        }
        .coffee-straw {
            position: absolute;
            bottom: 95px;
            left: 50%;
            transform: translateX(-50%) rotate(8deg);
            width: 4px;
            height: 40px;
            background: #22c55e;
            border-radius: 2px;
        }
        .coffee-sweat {
            position: absolute;
            width: 4px;
            height: 6px;
            background: rgba(125,211,252,0.7);
            border-radius: 50%;
            animation: sweat-drip 2s ease-in infinite;
        }
        .coffee-sweat:nth-child(1) { right: 12px; bottom: 60px; animation-delay: 0s; }
        .coffee-sweat:nth-child(2) { left: 14px; bottom: 40px; animation-delay: 0.8s; }
        .coffee-sweat:nth-child(3) { right: 14px; bottom: 25px; animation-delay: 1.5s; }
        @keyframes sweat-drip {
            0% { opacity: 0.8; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(20px); }
        }

        /* Kid in Snow Gear */
        .snowgear-container {
            position: relative;
            width: 100px;
            height: 140px;
            margin-bottom: 1rem;
        }
        .gear-kid-head {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            background: #fbbf24;
            border-radius: 50%;
        }
        .gear-kid-hat {
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 44px;
            height: 22px;
            background: #dc2626;
            border-radius: 22px 22px 0 0;
        }
        .gear-kid-pompom {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            width: 12px;
            height: 12px;
            background: #fff;
            border-radius: 50%;
        }
        .gear-kid-coat {
            position: absolute;
            top: 38px;
            left: 50%;
            transform: translateX(-50%);
            width: 55px;
            height: 55px;
            background: #2563eb;
            border-radius: 10px 10px 5px 5px;
        }
        .gear-kid-scarf {
            position: absolute;
            top: 34px;
            left: 50%;
            transform: translateX(-50%);
            width: 48px;
            height: 10px;
            background: #16a34a;
            border-radius: 3px;
        }
        .gear-kid-boots {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 20px;
        }
        .gear-boot {
            position: absolute;
            bottom: 0;
            width: 18px;
            height: 16px;
            background: #1a1a2e;
            border-radius: 4px;
        }
        .gear-boot.l { left: 4px; }
        .gear-boot.r { right: 4px; }
        .sweat-drop {
            position: absolute;
            width: 5px;
            height: 8px;
            background: #7dd3fc;
            border-radius: 50%;
            animation: sweat-pop 2.5s ease-in-out infinite;
        }
        .sweat-drop:nth-child(1) { top: 5px; right: 18px; animation-delay: 0s; }
        .sweat-drop:nth-child(2) { top: 0px; left: 22px; animation-delay: 1s; }
        @keyframes sweat-pop {
            0%, 100% { opacity: 0; transform: translateY(0); }
            20% { opacity: 1; transform: translateY(-3px); }
            80% { opacity: 1; transform: translateY(-3px); }
            100% { opacity: 0; transform: translateY(-8px); }
        }
        .gear-sun-mini {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 28px;
            height: 28px;
            background: radial-gradient(circle, #FFD700, #FFA500);
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(255,215,0,0.5);
            animation: sun-pulse 3s ease-in-out infinite;
        }

        /* Lonely Shovel */
        .shovel-container {
            position: relative;
            width: 80px;
            height: 150px;
            margin-bottom: 1rem;
        }
        .shovel-handle {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) rotate(-10deg);
            width: 6px;
            height: 100px;
            background: linear-gradient(180deg, #92400e, #78350f);
            border-radius: 3px;
            transform-origin: bottom center;
        }
        .shovel-grip {
            position: absolute;
            top: -5px;
            left: -7px;
            width: 20px;
            height: 8px;
            background: #1a1a2e;
            border-radius: 3px;
        }
        .shovel-scoop {
            position: absolute;
            bottom: 25px;
            left: 50%;
            transform: translateX(-38%) rotate(-10deg);
            width: 35px;
            height: 25px;
            background: #94a3b8;
            border-radius: 0 0 6px 6px;
            transform-origin: top center;
        }
        .cobweb {
            position: absolute;
            top: 25px;
            right: 8px;
            width: 30px;
            height: 30px;
            border-right: 1px solid rgba(255,255,255,0.15);
            border-bottom: 1px solid rgba(255,255,255,0.15);
            border-radius: 0 0 50% 0;
        }
        .cobweb::before {
            content: '';
            position: absolute;
            top: 8px;
            right: 0;
            width: 20px;
            height: 20px;
            border-right: 1px solid rgba(255,255,255,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            border-radius: 0 0 50% 0;
        }
        .dust-mote {
            position: absolute;
            width: 3px;
            height: 3px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            animation: dust-float 4s ease-in-out infinite;
        }
        .dust-mote:nth-child(1) { top: 40px; left: 15px; animation-delay: 0s; }
        .dust-mote:nth-child(2) { top: 60px; right: 10px; animation-delay: 1.5s; }
        .dust-mote:nth-child(3) { top: 80px; left: 25px; animation-delay: 3s; }
        @keyframes dust-float {
            0%, 100% { opacity: 0.2; transform: translateY(0) translateX(0); }
            50% { opacity: 0.5; transform: translateY(-8px) translateX(5px); }
        }

        /* Bread & Milk */
        .breadmilk-container {
            position: relative;
            width: 140px;
            height: 120px;
            margin-bottom: 1rem;
        }
        .shelf {
            position: absolute;
            width: 120px;
            height: 6px;
            background: #78350f;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        .shelf.top { top: 30px; }
        .shelf.bottom { top: 75px; }
        .shelf-back {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 130px;
            height: 110px;
            border: 3px solid #78350f;
            border-radius: 4px;
            background: rgba(30,20,10,0.3);
        }
        .empty-tag {
            position: absolute;
            background: #fbbf24;
            color: #1a1a2e;
            font-size: 0.4rem;
            font-weight: bold;
            padding: 1px 4px;
            border-radius: 2px;
            animation: tag-swing 3s ease-in-out infinite;
        }
        .empty-tag.t1 { top: 18px; left: 25px; }
        .empty-tag.t2 { top: 62px; right: 20px; animation-delay: 1s; }
        @keyframes tag-swing {
            0%, 100% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
        }
        .tumbleweed {
            position: absolute;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(180,140,80,0.5);
            border-radius: 50%;
            bottom: 15px;
            animation: tumble 4s linear infinite;
        }
        @keyframes tumble {
            0% { left: -20px; transform: rotate(0deg); }
            100% { left: 140px; transform: rotate(720deg); }
        }
        .lonely-crumb {
            position: absolute;
            width: 4px;
            height: 3px;
            background: #d4a574;
            border-radius: 50%;
        }
        .lonely-crumb:nth-child(1) { top: 34px; left: 40px; }
        .lonely-crumb:nth-child(2) { top: 36px; left: 60px; }
        .lonely-crumb:nth-child(3) { top: 79px; left: 50px; }

        /* Sad Sled */
        .sled-container {
            position: relative;
            width: 140px;
            height: 120px;
            margin-bottom: 1rem;
        }
        .grass-hill {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 70px;
            background: linear-gradient(160deg, #22c55e 0%, #16a34a 100%);
            border-radius: 60% 80% 0 0;
        }
        .grass-blade {
            position: absolute;
            width: 3px;
            height: 10px;
            background: #15803d;
            border-radius: 2px 2px 0 0;
            bottom: 0;
            transform-origin: bottom center;
            animation: grass-sway 2s ease-in-out infinite;
        }
        .grass-blade:nth-child(1) { left: 20px; height: 12px; animation-delay: 0s; }
        .grass-blade:nth-child(2) { left: 40px; height: 9px; animation-delay: 0.3s; }
        .grass-blade:nth-child(3) { left: 55px; height: 11px; animation-delay: 0.6s; }
        .grass-blade:nth-child(4) { left: 75px; height: 8px; animation-delay: 0.9s; }
        .grass-blade:nth-child(5) { left: 95px; height: 10px; animation-delay: 1.2s; }
        .grass-blade:nth-child(6) { left: 110px; height: 13px; animation-delay: 0.4s; }
        @keyframes grass-sway {
            0%, 100% { transform: rotate(-5deg); }
            50% { transform: rotate(5deg); }
        }
        .sled {
            position: absolute;
            bottom: 45px;
            left: 50%;
            transform: translateX(-50%) rotate(-15deg);
        }
        .sled-deck {
            width: 55px;
            height: 6px;
            background: #dc2626;
            border-radius: 12px 3px 3px 3px;
        }
        .sled-runner {
            position: absolute;
            bottom: -5px;
            width: 50px;
            height: 3px;
            background: #94a3b8;
            border-radius: 8px 0 0 0;
            left: 2px;
        }
        .sled-runner-strut {
            position: absolute;
            width: 3px;
            height: 5px;
            background: #94a3b8;
            bottom: -5px;
        }
        .sled-runner-strut:nth-child(1) { left: 8px; }
        .sled-runner-strut:nth-child(2) { left: 28px; }

        /* Weather App Refresh */
        .phone-container {
            position: relative;
            width: 70px;
            height: 130px;
            margin-bottom: 1rem;
        }
        .phone-body {
            position: absolute;
            top: 0;
            left: 0;
            width: 70px;
            height: 130px;
            background: #1a1a2e;
            border-radius: 12px;
            border: 3px solid #333;
        }
        .phone-screen {
            position: absolute;
            top: 12px;
            left: 5px;
            width: 56px;
            height: 100px;
            background: linear-gradient(180deg, #87CEEB, #f0f9ff);
            border-radius: 4px;
            overflow: hidden;
        }
        .phone-sun-icon {
            position: absolute;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            width: 22px;
            height: 22px;
            background: radial-gradient(circle, #FFD700, #FFA500);
            border-radius: 50%;
        }
        .phone-temp {
            position: absolute;
            top: 45px;
            width: 100%;
            text-align: center;
            font-size: 0.7rem;
            font-weight: bold;
            color: #1a1a2e;
            font-family: 'Oswald', sans-serif;
        }
        .phone-no-snow {
            position: absolute;
            top: 62px;
            width: 100%;
            text-align: center;
            font-size: 0.35rem;
            color: #666;
        }
        .phone-tap {
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            animation: phone-tap-anim 1.5s ease-in-out infinite;
        }
        @keyframes phone-tap-anim {
            0%, 100% { transform: translateX(-50%) scale(0.8); opacity: 0.3; }
            50% { transform: translateX(-50%) scale(1.2); opacity: 0.7; }
        }
        .phone-container {
            animation: phone-shake 1.5s ease-in-out infinite;
        }
        @keyframes phone-shake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-2deg); }
            75% { transform: rotate(2deg); }
        }

        /* Screen Door Guy */
        .screendoor-container {
            position: relative;
            width: 120px;
            height: 150px;
            margin-bottom: 1rem;
        }
        .door-frame {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 90px;
            height: 140px;
            border: 8px solid #78350f;
            border-radius: 4px 4px 0 0;
            background: linear-gradient(180deg, #87CEEB 0%, #90EE90 80%, #22c55e 100%);
        }
        .screen-mesh {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 3px,
                rgba(0,0,0,0.05) 3px,
                rgba(0,0,0,0.05) 4px
            ),
            repeating-linear-gradient(
                90deg,
                transparent,
                transparent 3px,
                rgba(0,0,0,0.05) 3px,
                rgba(0,0,0,0.05) 4px
            );
        }
        .door-guy-silhouette {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .door-guy-head {
            width: 28px;
            height: 28px;
            background: #1a1a2e;
            border-radius: 50%;
            margin: 0 auto;
        }
        .door-guy-body {
            width: 40px;
            height: 45px;
            background: #374151;
            border-radius: 6px 6px 0 0;
            margin: -3px auto 0;
        }
        .door-guy-arm {
            position: absolute;
            width: 8px;
            height: 30px;
            background: #374151;
            border-radius: 4px;
            top: 30px;
        }
        .door-guy-arm.l { left: -2px; transform: rotate(15deg); }
        .door-guy-arm.r { right: -2px; transform: rotate(-85deg); transform-origin: top center; }
        .door-guy-hand {
            position: absolute;
            bottom: -2px;
            width: 8px;
            height: 8px;
            background: #fbbf24;
            border-radius: 50%;
        }
        .door-question {
            position: absolute;
            top: 10px;
            right: -10px;
            font-size: 1.2rem;
            color: rgba(255,255,255,0.6);
            animation: question-bob 3s ease-in-out infinite;
        }
        @keyframes question-bob {
            0%, 100% { opacity: 0.4; transform: translateY(0); }
            50% { opacity: 1; transform: translateY(-5px); }
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
                    </div>`,
                    // Sad Snow Plow
                    `<div class="empty-state">
                        <div class="plow-container">
                            <div class="plow-puff"></div>
                            <div class="plow-puff"></div>
                            <div class="plow-puff"></div>
                            <div class="plow-exhaust"></div>
                            <div class="plow-cab">
                                <div class="plow-window"></div>
                            </div>
                            <div class="plow-body"></div>
                            <div class="plow-blade">
                                <div class="plow-blade-edge"></div>
                            </div>
                            <div class="plow-wheel front"></div>
                            <div class="plow-wheel rear"></div>
                        </div>
                        <h2>Plows Got Nothin' To Do</h2>
                        <p>Even the plow guys are bored</p>
                    </div>`,
                    // Space Saver
                    `<div class="empty-state">
                        <div class="spacesaver-container">
                            <div class="dry-road">
                                <div class="parking-lines"></div>
                                <div class="folding-chair">
                                    <div class="chair-back-rest"></div>
                                    <div class="chair-back"></div>
                                    <div class="chair-seat">
                                        <div class="chair-leg-front l"></div>
                                        <div class="chair-leg-front r"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Saved a Spot for Nothin'</h2>
                        <p>At least nobody took your space</p>
                    </div>`,
                    // Iced Coffee
                    `<div class="empty-state">
                        <div class="coffee-container">
                            <div class="coffee-sweat"></div>
                            <div class="coffee-sweat"></div>
                            <div class="coffee-sweat"></div>
                            <div class="coffee-straw"></div>
                            <div class="coffee-lid"></div>
                            <div class="coffee-cup"></div>
                        </div>
                        <h2>Iced Coffee Weather, Not Snow Day Weather</h2>
                        <p>Still orderin' it medium regulah</p>
                    </div>`,
                    // Kid in Snow Gear
                    `<div class="empty-state">
                        <div class="snowgear-container">
                            <div class="gear-sun-mini"></div>
                            <div class="sweat-drop"></div>
                            <div class="sweat-drop"></div>
                            <div class="gear-kid-pompom"></div>
                            <div class="gear-kid-hat"></div>
                            <div class="gear-kid-head"></div>
                            <div class="gear-kid-scarf"></div>
                            <div class="gear-kid-coat"></div>
                            <div class="gear-kid-boots">
                                <div class="gear-boot l"></div>
                                <div class="gear-boot r"></div>
                            </div>
                        </div>
                        <h2>All Dressed Up, Nowhere to Sled</h2>
                        <p>Mom said it might snow</p>
                    </div>`,
                    // Lonely Shovel
                    `<div class="empty-state">
                        <div class="shovel-container">
                            <div class="shovel-handle">
                                <div class="shovel-grip"></div>
                            </div>
                            <div class="shovel-scoop"></div>
                            <div class="cobweb"></div>
                            <div class="dust-mote"></div>
                            <div class="dust-mote"></div>
                            <div class="dust-mote"></div>
                        </div>
                        <h2>This Shovel's Collectin' Dust</h2>
                        <p>Haven't touched it in weeks, kehd</p>
                    </div>`,
                    // Bread & Milk Panic
                    `<div class="empty-state">
                        <div class="breadmilk-container">
                            <div class="shelf-back">
                                <div class="shelf top"></div>
                                <div class="shelf bottom"></div>
                                <div class="empty-tag t1">SOLD OUT</div>
                                <div class="empty-tag t2">EMPTY</div>
                                <div class="lonely-crumb"></div>
                                <div class="lonely-crumb"></div>
                                <div class="lonely-crumb"></div>
                            </div>
                            <div class="tumbleweed"></div>
                        </div>
                        <h2>Bought All That Bread for Nothin'</h2>
                        <p>The French toast alert was a false alarm</p>
                    </div>`,
                    // Sad Sled on Grass
                    `<div class="empty-state">
                        <div class="sled-container">
                            <div class="grass-hill">
                                <div class="grass-blade"></div>
                                <div class="grass-blade"></div>
                                <div class="grass-blade"></div>
                                <div class="grass-blade"></div>
                                <div class="grass-blade"></div>
                                <div class="grass-blade"></div>
                            </div>
                            <div class="sled">
                                <div class="sled-deck">
                                    <div class="sled-runner-strut"></div>
                                    <div class="sled-runner-strut"></div>
                                </div>
                                <div class="sled-runner"></div>
                            </div>
                        </div>
                        <h2>Not Exactly Sled Weather</h2>
                        <p>This hill's wicked dry</p>
                    </div>`,
                    // Screen Door Guy
                    `<div class="empty-state">
                        <div class="screendoor-container">
                            <div class="door-frame">
                                <div class="screen-mesh"></div>
                            </div>
                            <div class="door-guy-silhouette">
                                <div class="door-guy-head"></div>
                                <div class="door-guy-body">
                                    <div class="door-guy-arm l"><div class="door-guy-hand"></div></div>
                                    <div class="door-guy-arm r"><div class="door-guy-hand"></div></div>
                                </div>
                            </div>
                            <div class="door-question">?</div>
                        </div>
                        <h2>Where's the Nor'eastah?</h2>
                        <p>Weather guy said 6 to 12 inches...</p>
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