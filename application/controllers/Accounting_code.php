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
					'category' => $this->input->post('category'),
				);
				if($this->Code_model->add_code($code_data))
				{
					$this->session->set_flashdata('form_message', 'Successfully added.');
					redirect('accounting_code/add');
				}
			}
		}

		$this->load->view('template-main', $data, FALSE);	
	}

	public function edit($code_id)
	{
		if($code_id==NULL)
		{
			$code_id = $this->uri->segment(3);
		}

		if($this->input->post())
		{
			$code_data = array(
				'name' => $this->input->post('name'),
				'code' => $this->input->post('code'),
				'default_post_type' => $this->input->post('default_post_type'),
				'category' => $this->input->post('category'),
			);
			if($this->Code_model->update_code($code_id, $code_data))
			{
				$this->session->set_flashdata('form_message', 'Successfully updated.');
			}
		}
		$data = array(
			'page' => 'code/form',
			'code' => $this->Code_model->get_code($code_id)
		);
		$this->load->view('template-main', $data, FALSE);
	}

}
