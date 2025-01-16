@include('layouts.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Golongan Table</title>
    <link rel="stylesheet" href="{{asset('sneat')}}/assets/vendor/css/core.css" />
</head>
<body>
    <div class="buy-now">
        <a
          href="{{route('golongan.create')}}"
          target="_blank"
          class="btn btn-danger btn-buy-now"
          >Create</a
        >
      </div>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">Golongan Table</h4>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="card">
                            <h5 class="card-header">Daftar Golongan</h5>
                            
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Golongan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($golongans as $golongan)
                                        <tr>
                                            <td>{{ $golongan->nama_golongan }}</td>
                                            <td>
                                                <form action="{{ route('golongan.edit', $golongan->id) }}" method="GET" style="display: inline;">
                                                    @csrf
                                                    <button class="btn btn-warning" type="submit">Edit</button>
                                                </form>
                                                <form action="{{ route('golongan.destroy', $golongan->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus golongan ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <@include('layouts.footer')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
