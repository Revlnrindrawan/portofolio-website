<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $profile->full_name ?? 'Portfolio' }} — Professional Portfolio">
    <title>{{ $profile->full_name ?? 'Portfolio' }} | Professional Portfolio</title>
    <script>
        (function () {
            try {
                var lang = localStorage.getItem('site-lang') || 'en';
                document.documentElement.setAttribute('data-lang', lang);
            } catch (e) {
                document.documentElement.setAttribute('data-lang', 'en');
            }
        })();
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body>
    <div class="bg-grid"></div>
    <div class="bg-glow bg-glow-1"></div>
    <div class="bg-glow bg-glow-2"></div>
    <div class="bg-glow bg-glow-3"></div>
    <div class="bg-glow bg-glow-4"></div>

    @yield('content')

    @if($profile->phone ?? false)
    @php
        $waDigits = ltrim(preg_replace('/\D/', '', $profile->phone), '0');
        $waNumber = '62' . $waDigits;
    @endphp
    <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode('Hi Revalina, I saw your portfolio and would like to connect!') }}"
       target="_blank" rel="noopener noreferrer" class="wa-float" aria-label="Chat on WhatsApp">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
            <path d="M12.004 2.003c-5.514 0-9.997 4.483-9.997 9.997 0 1.762.464 3.479 1.345 4.988L2 22l5.144-1.324a9.96 9.96 0 0 0 4.86 1.238h.004c5.514 0 9.997-4.483 9.997-9.997 0-2.67-1.04-5.182-2.929-7.071a9.935 9.935 0 0 0-7.072-2.843zm0 18.163h-.003a8.15 8.15 0 0 1-4.152-1.137l-.298-.177-3.053.786.815-2.977-.194-.306a8.156 8.156 0 0 1-1.25-4.356c0-4.509 3.669-8.178 8.178-8.178a8.13 8.13 0 0 1 5.786 2.396 8.13 8.13 0 0 1 2.393 5.788c0 4.508-3.668 8.176-8.222 8.176z"/>
        </svg>
        <span class="wa-float-text">
            <span data-i18n-en>Chat on WhatsApp</span>
            <span data-i18n-id>Hubungi via WhatsApp</span>
        </span>
    </a>
    @endif

    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
