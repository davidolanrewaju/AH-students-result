<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/acot-favicon.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel</title>
</head>

<body>


    <nav class="border-gray-200 bg-secondary-400">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between md:flex-row mx-auto p-4">
            <a href="#" class="logo flex items-center">
                <img class="w-16 md:w-20" src="{{ asset('images/acot-logo.svg') }}" alt="">
                <p
                    class="flex flex-col border-l-2 text-sm border-white mx-3 px-3 self-center text-white md:text-lg whitespace-nowrap md:2xl">
                    COMPUTER
                    <span class="-mt-1 md:-mt-2">SCIENCE</span>
                </p>
            </a>
            <div class="mb-4 hidden w-full md:mb-0 md:flex md:flex-row md:justify-between md:w-auto"
                id="navbar-solid-bg">
                <ul
                    class="flex flex-col font-medium mt-4 bg-gray-200 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 bg-primary-500 text-white md:py-0 md:px-0 md:bg-transparent md:text-white"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-primary-700 hover:bg-primary-500 hover:text-white md:py-0 md:px-0 md:hover:bg-transparent">Contact</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-primary-700 hover:bg-primary-500 hover:text-white md:py-0 md:px-0 md:hover:bg-transparent">About</a>
                    </li>
                </ul>
            </div>
            <div class="flex justify-end gap-4 md:mt-0 md:gap-8">
                <a href="{{ route('admin.signup') }}"
                class="block py-1 px-6 rounded border-2 border-primary-500 text-primary-500  hover:bg-primary-500 hover:border-transparent hover:text-white">Sign
                    Up</a>
                <a href="{{ route('admin.login') }}"
                class="block py-1 px-6 rounded border-2 border-transparent text-white bg-primary-500 hover:text-white">Login</a>
            </div>
            <button data-collapse-toggle="navbar-solid-bg" type="button"
                class="order-first mb-3 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-primary-600 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:ring-gray-200"
                aria-controls="navbar-solid-bg" aria-expanded="false">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
    </nav>

    <form action="{{ route('admin.checkLogin') }}" method="POST" class="max-w-sm md:max-w-lg py-24 mx-auto">
        @csrf
        <h2 class="text-4xl font-bold text-primary-500 mb-6 uppercase">Log In <span class="normal-case">(Admin)</span></h2>
        <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-semibold text-gray-900">Email
                Address or Matric No.</label>
            <input type="email" id="email" name="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-200 focus:border-secondary-200 block w-full p-2.5"
                placeholder="john.doe@company.com" required />
            @error('email')
                <span class="text-md text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block mb-2 text-sm font-semibold text-gray-900">Password</label>
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-200 focus:border-secondary-200 block w-full p-2.5"
                placeholder="•••••••••" required />
            @error('password')
                <span class="text-md text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="remember my-4">
            <label for="remember" class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember">
                <span>Remember Me</span>
            </label>
        </div>
        <button type="submit"
            class="text-white bg-secondary-500 hover:bg-secondary-800 focus:ring-4 focus:outline-none focus:ring-primary-100 font-medium rounded-lg text-md w-full sm:w-auto px-8 py-3 text-center">Log In</button>
    </form>
</body>

</html>
