<?php
    // Kullanım örneği
    zamanlanmisGorevEkle(array( 
        'gorevTipi'=>'epostaGonder',
        'tarihCalismaZamani'=>'2019-07-24',
        'oncelik'=>'0', // Önemsiz
        'parcaDizi'=>array( 
            array( 'eposta'=>'aaa@bbb.com', 'isim'=>'Aaa Bbb' ),
            array( 'eposta'=>'ddd@eee.net', 'isim'=>'Ddd Eee' )
        ),
        'ortakIcerik'=>array(
            'konu'=>'Herkese bu konu gönderilecek',
            'icerik'=>'Merhaba sayın kullanıcı. Bu bir deneme mail gönderimidir.'
        )
    ));
?>