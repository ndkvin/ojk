<link rel="stylesheet" href={{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}>
<link rel="stylesheet" crossorigin href={{ asset('assets/compiled/css/app.css') }}>
{{-- <link rel="stylesheet" crossorigin href={{ asset('assets/compiled/css/app-dark.css') }}> --}}
<link rel="stylesheet" crossorigin href={{ asset('assets/compiled/css/iconly.css') }}>
<link rel="stylesheet" href={{ asset('assets/extensions/summernote/summernote-lite.css') }}>
<link rel="stylesheet" crossorigin href={{ asset('/assets/compiled/css/form-editor-summernote.css') }}>
<link rel="stylesheet" href={{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .dropdown-container {
        position: relative;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .dropdown-btn {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        text-align: left;
        background-color: #fff;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ccc;
        background-color: #fff;
        z-index: 10;
    }

    .dropdown-content.active {
        display: block;
    }

    .dropdown-search {
        width: 100%;
        padding: 8px;
        border: none;
        border-bottom: 1px solid #ccc;
    }

    .dropdown-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .dropdown-list li {
        padding: 8px;
        cursor: pointer;
    }

    .dropdown-list li:hover {
        background-color: #f0f0f0;
    }

    .sidebar-item.active a {
        background-color: #dc3545 !important;
        /* !important ditempatkan setelah nilai properti */
    }

    #main {
        background-color: #ffecec62 !important
    }

    
</style>
