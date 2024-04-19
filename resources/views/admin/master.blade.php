<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Jassa - Crypto Admin Dashboard">
	<meta property="og:title" content="Jassa - Crypto Admin Dashboard">
	<meta property="og:description" content="Jassa - Crypto Admin Dashboard">
	<meta name="format-detection" content="telephone=no">
    <title>@yield('title') </title>
    @include('admin.includes.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
	@yield('css')
</head>
<body>

    @include('admin.includes.header')

    @include('admin.includes.sidebar')
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
                @yield('body')
			</div>
		</div>
        <!--**********************************
            Content body end
        ***********************************-->

    @include('admin.includes.footer')

    @include('admin.includes.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if(Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
        {{ Session::forget('success') }}
    @endif

    @if(Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
        {{ Session::forget('error') }}
    @endif
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('scripts')

</body>
</html>