//Pruebas de geolocalizacion
CREATE FUNCTION distancia_entre(lat1 DOUBLE, lon1 DOUBLE, lat2 DOUBLE, lon2 DOUBLE)
RETURNS DOUBLE DETERMINISTIC
RETURN ACOS( SIN(lat1*PI()/180)*SIN(lat2*PI()/180) + COS(lat1*PI()/180)*COS(lat2*PI()/180)*COS(lon2*PI()/180-lon1*PI()/180) ) * 6367
6367 and miles would be 3957

Cambio parametros de mi computadora linux
geo.wifi.uri
https://www.googleapis.com/geolocation/v1/geolocate?key=%GOOGLE_API_KEY%
file:///home/elhui2/location.json