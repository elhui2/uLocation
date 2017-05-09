<?php

/**
 * Users
 * @version 0.1
 * @author Daniel Huidobro <daniel.hui287@gmail.com>
 * Controlador de usuarios
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_tb');
        $this->load->helper('url');
    }

    /**
     * login
     * @version 0.1
     * Ingreso al sistema
     */
    public function index() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $user = $this->users_tb->login($this->input->post('email'), md5($this->input->post('password')));
            if (!$user) {
                redirect('/login?message=login-error');
            }
            $this->session->set_userdata($user);
            redirect('/places/admin');
        }
    }

    /**
     * logout
     * @version 0.1
     * Salir del sistema
     */
    public function logout() {

        $this->session->sess_destroy();
        redirect('/');
    }

}
