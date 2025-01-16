@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('sneat') }}/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Edit Karyawan</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('sneat') }}/assets/img/favicon/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/css/demo.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="{{ asset('sneat') }}/assets/vendor/js/helpers.js"></script>
    <script src="{{ asset('sneat') }}/assets/js/config.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Edit Jabatan
                        </h4>
                        <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Form Edit Data Jabatan</h5>
                                    </div>
                                    <div class="card-body">
                                      <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <!-- NIP -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="nip">Nama Jabatan</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-id-card"></i>
                                                        </span>
                                                        <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}" required>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit -->
                                            <div class="row mb-3">
                                                <div class="col-sm-10 offset-sm-2">
                                                  <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-paper-plane"></i> Edit Jabatan
                                                </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
