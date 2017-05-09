<?php
/**
 * menu
 * @version 0.1
 * @author Daniel Huidobro <daniel.hui287@gmail.com>
 * Vista del menu
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Inicio</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-right navbar-nav">                
                <?php if ($this->session->userdata('logged')) { ?>
                    <li><a href="/places/admin">Lugares</a> </li>
                    <li>
                        <a href="/logout">Salir</a> 
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>