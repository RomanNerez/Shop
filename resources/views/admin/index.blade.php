<!doctype html>
<html>
    <head>
        <title>Админ Панель</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="{{asset('asset/css/admin.css?v='.time())}}">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

    </head>
    <body>
        <div id="wrapper">
            <Index></Index>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <script type="text/javascript">
            var data = <?= json_encode($data) ?>;
        </script>
        <script type="text/javascript" src="{{asset('asset/js/manifest.js')}}"></script>
        <script type="text/javascript" src="{{asset('asset/js/vendor.js')}}"></script>
        <script type="text/javascript" src="{{asset('asset/js/admin.js?v='.time())}}"></script>
    </body>
</html>
