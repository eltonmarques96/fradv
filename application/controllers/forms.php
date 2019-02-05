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

	public function index($route=null)
	{
		$this->db->select('*');
		$forms_data['forms'] = $this->db->get('formularios')->result();

		//Carregando as views da página inicial
		$this->load->view('includes/html-header');
		$this->load->view('includes/menu');
		if($route==1)
		{
			$data['msg'] = "The form has been sent.";
			$this->load->view('/includes/successfulMessage',$data);
		}else if($route==2)
		{
			$data['msg'] = "It was not possible to send your form, please try again";
			$this->load->view('/includes/errorMessage',$data);
		}
		$this->load->view('forms',$forms_data);
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
		//Generating the 6-size hexadecimal number
		$hexa_number = '';
		$i = 0;
		$rand_ = 0;
		$rand = "";
		while($i < 7)
		{
			/*ASCII Table
			d48 -> d57
			0   -> 9

			d65 -> d70 
			A   -> F
			*/
		   $rand_ = rand(48,70);
		   if ((($rand_ > 47) AND ($rand_ <57)) or (($rand_ > 65) and ($rand_ <70))){
			   $hexa_number .= chr($rand_);
			   $i++;
		   }
		   
		}
		$data['id_hexaformulario'] = $hexa_number;
		$data['costumerName'] = $this->input->post('costumerName');
		$data['requestDate'] = $this->input->post('requestDate');
		$data['requestProcess'] = $this->input->post('requestProcess');
		$data['requestSubject'] = $this->input->post('requestSubject');
		$data['requestContent'] = $this->input->post('requestContent');
		$data['attachmentFile'] = $this->input->post('attachmentFile');

		if($this->db->insert('formularios',$data)){
			redirect('forms/1');
		}else{
			redirect('forms/2');
		}
	}
}
