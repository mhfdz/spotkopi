<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpotKopi | Temukan Kopi Favoritmu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
        <div class="text-2xl font-bold text-amber-900 tracking-tighter">SpotKopi</div>
        
        <div class="space-x-6">
            <a href="#" class="text-gray-600 hover:text-amber-800">Home</a>
            
            @auth
                <a href="{{ url('/dashboard') }}" class="bg-amber-800 text-white px-5 py-2 rounded-full font-medium hover:bg-amber-900 transition">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-amber-800 font-medium hover:underline">Login</a>
                <a href="{{ route('register') }}" class="bg-amber-800 text-white px-5 py-2 rounded-full font-medium hover:bg-amber-900 transition">Register</a>
            @endauth
        </div>
    </nav>

    <header class="relative h-[80vh] flex items-center justify-center text-white">
        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=2070&auto=format&fit=crop" 
             alt="Coffee" class="absolute inset-0 w-full h-full object-cover">
        
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 text-center px-4">
            <h1 class="text-5xl md:text-7xl font-bold mb-4">Temukan Spot Kopi <br> Terbaikmu</h1>
            <p class="text-lg md:text-xl mb-8 text-gray-200">Kumpulan kedai kopi pilihan dengan suasana terbaik di kotamu.</p>
            <a href="#explore" class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-3 rounded-full text-lg font-semibold transition shadow-lg">
                Jelajahi Sekarang
            </a>
        </div>
    </header>

</body>
</html>