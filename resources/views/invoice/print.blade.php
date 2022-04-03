<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Invoice - {{ $pemesanan->nama_pemesan }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">   


    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/connect.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark_theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body>


    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                          <div class="col-12">
                            <h4>
                              <i class="fas fa-globe"></i> Hotel Hebat
                              <small class="float-right">Tanggal Pemesanan: {{ $pemesanan->created_at }}</small>
                            </h4>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                          <div class="col-sm-4 invoice-col">
                            From :
                            <address>
                              <strong>Hotel Hebat</strong><br>
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            To :
                            <address>
                              <strong>{{ $pemesanan->nama_pemesan }}</strong><br>
                              Phone: {{ $pemesanan->no_telp }}<br>
                              Email: {{ $pemesanan->email }}
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            <br>
                            <b>ID Pemesanan : </b>{{ $pemesanan->invoice_id }}<br>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                
                        <!-- Table row -->
                        <div class="row">
                          <div class="col-12 table-responsive">
                            <table class="table table-striped">
                              <thead>
                              <tr>
                                <th>Jumlah</th>
                                <th>Tipe Kamar</th>
                                <th>Tanggal Cek In</th>
                                <th>Tanggal Cek Out</th>
                                <th>Status</th>
                                <th>Harga</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                <td>{{ $pemesanan->jmlh_kamar }}</td>
                                <td>{{ $pemesanan->kamar->type_kamar }}</td>
                                <td>{{ $pemesanan->tgl_cek_in }}</td>
                                <td>{{ $pemesanan->tgl_cek_out }}</td>
                                <td>{{ $pemesanan->status }}</td>
                                <td>Rp. {{ formatrupiah($pemesanan->price) }}</td>
                              </tr>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                          <!-- accepted payments column -->
                          <div class="col-6">
                            
                          </div>
                          <!-- /.col -->
                          <div class="col-6">
          
                            <div class="table-responsive">
                              <table class="table">
                                <tr>
                                  <th style="width:70%">Total:</th>
                                  <td>Rp. {{ formatrupiah($pemesanan->jmlh_kamar*$pemesanan->price) }}</td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                </div>
            </div>
        </div>
    </div>

        <!-- /.row -->

        <!-- this row will not appear when printing -->
        
        </div>
      </div>



    <!-- Javascripts -->
    <script>
      window.addEventListener("load", window.print());
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/blockui/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.time.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.symbol.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/js/connect.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
</body>

</html>