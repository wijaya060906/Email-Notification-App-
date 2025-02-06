@include('layouts.sidebar')

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('sneat') }}/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Karyawan Table</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('sneat') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/core.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Helpers -->
    <script src="{{ asset('sneat') }}/assets/vendor/js/helpers.js"></script>

    <!-- Add Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <style>
        form {
            margin: 20px auto;
            padding: 10px;
        }

        form .input-group {
            max-width: 500px;
        }

        form .form-control {
            border-radius: 10px 0 0 10px;
            padding: 10px 15px;
        }

        form .btn-primary {
            border-radius: 0 10px 10px 0;
            padding: 10px 20px;
        }
    </style>

    <!-- Tambahkan di bagian <head> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>


</head>

<body>
    <div class="buy-now">
        <a href="{{ route('karyawan.create') }}" target="_blank" class="btn btn-danger btn-buy-now">Create</a>
    </div>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">Karyawan Table</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card">
                            <h5 class="card-header">Daftar Karyawan</h5>
                            <div class="d-flex justify-content-end" style="position: fixed; right: 20px;">
                                <form method="GET" action="{{ route('karyawan.karyawan') }}">
                                    <div class="input-group" style="max-width: 400px;">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Cari berdasarkan nama atau NIP"
                                            value="{{ request('search') }}" style="border-radius: 10px 0 0 10px;" />
                                        <button class="btn btn-primary" type="submit"
                                            style="border-radius: 0 10px 10px 0;">
                                            <i class="fas fa-search"></i> Cari
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="d-flex justify-content-end mb-3">
                                <form method="GET" action="{{ route('karyawan.karyawan') }}">
                                    <div class="input-group" style="max-width: 600px;">
                                        <!-- Input Pencarian Nama atau NIP -->
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari Nama atau NIP" value="{{ request('search') }}">
                            
                                        <!-- Dropdown Filter -->
                                        <select name="filter" class="form-select">
                                            <option value="" selected>Semua</option>
                                            <option value="gaji" {{ request('filter') == 'gaji' ? 'selected' : '' }}>
                                                Kenaikan Gaji (6 Bulan)</option>
                                            <option value="pangkat" {{ request('filter') == 'pangkat' ? 'selected' : '' }}>
                                                Kenaikan Pangkat (6 Bulan)</option>
                                            <option value="gaji dan pangkat" {{ request('filter') == 'gaji dan pangkat' ? 'selected' : '' }}>
                                                Kenaikan Gaji dan Pangkat (6 Bulan)</option>
                                        </select>
                            
                                        <button class="btn btn-primary" type="submit">Filter</button>
                                    </div>
                                </form>
                            </div>


                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th>Golongan</th>
                                            <th>Email</th>
                                            <th>Kenaikan Pangkat Terakhir</th>
                                            <th>Kenaikan Gaji Terakhir</th>
                                            <th>Tgl.Kenaikan Pangkat</th>
                                            <th>Tgl.Kenaikan Gaji</th>
                                            <th>Tgl.Lahir</th>
                                            <th>Gaji</th>
                                            <th>Kapan Pensiun</th>
                                            <th>Status</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawans as $karyawan)
                                            <tr>
                                                <td>{{ $karyawan->nama }}</td>
                                                <td>{{ $karyawan->nip }}</td>
                                                <td>{{ $karyawan->jabatan->nama_jabatan ?? 'Tidak ada' }}</td>
                                                <!-- Nama Jabatan -->
                                                <td>{{ $karyawan->golongan->nama_golongan ?? 'Tidak ada' }}</td>
                                                <!-- Nama Golongan -->
                                                <td>{{ $karyawan->email }}</td>
                                                <td>{{ $karyawan->kenaikan_pangkat_terakhir }}</td>
                                                <td>{{ $karyawan->kenaikan_gaji_berkala }}</td>
                                                <td>{{ $karyawan->tanggal_kenaikan_pangkat }}</td>
                                                <td>{{ $karyawan->tanggal_kenaikan_gaji }}</td>
                                                <td>{{ $karyawan->tanggal_lahir }}</td>
                                                <td>{{ $karyawan->gaji }}</td>
                                                <td>{{ $karyawan->batas_usia_pensiun }}</td>
                                                <td>
                                                    <!-- Check for Kenaikan Pangkat Icon -->
                                                    @php
                                                   $kenaikanPangkatDate = \Carbon\Carbon::parse($karyawan->tanggal_kenaikan_pangkat);
$kenaikanGajiDate = \Carbon\Carbon::parse($karyawan->tanggal_kenaikan_gaji);
$currentDate = \Carbon\Carbon::now();

$isKenaikanPangkat = $kenaikanPangkatDate->diffInMonths($currentDate) >= 6;
$isKenaikanGaji = $kenaikanGajiDate->diffInMonths($currentDate) >= 6;

                                                @endphp
                                                
                                                @if ($isKenaikanPangkat && $isKenaikanGaji)
                                                    <i class="fas fa-arrow-up text-success" title="Kenaikan Pangkat & Gaji"></i>
                                                @elseif ($isKenaikanPangkat)
                                                    <i class="fas fa-arrow-up text-info" title="Kenaikan Pangkat"></i>
                                                @elseif ($isKenaikanGaji)
                                                    <i class="fas fa-dollar-sign text-primary" title="Kenaikan Gaji"></i>
                                                @else
                                                    <i class="fas fa-times-circle text-muted" title="No Kenaikan"></i>
                                                @endif
                                                </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-primary btn-sm dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('karyawan.edit', $karyawan->id) }}">
                                                                    <i class="bi bi-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('karyawan.destroy', $karyawan->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="dropdown-item text-danger"
                                                                        type="submit">
                                                                        <i class="bi bi-trash"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
