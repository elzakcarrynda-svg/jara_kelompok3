<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'JARA') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex">

            <!-- Left branding panel -->
            <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-[#47201B] via-[#511E1D] to-[#996561] flex-col justify-between p-12 text-white">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight">JARA</h1>
                    <p class="text-white/70 text-sm mt-1">Advanced Todo List</p>
                </div>

                <div class="max-w-sm">
                    <h2 class="text-2xl font-bold leading-snug mb-3">Kelola tugas tim kamu, lebih rapi dan terarah.</h2>
                    <p class="text-white/70 text-sm">Buat daftar, atur prioritas, dan pantau progres bersama tim dalam satu tempat.</p>
                </div>

                <p class="text-white/50 text-xs">&copy; {{ date('Y') }} JARA. All rights reserved.</p>
            </div>

            <!-- Right form panel -->
            <div class="flex w-full lg:w-1/2 items-center justify-center bg-[#F8F7F7] px-6 py-12">
                <div class="w-full max-w-md">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </body>
</html>