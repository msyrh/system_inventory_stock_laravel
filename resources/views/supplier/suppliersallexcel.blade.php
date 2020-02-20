{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--<meta charset="UTF-8">--}}
{{--<meta name="viewport"--}}
{{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--<link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css ')}}">--}}
{{--<!-- Font Awesome -->--}}
{{--<link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}} ">--}}
{{--<!-- Ionicons -->--}}
{{--<link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css')}} ">--}}

{{--<title> Suppliers Export Excel</title>--}}
{{--</head>--}}
{{--<body>--}}
<style>
    #suppliers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #suppliers td, #suppliers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #suppliers tr:nth-child(even){background-color: #f2f2f2;}

    #suppliers tr:hover {background-color: #ddd;}

    #suppliers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="suppliers" width="100%">
    <thead>
    <tr>
        <td><b>ID</b></td>
        <td><b>Nama</b></td>
        <td><b>Alamat</b></td>
        <td><b>Email</b></td>
        <td><b>Telepon</b></td>
    </tr>
    </thead>
    @foreach($suppliers as $c)
        <tbody>
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nama }}</td>
            <td>{{ $c->alamat }}</td>
            <td>{{ $c->email }}</td>
            <td>{{ $c->telepon }}</td>
        </tr>
        </tbody>
    @endforeach

</table>


{{--<!-- jQuery 3 -->--}}
{{--<script src="{{  asset('assets/bower_components/jquery/dist/jquery.min.js') }} "></script>--}}
{{--<!-- Bootstrap 3.3.7 -->--}}
{{--<script src="{{  asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>--}}
{{--<!-- AdminLTE App -->--}}
{{--<script src="{{  asset('assets/dist/js/adminlte.min.js') }}"></script>--}}
{{--</body>--}}
{{--</html>--}}


