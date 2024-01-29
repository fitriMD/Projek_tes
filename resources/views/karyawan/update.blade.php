@extends('karyawan.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Data Karyawan
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ url('karyawan-update/' .$karyawan->nik) }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" value="{{ $karyawan->nik }}" ariadescribedby="nik" >
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $karyawan->nama }}"
                            ariadescribedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label> 
                        <select class="form-control" id="status" name="status">
                            <option value="Aktif" @php if ( $karyawan->status == "Aktif" ) echo 'selected="selected"'; @endphp>Aktif</option>
                            <option value="Kontrak" @php if ( $karyawan->status == "Kontrak" ) echo 'selected="selected"'; @endphp>Kontrak</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label> 
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="L" @php if ( $karyawan->jenis_kelamin == "L" ) echo 'selected="selected"'; @endphp>Laki-laki</option>
                            <option value="P" @php if ( $karyawan->jenis_kelamin == "P" ) echo 'selected="selected"'; @endphp>Perempuan</option>                            
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection