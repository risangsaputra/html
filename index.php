
<head>
    <title>RSS-MON</title>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    

</head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#lol').load('maps.php').fadeIn("slow");
}, 10000); // refresh every 10000 milliseconds
</script>
<body>
<div id="lol"> </div>
</body>



