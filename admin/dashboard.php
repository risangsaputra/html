<?php

if (empty($_SESSION['username'])) {
  include "index.php";
}
else{ ?>
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Router</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Lokasi</th>
                  <th>latitude</th>
                  <th>Langtitude</th>
                  <th>Ip</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  include "../koneksi.php";
                  $sql = "select * from router";
                  $result = mysqli_query($konek,$sql);
                  $i=1;
               
                  while ($data=mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $data['lokasi']; ?></td>
                  <td><?php echo $data['lat']; ?></td>
                  <td><?php echo $data['lng']; ?></td>
                  <td><?php echo $data['ip']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <?php if ($level==1) { ?> <td align=center><a href="?act=delete_router&id_router=<?php echo $data['id_router'];?>" title="Delete" onclick="return confirm('Apakah anda yakin akan menghapus pertanyaan ini ?')"><i class="fa fa-fw fa-trash-o"></i></a><a href="edit_router.php?id_router=<?php echo $data['id_router'];?>" title="edit"><i class="fa fa-fw fa-pencil"></i></a></td> <?php } else ?>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Lokasi</th>
                  <th>latitude</th>
                  <th>Langtitude</th>
                  <th>Ip</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<?php } ?>