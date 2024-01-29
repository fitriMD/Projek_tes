@extends('karyawan.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>DATA KARYAWAN PT MULTI SPUNINDO JAYA, TBK</h2>
        </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk logout?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">pilih tombol "Logout" dibawah ini</div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-success" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="/createKaryawan"> Input Karyawan</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>NIK</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Jenis Kelamin</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($karyawan as $data)
    <tr>
        <td>{{ $data->nik }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->status }}</td>
        <td>{{ $data->jenis_kelamin }}</td>
        <td>
            <form action="{{ url('karyawan/hapus/'. $data->nik) }}" method="POST">
                <a class="btn btn-info" href="{{ route('karyawan.show',$data->nik) }}">Show</a>
                <a class="btn btn-primary" href="{{ url('karyawan/update/'.$data->nik) }}">Edit</a>
                @csrf
                @method('DELETE')
                <a href="{{ url('karyawan/hapus/'. $data->nik) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini ?')">Hapus</a>
                {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection