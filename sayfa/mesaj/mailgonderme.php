<?php 




//bu alan mail uygulamasının kullanımına bir örnektir... bu alan sistemde çalışmaz gerekmedikçe değişiklik yapmayınız örnek amaçlı yapılmıştır.

$kime='halilbarim@gmail.com';
$konu='Kayteks ERP Otomasyon Bilgilendirme';
$gonderenAdi='Halil';
$replyPosta='noreplyl@gmail.com';
$mesaj='merhana nasılsınız';
//if(!empty($icerik)){$icerik='';}

//$icerik=file_get_contents('/var/www/cloud.kayteks.com/sayfa/mesaj/mailSablon.html');

//$_icerik='	<table style="background-color: #F5F9FA; padding: 50px 0; width: 100%"><tr><td><table align="center" width="95%" style="font-family: sans-serif; table-layout: fixed; margin: 0 auto; background: #fff; width: 95%; padding: 50px; border-radius: 4px; box-shadow: 0 3px 6px rgba(0,0,0,0.16); max-width: 1300px"><tr><td><div class="main-header" style="margin-top: 20px;  font-weight: 700; width: 100%; color:#358bfc; font-size: 25px;">Halil Bey den Mesaj Var...!</div></td></tr><tr><td><div class="header-style" style=" position:relative; width: 100%; margin-left: 88%; margin-top: 5px; margin-bottom: 15px; background: #fff; font-size: 15px; font-weight: 700;">16.07.2020 11:00</div><div rules="all" style=" margin-top:20px; border: 3px solid  #a78730; padding: 30px; border-radius: 50px 20px; color: #000;" cellpadding="13"; width="100%"><div>METİN</div></div></tr></td></table></tr></td></table>';

$icerik=$_icerik;

$_icerik='<table style="background-color: #F5F9FA; padding: 50px 0; width: 100%">
<tr><td>
        <table align="center" width="95%" style="font-family: sans-serif;  table-layout: auto; margin: 0 auto; background: rgb(253, 243, 214); width: 95%; padding: 50px; border-radius:  4px; box-shadow: 0 3px 6px rgba(0,0,0,0.16); max-width: 500px">
        <tr><td>
                <div><img style="width: 250px; margin-bottom:10px;" src="http://93.113.61.114/img/kaytekslogomuzz.png" alt=""></div>
                
                <table rules="all" style=" color: #000; table-layout: auto;" cellpadding="13"; width="100%">
                        <tr >
                                <td  style="position: relative;" > <div style="font-weight: bold; width: 50%; font-style: italic; margin-right:215px;">Gönderen Adı:</div>  <p style="display: block; position:absolute; top:0; right:0; height:100%; left:80% ;">'.$gonderenAdi.'</p>    </td>
                            
                        </tr>
                        <tr>
                            <td  style="position: relative;" > <div style="font-weight: bold; width: 50%; font-style: italic; margin-right:215px;">Gönderdiği Tarih</div>  <p style="display: block; position:absolute; top:0; right:0; height:100%; left:80% ;">'.z('datetime').'</p>    </td>
                            
                        </tr>
                        <tr>
                                <td style="font-weight: bold; width: 50%; font-style: italic;">'.$mesaj.':</td>
                                
                        </tr>
                        <tr>
                                
                                <td style="width: 100%; font-style: italic;"> “asdasdasdasdasd asfsfsadfşsmfpğiaıkğfksç. pskdfiğkasğ vcxjkgağkd çvcpaıwğerimsaşçe”</td>
                        </tr>
                    </table>
        </tr></td>
        </table>';


//__($icerik);
//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta);





?>

