<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $cafe->name }} | SpotKopi</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-serif-cafe { font-family: 'Playfair Display', serif; }
        
        .bg-cafe {
            position: fixed;
            inset: 0;
            background-image: url('/images/detailcafe.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(10px) brightness(0.6);
            z-index: -1;
        }
    </style>
</head>

<body class="h-screen w-screen overflow-hidden flex flex-col font-sans text-stone-800">

    <!-- BACKGROUND -->
    <div class="bg-cafe"></div>

    <!-- NAV -->
    <nav class="h-16 flex items-center px-6">
        <a href="{{ url('/dashboard') }}" class="text-white font-bold text-lg hover:underline">
            ← Kembali
        </a>
    </nav>

    <!-- MAIN CONTENT (Centered) -->
    <main class="flex-grow flex flex-col items-center justify-center p-4 overflow-y-auto">

        <!-- TITLE (Outside card) -->
        <div class="mb-6 text-center text-white">
            <h1 class="text-3xl font-serif-cafe mb-1 drop-shadow-lg">
                {{ $cafe->name }}
            </h1>
            <p class="text-white/90 text-sm">📍 Semarang, Jawa Tengah</p>
        </div>

        <!-- CARD (The Box) -->
        <div class="bg-white/95 backdrop-blur rounded-3xl p-6 shadow-2xl w-full max-w-2xl">

            <!-- MAP -->
            <div class="w-full h-48 rounded-2xl overflow-hidden mb-6 border">
                <iframe
                    src="https://maps.google.com/maps?q={{ urlencode($cafe->name . ' Semarang') }}&output=embed"
                    class="w-full h-full">
                </iframe>
            </div>

            <!-- GRID -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- FASILITAS -->
                <div>
                    <h5 class="font-bold text-lg mb-4 text-amber-900 border-l-4 border-[#ab5c3f] pl-3">
                        Fasilitas
                    </h5>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between border-b pb-2">
                            <span class="flex items-center gap-2"><i class="fas fa-snowflake text-amber-700 w-5"></i> AC</span>
                            <span class="font-semibold">{{ $cafe->ac ? 'Tersedia' : 'Area Terbuka' }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="flex items-center gap-2"><i class="fas fa-wifi text-amber-700 w-5"></i> WiFi</span>
                            <span class="font-semibold">{{ $cafe->wifi }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="flex items-center gap-2"><i class="fas fa-plug text-amber-700 w-5"></i> Colokan</span>
                            <span class="font-semibold">{{ $cafe->colokan }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="flex items-center gap-2"><i class="fas fa-volume-up text-amber-700 w-5"></i> Kebisingan</span>
                            <span class="font-semibold capitalize">{{ $cafe->kebisingan }}</span>
                        </div>
                    </div>
                </div>

                <!-- INFO (Right Side Box) -->
                <div class="bg-amber-50 rounded-2xl p-5 border border-amber-100">
                    <h6 class="font-bold text-amber-900 mb-2 flex items-center gap-2">
                        <i class="fas fa-clock text-amber-700"></i> Jam Operasional
                    </h6>
                    <p class="text-xl font-bold text-[#ab5c3f] mb-6">
                        {{ $cafe->jam_operasional }}
                    </p>

                    <h6 class="font-bold text-amber-900 mb-2 flex items-center gap-2">
                        <i class="fas fa-lightbulb text-amber-700"></i> Tips Nugas
                    </h6>
                    <p class="text-xs text-stone-700 leading-relaxed">
                        @if(str_contains(strtolower($cafe->kebisingan), 'sepi') || str_contains(strtolower($cafe->kebisingan), 'tenang'))
                            Tempat ini sangat tenang. Cocok untuk fokus kerja atau coding.
                        @else
                            Suasana cukup ramai, cocok untuk kerja santai atau diskusi.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>