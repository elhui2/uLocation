<?php
/**
 * form.php
 * @version 0.3
 * @author Daniel Huidobro <daniel@geekvibes.mx>
 * Agregar un lugar
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Daniel Huidobro <daniel@rebootproject.mx>">
        <meta name="description" content="Template de geolocalización">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title><?php echo (isset($place)) ? 'Editar' : 'Agregar' ?> Lugar</title>
    </head>

    <body>
        <?php $this->load->view('menu'); ?>
        <div class="container-fluid">
            <div class="row" style="padding-top: 60px;">
                <h1 class="text-center"><?php echo (isset($place)) ? 'Editar' : 'Agregar' ?> Lugar</h1>
                <div class="col-lg-6">

                    <?php
                    if ($this->input->get('message')) {
                        if ($this->input->get('message') == 'success') {
                            ?>
                            <p class="alert alert-success">El registro se guardo satisfactoriamente</p>
                            <?php
                        }
                    }
                    echo validation_errors();
                    ?>

                    <form method="post">
                        <?php
                        if (isset($place)) {
                            ?>
                            <input type="hidden" name="id_place" id="id_place" value="<?php echo $place['id_place'] ?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Nombre del lugar" name="name" required value="<?php echo (isset($place)) ? $place['name'] : '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="address" placeholder="Calle, Numero, Colonia, Municipio, Codigo Postal" name="address" required value="<?php echo (isset($place)) ? $place['address'] : '' ?>">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="button" onclick="codeAddress()">Buscar</button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="posicion">Posición</label>
                            <input type="hidden" id="latitud" name="latitud" value="<?php echo (isset($place)) ? $place['lat'] : '' ?>">
                            <input type="hidden" id="longitud" name="longitud" value="<?php echo (isset($place)) ? $place['lng'] : '' ?>">
                            <input type="text" class="form-control" id="posicion" placeholder="posicion" readonly value="<?php echo (isset($place)) ? '(' . $place['lat'] . ',' . $place['lng'] . ')' : '' ?>">
                        </div>

                        <div class="form-group">
                            <textarea id="description" name="description"><?php echo (isset($place['description'])) ? $place['description'] : '' ?></textarea>
                        </div>

                        <div class="form-group">
                            <div class="btn-group">
                                <button type="button" class="btn btn-lg btn-primary" id="ubicacion"><span class="glyphicon glyphicon-globe"></span> Ubicación</button>
                                <button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>    
                <div class="col-lg-6">
                    <div class="map-col-6" id="mapa-places"></div>
                </div>
            </div>    
        </div>
    </body>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/macehuales.css">
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo gmaps_api_key ?>&libraries=places"></script>
    <script type="text/javascript" src="/assets/js/places_form.js"></script>
    <script type="text/javascript" src="<?php echo base_url("vendor/tinymce/tinymce/tinymce.min.js") ?>"></script>
</html>