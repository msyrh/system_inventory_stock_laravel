<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('user.png') }} " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ \Auth::user()->name  }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Cari....">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-link"></i> <span>Halaman Utama</span></a></li>
            <li class="active"><a href="{{route('Supplier.index')}}"><i class="fa fa-link"></i> <span>Supplier</span></a></li>
            <li class="active"><a href="{{route('Sale.index')}}"><i class="fa fa-link"></i> <span>Penjual</span></a></li>
            <li class="active"><a href="{{ route('Customer.index') }}"><i class="fa fa-link"></i> <span>Pelanggan</span></a></li>
            <li class="active"><a href="{{ route('Category.index') }}"><i class="fa fa-link"></i> <span>Kategori</span></a></li>
            <li class="active"><a href="{{ route('Product.index') }}"><i class="fa fa-link"></i> <span>Produk</span></a></li>
            <li class="active"><a href="{{route('ProductMasuk.index')}}"><i class="fa fa-link"></i> <span>Produk Masuk</span></a></li>
            <li class="active"><a href="{{ route('ProductKeluar.index')}}"><i class="fa fa-link"></i> <span>Produk Keluar</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
