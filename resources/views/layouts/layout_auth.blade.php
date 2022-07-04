<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
  <head>
    <!-- Include Head -->
    @include('layouts.head')
  </head>

  <body>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          @yield('content_auth')
        </div>
      </div>
    </div>

    <!-- Include Scripts -->
    @include('layouts.scripts')
  </body>
</html>
