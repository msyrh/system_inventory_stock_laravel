<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contoh Invoice </title>
    

</head>

<style>
    #table-data {
        border-collapse: collapse;
        padding: 1px;
    }

    #table-data td, #table-data th {
        border: 1 px solid black;
    }
    #g_ngisor{
        border-bottom-style:solid;
        border-bottom-width: thin ;
    }
    #table-contact{
        font:10px;
        border-top-style:solid ;
        border-top-width: thin ;
    }
</style>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0" align="center"width="80%" >
                    <tr  align="center">
                        <td ><img src="{{ public_path('favicon_io/android-chrome-512x512.png')}}" style="width:100px;height:100px" ></td>
                    </tr>
                    <tr align="center" >
                        <td id="g_ngisor">PT. IXXX SXXXXXXXX</td>
                    </tr>
                    <tr align="center">
                        <td>INVOICE PRODUK MASUK</td>
                    </tr>
                
    </table><br>
    <table  width="80%" align="center">
        <tr>
            <td width="70px">Invoice ID</td>
            <td width="">: {{ $produkmasuks->id }}</td>
            <td width="30px">Dibuat</td>
            <td>: {{ $produkmasuks->tanggal }}</td>
        </tr>

        <tr>
            <td>Telepon</td>
            <td>: {{ $produkmasuks->supplier->telepon }}</td>
            <td>Alamat</td>
            <td>: {{ $produkmasuks->supplier->alamat }}</td>
        </tr>

        <tr>
            <td>Nama</td>
            <td>: {{ $produkmasuks->supplier->nama }}</td>
            <td>Email</td>
            <td>: {{ $produkmasuks->supplier->email }}</td>
        </tr>

    </table>
    <table border="0" id="table-data" width="80%" align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Harga/pcs</th>
                <th>Harga Keseluruhan</th>

            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>{{ $produkmasuks->product->nama }}</td>
            <td>{{ $produkmasuks->qty }}</td>
            <td>{{ $produkmasuks->product->harga }} </td>
            <td>{{ $produkmasuks->total }}</td>
        </tr>
        <tr>
            <td colspan="4">Jumlah Total</td>
            <td>{{ $produkmasuks->total }}</td>
        </tr>
        </tbody>
    </table><br>


        
    <table border="0" width="80%" align="center">
            <tr align="right"><td align="left">Catatan: </td><td align="left" width="30%">Hormat Kami</td></tr>
            <tr align="right"><td ></td><td align="left" width="30%" ><img src="{{ public_path('ttd.png')}}" style="width:70px height:70px"></td></tr>
            <tr align="right"><td ></td><td align="left" width="30%"><b>{{ \Auth::user()->name  }}</b></td></tr>
    </table>
    <table   id="table-contact" align="center"width="80%">
            <tr align="left"><td width="20%">Telp : 089687465883</td><td width="40%">Alamat: Jl. Angsana 5, Salaman, Magelang</td><td></td></tr>
    </table>
   
</div>
