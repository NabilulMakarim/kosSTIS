@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Info Pengguna</h1>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <form action="/dashboard/penggunas" method="get">
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search .." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit">Search Pengguna</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif





    {{-- Pengguna  --}}
    {{-- <div class="pt-3 pb-2 mb-3 col-lg-9">
  <h4 class="h4 text-center text-decoration-underline">Pengguna</h4>
</div> --}}

    @if ($penggunas->count() > 0)
        <div class="table-responsive col-lg-12">
            {{-- <a href="/dashboard/kosts/create" class="btn btn-primary mb-3">Tambahkan Kost</a> --}}
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">No.Handphone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penggunas as $pengguna)
                        {{-- @if ($pengguna->is_admin = 0) --}}
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengguna->nama }}</td>
                            <td>{{ $pengguna->username }}</td>
                            <td>{{ $pengguna->email }}</td>
                            <td>0{{ $pengguna->noHp }}</td>

                            <td class="col-md-2">
                                {{-- <a href="/dashboard/penggunas/{{ $pengguna->id }}" class="badge bg-secondary"><i
                                        class="fas fa-eye"></i></a> --}}

                                <form action="/dashboard/hapusPengguna/{{ $pengguna->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                {{-- 
                                <button class="badge bg-danger border-0" data-toggle="modal" data-target="#hapus"><i
                                        class="fas fa-trash"></i></button> --}}
                            </td>
                        </tr>
                        {{-- @endif --}}

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="hapus" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tindakan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin <b>menghapus</b> akun pengguna ini ?
                                        Semua data yang terkait pengguna ini seperti data kost, kamar, dan kontrakan yang
                                        ditambahkan atau diperbaharui olehnya akan ikut dihapus
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/dashboard/hapusPengguna/{{ $pengguna->id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Iya</button>
                                        </form>

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>
    @else
        <div class="col-lg-9">
            <p class="text-center fs-4">Tidak ada pengguna yang ditemukan</p>
        </div>
    @endif

    <div class="d-flex justify-content-end col-lg-9">
        {{ $penggunas->links() }}
    </div>


@endsection
