<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CashMate') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-on-background font-body-md min-h-screen antialiased flex overflow-x-hidden relative">
    <!-- Ambient Background Elements -->
    <div class="fixed top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-primary-fixed/30 blur-[100px] pointer-events-none z-0"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-secondary-fixed/30 blur-[120px] pointer-events-none z-0"></div>

    <!-- SideNavBar -->
    <x-sidebar />

    <!-- Main Content Area -->
    <main class="ml-64 flex-1 flex flex-col min-h-screen relative z-10 w-[calc(100%-16rem)]">
        <!-- TopAppBar -->
        <x-topbar />

        <!-- Page Canvas -->
        <div class="p-lg max-w-container-max mx-auto w-full space-y-xl flex-1">
            {{ $slot }}
        </div>
    </main>
</body>
</html>
