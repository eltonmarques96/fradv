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
		//Selecting all forms registered
		$this->db->select('*');
		$forms_data['forms'] = $this->db->get('formularios')->result();
		//Loading the views
		$this->load->view('includes/html-header');
		$this->load->view('includes/menu');
		//Checking if the user send a attachment
		
		/*
			ROUTE 1
			INSERT SUCCESSFUL
			ROUTE 2 
			INSERT ERROR
			ROUTE 3 
			DELETE SUCESSFUL 
			ROUTE 4 
			DELETE ERROR
		*/
		if($route==1)
		{
			$data['msg'] = "The form has been sent.";
			$this->load->view('/includes/successfulMessage',$data);
		}else if($route==2)
		{
			$data['msg'] = "It was not possible to send the form, please try again";
			$this->load->view('/includes/errorMessage',$data);
		}
		if($route==3)
		{
			$data['msg'] = "The form has been deleted.";
			$this->load->view('/includes/successfulMessage',$data);
		}else if($route==4)
		{
			$data['msg'] = "It was not possible to delete the form, please try again";
			$this->load->view('/includes/errorMessage',$data);
		}
		//Loading the reaming forms
		$this->load->view('forms',$forms_data);
		$this->load->view('includes/html-footer');
	}
	
	//Function to delete a especific form
	public function delete($id=null)
	{
		$this->db->where('processID',$id);
		if($this->db->delete('formularios')){
			redirect('forms/3');
		}else{
			redirect('forms/4');
		}
	}
	
	//Function to insert a new form
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
		//Parsing the information from the form to database
		$data['id_hexaformulario'] = $hexa_number;
		$data['costumerName'] = $this->input->post('costumerName');
		$data['requestDate'] = $this->input->post('requestDate');
		$data['requestProcess'] = $this->input->post('requestProcess');
		$data['requestSubject'] = $this->input->post('requestSubject');
		$data['requestContent'] = $this->input->post('requestContent');
		$attch = false;
		if(isset($_FILES['attachmentFile'])){
			//Catching the extension of uploaded file
			$extension = strtolower(substr($_FILES['attachmentFile']['name'], -4));
			//Creating a new name for the attach
			//The function md5 will encryptype the datetime of upload
			//This makes impossible have two or more files with the same name
			$new_name = md5(time()) . $extension;
			//Directory where the file wil be saved
			$directory = "uploads/";
			/*
				The information which will be on data base is about the directory of file,
				not the file itself
			*/
			move_uploaded_file($_FILES['attachmentFile']['tmp_name'], $directory.$new_name);
			$data['attachmentFile'] = $new_name;
		}
		//Inserting the information into database
		if($this->db->insert('formularios',$data)){
			redirect('forms/1');
		}else{
			redirect('forms/2');
		}
	}

	public function downloadAttachment()
	{
		/*
		if(isset($GET['processID'])){
			$attachmentFile = $GET['processID'];
			$stat->db->prepare("select * from formularios where processID =?");
			$stat->bindParam(1, $processID);
			$stat -> execute();
			$data = $stat->fetch();

			$file = 'uploads/'.$data['attachmentFile'];
		} */
	}
}
