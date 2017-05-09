/**
 * places_form
 * @version 0.3
 * Obtiene la geolocalización de un lugar
 */
var CurLat = 19.432536;
var CurLng = -99.133227;
var map, marker, position;
var markers = [];

var mapOptions = {
    zoom: 7,
    center: new google.maps.LatLng(CurLat, CurLng),
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

function init() {

    map = new google.maps.Map(document.getElementById('mapa-places'), mapOptions);

}

function centerMap(position) {
    var googleLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    map.setCenter(googleLatLng);
    marker.setPosition(googleLatLng);
}

jQuery(document).ready(function ($) {
    init();

    var address = (document.getElementById('address'));

    var autocomplete = new google.maps.places.Autocomplete(address);

    autocomplete.setTypes(['geocode']);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            return;
        }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    });

    $('#ubicacion').click(function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(coordenadas);
        } else {
            alert('Este navegador es algo antiguo, actualiza para usar el API de localización');
        }
    });


});

// Adds a marker to the map and push to the array.
function addMarker(lat, lng, texto) {
    setMapOnAll(null);
    var latlng = new google.maps.LatLng(lat, lng);

    var contentInfo = '<p>' + texto + '</p>';
    var infoWindow = new google.maps.InfoWindow({
        content: contentInfo
    });

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: 'Click to zoom'
    });

    marker.addListener('click', function () {
        infoWindow.open(map, marker);
    });

    marker.setMap(map);

}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}

function clearRows() {
    $('#list-address').html('');
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    clearRows();
    markers = [];
}

function setCenter(lat, lng, zoom) {
    var latlng = new google.maps.LatLng(lat, lng);
    map.setCenter(latlng);
    map.setZoom(zoom);
}

function codeAddress() {
    geocoder = new google.maps.Geocoder();
    var address = document.getElementById("address").value;
    geocoder.geocode({'address': address}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            $('#posicion').val('(' + results[0].geometry.location.lat() + ',' + results[0].geometry.location.lng() + ')');
            $('#latitud').val(results[0].geometry.location.lat());
            $('#longitud').val(results[0].geometry.location.lng());
            setCenter(results[0].geometry.location.lat(), results[0].geometry.location.lng(), 18);
            addMarker(results[0].geometry.location.lat(), results[0].geometry.location.lng(), 'El lugar que quieres agregar');
        }

        else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

function coordenadas(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    $('#latitud').val(lat);
    $('#longitud').val(lng);
    $('#posicion').val('(' + lat + ',' + lng + ')');
    setCenter(lat, lng, 18);
    addMarker(lat, lng, 'Aquí es donde estás!');
}