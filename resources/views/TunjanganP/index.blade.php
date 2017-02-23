@extends('layouts.app')

@section('content')
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                @if (Auth::guest())
                    <img class="img-responsive" alt="" src="{{url('penggajian/img/lock.png')}}">
                    <div class="intro-text">
                        <span class="name">SELAMAT DATANG</span>
                        <hr class="star-light">
                        <span class="skills">Anda Tidak Meiliki Hak Akses , Anda Harus Login/Registrasi Terlebih Dahulu!</span>
                    </div>
                    @else
                    
                    <div class="intro-text">
                        <h1><b><font face="Maiandro GD" color="white"><center>TUNJANGAN PEGAWAI</center></font></b></h1>
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
<h1><b><font face="Maiandro GD" color="white"><center>Data Tunjangan Pegawai</center></font></b></h1>
            <div class="clearfix"></div>
 <center><a href="{{url('TunjanganP/create')}}" class="btn btn-primary">Input Tunjangan Pegawai<i class="fa fa-pencil"></i></a></center>
            <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                  <div class="x_title">
                 <hr>
                 
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr class="danger">
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Kode Tunjangan</center></p></th>
                          <th><p class="center"><center>Nama Pegawai</center></p></p></th>
                          <th><p class="center"><center>Jabatan</center></p></p></th>
                          <th><p class="center"><center>Golongan</center></p></p></th>
                          <th><p class="center"><center>Jumlah anak</center></p></p></th>
                          <th><p class="center"><center>Besaran Uang</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php $no=1; ?>
                         @foreach ($tp as $data)
                             <tr>
                                 <td><center>{{ $no++ }}</center></td>
                                 <td><center>{{ $data->Tunjangans->Kode_tunjangan }}</center></td>
                                 <td><center>{{ $data->Pegawai->User->name }}</center></td>
                                 <td><center>{{ $data->Pegawai->Jabatan->Nama_jabatan }}</center></td>
                                 <td><center>{{ $data->Pegawai->Golongan->Nama_golongan }}</center></td>
                                 <td><center>{{ $data->Tunjangans->Jumlah_anak }}</center></td>

                                 <td><center>
                                 <?php
                                 if($data->Tunjangans->Jumlah_anak<='1')
                                 {
                                  echo 'Rp'.number_format($data ->Tunjangans->Besaran_uang,2,",",".");
                                 }
                                 elseif ($data->Tunjangans->Jumlah_anak=='1' || $data->Tunjangans->Jumlah_anak == '2') 
                                 {
                                   echo 'Rp'.number_format($data->Tunjangans->Besaran_uang * $data->Tunjangans->Jumlah_anak,2,",",".");
                                 }
                                 elseif ($data->Tunjangans->Jumlah_anak >='2') 
                                 {
                                   echo 'Rp'.number_format($data->Tunjangans->Besaran_uang * $data->Tunjangans->Jumlah_anak,2,",",".");
                                 }

                                 ?>

                                </center></td>

                                 
                                 <th><a href="{{url('TunjanganP',$data->id)}}" class="btn btn-primary"><i class="fa fa-eye">Lihat</i></a></th>
                                 <th><a title="Edit" href="{{route('TunjanganP.edit',$data->id)}}" class="btn btn-warning"><i class="fa fa-edit">Edit</i></a></th>
                                 <th>
                                   <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="fa fa-trash">Hapus</i></a>
                                  @include('modals.del', [
                                    'url' => route('TunjanganP.destroy', $data->id),
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