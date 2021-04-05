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
                {{-- <div class="col-lg-6 text-right">
                  <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah Pengaduan
                  </button>
                  </div> --}}
            </div>
            </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      
                      <th>Nama Pengadu</th>
                      
                      <th>Tanggal Pengaduan</th>
                      <th>Media</th>
                      <th>Aduan</th>
                      <th>Tanggapan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $no => $item)
                    <tr>
                      <td>{{$no+1}}</td>
                      <td>{{$item->tanggal_pengaduan}}</td>
                      <td>{{$item->users->name}}</td>
                      <td>
                        @if ($item->media)
                        <a href="{{url('img/media/'.$item->media)}}" download="Pengajuan{{$item->tanggal_pengaduan}}">Lihat</a>
                        @else
                        <i>No media</i>
                        @endif
                       </td>
                      <td>{{$item->isi_laporan}}</td>
                      <td>
                        @php
                            $tanggapan = Tanggapan::where('pengaduan_id', $item->id)->first();
                        @endphp
                        @if ($tanggapan)
                            {{$tanggapan->isi_tanggapan}} <br><br> Ditanggapi oleh : {{$tanggapan->users->name}}
                        @else
                            <i>Menunggu Tanggapan</i>
                        @endif
                      </td>
                      <td>
                       
                        <i>{{$item->status}}</i> 
                      </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>








@endsection