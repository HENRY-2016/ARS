
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }}</title>
    @include('layouts.header')
</head>

<body>
    <div class="container-scroller">
        @include('layouts.top')
            <main>
                {{ $slot }}
            </main>
    </div>
    @include('layouts.footer')
</body>
</html>
