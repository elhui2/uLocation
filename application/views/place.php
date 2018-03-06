<?php
/**
 * admin
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
        <title><?php echo $place['name'] ?></title>
    </head>
    <body>
        <?php $this->load->view('menu'); ?>
        <div class="container margin-top">
            <div class="row" id="messenger"></div>
            <h2><?php echo $place['name'] ?></h2>
            <p><?php echo $place['address'] ?></p>
            <div>
                <?php echo $place['description'] ?>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/macehuales.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/assets/js/admin.js"></script>
</html>