@extends('layouts.apps')

@section('title', 'Laporan Distribusi Zakat')

@section('content')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <div class="pc-container">
        <div class="pc-content">

            <!-- Summary Section -->
            <div class="container mb-4">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm border-0 rounded-3 animate__animated animate__fadeInUp d-flex flex-column">
                            <div class="bg-success text-white card-body rounded-3 flex-grow-1 d-flex align-items-center">
                                <div class="icon-container me-3">
                                    <i data-feather="user-plus" class="icon-lg"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title text-center">Total Mustahik</h5>
                                    <h2 class="mb-0 counter" style="color: white">{{ $totalMustahik }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm border-0 rounded-3 animate__animated animate__fadeInUp d-flex flex-column">
                            <div class="bg-success text-white card-body rounded-3 flex-grow-1 d-flex align-items-center">
                                <div class="icon-container me-3">
                                    <i data-feather="users" class="icon-lg"></i>
                                </div>
                                <div class="flex-grow-1 text-center">
                                    <h5 class="card-title">Total Distribusi</h5>
                                    <h2 class="mb-0 counter" style="color: white">{{ $totalDistribusi }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm border-0 rounded-3 animate__animated animate__fadeInUp d-flex flex-column">
                            <div class="bg-success text-white card-body rounded-3 flex-grow-1 d-flex align-items-center">
                                <div class="icon-container me-3">
                                    <i data-feather="dollar-sign" class="icon-lg"></i>
                                </div>
                                <div class="flex-grow-1 text-center">
                                    <h5 class="card-title">Total Uang</h5>
                                    <h2 class="mb-0 counter" style="color: white">Rp {{ number_format($totalUang, 0, ',', '.') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Data Table Section -->
            <div class="container">
                <div class="card rounded shadow-lg animate__animated animate__fadeInUp">
                    <div class="card-header bg-success text-white rounded-top-2 d-flex align-items-center">
                        <i class="fas fa-table text-white me-3" style="font-size: 24px;"></i>
                        <h4 class="mb-0" style="font-family: 'Roboto', sans-serif;color:white;">Laporan Distribusi Zakat</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded-4">
                            <table id="distribusiZakatTable" class="table table-striped table-bordered rounded-4 overflow-hidden">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Nama Mustahik</th>
                                        <th>Jenis Zakat</th>
                                        <th>Jumlah Uang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data is loaded via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@section('scripts')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#distribusiZakatTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('distribusi_zakat.index') }}", // Replace with your route
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // Index Column
                    {
                        data: 'mustahik',
                        name: 'mustahik',
                        render: function(data, type, row) {
                            if (data) {
                                return `
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-success text-white rounded-circle me-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            ${data.nama_mustahik.toUpperCase()}
                                        </div>
                                        <div>
                                            <strong>${data.nama_mustahik}</strong><br>
                                        </div>
                                    </div>
                                `;
                            } else {
                                return `
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-secondary text-white rounded-circle me-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            ?
                                        </div>
                                        <div>
                                            <strong>Tidak Diketahui</strong><br>
                                        </div>
                                    </div>
                                `;
                            }
                        }
                    },
                    { data: 'jenis_zakat', name: 'jenis_zakat' },
                    { data: 'jumlah_uang', name: 'jumlah_uang' },
                ]
            });
        });
    </script>

@endsection
@endsection
