<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BlogApp — Ideas worth sharing</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
        }
        .glow {
            box-shadow: 0 0 60px rgba(99, 102, 241, 0.3);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex flex-col">

    {{-- Navbar --}}
    <nav class="px-6 py-4 flex justify-between items-center border-b border-slate-800">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center">
                <span class="text-white font-black text-sm">B</span>
            </div>
            <span class="text-white font-bold text-lg">BlogApp</span>
        </div>
        <div class="flex items-center gap-3">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('posts.index') }}"
                       class="text-sm font-semibold text-indigo-400 hover:text-indigo-300 transition">
                        Go to App →
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-slate-400 hover:text-white transition">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold px-5 py-2 rounded-full transition">
                        Get Started
                    </a>
                @endauth
            @endif
        </div>
    </nav>

    {{-- Hero --}}
    <main class="flex-1 flex flex-col items-center justify-center text-center px-6 py-24">

        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold px-4 py-2 rounded-full mb-8">
            <span class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></span>
            Now live — Share your world
        </div>

        {{-- Headline --}}
        <h1 class="text-6xl font-black text-white mb-6 leading-tight max-w-3xl">
            Ideas worth
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">
                sharing
            </span>
        </h1>

        <p class="text-lg text-slate-400 mb-10 max-w-md leading-relaxed">
            Write posts, share stories, upload shorts. Connect with people who care about what you have to say.
        </p>

        {{-- CTAs --}}
        <div class="flex items-center gap-4 mb-20">
            @auth
                <a href="{{ route('posts.index') }}"
                   class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-8 py-3.5 rounded-full text-sm transition glow">
                    Open App →
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-8 py-3.5 rounded-full text-sm transition glow">
                    Start for free →
                </a>
                <a href="{{ route('login') }}"
                   class="text-sm font-medium text-slate-400 hover:text-white transition">
                    Already have an account?
                </a>
            @endauth
        </div>

        {{-- Feature cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-3xl w-full">
            <div class="bg-slate-800/50 border border-slate-700 rounded-2xl p-6 text-left hover:border-indigo-500/50 transition">
                <div class="text-3xl mb-3">✍️</div>
                <h3 class="text-white font-semibold mb-1">Posts</h3>
                <p class="text-slate-400 text-sm">Write long-form articles and share your knowledge with the world.</p>
            </div>
            <div class="bg-slate-800/50 border border-slate-700 rounded-2xl p-6 text-left hover:border-indigo-500/50 transition">
                <div class="text-3xl mb-3">📸</div>
                <h3 class="text-white font-semibold mb-1">Stories</h3>
                <p class="text-slate-400 text-sm">Share moments with photos and quick captions that last 24 hours.</p>
            </div>
            <div class="bg-slate-800/50 border border-slate-700 rounded-2xl p-6 text-left hover:border-indigo-500/50 transition">
                <div class="text-3xl mb-3">🎬</div>
                <h3 class="text-white font-semibold mb-1">Shorts</h3>
                <p class="text-slate-400 text-sm">Upload short video clips and reach your audience instantly.</p>
            </div>
        </div>

    </main>

    {{-- Footer --}}
    <footer class="text-center text-xs text-slate-600 py-6 border-t border-slate-800">
        © {{ date('Y') }} BlogApp. Built with Laravel & Tailwind CSS.
    </footer>

</body>
</html>
