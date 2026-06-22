<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SpotKopi</title>
    
    <!-- Google Fonts untuk font Cafe Klasik -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .font-serif-cafe {
            font-family: 'Playfair Display', Georgia, serif;
        }
        /* Efek tekstur kertas linen halus untuk background kartu */
        .bg-linen {
            background-color: #fdfbf7;
            background-image: radial-gradient(rgba(139, 92, 26, 0.03) 1px, transparent 0);
            background-size: 4px 4px;
        }
    </style>
</head>
<body class="font-sans text-stone-900 antialiased">

    <!-- Background Foto Utama (Menggunakan Link Unsplash Nuansa Warm Cafe) -->
    <div class="fixed inset-0 -z-10 bg-cover bg-center" 
         style="background-image: url('https://images.unsplash.com/photo-1497935586351-b67a49e012bf?q=80&w=2071&auto=format&fit=crop');">
         
         <!-- Overlay diubah menjadi warna cokelat gelap (Warm Espresso) agar warnanya sama persis dengan referensi -->
         <div class="absolute inset-0 bg-[#3e2723]/60 backdrop-blur-[3px]"></div>
    </div>

    <!-- Container Tengah -->
    <div class="min-h-screen flex items-center justify-center p-6">
        
        <!-- Kartu Login Utama (Outer Card) -->
        <div class="w-full max-w-lg bg-linen shadow-2xl rounded-[2.5rem] p-4 border border-white/60 relative overflow-hidden">
            
            <!-- Bingkai Garis Dalam (Inner Frame Garis Cokelat) -->
            <div class="border border-amber-900/30 rounded-[2rem] p-8 md:p-10 relative flex flex-col justify-between min-h-full">
                
                <!-- HEADER & LOGO -->
                <div class="text-center mb-6 flex flex-col items-center relative z-10">
                    <!-- Detail Ikon Cangkir Kopi Latte Art -->
                    <div class="w-20 h-20 flex items-center justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="none" stroke="currentColor" class="w-16 h-16 text-amber-950" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 36c0 6 5 11 11 11h14c6 0 11-5 11-11V24H14v12Z" />
                            <path d="M50 28h4c2.2 0 4 1.8 4 4v2c0 2.2-1.8 4-4 4h-4" />
                            <path d="M10 52h44" />
                            <!-- Uap Kopi -->
                            <path d="M24 16c0-3 2-3 2-6s-2-3-2-6M32 16c0-3 2-3 2-6s-2-3-2-6M40 16c0-3 2-3 2-6s-2-3-2-6" />
                            <!-- Detail Latte Art Lingkaran -->
                            <path d="M20 28c4 3 10 5 15 3s7-5 4-7-10-2-14 0" opacity="0.6"/>
                        </svg>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-amber-950 font-serif-cafe tracking-wide">SpotKopi</h1>
                    <p class="text-stone-600 text-sm mt-3 max-w-xs leading-relaxed">
                        Selamat datang kembali.<br>Silakan masuk ke akun Anda.
                    </p>
                </div>

                <!-- FORM LOGIN -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5 relative z-10">
                    @csrf
                    
                    <!-- Input Email -->
                    <div>
                        <label class="block text-[11px] font-bold text-stone-800 uppercase tracking-wider mb-1.5">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-stone-500">
                                <!-- Ikon Amplop -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25H4.5A2.25 2.25 0 0 1 2.25 17.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5H4.5a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.92V6.75" />
                                </svg>
                            </div>
                            <input type="email" name="email" class="w-full pl-11 pr-4 py-3 bg-stone-50/50 border border-amber-900/40 rounded-xl focus:ring-2 focus:ring-amber-800 focus:border-amber-800 outline-none transition text-stone-900 placeholder-stone-400 text-sm shadow-sm" required placeholder="kamu@email.com">
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="block text-[11px] font-bold text-stone-800 uppercase tracking-wider">Password</label>
                            <a href="#" class="text-xs text-amber-900 font-bold hover:underline">Lupa Password?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-stone-500">
                                <!-- Ikon Gembok -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                            <input type="password" name="password" class="w-full pl-11 pr-4 py-3 bg-stone-50/50 border border-amber-900/40 rounded-xl focus:ring-2 focus:ring-amber-800 focus:border-amber-800 outline-none transition text-stone-900 placeholder-stone-400 text-sm shadow-sm" required placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Ingat Saya -->
                    <div class="flex items-center pt-1">
                        <label class="flex items-center text-xs text-stone-700 cursor-pointer select-none font-medium">
                            <input type="checkbox" name="remember" class="rounded text-amber-900 focus:ring-amber-800 mr-2 border-amber-900/40 accent-amber-900 w-4 h-4">
                            Ingat saya di perangkat ini
                        </label>
                    </div>

                    <!-- Tombol Masuk Terracotta Sesuai Gambar -->
                    <button type="submit" class="w-full py-3.5 mt-2 bg-[#ab5c3f] hover:bg-[#964f34] text-white rounded-xl font-semibold tracking-wide shadow-md shadow-stone-900/10 transition active:scale-[0.99]">
                        Masuk
                    </button>
                </form>

                <!-- FOOTER CARD -->
                <div class="mt-8 text-center text-sm text-stone-600 relative z-10">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-amber-900 font-bold hover:underline ml-1">Daftar gratis</a>
                </div>

                <!-- DEKORASI LINE-ART POJOK BAWAH (Watermark Kopi) -->
                <!-- Kiri Bawah: Cangkir Kopi Teacup -->
                <div class="absolute bottom-0 left-0 pointer-events-none opacity-[0.15] transform translate-x-[-15%] translate-y-[15%] text-amber-950 z-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1.5" class="w-40 h-40">
                        <path d="M20 50c0 15 10 25 25 25h10c15 0 25-10 25-25V30H20v20Z" />
                        <path d="M80 40h8c4 0 6 2 6 6v2c0 4-2 6-6 6h-8" />
                        <path d="M10 85h80" />
                        <path d="M35 20c2-4 5-4 5 0s-3 4-3 8M50 20c2-4 5-4 5 0s-3 4-3 8" />
                    </svg>
                </div>

                <!-- Kanan Bawah: Biji Kopi (Coffee Beans) -->
                <div class="absolute bottom-2 right-2 pointer-events-none opacity-[0.15] transform translate-x-[10%] translate-y-[10%] text-amber-950 rotate-[15deg] z-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1.5" class="w-32 h-32">
                        <!-- Biji Kopi 1 -->
                        <path d="M20 50 C 20 20, 60 20, 60 50 C 60 80, 20 80, 20 50 Z" />
                        <path d="M22 55 Q 40 45 58 45" stroke-dasharray="1 2" />
                        <!-- Biji Kopi 2 -->
                        <path d="M50 70 C 50 45, 85 45, 85 70 C 85 95, 50 95, 50 70 Z" />
                        <path d="M52 73 Q 68 68 83 73" />
                    </svg>
                </div>

            </div> <!-- End Inner Frame -->
        </div> <!-- End Outer Card -->
        
    </div>

</body>
</html>