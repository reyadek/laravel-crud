<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App\Mahasiswa;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index()
  {
    $mahasiswa = Mahasiswa::paginate(2);
    // dd($mahasiswa);

    return view('home', ['mahasiswa' => $mahasiswa]);
  }

  public function formCreate()
  {
    return view('mahasiswa.form-create');
  }

  public function storeCreate(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'npm'           => 'required|numeric|unique:mahasiswa',
      'nama'          => 'required',
      'email'         => 'required|unique:mahasiswa',
      'tempat_lahir'  => 'required',
      'tanggal_lahir' => 'required',
      'jurusan'       => 'required',
    ]);
    if ($validator->fails()) {
      return back()->withInput()->withErrors($validator);
    }
    $data               = new Mahasiswa();
    $data->npm          = $request->npm;
    $data->nama         = $request->nama;
    $data->email        = $request->email;
    $data->tempat_lahir = $request->tempat_lahir;
    $data->tanggal_lahir= $request->tanggal_lahir;
    $data->jurusan      = $request->jurusan;
    $data->save();
    Session::flash('status', 'Create Data Mahasiswa Success');
    return redirect('home');
  }

  public function formEdit($id)
  {
    $data = Mahasiswa::findOrFail($id);
    return view('mahasiswa.form-edit', ['data' => $data]);
  }

  public function storeEdit(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'npm'           => 'required|numeric',
      'nama'          => 'required',
      'email'         => 'required',
      'tempat_lahir'  => 'required',
      'tanggal_lahir' => 'required',
      'jurusan'       => 'required',
    ]);
    if ($validator->fails()) {
      return back()->withInput()->withErrors($validator);
    }
    $data               = Mahasiswa::find($id);
    $data->npm          = $request->npm;
    $data->nama         = $request->nama;
    $data->email        = $request->email;
    $data->tempat_lahir = $request->tempat_lahir;
    $data->tanggal_lahir= $request->tanggal_lahir;
    $data->jurusan      = $request->jurusan;
    $data->save();
    Session::flash('status', 'Edit Data Mahasiswa Success');
    return redirect('home');
  }

  public function delete($id)
  {
    $data   = Mahasiswa::find($id);
    $data->delete();
    Session::flash('status', 'Delete Data Mahasiswa Success');
    return redirect('home');
  }
}
