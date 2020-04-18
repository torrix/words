<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Words') }}</title>
    <link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <livewire:styles/>
</head>
<body>
<div id="app">
    <main>
        <div class="uk-section uk-section-small">
            <div class="uk-container uk-container-expand">
                <h1 class="uk-text-center uk-margin-remove uk-text-uppercase">{{env('APP_NAME')}}</h1>
                <hr>
                @yield('content')
                <hr>
                <p class="uk-text-right uk-text-small uk-text-muted">
                    Made out of boredom during the 2020 lockdown by
                    <a href="https://github.com/Torrix" target="_blank">Matt Fletcher</a>
                    at
                    <a href="https://torrix.uk/" target="_blank">Torrix</a>
                </p>
            </div>
        </div>
    </main>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
<livewire:scripts/>
</body>
</html>
