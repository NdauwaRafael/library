<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
@include('layouts.partials.topbar')

<section class="lib_body">
    @yield('content')

    @include('layouts.partials.footer')
</section>




<script src="js/app.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
