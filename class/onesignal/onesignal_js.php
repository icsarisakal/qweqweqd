
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  function onesignalUserIdKaydet(){
    OneSignal.getUserId().then(function(userId){
      
      if(userId){
        ajaxGet('ajax.php?s=onesignal&a=user-id-kaydet&userId='+userId,function(sonucText){ 
          localStorage.onesignalUserId=userId;
          console.log("User Id Gönderim Sonucu: "+sonucText+  "LCSID: "+localStorage.onesignalUserId ); 
        });
      }
      else console.log("OneSignal'e Onay Verilmemiş.");

    });
  }
  function onesignalUserIdKaydetSurekli(){
    if(!localStorage.onesignalUserId||localStorage.onesignalUserId=="null"){
      onesignalUserIdKaydet();
      setTimeout(onesignalUserIdKaydetSurekli,6000);
    }
  }

  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "0eb6d819-fdda-400b-ac7b-bbc05dcf9e0c",
    });
    
    if(!localStorage.onesignalUserId||localStorage.onesignalUserId=="null"){
	    OneSignal.getUserId().then(function(userId){
        if(userId){
          console.log("OneSignal User ID Kaydet:", userId);
          ajaxGet('ajax.php?s=onesignal&a=user-id-kaydet&userId='+userId,function(sonucText){ 
            localStorage.onesignalUserId=userId;
            console.log("User Id Gönderim Sonucu: "+sonucText+  "LCSID: "+localStorage.onesignalUserId );  
          });
        }
        else console.log("OneSignal'e Onay Verilmemiş.");
	    });
    }


    OneSignal.on('addListenerForNotificationOpened', function(event) {
      alert("Bildirim üzerinden gelindi.");
    });

    onesignalUserIdKaydetSurekli();
  });
</script>