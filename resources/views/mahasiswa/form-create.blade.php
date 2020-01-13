@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Create Mahasiswa</div>
          <div class="card-body">

            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <form action="{{ url('store-create') }}" method="post">
              @csrf
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Npm</label>
                  <input type="text" class="form-control @error('npm') is-invalid @enderror" placeholder="Enter Npm" value="{{ old('npm') }}" name="npm">
                  @error('npm')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Nama" value="{{ old('nama') }}" name="nama">
                  @error('nama')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email') }}" name="email">
                  @error('email')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Tempat Lahir</label>
                  <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Enter Tempat Lahir" value="{{ old('tempat_lahir') }}" name="tempat_lahir">
                  @error('tempat_lahir')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Tanggal Lahir</label>
                  <input type="text" id="datepicker" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Enter Tanggal Lahir" value="{{ old('tanggal_lahir') }}" name="tanggal_lahir">
                  @error('tanggal_lahir')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Jurusan</label>
                  <input type="text" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Enter Jurusan" value="{{ old('jurusan') }}" name="jurusan">
                  @error('jurusan')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$( function() {
  $( "#datepicker" ).datepicker(
    { dateFormat: 'yy-mm-dd' }
  );
} );
</script>

@endsection
