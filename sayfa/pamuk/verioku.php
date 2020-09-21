<?php 

$pamukcek=z(1,"ORDER BY ID DESC",'','pamuk');
$pamukcek=$pamukcek[0];
$pamukcektarih=$pamukcek['tarih'];
$pamukcektarih=z('tarih',$pamukcektarih);
$tarih=z('tarih');

if($tarih!=$pamukcektarih||empty($pamukcek)){
    $curl=curl_init();//CURL BAŞLATMA
    $adres='https://www.investing.com/commodities/us-cotton-no.2';
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/20100101 Firefox/19.0");
    curl_setopt($curl,CURLOPT_URL,$adres);//CURL ADRES BELİRLEME
    curl_setopt($curl,CURLOPT_POST,true);//CURL POST ONAYI
    $gelenveri = curl_exec($curl);//ÇALIŞTIR
        curl_close($curl);//KAPAT
?>

<script>
$( document ).ready(function() {
    var kapanis = $( ".bold li:nth-child(1) span:nth-child(2)" ).html();
    var acilis  = $( ".bold li:nth-child(2) span:nth-child(2)" ).html();
    location.reload();
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=pamuk&a=verikaydet&acilis="+acilis+"&kapanis="+kapanis,
                success:function(gelensorgu){
                    if(gelensorgu.sonuc==1){
                        
                    }
                }
            });
});
</script>
<?php } ?>