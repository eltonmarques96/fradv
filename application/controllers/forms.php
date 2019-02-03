<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//Carregando as views da página inicial
		$this->load->view('includes/html-header');
		$this->load->view('includes/menu');
		$this->load->view('forms');
		$this->load->view('includes/html-footer');
	}

	public function register()
	{
		//Carregando as views da página inicial
		$this->load->view('includes/html-header');
		$this->load->view('includes/menu');
		$this->load->view('register');
		$this->load->view('includes/html-footer');
	}
	
	public function newRegister()
	{
		$data['processID'] = $this->input->post('processID');
		$data['costumerName'] = $this->input->post('costumerName');
		$data['processDate'] = $this->input->post('processDate');
		$data['processSubject'] = $this->input->post('procesSubject');
		$data['requestContent'] = $this->input->post('requestContent');
		$data['attachmenteFile'] = $this->input->post('attachmentFile');

		if($this->db->insert('forms',$data)){
			redirect('forms');
		}
	}
}
