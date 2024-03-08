@extends('layout.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <!-- Pesan Sukses -->
            @if (session('success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mt-4">

                <div class="card mb-4 mt-5">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Edit Data Keluarga
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="{{ route('penerbit.update', $penerbit->IDPenerbit) }}" method="POST"
                                class="form-horizontal" id="editForm">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-1">
                                    <div class="row my-2">
                                        <div class="col-sm-2"><label class="form-label fw-bold">Id Penerbit</label>
                                        </div>
                                        <div class="col-sm-4"><input class="form-control" type="text"
                                                value="{{ $penerbit->IDPenerbit }}" readonly></div>
                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-2"><label class="form-label fw-bold">Nama Penerbit</label>
                                        </div>
                                        <div class="col-sm-4"><input class="form-control" type="text" name="namapenerbit"
                                                value="{{ $penerbit->NamaPenerbit }}"></div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-sm-2"><label class="form-label fw-bold">Alamat Penerbit</label>
                                        </div>
                                        <div class="col-sm-4"><input class="form-control" type="text" name="alamat"
                                                value="{{ $penerbit->Alamat }}"></div>
                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-2"><label class="form-label fw-bold">Kota</label>
                                        </div>
                                        <div class="col-sm-4"><input class="form-control" type="text" name="kota"
                                                value="{{ $penerbit->Kota }}"></div>
                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-2"><label class="form-label fw-bold">Telepon</label>
                                        </div>
                                        <div class="col-sm-4"><input class="form-control" type="text" name="telepon"
                                                value="{{ $penerbit->Telepon }}"></div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="button" class="btn btn-danger me-2"
                                        onclick="confirmUpdate()">Simpan</button>
                                    <a href="{{ url('/penerbit') }}" class="btn btn-success">Batal</a>
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
