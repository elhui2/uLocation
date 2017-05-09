<?php

/**
 * places_tb
 * @version 0.1
 * @author Daniel Huidobro <daniel.hui287@gmail.com>
 * Modelo de la tabla places
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Places_tb extends CI_Model {

    /**
     * env
     * Caracteristicas importantes de la tabla
     * "name" => "Nombre de la Tabla"
     * @var array 
     */
    protected $env;

    public function __construct() {
        parent::__construct();
        $this->env = array(
            'name' => 'places'
        );
    }

    /**
     * create
     * @version 0.1
     * @param array $dataRegister Array asociativo con los datos del registro
     * @return mixed array con el registro o false
     * Inserta un registro en la tabla
     */
    public function create($dataRegister) {
        if ($this->db->insert($this->env['name'], $dataRegister)) {
            return TRUE;
        }
    }

    /**
     * read
     * @version 0.1
     * @param type $idRegister Llave primaria del registro en la tabla
     * @return mixed array con el registro o false
     * Lee un registro de la tabla
     */
    public function read($idRegister) {
        $this->db->where('id_place', $idRegister);
        $result = $this->db->get($this->env['name']);
        return $result->result_array()[0];
    }

    /**
     * update
     * @version 0.1
     * @param array $dataRegister Array asociativo con los datos del registro
     * @param int $idRegister Llave primaria del registro en la tabla
     * Actualiza n registro en la tabla
     */
    public function update($dataRegister, $idRegister) {
        $this->db->where('id_place', $idRegister);
        if ($this->db->update($this->env['name'], $dataRegister)) {
            return $this->read($idRegister);
        } else {
            return FALSE;
        }
    }

    /**
     * delete
     * @version 0.1
     * @param type $idRegister Llave primaria del registro en la tabla
     * @return boolean
     * Elimina un registro de la tabla
     */
    public function delete($idRegister) {
        $this->db->where('id_place', $idRegister);
        if ($this->db->delete($this->env['name'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * save_places
     * @version 0.1
     * @param array $dataPlaces Datos del registro
     * @return mixed Resultado de la operación 
     * Inserta o actualiza un registro en la tabla
     */
    public function save_places($dataPlaces) {
        if (!isset($dataPlaces['id'])) {
            $this->db->insert('places', $dataPlaces);
            $idPlaces = $this->db->insert_id();
        } else {
            $this->db->where('id', $dataPlaces['id']);
            $this->db->update('places', $dataPlaces);
            $idPlaces = $dataPlaces['id'];
        }
        $this->db->where('id', $idPlaces);
        $result = $this->db->get('places');
        return $result->result_array();
    }

    /**
     * get_all
     * @version 0.1
     * @return mixed Array con los registros
     * Obtengo todos los registros de la base de datos
     */
    public function get_all($lat = FALSE, $lng = FALSE) {

        $this->db->select('places.*');

        if ($lat && $lng) {
            $this->db->select('distancia_entre("' . $lat . '","' . $lng . '",places.lat,places.lng) as distancia');
            $this->db->order_by('distancia', 'ASC');
        }

        $result = $this->db->get('places');
        return $result->result_array();
    }

}
