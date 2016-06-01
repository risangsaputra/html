<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RSS-MON</title>
  <link rel="stylesheet" href="themes/base/jquery.ui.all.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
  <script src="src/jquery.ui.addresspicker.js"></script>
        <script>
        $(function() {
          var addresspicker = $( "#addresspicker" ).addresspicker({
            componentsFilter: 'country:FR'
          });
          var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
            regionBias: "fr",
            language: "fr",
            updateCallback: showCallback,
            mapOptions: {
              zoom: 4,
              center: new google.maps.LatLng(46, 2),
              scrollwheel: false,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            },
            elements: {
              map:      "#map",
              lat:      "#lat",
              lng:      "#lng",
              street_number: '#street_number',
              route: '#route',
              locality: '#locality',
              sublocality: '#sublocality',
              administrative_area_level_3: '#administrative_area_level_3',
              administrative_area_level_2: '#administrative_area_level_2',
              administrative_area_level_1: '#administrative_area_level_1',
              country:  '#country',
              postal_code: '#postal_code',
              type:    '#type'
            }
          });

          var gmarker = addresspickerMap.addresspicker( "marker");
          gmarker.setVisible(true);
          addresspickerMap.addresspicker( "updatePosition");

          $('#reverseGeocode').change(function(){
            $("#addresspicker_map").addresspicker("option", "reverseGeocode", ($(this).val() === 'true'));
          });

          function showCallback(geocodeResult, parsedGeocodeResult){
            $('#callback_result').text(JSON.stringify(parsedGeocodeResult, null, 4));
          }
          // Update zoom field
          var map = $("#addresspicker_map").addresspicker("map");
          google.maps.event.addListener(map, 'idle', function(){
            $('#zoom').val(map.getZoom());
          });

        });
        </script>
</head>
<body>
    <!-- search addres -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel">
            <div class="panel-logo">
              <a href="../../index.html"><b>ROUTER</b> | FIT</a>
            </div>
            <div class="panel-item">
              <div class="img-alamat">
               <img src="http://image.shutterstock.com/z/stock-vector-gps-map-icon-129222473.jpg">
              </div>
              <form class="panel-cred" action="simpan_router.php" method="POST">
                <div class="input-group">
                  <input type="text" class="form-control" name="lokasi" id="addresspicker_map" placeholder="Search address" required="">
                  <div class="input-group-btn">
                    <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                  </div>
                </div>

              
            </div>
            
          </div>
        </div>
      </div>
      <!-- end search addres -->

      <!-- search address item -->
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <div class="address-item">            
              <input type="text" class=" form-input" id="administrative_area_level_2" placeholder="Dsitric" readonly="">
              <input type="text" class=" form-input" id="administrative_area_level_1" placeholder="State_province" readonly="">
              <input type="text" class=" form-input" id="country" placeholder="Country" readonly="">
              <input type="text" class=" form-input" id="postal_code" placeholder="Postal Code" readonly="">
              <input type="text" class=" form-input" name="lat" id="lat" placeholder="Lat" readonly="">
              <input type="text" class=" form-input" name="lng" id="lng" placeholder="Lng" readonly="">
              <input type="text" class="ipaddress" name="ip" placeholder="Ip address" required="">
                <select name="cabang" required="">
                    <option value="" disabled selected>Cabang Dari</option>
                      <?php                                    
                        include "koneksi.php";
                        $sql="SELECT * FROM router ORDER BY lokasi ASC";
                        $qry=mysqli_query($konek,$sql); while ($data=mysqli_fetch_array($qry)) {
                        $lokasi     =$data['lokasi'];
                        $lng     =$data['lng'];
                        $lat     =$data['lat'];
                      ?>
                    <option value="<?php echo "$lat, $lng";?>"><?php echo "$lokasi";?></option>
                    <?php } ?>
              </select>
              <textarea placeholder="Keterangan Router" name="keterangan" required=""></textarea>
              </form>
        </div>
        </div>
      </div>
      <!-- end search address item -->
    </div>
</body>
</html>
