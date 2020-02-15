<?php

class Ambientes_model extends CI_Model
{
	public $table = "ambientes";

	public function __construct() {
		parent::__construct();
    }
    
    public function get_ambientes() {
        return $this->db->query(" SELECT * FROM ambientes")
                        ->result();
    }
	
}
