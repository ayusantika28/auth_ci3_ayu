<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register($username, $password) {
        // Hash password
        $hashed_password = md5($password);

        // Prepare data
        $data = array(
            'username' => $username,
            'password' => $hashed_password
        );

        // Insert into database
        return $this->db->insert('users', $data);
    }

    public function login($username, $password) {
        // Hash password
        $hashed_password = md5($password);

        // Prepare query
        $this->db->where('username', $username);
        $this->db->where('password', $hashed_password);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
