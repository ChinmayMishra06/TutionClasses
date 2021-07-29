<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		if(isset($_POST['csv_file_uploaded'])){
			$filename = $_FILES['csv_client_details']['tmp_name'];
			if($_FILES['csv_client_details']['size'] > 0){
				$file = fopen($filename, "r");

				while(($data = fgetcsv($file, 1000, ",")) !== false){
					$insert_data['name'] = $data[0];
					$insert_data['mail'] = $data[1];
					// print_r($insert_data);die();

					$this->load->database();
					$result = $this->db->insert('dummy', $insert_data);
				}
				fclose($file);
			}
		}else{
			$message = '<label class="text-danger">Please select file.</label>';
		}
		$this->load->view('welcome_message');
	}
}
