@extends('layouts.mainlayout')

@section('title', 'Master Data Perangkat')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>

                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Modals & Alerts</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header ">
                                <center>
                                    <h5><b>DATA WORK ORDER CABANG {{ cabangs() }}</b></h5>
                                </center>
                            </div>




                            {{-- @include('Masterdata.modal.modalinout') --}}

                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (session('success'))
                                    <div id="success-alert" class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No WO</th>
                                            <th>Jenis WO</th>
                                            <th>Obyek</th>
                                            <th>Kendala</th>
                                            <th>WO dibuat</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (getUserdept() == 'EDP')

                                            @foreach ($workorders as $wo)
                                                <tr>
                                                    <td>{{ $wo->no_wo }}</td>
                                                    <td>{{ $wo->kategori_wo }}
                                                    </td>
                                                    <td>{{ $wo->obyek }}</td>
                                                    <td>{{ $wo->keadaan }}</td>
                                                    <td>{{ $wo->wo_create }}</td>
                                                    <td>{{ $wo->status }}</td>
                                                    <td> <a href="{{ route('Workorder_detail', $wo->id) }}"
                                                            class="btn btn-primary">Edit</a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach ($workorder as $wo)
                                                <tr>
                                                    <td>{{ $wo->no_wo }}</td>
                                                    <td>{{ $wo->kategori_wo }}
                                                    </td>
                                                    <td>{{ $wo->obyek }}</td>
                                                    <td>{{ $wo->keadaan }}</td>
                                                    <td>{{ $wo->wo_create }}</td>
                                                    <td>{{ $wo->status }}</td>
                                                    <td> <a href="{{ route('Workorder_detail', $wo->id) }}"
                                                            class="btn btn-primary">Edit</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <!-- /.content -->
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                autoWidth: true,
                responsive: true,
                pageLength: 10, // Menampilkan 10 baris per halaman
                dom: 'Bfrtip',
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
    <!-- /.content-wrapper -->
@endsection
