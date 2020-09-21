<h3>My Google Maps Demo</h3>
<!--The div element for the map -->
<div id="map"></div>
<!-- Replace the value of the key parameter with your own API key. -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk&callback=initMap">
</script>
<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -21.344, lng: 31.036};
  var memed = {lat: -20.344, lng: 33.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: memed});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
  
   var maerker = new google.maps.Marker({position: memed, map: map});
}
</script>

<iframe frameborder="0" scrolling="auto" height="195" width="555" allowtransparency="true" marginwidth="0" marginheight="0" src="https://sslfxrates.forexprostools.com/index_exchange.php?params&inner-border-color=%23CBCBCB&border-color=%23cbcbcb&bg1=%23F6F6F6&bg2=%23ffffff&inner-text-color=%23000000&currency-name-color=%23000000&header-text-color=%23FFFFFF&force_lang=10" align="center"></iframe><br /><div style="width:540px"><a href="http://tr.investing.com" target="_blank"><img src="https://wmt-invdn-com.akamaized.net/forexpros_tr_logo.png" alt="Investing.com" title="Investing.com" style="float:left" /></a><span style="float:right"><span style="font-size: 11px;color: #333333;text-decoration: none;">Döviz Kurları <a href="https://tr.investing.com/" rel="nofollow" target="_blank" style="font-size: 11px;color: #06529D; font-weight: bold;" class="underline_link">Investing.com Türkiye</a> tarafından sağlanmaktadır.</span></span></div>