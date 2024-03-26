<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Template Main CSS File -->
        <link href="http://127.0.0.1:8000/assets/css/style.css" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="http://127.0.0.1:8000/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <link href="http://127.0.0.1:8000/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">


        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
       

       <!-- Vendor JS Files -->
 
       <script src="http://127.0.0.1:8000/assets/vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

        <!-- Template Main JS File -->
        <script src="http://127.0.0.1:8000/assets/js/main.js"></script>
    
    </body>
</html>
