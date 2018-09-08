<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Moder Library</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body >
@include('layouts.partials.topbar')
@include('layouts.partials.sidebar')

<section class="lib_body" id="app">
<div v-if="$route.name">
    <router-view></router-view>
</div>
    <div v-else>
        @yield('content')
    </div>

    @include('layouts.partials.footer')
</section>




<script src="/js/app.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
