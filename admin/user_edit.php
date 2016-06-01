<?php
if (empty($_SESSION['username'])) {
  include "index.php";
}
else{ 
include '../koneksi.php';
$id_admin=$_GET['id_admin'];
$sql="SELECT * FROM admin WHERE id_admin='$id_admin'";
$qry=mysqli_query($konek,$sql);
$data=mysqli_fetch_array($qry);

?>

<div class="row">
  <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="user_edit_simpan.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputName">Nama </label>
                  <input type="text" class="form-control" name="nama" id="exampleInputName" value='<?php echo $data['nama']; ?>' placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='<?php echo $data['email']; ?>' placeholder="Masukkan email">
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername">Username</label>
                  <input type="text" class="form-control" name="username" id="exampleInputPassword1" value='<?php echo $data['username']; ?>' placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">Re-Password</label>
                  <input type="password" class="form-control" name="password2" id="exampleInputPassword1" placeholder="Re-Password" required="">
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select  class="form-control" name="level">
                    <option value="0">User</option>
                    <option value="1">Super user</option>
                  </select>
                </div>
                <input type="text" hidden name="id_admin" value='<?php echo $data['id_admin']; ?>'></input>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
  </div>
</div>

<?php } ?>