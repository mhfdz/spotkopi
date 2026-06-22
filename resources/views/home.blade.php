<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | SpotKopi</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .font-serif-cafe { font-family: 'Playfair Display', Georgia, serif; }
        /* Background krem hangat seperti kertas linen */
        body { background-color: #3e2209; }
    </style>
</head>
<body class="font-sans text-stone-800 antialiased min-h-screen flex flex-col">

    <nav class="bg-white border-b border-amber-900/10 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                
                <div class="flex items-center gap-8">
                    <a href="{{ url('/') }}" class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-amber-800">
                            <path d="M2 21a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1Z" />
                            <path fill-rule="evenodd" d="M4 15V7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v8a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4Zm14-4h1a2.5 2.5 0 0 1 0 5h-1v-5Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-2xl font-bold text-amber-950 font-serif-cafe tracking-wide">SpotKopi.</span>
                    </a>
                    
                    <div class="hidden md:flex space-x-6 text-sm font-medium">
                        <a href="{{ url('/dashboard') }}" class="flex items-center gap-1.5 text-amber-900 border-b-2 border-[#ab5c3f] py-5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Dashboard
                        </a>
                        <a href="{{ url('/rekomendasi') }}" class="flex items-center gap-1.5 text-stone-500 hover:text-amber-800 py-5 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            Rekomendasi
                        </a>
                        <a href="{{ url('/favorit') }}" class="flex items-center gap-1.5 text-stone-500 hover:text-amber-800 py-5 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                            Favorit
                        </a>
                        <a href="{{ url('/riwayat') }}" class="flex items-center gap-1.5 text-stone-500 hover:text-amber-800 py-5 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Riwayat
                        </a>
                    </div>
                </div>

                <div class="flex items-center relative group">
                    <button class="flex items-center gap-2 text-sm font-medium text-stone-600 hover:text-amber-900 transition py-5">
                        <span>Hai, {{ Auth::user()->name ?? 'Pengguna' }}</span>
                        <svg class="w-4 h-4 transform group-hover:rotate-180 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div class="absolute right-0 top-full mt-[-5px] w-48 bg-white border border-amber-900/10 rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden">
                        <a href="{{ url('/profile') }}" class="block px-4 py-3 text-sm text-stone-600 hover:bg-amber-50 hover:text-amber-900 transition">
                            Profil Saya
                        </a>
                        <div class="border-t border-stone-100"></div>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-3 text-sm font-bold text-red-600 hover:bg-red-50 hover:text-red-700 transition flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
        
        <div class="bg-white p-2 rounded-2xl shadow-sm border border-amber-900/10 flex gap-2 mb-8">
            <div class="relative flex-grow">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-stone-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" class="w-full pl-11 pr-4 py-3 bg-transparent outline-none text-sm text-stone-800 placeholder-stone-400" placeholder="Cari nama kafe atau fasilitas (cth: AC, Kencang)...">
            </div>
            <button class="px-6 py-2.5 bg-[#ab5c3f] hover:bg-[#964f34] text-white rounded-xl text-sm font-semibold transition">Cari</button>
            <button class="px-6 py-2.5 bg-stone-100 hover:bg-stone-200 text-stone-600 rounded-xl text-sm font-semibold transition">Reset</button>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-amber-900/10 p-6 mb-8 flex flex-col md:flex-row divide-y md:divide-y-0 md:divide-x divide-amber-900/10">
            <div class="flex-1 flex flex-col items-center justify-center py-4 md:py-0">
                <span class="text-xs font-bold uppercase tracking-wider text-stone-500 mb-1 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-amber-800"></span> Total Cafe
                </span>
                <span class="text-3xl font-bold text-amber-950">{{ isset($cafes) ? count($cafes) : 0 }}</span>
            </div>
            <div class="flex-1 flex flex-col items-center justify-center py-4 md:py-0">
                <span class="text-xs font-bold uppercase tracking-wider text-stone-500 mb-1 flex items-center gap-1.5">
                    <span class="text-amber-500">★</span> Favorit Saya
                </span>
                <span class="text-3xl font-bold text-amber-950">0</span>
            </div>
            <div class="flex-1 flex flex-col items-center justify-center py-4 md:py-0">
                <span class="text-xs font-bold uppercase tracking-wider text-stone-500 mb-1 flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Riwayat Cari
                </span>
                <span class="text-3xl font-bold text-amber-950">0</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            @if(isset($cafes) && count($cafes) > 0)
                @foreach($cafes as $cafe)
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-amber-900/10 hover:shadow-md hover:border-amber-900/30 transition group flex flex-col h-full relative">
                    <button class="absolute top-4 right-4 text-stone-300 hover:text-red-500 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>

                    <h3 class="text-lg font-bold text-amber-950 font-serif-cafe mb-3 pr-6">
                        {{ $cafe->nama ?? $cafe->name ?? 'Nama Cafe' }}
                    </h3>
                    
                    <div class="flex flex-wrap gap-1.5 mb-4">
                        <span class="px-2 py-1 text-[10px] font-semibold bg-blue-50 text-blue-700 rounded-md border border-blue-100">AC</span>
                        <span class="px-2 py-1 text-[10px] font-semibold bg-emerald-50 text-emerald-700 rounded-md border border-emerald-100">WiFi Kenceng</span>
                    </div>

                    <div class="mt-auto pt-4 border-t border-stone-100">
                        <div class="text-xs text-stone-500 mb-1">Info Operasional:</div>
                        <div class="text-sm font-medium text-stone-800">
                            Buka {{ $cafe->jam_buka ?? '10:00' }} - {{ $cafe->jam_tutup ?? '23:00' }}
                        </div>
                        <div class="text-sm font-medium text-stone-800 mb-4">
                            Mulai Rp{{ number_format($cafe->harga ?? 15000, 0, ',', '.') }}
                        </div>
                        
                       <a href="{{ url('/cafe/'.$cafe->id) }}"
   class="block w-full text-center py-2.5 bg-amber-50 text-amber-900 border border-amber-900/20 hover:bg-[#ab5c3f] hover:border-[#ab5c3f] hover:text-white rounded-xl text-sm font-bold transition">
    Lihat Detail
</a>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-span-full text-center py-12 bg-white rounded-2xl border border-amber-900/10 border-dashed">
                    <p class="text-stone-500 text-sm font-medium">Belum ada data kafe yang tersedia.</p>
                </div>
            @endif

        </div>
    </main>

</body>
</html>