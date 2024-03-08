@extends('layout.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <!-- Modal -->
            <div class="modal fade" id="tambahdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('buku.store') }}">
                                @csrf
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">ID
                                                Buku</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="idbuku" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">Nama
                                                Buku</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="namabuku" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis"
                                                class="form-label fw-bold my-2">Kategori</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="kategori" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">Harga
                                            </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" name="harga" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis"
                                                class="form-label fw-bold my-2">Stok</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" name="stok" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">Nama
                                                Penerbit</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="idpenerbit" required>
                                                <option value="">-- Pilih Penerbit --</option>
                                                @foreach ($penerbit as $penerbits)
                                                    <option value="{{ $penerbits->IDPenerbit }}">
                                                        {{ $penerbits->NamaPenerbit }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-danger me-2">Simpan</button>
                                    <a type="button" data-bs-dismiss="modal" aria-label="Close"
                                        class="btn btn-success">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pesan Sukses -->
            @if (session('success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mt-4">

                <div class="card-header text-light" style="background: rgb(152, 156, 160)">
                    <i class="fa-solid fa-database"></i>
                    Data Jenis
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#tambahdata"><i class="fa-solid fa-id-card-clip"></i> Tambah Data Jenis</button>
                    <table id="example" class="table" width="100%">
                        <thead class="table-success">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Id Buku</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Naa Buku</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Penerbit</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($buku as $item)
                                <tr>
                                    <th scope="row text-center">{{ $i++ }}</th>
                                    <td class="text-center">{{ $item->IDBuku }}</td>
                                    <td class="text-center">{{ $item->Kategori }}</td>
                                    <td class="text-center">{{ $item->NamaBuku }}</td>
                                    <td class="text-center">{{ $item->Harga }}</td>
                                    <td class="text-center">{{ $item->Stok }}</td>
                                    <td class="text-center">{{ $item->penerbit->NamaPenerbit }}</td>
                                    <td class="text-center">
                                        <form id="deleteForm_{{ $item->IDBuku }}"
                                            action="{{ route('buku.destroy', $item->IDBuku) }}" method="POST">
                                            <a href="{{ route('buku.edit', $item->IDBuku) }}" class="btn btn-primary">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('{{ $item->IDBuku }}')"
                                                class="btn btn-danger" id="hapus_{{ $item->id }}">
                                                <i class="fa-solid fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

        <!-- Or for RTL support -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    responsive: true
                });
            });

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Yakin data akan dihapus?',
                    text: "Anda tidak akan bisa mengembalikannya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm_' + id).submit();
                    }
                });
            }
        </script>
    </main>
@endsection
