<?php

/**
 * Api
 * @version 0.2
 * @author Daniel Huidobro <daniel.hui287@gmail.com>
 * Controlador del api
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('places_tb'));
    }

    /**
     * api
     * @version 0.2
     * docs del api
     */
    public function index() {
        $this->load->helper('url');
        $this->load->view('api/apidoc');
    }
    
    public function get(){
        if ($this->input->get('lat') && $this->input->get('lng')) {
            $this->session->set_userdata('lat', $this->input->get('lat'));
            $this->session->set_userdata('lng', $this->input->get('lng'));
            $places = $this->places_tb->get_all($this->session->userdata('lat'), $this->session->userdata('lng'));
        } else {
            $places = $this->places_tb->get_all();
        }
        if ($places) {
            return $this->ajax_response(200, TRUE, 'Listado de lugares', $places);
        } else {
            return $this->ajax_response(204, FALSE, 'No hay lugares');
        }
    }

    /**
     * ajax_response
     * Todas las repuestas para ajax en json
     * @version 0.1
     * @param int $code Codigo http de la transaccion
     * @param boolean $status Estatus de la operacion
     * @param string $message Mensaje de la transaccion
     * @param array $response Datos de la transaccion OPCIONAL
     * @return json
     */
    protected function ajax_response($code, $status, $message, $response = NULL) {

        $resTranza = array(
            'code' => $code,
            'status' => $status,
            'message' => $message,
            'response' => $response
        );

        return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($resTranza));
    }

}
