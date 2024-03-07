@extends('back.layout.template')
@section('title', Auth::user()->name . ' - Tambah SubKategori')
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
                                        <h4 class="mt-0 header-title">SubKategori</h4>
                                        <p class="text-muted font-14 mb-3">
                                            Tambah data SubKategori
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
                                     

                                        <form action="{{url('subkategori')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                       <div class="row">
                                        
                                        <div class=" mb-3 col-md-12">
                                            
                                            <label for="kode_subkategori">Kode SubKategori</label>
                                            <input class="input @error('kode_subkategori') is-invalid @enderror form-control" name="kode_subkategori" readonly id="kode_subkategori" type="text">
                                            <input class="form-control" name="kode_kategori" id="kode_kategori_display" type="hidden" readonly>
                                            @error('kode_subkategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="kategori">Kategori</label>
                                                <select name="kode_kategori" id="kategori" class="form-control">
                                                    <option value="" hidden>-- Choose --</option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{$item->kode_kategori}}">{{$item->nama_kategori}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        

                                        <div class=" mb-3 col-md-12">
                                            <label for="nama_subkategori">Nama subkategori</label>
                                            <input class="input @error('nama_subkategori') is-invalid @enderror form-control" name="nama_subkategori" 
                                            id="nama_subkategori" type="text" placeholder="Masukan Nama SubKategori" value="{{old('nama_subkategori')}}">
                                            @error('nama_subkategori')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                              
                                 
                                        <div class=" mb-3 col-md-12">
                                            <label for="jenis">Jenis</label>
                                            <input class="input @error('jenis') is-invalid @enderror form-control" name="jenis" 
                                            id="jenis" type="text" placeholder="Masukan Jenis subkategori" value="{{old('jenis')}}">
                                            @error('jenis')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class=" mb-3 col-md-12">
                                            <label for="merk">Merk</label>
                                            <input class="input @error('merk') is-invalid @enderror form-control" name="merk" 
                                            id="merk" type="text" placeholder="Masukan Merk subkategori" value="{{old('merk')}}">
                                            @error('merk')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                            <div class="text-center">
                                                <a href="{{url('subkategori')}}" class="btn btn-light">kembali</a>
                                                 <button type="submit" class="btn btn-primary">Save changes</button>
                                             </div>
                                        
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
$(document).ready(function() {
    // Get the dropdown element for kategori
    var dropdownKategori = $('#kategori');

    // Get the input element for kode_subkategori
    var inputIdSubkategori = $('#kode_subkategori');

    // Get the input element for kode_kategori
    var inputKodeKategoriDisplay = $('#kode_kategori_display');

    // Event listener when the dropdown for kategori changes
    dropdownKategori.on('change', function() {
        var kodeKategori = this.value;

        if (!kodeKategori) {
            inputIdSubkategori.val('');
            inputKodeKategoriDisplay.val('');
            return;
        }

        $.ajax({
    url: '/get-last-nomor-urutan/' + kodeKategori,
    type: 'GET',
    success: function(data) {
        // Format the nomor urutan with leading zeros
        var nomorUrutanFormatted = ('00' + data).slice(-3);
        
        // Set the value of input kode_subkategori
        inputIdSubkategori.val(kodeKategori + '-' + nomorUrutanFormatted);
    },
    error: function(xhr, status, error) {
        console.error(error); // Display error message if there's an error
    }
});

    });
});

        </script>
        
        
    </body>

<!-- Mirrored from coderthemes.com/adminto/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Feb 2024 04:13:20 GMT -->
</html>
@endsection