<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quizzy</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.svg') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/css/pagedone.css " rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="py-5 border-b-default border-solid border-gray-200 z-10 w-full bg-inherit lg:fixed" id="topnav">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="w-full flex justify-between flex-col lg:flex-row">
                <div class="flex justify-between lg:flex-row">
                    <a href="/" class="flex items-center">
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
                <div
                        class="md:flex hidden lg:items-center w-full justify-start flex-col lg:flex-row gap-4 lg:w-max max-lg:gap-4 lg:ml-14 lg:justify-end">
                        <a href="{{ route('login') }}"
                            class="bg-indigo-50 text-indigo-600 rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 py-3 px-6 text-sm hover:bg-indigo-100">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="bg-indigo-600 text-white rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 py-3 px-6 text-sm hover:bg-indigo-700">
                            Sign Up
                        </a>
                    </div>
            </div>
        </div>
    </nav>
    <section
        class="pt-8 lg:pt-32 bg-[url('https://pagedone.io/asset/uploads/1691055810.png')] bg-center bg-cover min-h-screen">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative text-center">
            <div class="border border-indigo-600 p-1 w-60 mx-auto rounded-full flex items-center justify-between mb-4">
                <span class="text-xs font-medium text-gray-900 ml-3">Explore now.</span>
                <a href="{{ route('register') }}" class="w-8 h-8 rounded-full flex justify-center items-center bg-indigo-600">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.83398 8.00019L12.9081 8.00019M9.75991 11.778L13.0925 8.44541C13.3023 8.23553 13.4073 8.13059 13.4073 8.00019C13.4073 7.86979 13.3023 7.76485 13.0925 7.55497L9.75991 4.22241"
                            stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <h1
                class="max-w-2xl mx-auto text-center font-manrope font-bold text-4xl text-gray-900 mb-5 md:text-5xl leading-[50px]">
                Level Up Your Brain with
                <span class="text-indigo-600">Quizzy </span>
            </h1>
            <p class="max-w-sm mx-auto text-center text-base font-normal leading-7 text-gray-500 mb-9">
                Challenge yourself with daily quizzes, track your progress, and master new topics—all in one place.
            </p>
            <a href="{{ route('register') }}"
                class="w-full md:w-auto mb-14 inline-flex items-center justify-center py-3 px-7 text-base font-semibold text-center text-white rounded-full bg-indigo-600 shadow-xs hover:bg-indigo-700 transition-all duration-500">
                Create an account
                <svg class="ml-2" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.5 15L11.0858 11.4142C11.7525 10.7475 12.0858 10.4142 12.0858 10C12.0858 9.58579 11.7525 9.25245 11.0858 8.58579L7.5 5"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            {{-- <div class="flex justify-center">
            <img
              src="https://pagedone.io/asset/uploads/1691054543.png"
              alt="Dashboard image" class="rounded-t-3xl h-auto object-cover"
            />
          </div> --}}
        </div>
    </section>



    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif


    <script src="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/js/pagedone.js"></script>
</body>

</html>
