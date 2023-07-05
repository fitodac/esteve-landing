<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        @include('googletagmanager::head')
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title inertia>{{ config('app.name', 'Esteve') }}</title>

		<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicon/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon/favicon-32x32.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon/favicon-16x16.png') }}">
		<link rel="manifest" href="{{ URL::asset('favicon/site.webmanifest') }}">

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<!-- Scripts -->
        @production
        <!-- Google Tag Manager -->
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-M7CZHX9');
        </script>
        <!-- End Google Tag Manager -->
        @endproduction
		@routes
		@vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
		@inertiaHead
	</head>
	<body class="antialiased">
        @include('googletagmanager::body')
        @production
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src=“https://www.googletagmanager.com/ns.html?id=GTM-M7CZHX9” height=“0" width=“0”
                    style=“display:none;visibility:hidden”></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        @endproduction
		@inertia
		<script src="{{ asset('tarteaucitron/tarteaucitron.js') }}"></script>
		<script src="{{ asset('tarteaucitron/cookie.js') }}" defer></script>
	</body>
</html>
