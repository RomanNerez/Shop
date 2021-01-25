<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />

        <title>{{ config('app.name', 'Freez') }}</title>

        <link rel="icon" href="{{ asset('library/img/favicon.png') }}" type="image/x-icon" />
        <link rel="shortcut icon" href="{{ asset('library/img/favicon.png') }}" type="image/x-icon" />

        <link href="{{ asset('library/css/confirm.css?v='. $version) }}" rel="stylesheet" />
        <link href="{{ mix('assets/css/admin.css') }}" rel="stylesheet" />

        <link href="//cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet" />
    </head>
  <body>

    <div id="editor">
        <index></index>
        <confirm-item ref="confirm"></confirm-item>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <script type="text/javascript">
        var data = <?= json_encode($data) ?>;
        var _token = '<?= csrf_token() ?>';
    </script>
    <script src="{{ mix('assets/js/manifest.js') }}"></script>
    <script src="{{ mix('assets/js/vendor.js') }}"></script>
    <script src="{{ mix('assets/js/admin.js') }}"></script>
  </body>
</html>