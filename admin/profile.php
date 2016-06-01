<?php
if (empty($_SESSION['username'])) {
  include "index.php";
}
else{ ?>
<div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="gambar/<?php echo "$gambar"; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo "$nama"; ?></h3>

              <p class="text-muted text-center">Network Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <p class="text-center"><?php echo $email; ?></p>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
        </div>

        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="profil_update.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                  <input type="text" class="form-control" name="nama" id="exampleInputName" value='<?php echo "$nama"; ?>' placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='<?php echo "$email"; ?>' placeholder="Masukkan email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="username" id="exampleInputPassword1" value='<?php echo "$username"; ?>'placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required="">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password2" id="exampleInputPassword1" placeholder="Re-Password" required="">
                </div>
                <input type="text" name="id_admin" hidden="" value="<?php echo $id_admin ?>">
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
  </div>

</div>

<?php } ?>