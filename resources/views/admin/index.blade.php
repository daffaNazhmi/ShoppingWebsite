<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Selamat Datang!</title>

    <!-- Bootstrap -->
    <link href="{{asset('gentela-gh-pages')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('gentela-gh-pages')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('gentela-gh-pages')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('gentela-gh-pages')}}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('gentela-gh-pages')}}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('gentela-gh-pages')}}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('gentela-gh-pages')}}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('gentela-gh-pages')}}/build/css/custom.min.css" rel="stylesheet">

    <style>
      button {
 padding: 0.6em 1em;
 border: 4px solid #fa725a;
 transition: ease-in-out 0.3s;
 background-color: transparent;
 color: #fa725a;
 font-weight: bolder;
 font-size: 16px;
}

button:hover {
 transform: scale(1.2) rotate(10deg);
 background-color: #fa725a;
 color: white;
}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('gentela-gh-pages')}}/production/images/img.jpg" alt="" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

           

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{route('indexDashboard')}}"><i class="fa fa-home"></i> Dashboard</a>
                  </li>
                  <li><a><i class="fa fa-home"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('indexAdmin')}}">Data Barang</a></li>
                      <li><a href="{{route('indexKategori')}}">Data Kategori</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              {{-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> --}}
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" title="Logout"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                </form>
             
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                <div style="height:20px;"></div>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-expanded="false">
                    <img src="{{asset('gentela-gh-pages')}}/production/images/img.jpg" alt="">
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="clearfix"></div>
                
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Barang</h2>
                            <a href="{{ route('TambahBarang') }}"><button type="button" class="btn btn-round btn-primary" style="margin-left:799px;"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button></a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gambar</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($query as $item)
                                <tbody>
                                <tr>
                                    <th scope="row">{{$no}}</th>
                                    <td>
                                      <div class="avatar">
                                        <img src="{{asset('upload/'.$item->foto)}}" alt="..." class="avatar-img rounded-circle">
                                      </div>
                                    </td>
                                    <td>{{$item->nama_barang}}</td>
                                    <td>{{$item->nama_kategori}}</td>
                                    <td>{{$item->stok}}</td>
                                    <td>{{$item->harga}}</td>
                                    <td class="w-25">
                                        <center>
                                        {{-- <a href=""><button type="button" class="btn btn-round btn-warning"><i class="fa fa-pencil"></i>&nbsp;Edit</button></a> --}}
                                        
                                        <a href="{{route('HapusBarang',$item->id)}}"><button type="submit" name="hapus" onclick="return confirm('Yakin mau dihapus dek?')"> # Delete
                                        </button></a>
                                        {{-- <a href="{{route('HapusBarang',$item->id)}}"><button type="submit" class="btn btn-round btn-danger" name="hapus" onclick="return confirm('Yakin mau dihapus dek?')"><i class="fa fa-trash"></i>&nbsp;Delete</button></a>
                                        </center> --}}
                                    </td>
                                </tr>
                                </tbody>
                                @php
                                $no++;
                                @endphp
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
    
                    <div class="clearfix"></div>


              <div class="clearfix"></div>
            </div>
          </div> 
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="text-center">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/Flot/jquery.flot.js"></script>
    <script src="{{asset('gentela-gh-pages')}}/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="{{asset('gentela-gh-pages')}}/vendors/Flot/jquery.flot.time.js"></script>
    <script src="{{asset('gentela-gh-pages')}}/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="{{asset('gentela-gh-pages')}}/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="{{asset('gentela-gh-pages')}}/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{asset('gentela-gh-pages')}}/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="{{asset('gentela-gh-pages')}}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{asset('gentela-gh-pages')}}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('gentela-gh-pages')}}/vendors/moment/min/moment.min.js"></script>
    <script src="{{asset('gentela-gh-pages')}}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('gentela-gh-pages')}}/build/js/custom.min.js"></script>
	
  </body>
</html>
