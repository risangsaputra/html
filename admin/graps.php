<?php $ip=$_GET['ip']; 

if (empty($_SESSION['username'])) {
  include "index.php";
}
else{

?>


<div class="row">
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Grafik <?php echo "$ip"; ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="revenue-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>

        <script type="text/javascript">
          $(function () {
    "use strict";
    // AREA CHART
    var area = new Morris.Area({
      element: 'revenue-chart',
      resize: true,
      data: [
      <?php
                  include "../koneksi.php";
                  $sql = "select * from traffic WHERE ip='$ip'";
                  $result = mysqli_query($konek,$sql);
                 
               
                  while ($data=mysqli_fetch_array($result)) {
                    $tanggal=$data['tanggal'];
                    $delay=$data['delay'];
                    $jitter=$data['jitter'];
                ?>
        {y: '<?php echo $tanggal; ?>', <?php echo "delay:$delay"; ?> , <?php echo "jitter:$jitter"; ?>}, <?php } ?>
      ],
      xkey: 'y',
      ykeys: ['delay', 'jitter'],
      labels: ['Delay', 'Jitter'],
      lineColors: ['#a0d0e0', '#3c8dbc'],
      hideHover: 'auto'
    });
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
        </script>

        <?php } ?>