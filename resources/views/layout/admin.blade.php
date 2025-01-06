<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'Admin Page')</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | General Form Elements" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="{{ asset('fonts/admin.css') }}">
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="{{ asset('vendors/overlayScrollbars/overlayscrollbars.min.css') }}" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap-icons.min.css') }}">
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('css/components/cpn-admin.css') }}">
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::Plugin(notyf)-->
    <link rel="stylesheet" href="{{ asset('vendors/notyf/notyf.min.css') }}">
    <!--end::Plugin(notyf)-->
    <!--begin::Plugin(select2)-->
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <!--end::Plugin(select2)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        @include('include.admin._header')

        @include('include.admin._sidebar')

        @yield('content')

        @include('include.admin._footer')
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendors/overlayScrollbars/overlayscrollbars.min.js') }}"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="{{ asset('vendors/bootstrap/popper.min.js') }}"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('js/components/cpn-admin.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)-->
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--begin::Plugin(notyf)-->
    <script src="{{ asset('vendors/notyf/notyf.min.js') }}"></script>
    <script src="{{ asset('js/custom/custom-notyf.js') }}"></script>
    @if (session('success'))
        <script>
            notyf.success(@json(session('success')));
        </script>
    @endif

    @if (session('error'))
        <script>
            notyf.error(@json(session('error')));
        </script>
    @endif
    <!--end::Plugin(notyf)-->
    <!--begin::Plugin(select2)-->
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-active-select2').select2({
                placeholder: "Select an option",
                allowClear: true
            });
        });
    </script>
    <!--end::Plugin(select2)-->
    <!--begin::Plugin(tinyeditor)-->
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYEDITOR_API_KEY') }}/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.activeTinyeditor', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
    <!--end::Plugin(tinyeditor)-->
    <!--end::Script-->
</body>
<!--end::Body-->

</html>
