@extends('back.layout.template')
@section('title', Auth::user()->name . ' - Inventory barang')
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
                                        <h4 class="mt-0 header-title">Kategori</h4>
                                        <p class="text-muted font-14 mb-3">
                                            Kelola Data Kategori
                                        </p>
                                        
                                        <a href="{{url('kategori/create')}}" class="btn btn-primary mb-2">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span> Tambah Kategori</a>
                                   
    
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
                                    
                                        @if (session('success'))
                                        <div class="my-3">
                                            <div class="alert alert-success">
                                                {{session('success')}} 
                                            </div> 
                                        </div> 
                                        @endif
                                     

                                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Kategori</th>
                                                <th>Nama Kategori</th>
                                                @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                                                <th>Function</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @dd($kategori); --}}
                                                @foreach ($kategori as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->kode_kategori }}</td>
                                                    <td>{{$item->nama_kategori}}</td>
                                                    <td class="text-center">
                                                        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                                                        <a href="{{url('subkategori')}}" class="btn btn-info mb-2">
                                                            <span class="icon"><i class="mdi mdi-pen"></i></span> Subkategori</a>
                                                        @endif
                                                        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                                                        <a href="{{url('kategori/'.$item->kode_kategori.'/edit')}}" class="btn btn-warning mb-2">
                                                            <span class="icon"><i class="mdi mdi-pencil"></i></span> Edit</a>
                                                        @endif
                                                        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                                                            <a href="#" onclick="deleteKategori(this)" data-id="{{$item->kode_kategori}}"  class="btn btn-danger mb-2">
                                                         <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                            Delete
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
        
       @push('js')
       <script src="{{asset('Admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
       <script src="{{asset('Admin/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
       <script src="{{asset('Admin/libs/pdfmake/build/pdfmake.min.js')}}"></script>
       <script src="{{asset('Admin/libs/pdfmake/build/vfs_fonts.js')}}"></script>
       
       <script src="{{asset('Admin/js/pages/datatables.init.js')}}"></script>

       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

       <script>
        const swal = $('.swal').data('swal');
    
        function deleteKategori(e) {
        let kode_kategori = e.getAttribute('data-id');
        console.log("ID Kategori yang Dihapus:", kode_kategori);
    
        Swal.fire({
            title: 'Delete Kategori',
            text: "Are you sure?",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: '/kategori/' + kode_kategori,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: 'success',
                        }).then((result) => {
                            window.location.href = '/kategori';
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        });
    }
    
      </script>
       @endpush

 {{-- sweetalert2  --}}
 

    </body>

<!-- Mirrored from coderthemes.com/adminto/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Feb 2024 04:13:20 GMT -->
</html>
@endsection