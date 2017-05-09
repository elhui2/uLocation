<?php

/**
 * Users_tb
 * @version 1.0
 * @author Daniel Huidobro <daniel@geekvibes.mx>
 * Modelo de la tabla usuarios
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Users_tb extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * login
     * @version 0.1
     * @param type $email
     * @param type $password
     * @return boolean
     * Comprueba el usuario en la base de datos
     */
    public function login($email, $password) {
        $this->db->select('id,name,email,register_date,1 AS logged');
        $this->db->where('email', $email);
        $this->db->where('pasword', $password);
        $result = $this->db->get('users');

        if ($result->num_rows()) {
            return $result->row_array();
        } else {
            return FALSE;
        }
    }

}
