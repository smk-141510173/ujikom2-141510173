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
                        <h1><b><font face="Maiandro GD" color="white"><center>PEGAWAI</center></font></b></h1>
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
<h1><b><font face="Maiandro GD" color="white"><center>Data Pegawai</center></font></b></h1>
            <div class="clearfix"></div>
 <center><a href="{{url('Pegawai/create')}}" class="btn btn-primary">Input Data Pegawai<i class="fa fa-pencil"></i></a></center>
            <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                  <div class="x_title">
                 <hr>
                 
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr class="bg-danger">
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>NIP</center></p></th>
                          <th><p class="center"><center>Nama</center></p></th>
                          <th><p class="center"><center>Jabatan</center></p></p></th>
                          <th><p class="center"><center>Golongan</center></p></p></th>
                          <th><p class="center"><center>Photo</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php $no=1; ?>
                         @foreach ($pegawai as $data)
                             <tr>
                                 <th><center>{{ $no++ }}</center></th>
                                 <th><center>{{ $data->Nip }}</center></th>
                                 <th><center>{{ $data->User->name }}</center></th>
                                 <th><center>{{ $data->Jabatan->Nama_jabatan }}</center></th>
                                 <th><center>{{ $data->Golongan->Nama_golongan }}</center></th>
                                 <th><center><img src="{{asset('/image/'.$data->Photo)}}" height="120px" width="100px"></center></th>
                                <td><center><a href="{{ url('Pegawai', $data->id) }}" class="btn btn-primary">Lihat</a></center></td>
                                <td><center><a href="{{ route('Pegawai.edit', $data->id) }}" class="btn btn-warning">Edit</a></center></td>

                                 <th>


                                   <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i>hapus</a>
                                  @include('modals.del', [
                                    'url' => route('Pegawai.destroy', $data->id),
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