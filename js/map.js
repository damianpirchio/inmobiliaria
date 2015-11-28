function initialize() {
  var myLatlng = new google.maps.LatLng(-35.661786,-63.771040); //coordenadas de ubicación
  var mapOptions = {
  zoom: 17, //zoom de tu mapa
  center: myLatlng, //centrar tu mapa
  scrollwheel: false, //si colocas true en vez de false el usuario podrá hacer scroll dentro del mapa
  draggable: true, //esta opción es la manito que aparece y es usado para desplazarse en el mapa
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  /*var contentString = '<img src="logo.png" width="200" style="display:block;margin:auto;"><p>101 N° 93 oeste</p>';*///imagen y dirección
  var contentString ="Pirchio Propiedades";
  var infowindow = new google.maps.InfoWindow({content: contentString});
  var marker = new google.maps.Marker({
  position: myLatlng,
  animation:google.maps.Animation.DROP,
  //icon: "icono-mapa.png", //icono de mapa
  map: map
  });
  infowindow.open(map,marker);
  google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
