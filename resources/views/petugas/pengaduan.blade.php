@php
    use App\Models\Tanggapan;
@endphp
@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
      
           @include('layouts.alert')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="container">
              <div class="row">
                <div class="col-lg-6">
              <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
              </div>
                {{-- <div class="col-lg-6 text-right"> --}}
                  {{-- <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#exampleModal"> --}}
                  {{-- Tambah Pengaduan --}}
                  {{-- </button> --}}
                  {{-- </div> --}}
            </div>
            </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pengirim</th>
                      <th>Tanggal Pengaduan</th>
                      <th>Media</th>
                      <th>Aduan</th>
                      {{-- <th>Tanggapan</th> --}}
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $no => $item)
                    <tr>
                      <td>{{$no+1}}</td>
                      <td>{{$item->users->name}}</td>
                      <td>{{$item->tanggal_pengaduan}}</td>
                      <td>
                        @if ($item->media)
                        <a href="{{url('img/media/'.$item->media)}}" download="Pengajuan{{$item->tanggal_pengaduan}}">Lihat</a>
                        @else
                        <i>No media</i>
                        @endif
                       </td>
                      <td>{{$item->isi_laporan}}</td>
                     
                      <td><a href="#" data-toggle="modal" data-target="#exampleModal{{$item->id}}" class="btn btn-primary btn-sm btn-round">Tanggapi</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>




        @foreach ($data as $no => $item)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tanggapi Aduan Masyarakat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('pengaduan_baru')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <label>Isi Tanggapan :</label>
                      <textarea class="form-control form-control-user" name="isi"></textarea>
              </div>
             <input type="hidden" name="id" value="{{$item->id}}">
          
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  </form>
          

  @endforeach



@endsection