@extends('back.layout.template')
@section('title', Auth::user()->name . ' - Tambah Ruangan')
@section('content')
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/adminto/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Feb 2024 04:12:35 GMT -->
<head>

        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/.ico">

    

    </head>

    <!-- body start -->
    <body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

        <!-- Begin page -->


            {{-- navbar  --}}
            @include('back.layout.navbar')
            {{-- end navbar  --}}
            <!-- sidebar  -->
            @include('back.layout.sidebar')
            <!-- sidebar end  -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="mt-0 header-title">Ruangan</h4>
                                        <p class="text-muted font-14 mb-3">
                                            Tambah data ruangan
                                        </p>
    
                                        @if ($errors->any())
                                        <div class="my-3">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div> 
                                        </div> 
                                        @endif
                                     

                                        <form action="{{url('ruangan')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                       <div class="row">
                                        <div class=" mb-3 col-md-12">
                                            <label for="kode_ruangan">Kode ruangan</label>
                                            <?php
                                                $kodeRuangan = autonumber('ruangan', 'kode_ruangan', 3, 'RNG');
                                            ?>
                          <input class="input @error('kode_ruangan') is-invalid @enderror form-control" name="kode_ruangan" readonly id="kode_ruangan" type="text" value="<?= $kodeRuangan ?>">

                                            @error('kode_ruangan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <div class=" mb-3 col-md-12">
                                            <label for="nama_ruangan">Nama ruangan</label>
                                            <input class="input @error('nama_ruangan') is-invalid @enderror form-control" name="nama_ruangan" 
                                            id="nama_ruangan" type="text" placeholder="Masukan Nama Ruangan" value="{{old('nama_ruangan')}}">
                                            @error('nama_ruangan')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <a href="{{url('ruangan')}}" class="btn btn-light">kembali</a>
                                             <button type="submit" class="btn btn-primary">Save changes</button>
                                         </div>
                                </form>

                                    </div>
                                </div>
                               
                            </div>
               

                           
                        </div>
                        <!-- end row -->
 
                    </div>
                     <!-- container-fluid -->
                </div> 
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Inventory barang <a href="#">Lennwilldayy  </a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        <!-- END wrapper -->

   
        @include('back.layout.right')

        <!-- Right bar overlay-->
        
    

    </body>

<!-- Mirrored from coderthemes.com/adminto/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Feb 2024 04:13:20 GMT -->
</html>
@endsection