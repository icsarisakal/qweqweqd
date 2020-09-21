
function initialize() {

	var db_name = $('.name');
	var db_ad = $('.ad');
	var db_adres = $('.adres');
	var db_lat = $('.lat');
	var db_long = $('.long');
	var cari_ID = $('.id');
	var db_renk = $('.color');
	var db_places = {};
	console.log(db_renk);
	color = ["red","blue","yellow","green","purple","orange"];
	//url_e = color[renk] + "-dot.png";
	for(var i=0;i<db_lat.length;i++){
		db_places[i] = {
			renk: db_renk[i]['defaultValue'],
		};

		 db_places[i] = {
			cari_ID: cari_ID[i]['defaultValue'],
			name: db_name[i]['defaultValue'],
			ad: db_ad[i]['defaultValue'],
			adres: db_adres[i]['defaultValue'],
			lat: db_lat[i]['defaultValue'],
			long: db_long[i]['defaultValue'],
			color: "http://maps.google.com/mapfiles/ms/icons/"+color[db_places[i]['renk']]+"-dot.png",
		};
	}
	
	var gmarkers=[];
	var mapOptions, marker, map, searchBox, city,
		infoWindow = '',
		addressEl = document.querySelector( '#map-search' ),
		latEl = document.querySelector( '.latitude' ),
		longEl = document.querySelector( '.longitude' ),
		element = document.getElementById( 'map-canvas' );
	city = document.querySelector( '.reg-input-city' );

	mapOptions = {
		// How far the maps zooms in.
		zoom: 3,
		// Current Lat and Long position of the pin/
		center: new google.maps.LatLng( 37.75359799, 29.11682 ),
		gestureHandling: 'greedy',

		// center : {
		// 	lat: -34.397,
		// 	lng: 150.644
		// },
		disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
		scrollWheel: true, // If set to false disables the scrolling on the map.
		draggable: true, // If set to false , you cannot move the map around.
		// mapTypeId: google.maps.MapTypeId.HYBRID, // If set to HYBRID its between sat and ROADMAP, Can be set to SATELLITE as well.
		// maxZoom: 11, // Wont allow you to zoom more than this
		// minZoom: 9  // Wont allow you to go more up.

	};

	/**
	 * Creates the map using google function google.maps.Map() by passing the id of canvas and
	 * mapOptions object that we just created above as its parameters.
	 *
	 */
	// Create an object map with the constructor function Map()
	map = new google.maps.Map( element, mapOptions ); // Till this like of code it loads up the map.
	var infowindow = new google.maps.InfoWindow();
	var filters = {};
	var sonuc;

	$("#slc-filter").change(function(){
		filters={};
		for(i=0; i<gmarkers.length; i++){
			gmarkers[i].setMap(null);
		}


		var country = $('#slc-filter option:selected').text();
		for (var i = 0; i < Object.keys(db_places).length;i++) {
			sonuc = db_places[i]['adres'].indexOf(country);

			if(country=="Tümü"){
				sonuc = 0;
			}
			if(sonuc!=-1){
			filters[i] = {
				cari_ID: db_places[i]['cari_ID'],
				name: db_places[i]['name'],
				ad: db_places[i]['ad'],
				adres: db_places[i]['adres'],
				lat: db_places[i]['lat'],
				long: db_places[i]['long'],
				color: db_places[i]['color'],
			};
			if(filters[i]==='undefined'){
				continue;
			}

			if(country!="Tümü"){
			var geocoder = new google.maps.Geocoder();
			geocoder.geocode( { 'address': country}, function(results, status) {
			   if (status == google.maps.GeocoderStatus.OK) {
				 map.setCenter(results[0].geometry.location);
				 map.fitBounds(results[0].geometry.viewport);
			   }
			 });
			}

			var beach = filters[i];
				var myLatLng = new google.maps.LatLng(beach['lat'], beach['long']);
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					title: beach[0],
					icon: beach['color'],
				});

				gmarkers.push(marker);
									
				if(country=="Tümü"){
					map.setCenter(marker.getPosition());
					map.setZoom(2);
				}
				else{
					map.setCenter(marker.getPosition());
					map.setZoom(3);
				}


				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					var adres = filters[i]['adres'].replace(/ /g,'+');
					// console.log(filters[i]);

					return function() {
					  infowindow.setContent("<div style=text-align:auto;><b>"+filters[i]['ad']+"</b><br>"+filters[i]['adres']+
					  "<br><span><a target=_blank href=https://www.google.com/maps/dir/current+position/"+adres+"><img style=max-width:20px src=\img\/gps.png></a>"+
					  "<a href=http://93.113.61.114/?s=cari&a=duzenle&id="+filters[i]['cari_ID']+
					  "><i style=margin-bottom:-5px;width:25;font-size:20; class=icon-pencil7 mr-3 icon-1x></i></a><a href=http://93.113.61.114/?s=cari&a=detay&id="+filters[i]['cari_ID']+
					  "><i style=margin-bottom:-5px;width:25;font-size:20; class=icon-file-stats></i></a></span>"+"</div>");
					  infowindow.open(map, marker);
					}
				  })(marker, i));

				  google.maps.event.addListener(marker, 'dblclick', function() {
					//map.setZoom(8);
					map.setCenter(marker.getPosition());
				});
		}
	}	

});

	/**
	 * Creates the marker on the map
	 *
	 */



	/* marker = new google.maps.Marker({
		position: mapOptions.center,
		//position: new google.maps.LatLng(locations[i][1], locations[i][2]), // Birden fazla marker ekliyor.
		map: map,
		// icon: 'http://pngimages.net/sites/default/files/google-maps-png-image-70164.png',
		draggable: true
	});*/


	/**
	 * Creates a search box
	 */
	//searchBox = new google.maps.places.SearchBox( addressEl );

	/**
	 * When the place is changed on search box, it takes the marker to the searched location.
	 */
/*	google.maps.event.addListener( searchBox, 'places_changed', function () {
		var places = searchBox.getPlaces(),
			bounds = new google.maps.LatLngBounds(),
			i, place, lat, long, resultArray,
			addresss = places[0].formatted_address;

		for( i = 0; place = places[i]; i++ ) {
			bounds.extend( place.geometry.location );
			marker.setPosition( place.geometry.location );  // Set marker position new.
		}



		map.fitBounds( bounds );  // Fit to the bound
		map.setZoom( 20 ); // This function sets the zoom to 15, meaning zooms to level 15.

		lat = marker.getPosition().lat();
		long = marker.getPosition().lng();
		latEl.value = lat;
		longEl.value = long;

		resultArray =  places[0].address_components;

		// Get the city and set the city input value to the one selected
		for( var i = 0; i < resultArray.length; i++ ) {
			if ( resultArray[ i ].types[0] && 'administrative_area_level_1' === resultArray[ i ].types[0] ) {
				citi = resultArray[ i ].long_name;
				city.value = citi;
			}
		}


						var address_info = [];
						for (var i = 0; i < resultArray.length; i++) {
							if(typeof resultArray[i]['types'][0] !== 'undefined' && resultArray[i]['types'][0].length > 0){
								address_info[resultArray[i]['types'][0]] = resultArray[i]['long_name'];
							}
						}
		// Closes the previous info window if it already exists
		if ( infoWindow ) {
			infoWindow.close();
		}
		/**
		 * Creates the info Window at the top of the marker
		 */
		/*infoWindow = new google.maps.InfoWindow({
			content: addresss
		});

		infoWindow.open( map, marker );
	});*/


	/**
	 * Finds the new position of the marker when the marker is dragged.
	 */
/*	google.maps.event.addListener( marker, "dragend", function ( event ) {
		var lat, long, address, resultArray, citi;

		console.log( 'i am dragged' );
		lat = marker.getPosition().lat();
		long = marker.getPosition().lng();
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode( { latLng: marker.getPosition() }, function ( result, status ) {
			if ( 'OK' === status ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
				address = result[0].formatted_address;
				resultArray =  result[0].address_components;
				// Get the city and set the city input value to the one selected
				for( var i = 0; i < resultArray.length; i++ ) {
					if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
						citi = resultArray[ i ].long_name;
						console.log( citi );
						city.value = citi;
					}
				}
				addressEl.value = address;
				latEl.value = lat;
				longEl.value = long;

			} else {
				console.log( 'Geocode was not successful for the following reason: ' + status );
			}

			// Closes the previous info window if it already exists
			if ( infoWindow ) {
				infoWindow.close();
			}

			/**
			 * Creates the info Window at the top of the marker
			 */
			/*infoWindow = new google.maps.InfoWindow({
				content: address
			});

			infoWindow.open( map, marker );
		} );
	});*/
}
