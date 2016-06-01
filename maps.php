 <div id="map"></div>

    <script>
      // initialize the map
    var map = L.map('map').setView([-0.789275, 113.92132700000002], 5);

     // load a tile layer
    L.tileLayer( 'http://{s}.mqcdn.com/tiles/1.0.0/map/{z}/{x}/{y}.png', {
      attribution: '&copy;  ',
      subdomains: ['otile1','otile2','otile3','otile4']
    }).addTo( map );

    var LeafIcon = L.Icon;
    var konek = new LeafIcon({iconUrl: "img/konek.png",iconAnchor: [13, 39],popupAnchor: [0, -33]}),
        fail = new LeafIcon({iconUrl: "img/fail.png",iconAnchor: [13, 39],popupAnchor: [0, -33]});
            <?php 
                        include "koneksi.php";  
                        $sql="SELECT * FROM router ";
                        $qry=mysqli_query($konek,$sql);
                        while ($data=mysqli_fetch_array($qry)) {
                        $id_router  =$data['id_router'];
                        $lokasi     =$data['lokasi'];
                        $lat        =$data['lat'];
                        $lng        =$data['lng'];
                        $cabang     =$data['cabang'];
                        $ip         =$data['ip'];
                        $keterangan  =$data['keterangan'];
                        ?>    
            
              
          <?php

            $str = exec("ping -n 1 -w 1 $ip", $input, $result);
            if ($result == 0){
            echo  "L.marker([$lat, $lng],{icon:konek}).bindPopup('$ip <br> $lokasi <br> Connected!!').addTo(map);";
            }else{
             echo  "L.marker([$lat, $lng],{icon:fail}).bindPopup('$ip <br> $lokasi <br> Disconnect!!').addTo(map);";
            }
                ?>

       
             var polyline = L.polyline([
            [<?php echo "$lat"; ?>, <?php echo "$lng"; ?>],[<?php echo "$cabang"; ?>],],
            {
              <?php

            $str = exec("ping -n 1 -w 1 $ip", $input, $result);
            if ($result == 0){
            echo  "color: 'green',";
            }else{
             echo  "color: 'red',";
            }
                ?>
                
                weight: 2,
                opacity: .7,
                lineJoin: 'round'
            }
            ).addTo(map);
             <?php } ?>
  </script>