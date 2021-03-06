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

{{--<title>Customer Exports All Excel</title>--}}
{{--</head>--}}
{{--<body>--}}
<style>
    #customer {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customer td, #customer th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customer tr:nth-child(even){background-color: #f2f2f2;}

    #customer tr:hover {background-color: #ddd;}

    #customer th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="customer" width="100%">
    <thead>
    <tr>
        <th><b>ID</b></th>
        <th><b>Nama</b></th>
        <th><b>Alamat</b></th>
        <th><b>Email</b></th>
        <th><b>Telepon</b></th>
    </tr>
    </thead>

    @foreach($customer as $c)
        <tbody>
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nama }}</td>
            <td>{{ $c->alamat}}</td>
            <td>{{ $c->email}}</td>
            <td>{{ $c->telepon}}</td>
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


