<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- @vite('resources/css/app.css') --}}
    {{--  Variable --}}

    <title>Admin</title>
</head>

<body>
    <div id="app"></div>

    {{-- @vite('resources/js/app.js') --}}

    @vite(['resources/css/app.css', 'resources/js/app.js', 'public/assets/vendor/bootstrap/css/bootstrap.min.css',
    'public/assets/vendor/bootstrap-icons/bootstrap-icons.css',
    'public/assets/vendor/boxicons/css/boxicons.min.css',
    'public/assets/vendor/quill/quill.snow.css',
    'public/assets/vendor/quill/quill.bubble.css',
    'public/assets/vendor/remixicon/remixicon.css',
    'public/assets/vendor/simple-datatables/style.css',
    'public/assets/css/style.css',])

    @vite(['public/assets/vendor/apexcharts/apexcharts.min.js',
    'public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
    'public/assets/vendor/chart.js/chart.umd.js',
    'public/assets/vendor/echarts/echarts.min.js',
    'public/assets/vendor/quill/quill.min.js',
    'public/assets/vendor/simple-datatables/simple-datatables.js',
    'public/assets/vendor/tinymce/tinymce.min.js',
    'public/assets/vendor/php-email-form/validate.js',
    'public/assets/js/main.js'])
</body>

</html>
