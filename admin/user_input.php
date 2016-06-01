<?php if (empty($_SESSION['username'])) {
  include "index.php";
}
else{  ?>
<div class="row">
  <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="user_simpan.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputName">Nama </label>
                  <input type="text" class="form-control" name="nama" id="exampleInputName" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Masukkan email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername">Username</label>
                  <input type="text" class="form-control" name="username" id="exampleInputPassword1" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">Re-Password</label>
                  <input type="password" class="form-control" name="password2" id="exampleInputPassword1" placeholder="Re-Password" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image Input</label>
                  <input type="file" id="exampleInputFile" name="gambar" required>
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