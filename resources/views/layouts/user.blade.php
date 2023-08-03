<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/26b11da1dc.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    @stack('styles')
    <livewire:styles />
</head>

<body class="antialiased relative bg-gray-100 dark:bg-neutral-900 max-w-full">
<div class="min-h-screen flex flex-col" >
    <div class="z-50">
        {{--            <x-popups.messages />--}}
        {{--            <x-popups.banner />--}}
    </div>

    <!-- Desktop sidebar -->
    <aside class="z-20 hidden w-64 overflow-y-auto md:block flex-shrink-0 bg-white dark:bg-gray-800">
        {{--        <x-user.sidebar />--}}
    </aside>

    <section class="w-screen mx-auto flex justify-center">
        <nav id="navbar" class="sticky top-0 z-40 w-full bg-white dark:bg-gray-800">
            {{--                <x-main.header />--}}
            {{--                <x-main.menu />--}}
        </nav>
        <div class="lg:flex-grow p-4">
            @if (isset($header))
                <header>
                    <x-cards.default class="mx-auto py-6 px-4 mb-4">
                        <div class="border-l-4 border-orange-500 pl-4 flex justify-between items-center">
                            <div class="text-orange-500 hover:text-orange-600 font-black uppercase focus:outline-none focus:text-orange-600">
                                {{ $header }}
                            </div>
                        </div>
                    </x-cards.default>
                </header>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </section>

    {{--            <x-main.mobilemenu />--}}
</div>

@stack('modals')

<livewire:scripts />
@stack('scripts')
</body>
</html>
