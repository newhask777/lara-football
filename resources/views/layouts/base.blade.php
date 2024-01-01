<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/dist/output.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-400 text-[#5f5f5f]">
@include('header')

@yield('content')

@include('footer')
</body>
</html>



