@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="float-left">
            </div>
            <div class="float-right">
              <a href="{{ route('form-create') }}"> <button type="button" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Create Mahasiswa</button></a>
            </div>

          </div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{-- You are logged in! --}}

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Npm</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Tempat Lahir</th>
                  <th scope="col">Tanggal Lahir</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Operation</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mahasiswa as $key => $m)
                  <tr>
                    <th scope="row">{{ $mahasiswa->firstItem() + $key }}</th>
                    <td>{{ $m->npm }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->tempat_lahir }}</td>
                    <td>{{ $m->tanggal_lahir }}</td>
                    <td>{{ $m->jurusan }}</td>
                    <td>{{ $m->created_at }}</td>
                    <td>
                      <a href="{{ url('form-edit/'.$m->id) }}">
                        <button type="button" class="btn btn-primary btn-sm" ><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                      </a>|
                      <a href="{{ url('delete/'.$m->id) }}">
                        <button type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            {!! $mahasiswa->links() !!}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
