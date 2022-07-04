<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <!-- Include Head -->
    @include('layouts.head')
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
            <!-- Include Sidenav -->
            @include('layouts.sidenav')

                <div class="layout-page">
                    <!-- Include Navbar -->
                    @include('layouts.navbar')
                    
                    <div class="content-wrapper">
                        <!-- Yield Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            @yield('content')
                        </div>

                        <!-- Footer -->
                        {{-- @include('layouts.footer') --}}

                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Include Scripts -->
    @include('layouts.scripts')
</body>

</html>
