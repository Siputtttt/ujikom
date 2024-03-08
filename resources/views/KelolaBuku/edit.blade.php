@extends('layout.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            @if ($message = Session::get('pesan'))
                <div class="alert alert-success mt-5" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $message }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Data Keluarga
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('buku.update', $buku->IDBuku) }}" method="POST" class="form-horizontal"
                            id="editForm">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">ID
                                            Buku</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input class="form-control" value="{{ $buku->IDBuku }}" type="text" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">Nama
                                            Buku</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" value="{{ $buku->NamaBuku }}"
                                            name="namabuku" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><label for="Jenis"
                                            class="form-label fw-bold my-2">Kategori</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" value="{{ $buku->Kategori }}"
                                            name="kategori" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">Harga
                                        </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" value="{{ $buku->Harga }}"
                                            name="harga" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">Stok</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" value="{{ $buku->Stok }}"
                                            name="stok" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">Nama
                                            Penerbit</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="idpenerbit">
                                            @foreach ($penerbit as $penerbits)
                                                <option value="{{ $penerbits->IDPenerbit }}"
                                                    {{ $buku->IDPenerbit == $penerbits->IDPenerbit ? 'selected' : '' }}>
                                                    {{ $penerbits->NamaPenerbit }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="button" class="btn btn-danger me-2" onclick="confirmUpdate()">Simpan</button>
                                <a href="{{ url('/buku') }}" class="btn btn-success">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function confirmUpdate() {
                Swal.fire({
                    title: 'Anda yakin ingin menyimpan perubahan?',
                    text: "Perubahan akan disimpan ke database.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('editForm').submit();
                    }
                });
            }
        </script>
    </main>
@endsection
