@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('sneat') }}/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Tambah Karyawan</title>
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Karyawan
                        </h4>
                        <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Form Edit Data Karyawan</h5>
                                    </div>
                                    <div class="card-body">
                                      <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-user"></i>
                                                        </span>
                                                        <input type="text" id="nama" class="form-control"
                                                            placeholder="Nama Lengkap" name="nama"
                                                            value="{{ $karyawan->nama }}" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- NIP -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="nip">NIP</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-id-card"></i>
                                                        </span>
                                                        <input type="text" id="nip" class="form-control"
                                                            placeholder="Nomor Induk Pegawai" required name="nip" value="{{ $karyawan->nip }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Email -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="email">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-envelope"></i>
                                                        </span>
                                                        <input type="email" id="email" class="form-control"
                                                            placeholder="Email Karyawan" required name="email" value="{{ $karyawan->email }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tanggal Lahir -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="tanggal_lahir">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-calendar"></i>
                                                        </span>
                                                        <input type="date" id="tanggal_lahir" class="form-control"
                                                            required name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Jabatan -->
                                            <div class="row mb-3">
                                              <label class="col-sm-2 col-form-label" for="jabatan_id">Jabatan</label>
                                              <div class="col-sm-10">
                                                  <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                                                      <option value="" disabled selected>Pilih Jabatan</option>
                                                      @foreach ($jabatans as $jabatan)
                                                          <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                            <!-- Golongan -->
                                            <div class="row mb-3">
                                              <label class="col-sm-2 col-form-label" for="golongan_id">Golongan</label>
                                              <div class="col-sm-10">
                                                  <select name="golongan_id" id="golongan_id" class="form-control" required>
                                                      <option value="" disabled selected>Pilih Golongan</option>
                                                      @foreach ($golongans as $golongan)
                                                          <option value="{{ $golongan->id }}">{{ $golongan->nama_golongan }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                            <!-- Tanggal Naik Pangkat -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label"
                                                    for="kenaikan_pangkat_terakhir">Tanggal Naik Pangkat Terakhir</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-arrow-up"></i>
                                                        </span>
                                                        <input type="date" id="tanggal_naik_pangkat"
                                                            class="form-control" required name="kenaikan_pangkat_terakhir" value="{{ $karyawan->kenaikan_pangkat_terakhir }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tanggal Naik Gaji -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="kenaikan_gaji_berkala">Tanggal
                                                    Naik Gaji Terakhir</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-money-bill"></i>
                                                        </span>
                                                        <input type="date" id="kenaikan_gaji_berkala"
                                                            class="form-control" required name="kenaikan_gaji_berkala" value="{{ $karyawan->kenaikan_gaji_berkala }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Batas Usia Pensiun -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="batas_usia_pensiun">Batas Usia
                                                    Pensiun</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-hourglass-half"></i>
                                                        </span>
                                                        <input type="date" id="batas_pensiun" class="form-control"
                                                            required name="batas_usia_pensiun" value="{{ $karyawan->batas_usia_pensiun }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- Gaji -->
                                             <div class="row mb-3">
                                              <label class="col-sm-2 col-form-label" for="gaji">Gaji</label>
                                              <div class="col-sm-10">
                                                  <div class="input-group">
                                                      <span class="input-group-text">
                                                          <i class="fa-solid fa-money-bill-wave"></i>
                                                      </span>
                                                      <input type="number" id="gaji" class="form-control"
                                                          placeholder="Masukkan Gaji Karyawan" required name="gaji" min="0" step="1000" value="{{ $karyawan->gaji}}"/>
                                                  </div>
                                              </div>
                                          </div>
                                            <!-- Submit -->
                                            <div class="row mb-3">
                                                <div class="col-sm-10 offset-sm-2">
                                                  <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-paper-plane"></i> Kirim
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
