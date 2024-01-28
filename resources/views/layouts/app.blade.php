<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- PWA  -->
        <meta name="theme-color" content="#777"/>
        <link rel="apple-touch-icon" href="logo.png">
        <link rel="manifest" href="/manifest.json">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased" class="bg-zinc-800">
        <div id="app" class="bg-zinc-800">
            {{ $slot }}
        </div>
        <script src="{{ asset('/sw.js') }}"></script>
        <script>
           if ("serviceWorker" in navigator) {
              // Register a service worker hosted at the root of the
              // site using the default scope.
              navigator.serviceWorker.register("/sw.js").then(
              (registration) => {
                 console.log("Service worker registration succeeded:", registration);
              },
              (error) => {
                 console.error(`Service worker registration failed: ${error}`);
              },
            );
          } else {
             console.error("Service workers are not supported.");
          }
        </script>
    </body>
</html>
