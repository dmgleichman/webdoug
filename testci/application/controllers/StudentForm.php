<?php
class StudentForm extends CI_Controller {

	function __construct() {
		parent::__construct();
		//$this->load->model('form_model');
		$this->load->helper("form");
		$this->load->helper("url");
		
	}
	
	function index() {
		$this->load->view('student_form_view');
	}
	

}
?>

