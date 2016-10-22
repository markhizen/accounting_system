<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('journal_model', 'journals');
	}

	public function index()
	{

		$data 			= array();
		$data['info'] 	= $this->journals->select();


		// $this->load->view('welcome_message');
		$this->load->view('view_header');
		$this->load->view('view_menu');
		$this->load->view('view_body', $data);
		$this->load->view('view_footer');

	}

	public function get_journal_list(){

		
	}

	public function view_income_statement(){

		$this->load->view('income_statement');
		$this->load->view('view_footer');

	}

	public function view_balance_sheet(){

		$this->load->view('balance_sheet');
		$this->load->view('view_footer');

	}

	public function view_trial_posting(){

		$this->load->view('posting');
		$this->load->view('view_footer');

	}

	public function view_trial_balance(){

		$this->load->view('trial_balance');
		// $this->load->view('view_footer');
	}

	public function save()
	{

		$data = array();

		$data[] 	= !EMPTY($this->input->post('cash'))  ? $this->input->post('cash') : 0;
		$data[] 	= !EMPTY($this->input->post('capital'))  ? $this->input->post('capital') : 0;
		$data[] 	= !EMPTY($this->input->post('note_payable'))  ? $this->input->post('note_payable') : 0;
		$data[] 	= !EMPTY($this->input->post('supplies'))  ? $this->input->post('supplies') : 0;
		$data[] 	= !EMPTY($this->input->post('equipment'))  ? $this->input->post('equipment') : 0;
		$data[] 	= !EMPTY($this->input->post('salary_expense'))  ? $this->input->post('salary_expense') : 0;
		$data[] 	= !EMPTY($this->input->post('utility_expense'))  ? $this->input->post('utility_expense') : 0;
		$data[] 	= !EMPTY($this->input->post('rental_expense'))  ? $this->input->post('rental_expense') : 0;
		$data[] 	= !EMPTY($this->input->post('advertisement_expense'))  ? $this->input->post('advertisement_expense') : 0;
		$data[] 	= !EMPTY($this->input->post('miscellaneous_expense')) ? $this->input->post('miscellaneous_expense') : 0;
		$data[] 	= !EMPTY($this->input->post('furniture')) ? $this->input->post('furniture') : 0;
		$data[] 	= !EMPTY($this->input->post('account_payable')) ? $this->input->post('account_payable') : 0;
		$data[] 	= !EMPTY($this->input->post('note_receivable')) ? $this->input->post('note_receivable') : 0;
		
		


		$id = $this->journals->save($data);

		if(!EMPTY($id))
		{
			$flag = 1;
			$msg  = "Record was saved.";
		}
		else{
			$flag = 0;
			$msg  = "Record was not saved.";
		}

		$flag = 1;
			$msg  = "Record was saved.";

		$info = array(
			'flag'	=> $flag,
			'msg'	=> $msg
		);


		echo json_encode($info);		

	}
}
