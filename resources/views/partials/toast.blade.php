@if (session()->has('success'))
    <script>
        toastr.success("{{ session('success') }}");
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
    </script>
@endif
@if (session()->has('error'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.error("{{ session('error') }}");
    </script>
@endif
@if (session()->has('message'))
    <script>
        toastr.info("{{ session('message') }}");
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        </script>
@endif
