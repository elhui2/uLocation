/**
 * places
 * @version 0.3
 * Script de la vista places
 */

var CurLat = 19.432536;
var CurLng = -99.133227;
var map, marker, position;
var markers = [];

var mapOptions = {
    zoom: 11,
    center: new google.maps.LatLng(CurLat, CurLng),
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

function centerMap(position) {
    var googleLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    map.setCenter(googleLatLng);
    marker.setPosition(googleLatLng);
}

jQuery(document).ready(function ($) {
    
    map = new google.maps.Map(document.getElementById('tenochtitlan'), mapOptions);
    
    if ($('#user_lat').val() === undefined) {
        console.debug('No hay ubicación');
        get_places();
    } else {
        console.debug('Hay ubicación');
        CurLat = $('#user_lat').val();
        CurLng = $('#user_lng').val();
        get_places(CurLat, CurLng);
        current_position();
    }
    
    $('#ubicacion').click(function () {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (coordenadas) {
                get_places(coordenadas.coords.latitude, coordenadas.coords.longitude);
                CurLat = coordenadas.coords.latitude;
                CurLng = coordenadas.coords.longitude;
                setCenter(CurLat,CurLng,15);
                current_position();
            });
        } else {
            alert('Este navegador es algo antiguo, actualiza para usar el API de localización');
        }
    });

    setCenter(CurLat,CurLng,13);

});

function addRow(marker) {
    var distancia;
    if (marker.distancia !== undefined) {
        distancia = Math.floor(marker.distancia);
    } else {
        distancia = 'N/A';
    }
    var row = '<div class="media row-item" lat="' + marker.lat + '" lng="' + marker.lng + '">' +
            '<div class="media-body">' +
            '<h6 class="media-heading strong">' + marker.name + '</h6>' +
            '<p>' + marker.address + ' <br>A ' + distancia + ' Km de distancia</p>' +
            '<a class="btn btn-sm btn-info" href="https://maps.google.com/maps?saddr=' + CurLat + ' ' + CurLng + '&amp;daddr=' + marker.lat + ' ' + marker.lng + '" target="_blank">Como llegar?</a>' +
            '<a class="btn btn-sm btn-info" href="/lugares/'+marker.url+'">Más</a>' +
            '</div> ' +
            '</div>';

    $('#places').append(row);

}

// Adds a marker to the map and push to the array.
function addMarker(marker) {
    addRow(marker);
    var lat = parseFloat(marker.lat);
    var lng = parseFloat(marker.lng);
    var latlng = new google.maps.LatLng(lat, lng);

    var contentInfo = '<p>' + marker.name + '</p>';
    var infoWindow = new google.maps.InfoWindow({
        content: contentInfo
    });

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: 'Click to zoom',
//        icon: '../images/pin-hrc.png'
    });

    marker.addListener('click', function () {
        infoWindow.open(map, marker);
    });

    markers.push(marker);

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
    $('#places').html('');
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
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

//Convertir en funcion de jQuery
function get_places(lat = false, lng = false) {
    clearMarkers();
    var params = null;
    if (lat & lng) {
        params = {
            'lat': lat,
            'lng': lng
        }
    }
    $.get("/places/places_json", params, function (data) {
        if (!data.status) {
            return;
        }

        var cagaderos = data.response;

        for (var i = 0; i < cagaderos.length; i++) {
            addMarker(cagaderos[i]);
        }

    });

    setTimeout(function () {
        $('.row-item').click(function () {
            var row = $(this);
            $('.row-item').removeClass('activo');
            setCenter(row.attr('lat'), row.attr('lng'), 13);
            row.addClass('activo');
        });
    }, 1000);
}

function current_position(){
    var latlng = new google.maps.LatLng(CurLat, CurLng);

    var contentInfo = '<p>Estamos aquí!</p>';
    var infoWindow = new google.maps.InfoWindow({
        content: contentInfo
    });

    var position = new google.maps.Marker({
        position: latlng,
        map: map,
        title: 'Nuestra Ubicación',
        icon: '/assets/ui/location-pin.png'
    });

    position.addListener('click', function () {
        infoWindow.open(map, position);
    });
    
    position.setMap(map);
}