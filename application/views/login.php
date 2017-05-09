<?php
/**
 * login
 * @version 0.1
 * @author Daniel Huidobro <daniel@geekvibes.mx>
 * Vista de login
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Daniel Huidobro <daniel.hui287@gmail.com>">
        <meta name="description" content="Experimento de geolocalizacion">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>Entrar</title>
    </head>
    <body>
        <?php $this->load->view('menu'); ?>
        <div class="col-lg-4 col-lg-offset-4 login">
            <?php echo validation_errors(); ?>
            <?php
            if ($this->input->get('message')) {
                ?>
            
                <?php
            }
            ?>
            <h1 class="text-center">Entrar</h1>
            <form method="post">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-danger form-control">Entrar</button>
                </div>
            </form>
            <p class="text-center"><a href="#">Terminos y condiciones</a></p>
            <p class="text-center"><a href="#">Aviso de privacidad</a></p>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/macehuales.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>