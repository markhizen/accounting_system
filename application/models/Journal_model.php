<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}	


	public function select()
	{

		$query = $this->db->query('select * from journal');

		return $query->result_array();


	}	

	public function save($data)
	{

		$values = "";
		$total	= count($data);

		for($i = 0; $i < $total; $i++){
		
		 	$values.= $data[$i];

		 	if( ($i + 1 ) < $total ) 
		 		$values.= ',';

		 }

		 $query = " INSERT INTO journal  VALUES  ('', current_date, ". $values .") ";

		 $this->db->query($query);

	}

}

/* End of file Position_model.php */
/* Location: ./application/modules/ceis/models/Position_model.php */