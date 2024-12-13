<script src={{ asset('assets/static/js/components/dark.js') }}></script>
<script src={{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}></script>
<script src={{ asset('assets/compiled/js/app.js') }}></script>
<script src={{ asset('assets/static/js/pages/dashboard.js') }}></script>
<script src={{ asset('assets/extensions/jquery/jquery.min.js') }}></script>
<script src={{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}></script>
<script src={{ asset('assets/static/js/pages/datatables.js') }}></script>
<script src={{ asset('assets/extensions/summernote/summernote-lite.min.js') }}></script>
<script src={{ asset('assets/static/js/pages/summernote.js') }}></script>
<script src={{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}></script>
<script src={{ asset('assets/static/js/pages/sweetalert2.js') }}></script>
@if ($errors->any())
    <script>
        let errorMessages = '';
        @foreach ($errors->all() as $error)
            errorMessages += "{{ $error }}";
        @endforeach
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errorMessages,
        })
    </script>
@endif
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
        })
    </script>
@endif
