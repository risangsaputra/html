<?php

if (empty($_SESSION['username'])) {
  include "index.php";
}
else{ ?><!-- /.row -->
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
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  include "../koneksi.php";
                  $sql = "select * from admin";
                  $result = mysqli_query($konek,$sql);
                  $i=1;
               
                  while ($data=mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['email']; ?></td>
                  <td><?php echo $data['username']; ?></td>
                  <td><?php echo $data['level']; ?></td>
                  <?php if ($level==1) { ?>
                  <td><a href="?act=delete_user&id_admin=<?php echo $data['id_admin'];?>" title="Delete" onclick="return confirm('Apakah anda yakin akan menghapus pertanyaan ini ?')"><i class="fa fa-fw fa-trash-o"></i></a><a href="?act=user_edit&id_admin=<?php echo $data['id_admin'];?>" title="edit"><i class="fa fa-fw fa-pencil"></i></a></td> 
                  <?php } 
                      else ?>
                  <td></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>username</th>
                  <th>Level</th>
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