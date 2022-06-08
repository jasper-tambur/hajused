<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <script src="https://js.stripe.com/v3/"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hajusrakendus</title>
        @routes
        @vite
    </head>
    <body>
        @inertia
    </body>
</html>