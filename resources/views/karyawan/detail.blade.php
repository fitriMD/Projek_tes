@extends('karyawan.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Data Karyawan
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    {{-- <li class="list-group-item"><b>NIK: </b>{{$karyawan->nik}}</li> --}}
                    <li class="list-group-item"><b>NIK: </b>{{$karyawan->nik}}</li>
                    <li class="list-group-item"><b>Nama: </b>{{$karyawan->nama}}</li>
                    <li class="list-group-item"><b>Status: </b>{{$karyawan->status}}</li>
                    <li class="list-group-item"><b>Jenis Kelamin: </b>{{$karyawan->jenis_kelamin}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('karyawan.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection