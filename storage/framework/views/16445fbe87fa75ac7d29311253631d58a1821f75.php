<?php $__env->startSection('content'); ?>
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                <?php if(Auth::guest()): ?>
                    <img class="img-responsive" alt="" src="<?php echo e(url('penggajian/img/lock.png')); ?>">
                    <div class="intro-text">
                        <span class="name">SELAMAT DATANG</span>
                        <hr class="star-light">
                        <span class="skills">Anda Tidak Meiliki Hak Akses , Anda Harus Login/Registrasi Terlebih Dahulu!</span>
                    </div>
                    <?php else: ?>
                    
                    <div class="intro-text">
                        <h1><b><font face="Maiandro GD" color="white"><center>TUNJANGAN</center></font></b></h1>
                        <hr class="star-light">
                        
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
<br>
	 <div class="right_col" role="main">
          <div class="">
<h1><b><font face="Maiandro GD" color="white"><center>Data Tunjangan</center></font></b></h1>
            <div class="clearfix"></div>
 <center><a href="<?php echo e(url('Tunjangan/create')); ?>" class="btn btn-primary">Input Data Tunjangan<i class="fa fa-pencil"></i></a></center>
            <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                  <div class="x_title">
                 <hr>
                 
                 
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr class="danger">
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Kode Tunjangan</center></p></th>
                          <th><p class="center"><center>Nama Jabatan</center></p></p></th>
                          <th><p class="center"><center>Nama Golongan</center></p></p></th>
                          <th><p class="center"><center>Status</center></p></p></th>
                          <th><p class="center"><center>Jumlah Anak</center></p></p></th>
                          <th><p class="center"><center>Besaran Uang</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php $no=1; ?>
                         <?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr>
                                 <th><center><?php echo e($no++); ?></center></th>
                                 <th><center><?php echo e($data->Kode_tunjangan); ?></center></th>
                                 <th><center><?php echo e($data->Jabatan->Nama_jabatan); ?></center></th>
                                 <th><center><?php echo e($data->Golongan->Nama_golongan); ?></center></th>
                                 <th><center><?php echo e($data->Status); ?></center></th>
                                 <th><center><?php echo e($data->Jumlah_anak); ?></center></th>
                                 <th><center><?php echo 'Rp.'. number_format($data->Besaran_uang, 2,",","."); ?></center></th>
                                 <th><a href="<?php echo e(url('Tunjangan',$data->id)); ?>" class="btn btn-primary"><i class="fa fa-eye">Lihat</i></a></th>
                                 <th><a title="Edit" href="<?php echo e(route('Tunjangan.edit',$data->id)); ?>" class="btn btn-warning"><i class="fa fa-edit">Edit</i></a></th>
                                 <th>
                                   <a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="fa fa-trash">Hapus</i></a>
                                  <?php echo $__env->make('modals.del', [
                                    'url' => route('Tunjangan.destroy', $data->id),
                                    'model' => $data
                                  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                 </th>
                             </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>