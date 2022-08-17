<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body>


@include('layouts.inc.admin-navbar')
<div id="layoutSidenav">

    @include('layouts.inc.admin-sidebar')
    <div id="layoutSidenav_content">
        <main>

              @yield('content')

        </main>
        @include('layouts.inc.admin-footer')

    </div>

</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />

{{--<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }} " ></script>--}}
<script src="{{ asset('assets/js/scripts.js') }} " ></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#myDataTable').DataTable();
    } );
</script>
<script>
    var tag_ids = new Array();
    $(document).on('change','#tags',(e)=>{
        var tag=document.getElementById('tags').value;
        var tag_select=$( "#tags option:selected" ).text();

        var tags_name=document.getElementById('tags_name').value;

        var select_tags_ids=document.getElementById('select_tags_ids').value;

        if(tag != ''){
            $('#tags_name').val(tag_select+' '+tags_name);
            $('#select_tags_ids').val(select_tags_ids+' '+tag);
            tag_ids.push(tag);
        }
    });
</script>
</body>

</html>
