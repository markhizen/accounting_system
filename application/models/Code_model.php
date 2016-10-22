<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Code_model extends CI_Model {
	
	public function add_code($code_data){
		$this->db->insert('accounting_code', $code_data);
		return $this->db->affected_rows() > 0;
	}
}

/* End of file Position_model.php */
/* Location: ./application/modules/ceis/models/Position_model.php */