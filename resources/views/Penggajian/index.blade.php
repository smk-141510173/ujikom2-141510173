@extends('layouts.app')

@section('content')
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-2">
                @if (Auth::guest())
                    <img class="img-responsive" alt="" src="{{url('penggajian/img/lock.png')}}">
                    <div class="intro-text">
                        <span class="name">SELAMAT DATANG</span>
                        <hr class="star-light">
                        <span class="skills">Anda Tidak Meiliki Hak Akses , Anda Harus Login/Registrasi Terlebih Dahulu!</span>
                    </div>
                    @else
                    
                    <div class="intro-text">
                        <h1><b><font face="Maiandro GD" color="white"><center>PENGGAJIAN</center></font></b></h1>
                        <hr class="star-light">
                        
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
<br>
	 <div class="right_col" role="main">
          <div class="">
<h1><b><font face="Maiandro GD" color="white"><center>Data Penggajian</center></font></b></h1>
            <div class="clearfix"></div>
 <center><a href="{{url('Penggajians/create')}}" class="btn btn-primary">Input Data Penggajian<i class="fa fa-pencil"></i></a></center>
            <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                  <div class="x_title">
                 <hr>
                 
                  
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr class="bg-danger">
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Tunjangan</center></p></th>
                          <th><p class="center"><center>Jumlah Jam Lembur</center></p></th>
                          <th><p class="center"><center>Jumlah Uang Lembur</center></p></p></th>
                          <th><p class="center"><center>Gaji Pokok</center></p></p></th>
                          <th><p class="center"><center>Tanggal Pengambilan</center></p></p></th>
                          <th><p class="center"><center>Status Pengambilan</center></p></p></th>
                          <th><p class="center"><center>Petuga Penerima</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php $no=1; ?>
                         @foreach ($penggajian as $data)
                             <tr>
                                 <th><center>{{ $no++ }}</center></th>
                                 <th><center>{{ $data->Tunjangan_pegawai->tunjangan_pegawai_id }}</center></th>
                                 <th><center>{{ $data->Jumlah_jam }}</center></th>
                                 <th><center>{{ $data->Jumlah_lembur }}</center></th>
                                 <th><center>{{ $data->Gaji_pokok }}</center></th>
                                 <th><center>{{ $data->Total_gaji }}</center></th>
                                 <th><center>{{ $data->Tanggal_pengambilan }}</center></th>
                                 <th><center>{{ $data->Status_pengambilan }}</center></th>
                                 <th><center>{{ $data->Petugas_penerima }}</center></th>
                                 <th><a href="{{url('Penggajian',$data->id)}}" class="btn btn-primary"><i class="fa fa-eye">Lihat</i></a></th>
                                 <th><a title="Edit" href="{{route('Penggajian.edit',$data->id)}}" class="btn btn-warning"><i class="fa fa-edit">Edit</i></a></th>
                                 <th>
                                   <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="fa fa-trash">Hapus</i></a>
                                  @include('modals.del', [
                                    'url' => route('Penggajian.destroy', $data->id),
                                    'model' => $data
                                  ])
                                 </th>
                             </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection