<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Github issues REST API</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900 text-sm">
<header class="flex items-center justify-between px-8 py-4">

    <p>Github module - Issues REST API</p>
    <div class="flex items-center">

        @if (Route::has('login'))
            <div class="top-0 right-0 px-6 py-4">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a ref="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Log out') }}
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <a href="#">
            <img src="https://www.gravatar.com/avatar/{{md5("sebastien.wouters@hotmail.com")}}?d=mp"
                 alt="avatar" class="w-10 h-10 rounded-full" />
        </a>
    </div>
</header>

<main class="container mx-auto max-w-custom flex">

    <div class="w-70 mx-auto md:mx-0 md:mr-5">

        <div class="bg-white md:sticky md:top-8 border-2 border-blue mt-16"
             style="
                    border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    border-image-slice: 1;
                    background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    background-origin: border-box;
                    background-clip: content-box, border-box;
                    ">

            <div class="text-center px-6 py-2 pt-6">
                <h3 class="font-semibold text-base">Report an issue</h3>
                <p class="text-xs mt-4">
                    Let us know what you would like us to fix or improve and we'll take a look
                </p>
            </div>

            <form action="{{ url('store') }}" method="POST" class="space-y-4 px-4 py-6">
                @csrf
                <div>
                    <input name="title" id="title" type="text"
                           class="w-full bg-gray-100 text-sm border-none rounded-xl placeholder-gray-500 px-4 py-2"
                           placeholder="Request object">

                </div>
                <select name="category" id="category" class="w-full bg-gray-100 text-sm border-none rounded-xl px-4 py-2">
                    <option value="UI">UI</option>
                    <option value="bugfix">bugfix</option>
                    <option value="improvement">improvement</option>
                </select>
                <div>
                    <textarea name="body" id="body" cols="30" rows="4"
                              class="w-full border-none bg-gray-100 rounded-xl placeholder-gray-500 text-sm px-4 py-2"
                              placeholder="Describe your request"></textarea>

                </div>
                <div class="flex items-center justify-between space-x-3">
                    <button type="submit"
                            class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-400 font-semibold
                                                rounded-xl border border-blue-200 hover:bg-blue-600 transition duration-150
                                                easi-in py-3 px-6 text-white">
                        <span class="ml-1">Submit</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="w-full px-2 md:px-0 md:w-175">

        <nav class="flex items-center justify-between text xs">
            <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                <li><a href="#" class="border-b-4 pb-3 border-blue-700">Open (10)</a></li>
                <li><a href="#" class="text-gray-400 transition duration-150 easi-in
                        border-b-4 pb-3 hover:border-blue-400">Closed (6)</a></li>
                <li><a href="#" class="text-gray-400 transition duration-150 easi-in
                        border-b-4 pb-3 hover:border-blue-400">All (16)</a></li>
            </ul>
        </nav>

        <div class="mt-8">
            {{ $slot }}
        </div>

    </div>
</main>
</body>
</html>
