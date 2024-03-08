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
                            <form method="post" action="{{ route('penerbit.store') }}">
                                @csrf
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">ID
                                                Penerbit</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="idpenerbit" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">Nama
                                                Penerbit</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="namapenerbit" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">Alamat
                                            </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="alamat" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis"
                                                class="form-label fw-bold my-2">Kota</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="kota" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Jenis" class="form-label fw-bold my-2">No
                                                telpon</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="telepon" maxlength="12"
                                                required>
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

                    <div class="table-responsive">
                        <table id="example" class="table" width="100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Id Penerbit</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Kota</th>
                                    <th class="text-center">No Telpon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($penerbit as $item)
                                    <tr>
                                        <th scope="row text-center">{{ $i++ }}</th>
                                        <td class="text-center">{{ $item->IDPenerbit }}</td>
                                        <td class="text-center">{{ $item->NamaPenerbit }}</td>
                                        <td class="text-center">{{ $item->Alamat }}</td>
                                        <td class="text-center">{{ $item->Kota }}</td>
                                        <td class="text-center">{{ $item->Telepon }}</td>
                                        <td class="text-center">
                                            <form id="deleteForm_{{ $item->IDPenerbit }}"
                                                action="{{ route('penerbit.destroy', $item->IDPenerbit) }}"
                                                method="POST">
                                                <a href="{{ route('penerbit.edit', $item->IDPenerbit) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete('{{ $item->IDPenerbit }}')"
                                                    class="btn btn-danger" id="hapus">
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
