
<!-- build:js assets/vendor/js/core.js -->
<script src="https://bgorcamento.herokuapp.com/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://bgorcamento.herokuapp.com/assets/vendor/libs/popper/popper.js"></script>
<script src="https://bgorcamento.herokuapp.com/assets/vendor/js/bootstrap.js"></script>
<script src="https://bgorcamento.herokuapp.com/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="https://bgorcamento.herokuapp.com/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="https://bgorcamento.herokuapp.com/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="https://bgorcamento.herokuapp.com/assets/js/main.js"></script>

<!-- Page JS -->
<script src="https://bgorcamento.herokuapp.com/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Notification Toastr -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
        
            switch(type) {
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
</script>