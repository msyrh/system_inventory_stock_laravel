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

{{--<title>Product Keluar Exports All Excel</title>--}}
{{--</head>--}}
{{--<body>--}}
<style>
    #produkkeluars {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #produkkeluars td, #produkkeluars th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #produkkeluars tr:nth-child(even){background-color: #f2f2f2;}

    #produkkeluars tr:hover {background-color: #ddd;}

    #produkkeluars th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="produkkeluars" width="100%">
    <thead>
    <tr>
        <th><b>ID</b></th>
        <th><b>Produk</b></th>
        <th><b>Supplier</b></th>
        <th><b>Qty</b></th>
        <th><b>Tanggal Keluar</b></th>
    </tr>
    </thead>
    @foreach($produkkeluars as $pk)
        <tbody>
        <tr>
            <td>{{ $pk->id }}</td>
            <td>{{ $pk->product->nama }}</td>
            <td>{{ $pk->customer->nama }}</td>
            <td>{{ $pk->qty }}</td>
            <td>{{ $pk->tanggal }}</td>
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


