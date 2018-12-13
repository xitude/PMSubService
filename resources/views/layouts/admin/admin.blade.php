<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') :: {{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700">
    <link href='//fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    @stack('styles')
    <link href="{{mix('css/admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    {{-- Fallback FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="skin-1">
<div id="app">
    <div id="wrapper">

        @include('layouts.admin.sidebar')

        <div id="page-wrapper" class="gray-bg">

            @include('layouts.admin.header')

            @yield('content')

            <div class="footer">
                <div>
                    <strong>Copyright</strong> {{ config('app.name', 'Laravel') }} &copy; 2017-{{\Carbon\Carbon::now()->format('Y')}}
                </div>
            </div>

        </div>

        @stack('modals')
    </div>
</div>
<script src="{{mix('js/app.js')}}"></script>
<script src="{{mix('js/admin.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="{{mix('js/inspinia.js')}}"></script>
<script>
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });
</script>
@stack('scripts')
</body>
</html>

