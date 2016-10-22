<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting_code extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Code_model');
	}

	public function index()
	{
		$data = array(
			'page' => 'code/view'
		);
		$this->load->view('template-main', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'page' => 'code/form'
		);

		if($this->input->post())
		{
			$rules = array(
				array(
					'label' => 'Name',
					'field' => 'name',
					'rules' => 'trim|required'
				),
				array(
					'label' => 'Code',
					'field' => 'code',
					'rules' => 'trim|required'
				)
			);
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run())
			{
				$code_data = array(
					'name' => $this->input->post('name'),
					'code' => $this->input->post('code'),
					'default_post_type' => $this->input->post('default_post_type'),
				);
				$this->Code_model->add_code($code_data);
			}
		}

		$this->load->view('template-main', $data, FALSE);	
	}

	public function edit()
	{

	}

}
