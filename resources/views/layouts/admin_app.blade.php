<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title> Task Managment </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="GetAppui" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link rel="stylesheet" href="{{ asset('backend/app-0f19a312.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/world-bcd2ab8c.css') }}">

    <!-- Theme Config Js -->

    <!-- Font Family -->
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@900,700,500,300,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/tables-datatables.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/css/components-sweet-alert.css') }}"> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        .sortable {
            cursor: pointer;
        }

        .sortable.ascending:after {
            content: " ↑";
        }

        .sortable.descending:after {
            content: " ↓";
        }
    </style>

    @stack('styles')
    <script src="{{ asset('backend/assets/js/head.js') }}" type="module"></script>


</head>

<body>

    <!-- Begin page -->
    <div class="app-wrapper">

        @if (auth()->user()->role == 'admin')
            @include('partials.admin_sidebar')
        @else
            @include('partials.user_sidebar')
        @endif
        <!-- ========== Left menu End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- ========== Topbar Start ========== -->
            @if (auth()->user()->role == 'admin')
            @include('partials.admin_topbar')

            @else
            @include('partials.user_topbar')
            
            @endif

            <!-- ========== Topbar End ========== -->

            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    @include('partials.breadcrumb')

                    <!-- end page title -->

                    @yield('main-content')


                </div>
                <!-- end row -->

            </div> <!-- container -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Copyright webguro. All Rights Reserved
                                - <a href="https://webguro.com/"> Developed by webguro IT team</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end footer-links">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div> <!-- content -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center w-100 bg-primary p-0 offcanvas-header">
            <h6 class="fw-medium py-2 px-3 font-16 text-white">
                <span class="d-block py-1">Theme Settings</span>
            </h6>
        </div>

        <div class="offcanvas-body p-3 h-100" data-simplebar>
            <div>
                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h5>

                <div class="d-flex gap-2">
                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light"
                            value="light">
                        <label class="form-check-label" for="layout-color-light">Light</label>
                    </div>

                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark"
                            value="dark">
                        <label class="form-check-label" for="layout-color-dark">Dark</label>
                    </div>
                </div>
            </div>


            <div>
                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Layout Mode</h5>

                <div class="d-flex gap-2">
                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-fluid"
                            value="default">
                        <label class="form-check-label" for="layout-mode-fluid">Default</label>
                    </div>

                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-detached"
                            value="detached">
                        <label class="form-check-label" for="layout-mode-detached">Detached</label>
                    </div>
                </div>
            </div>

            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar Color</h5>

            <div class="d-flex gap-2">
                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light"
                        value="light">
                    <label class="form-check-label" for="topbar-color-light">Light</label>
                </div>

                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark"
                        value="dark">
                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                </div>

                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-brand"
                        value="brand">
                    <label class="form-check-label" for="topbar-color-brand">Brand</label>
                </div>
            </div>

            <div>
                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Menu Color</h5>

                <div class="d-flex gap-2">
                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-sidenav-color"
                            id="leftbar-color-light" value="light">
                        <label class="form-check-label" for="leftbar-color-light">Light</label>
                    </div>

                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-sidenav-color"
                            id="leftbar-color-dark" value="dark">
                        <label class="form-check-label" for="leftbar-color-dark">Dark</label>
                    </div>
                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-sidenav-color"
                            id="leftbar-color-brand" value="brand">
                        <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                    </div>
                </div>
            </div>

            <div>
                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar Size</h5>

                <div class="d-flex gap-2 mb-2">
                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                            id="sidenav-size-default" value="default">
                        <label class="form-check-label" for="sidenav-size-default">Default</label>
                    </div>

                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-md"
                            value="md">
                        <label class="form-check-label" for="sidenav-size-md">Compact</label>
                    </div>
                </div>

                <div class="d-flex gap-2 mb-2">
                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                            id="sidenav-size-small" value="sm">
                        <label class="form-check-label" for="sidenav-size-small">Small</label>
                    </div>

                    <div class="form-check form-radio w-50">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                            id="sidenav-size-overlay" value="overlay">
                        <label class="form-check-label" for="sidenav-size-overlay">Overlay</label>
                    </div>
                </div>

                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-hidden"
                        value="hidden">
                    <label class="form-check-label" for="sidenav-size-hidden">Hidden</label>
                </div>
            </div>

        </div>

        <div class="offcanvas-footer border-top py-2 px-2 text-center">
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-soft-danger w-100" id="reset-layout">Reset</button>
            </div>
        </div>
    </div>
    <!-- Vendor js -->

    <!-- App js -->

    <script type="module" crossorigin src="{{ asset('backend/app-22784e3d.js') }}"></script>
    <script type="module" crossorigin src="{{ asset('backend/apexcharts.common-a0fc19b4.js') }}"></script>
    <script type="module" crossorigin src="{{ asset('backend/world-7ff4c208.js') }}"></script>
    <script type="module" crossorigin src="{{ asset('backend/dashboard.init-69152f8b.js') }}"></script>
    <script src="{{ asset('backend/index.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}" type="module"></script>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Good job!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @stack('scripts')

    <script>
        // Initialize Feather icons
        feather.replace();
    </script>
    <script>
        $(document).ready(function() {
            // Attach click event to sortable headers
            $(".sortable").on("click", function() {
                const table = $("#customTable tbody");
                const rows = table.find("tr").toArray();
                const column = $(this).data("column");
                const isAscending = $(this).hasClass("ascending");

                // Toggle sorting direction
                $(".sortable").removeClass("ascending descending");
                $(this).addClass(isAscending ? "descending" : "ascending");

                // Sort rows
                rows.sort(function(a, b) {
                    const aValue = $(a).find(`[data-value]`).data("value");
                    const bValue = $(b).find(`[data-value]`).data("value");

                    if (isNaN(aValue) || isNaN(bValue)) {
                        // Sort as strings
                        return isAscending ?
                            bValue.localeCompare(aValue) :
                            aValue.localeCompare(bValue);
                    } else {
                        // Sort as numbers
                        return isAscending ? bValue - aValue : aValue - bValue;
                    }
                });

                // Re-append sorted rows
                table.append(rows);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-confirm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-form-${productId}`);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>
