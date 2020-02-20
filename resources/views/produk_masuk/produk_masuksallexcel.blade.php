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

{{--<title>Product Masuk Exports All Excel</title>--}}
{{--</head>--}}
{{--<body>--}}
<style>
    #produkmasuks {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #produkmasuks td, #produkmasuks th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #produkmasuks tr:nth-child(even){background-color: #f2f2f2;}

    #produkmasuks tr:hover {background-color: #ddd;}

    #produkmasuks th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="produkmasuks" width="100%">
    <thead>
    <tr>
        <td><b>ID</b></td>
        <td><b>Produk</b></td>
        <td><b>Supplier</b></td>
        <td><b>Qty</b></td>
        <td><b>Tanggal Masuk</b></td>
    </tr>
    </thead>
    @foreach($produkmasuks as $pm)
        <tbody>
        <tr>
            <td>{{ $pm->id }}</td>
            <td>{{ $pm->product->nama }}</td>
            <td>{{ $pm->supplier->nama }}</td>
            <td>{{ $pm->qty}}</td>
            <td>{{ $pm->tanggal }}</td>
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


