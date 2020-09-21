<style type="text/css" rel="stylesheet">
html, body, #map-canvas {
	height: 100%;
	margin: 0;
	padding: 0;
}

#map-canvas {
    margin-top: 50px;
	height: 600px;
    width: 100%;
}

label {
	padding: 20px 10px;
	display: inline-block;
	font-size: 1.5em;
}

input {
    margin-top: 5px;

    margin-left: 25px;
	font-size: 0.75em;
	padding: 10px;
}
</style>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Konumları Görüntüle</title>
</head>
<body>
<label hidden for="">Address: <input id="map-search" class="controls" type="text" placeholder="Search Box" size="104"></label><br>
<label hidden for="">Lat: <input  name="map_lat" type="text" class="latitude"></label>
<label hidden for="">Long: <input  name="map_long" type="text" class="longitude"></label>
<label hidden for="">City <input type="text" class="reg-input-city" placeholder="City"></label>

<div style="margin-left:10px">
<b>
<img width=25px height=25px src="http://maps.google.com/mapfiles/ms/icons/red-dot.png" alt="">
<label style="color:red; margin-top:10px; padding:0%; font-size:11px;">Tedarikçi</label>
<img width=25px height=25px src="http://maps.google.com/mapfiles/ms/icons/yellow-dot.png" alt="">
<label style="color:#b6b90c; margin-top:10px; padding:0%; font-size:11px;">Potansiyel Müşteri</label>
<img width=25px height=25px src="http://maps.google.com/mapfiles/ms/icons/green-dot.png" alt="">
<label style="color:green; margin-top:10px; padding:0%; font-size:11px;">Mevcut Müşteri</label>
<b>
</div>
<div  style="width:25%; margin-left:10px; margin-bottom:-45px;" id="map-filter">
    <select  style="word-wrap:break-word;" class="form-control" name="slc-filter" id="slc-filter">
    <!-- <option selected="selected" value=' '>seçiniz</option> -->
    <option selected value='Tümü'>Tümü</option>
<?php 
       $country = z(1,'WHERE arsiv=0 AND country<>""','country','map');
       $country=array_values(array_unique($country));
        
       foreach($country as $key => $cntry){ echo $cntry;?>
        <option  value=<?php echo $key ?>><?php echo $cntry ?></option>
      <?php }?>
    </select>
</div>

<div id="map-canvas"></div>

<script type="text/javascript">
        $(document).ready(function(){

            if(document.URL.indexOf("#")==-1)
            {
                url = document.URL+"#";
                location = "#";

                location.reload(true);

            }
        });
    </script> 

<script src="sayfa/cari/map-2.js"></script>


<script>
$(document).ready(function () {
    $('select[id=slc-filter]').change(function () {
       // listele();
    });

    $("#slc-filter").trigger('change');
});
</script>

<script src="sayfa/cari/jquery-min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCU_8HRhB4QYKIrCoDesIY9ImMU-I1yWnY&libraries=places&callback=initialize"></script>
</body>
<br>


</html>

<?php   
    //_z(8);
        $data = z(1,'WHERE arsiv=0','','map');
       // __($data);
        for($i=0;$i<count($data);$i++){ 
            $info[$i] = z(1,'WHERE ID='.$data[$i]['cari_ID'],'ad,adres','cari');
            echo '
        <textarea hidden disabled type="text" class="name">'.$data[$i]['name'].'</textarea>
        <textarea hidden disabled type="text" class="ad">'.$info[$i][0]['ad'].'</textarea>
        <textarea hidden disabled type="text" class="adres">'.$data[$i]['full_address'].'</textarea>
        <input hidden disabled type="text" value= '.$data[$i]['color'].' class="color"> 
        <input hidden disabled type="text" value= '.$data[$i]['map_lat'].' class="lat"> 
        <input hidden disabled type="text" value= '.$data[$i]['cari_ID'].' class="id"> 
        <input hidden disabled type="text" value= '.$data[$i]['map_long'].' class="long"> <br> <br>'  ;    
    }
?>







