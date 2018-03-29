<?php

/**
 * Places
 * @version 0.4
 * @author Daniel Huidobro <daniel.hui287@gmail.com>
 * Controlador de lugares
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Places extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('places_tb'));
        $this->load->helper('url');
    }

    /**
     * lugares
     * @version 0.1
     * Template creative con el rollo del mapa
     */
    public function index() {
        $this->load->view('creative');
    }

    /**
     * admin
     * @version 0.1
     * @access logged
     * Panel de administracion de lugares
     */
    public function admin() {
        if (!$this->session->userdata('logged')) {
            redirect('/');
        }
        $places = $this->places_tb->get_all();
        $dataView = array(
            'places' => $places
        );
        $this->load->view('admin', $dataView);
    }

    /**
     * form
     * @version 0.4
     * @access logged
     * Agregar, editar un lugar un lugar
     */
    public function form($id = FALSE) {
        if (!$this->session->userdata('logged')) {
            redirect('/');
        }
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Adress', 'required|trim');
        $this->form_validation->set_rules('latitud', 'Latitud', 'required|decimal');
        $this->form_validation->set_rules('longitud', 'Longitud', 'required|decimal');

        if ($this->form_validation->run() == FALSE) {
            if ($id) {
                $place = $this->places_tb->read($id);
                $this->load->view('form', array('place' => $place));
            } else {
                $this->load->view('form');
            }
        } else {
            $dataPlace = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'lat' => $this->input->post('latitud'),
                'lng' => $this->input->post('longitud'),
                'id_user' => $this->session->userdata('id')
            );

            if ($this->input->post('description')) {
                $dataPlace['description'] = $this->input->post('description');
            }

            if (!empty($_FILES['image']) && $_FILES['image']['error'] == 0) {

                $extPic = '';
                switch ($_FILES['image']['type']) {
                    case 'image/png':
                        $extPic = '.png';
                        break;
                    default:
                        $extPic = '.jpg';
                }

                $picture = md5(date('YmdHis')) . $extPic;

                $config['upload_path'] = 'uploads';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $picture;
                $config['max_size'] = '4096';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    error_log(json_encode($this->upload->display_errors()));
                    redirect('/places/form/' . $id . '?message=error');
                }

                $dataPlace['image'] = $picture;
            }

            //Marranada u.u 
            //hacer otra funcion
            if ($id) {
                $place = $this->places_tb->read($id);
                if (!$place) {
                    redirect('/places/form/' . $id . '?message=error');
                } else {
                    if ($this->places_tb->update($dataPlace, $id)) {
                        redirect('/places/form/' . $id . '?message=success');
                    } else {
                        redirect('/places/form/' . $id . '?message=error');
                    }
                }
            } else {
                $this->load->helper('friendly_url');
                $dataPlace['url'] = friendly_url($this->input->post('name'));
                if ($this->places_tb->create($dataPlace)) {
                    redirect('/places/form?message=success');
                } else {
                    redirect('/places/form?message=error');
                }
            }
        }
    }

    /**
     * delete
     * @version 0.1
     * @param int $id_place id de lugar en la tabla places
     * @return json estatus de la transaccion
     * Elimina un registro de la base de datos
     */
    public function delete() {
        if (!$this->session->userdata('logged')) {
            return $this->ajax_response(403, FALSE, 'No estas autorizado');
        }

        $id_place = $this->input->post('id_place');
        $place = $this->places_tb->read($id_place);

        if (!$place) {
            return $this->ajax_response(404, FALSE, 'No existe el registro');
        }

        if ($this->places_tb->delete($id_place)) {
            return $this->ajax_response(200, TRUE, 'Registro eliminado');
        } else {
            return $this->ajax_response(500, FALSE, 'Ocurrio un error, intenta mas tarde');
        }
    }

    /**
     * place
     * @param string $url url del lugar
     */
    public function view($url) {
        $place = $this->places_tb->sort(array('url' => $url))[0];
        $data_view = array('place' => $place);
        $this->load->view('place', $data_view);
    }

    /**
     * places_json
     * @version 0.1
     * @deprecated since version 0.2
     * @uses controlador API metodo get
     * @return json de los lugares
     * Listado de lugares en json
     */
    public function places_json() {
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
