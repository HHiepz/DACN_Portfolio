<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DACN-HH - Portfolio')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/custom/custom-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/custom/custom-datatables.css') }}">
    <!-- Components CSS -->
    <link rel="stylesheet" href="{{ asset('/css/components/cpn-reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/components/cpn-default.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/components/cpn-section-card.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/components/cpn-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/components/cpn-footer.css') }}">
    <!--  for page -->
    @yield('custom-css')
</head>

<body>
    <div id="wrapper">
        @yield('content')
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/vendors/datatables/datatables.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('/js/custom/custom-bootstrap.js') }}"></script>
    <script src="{{ asset('/js/custom/custom-datatables.js') }}"></script>
    <!-- Components JS -->
    <script src="{{ asset('/js/components/cpn-button.js') }}"></script>
    <script src="{{ asset('/js/components/cpn-table.js') }}"></script>
    <!-- Custom JS for page -->
    <script src="{{ asset('/js/pages/page-index.js') }}"></script>
</body>

</html>
