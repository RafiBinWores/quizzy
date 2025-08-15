<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.svg') }}" type="image/x-icon">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <svg width="185" height="48" viewBox="0 0 185 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Main bubble for Q -->
                        <ellipse cx="29" cy="24" rx="19" ry="19" fill="url(#quizzy-gradient)"/>
                        <!-- The "tail" of the bubble -->
                        <path d="M26 39 Q28 41 34 43 Q31 40 33 36" fill="url(#quizzy-gradient)"/>
                        <!-- "Q" Letter stylized as a question bubble -->
                        <text x="16" y="34" font-family="Arial Rounded MT Bold, Arial, sans-serif" font-size="33" font-weight="bold" fill="#fff">Q</text>
                        <!-- Small question dot -->
                        <circle cx="28" cy="39" r="2.1" fill="#fff" />
                        <!-- Brand name -->
                        <text x="60" y="36" font-family="Arial Rounded MT Bold, Arial, sans-serif" font-size="34" font-weight="bold" fill="#2D3190" letter-spacing="3">Quizzy</text>
                        <!-- Subtle underline under "Quizzy" -->
                        <rect x="60" y="39" width="90" height="4" rx="2" fill="url(#quizzy-gradient)" opacity="0.3"/>
                        <defs>
                          <linearGradient id="quizzy-gradient" x1="10" y1="7" x2="47" y2="47" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#6653FF"/>
                            <stop offset="1" stop-color="#00FFD1"/>
                          </linearGradient>
                        </defs>
                      </svg>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
