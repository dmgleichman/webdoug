<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// from http://tutorialcodeigniter.com/

class Hello extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		//echo "This is the initialization<br>";
	}
	
	
	public function index() {
		echo "This is my index function";
	}
	
	/* call by localhost/ci/index.php/one/pp1/pp2 */
	public function one($nameParam) {
		$me = "Shirley";
		$this->load->model("hello_model", "model");
		
		$profile = $this->model->getProfile("a_name");
		//print_r($profile);

		$this->load->view('header');
		$data = array("name" => $nameParam, "silly" => $me);
		
		$data['profile'] = $profile;
		$this->load->view('one', $data);
				
	
	}

	/* call by localhost/ci/index.php/one/pp1/pp2 */
	public function notsooldone($nameParam) {
	
		$me = "Shirley";
		
		$this->load->view('header');
		$data = array("name" => $nameParam, "silly" => $me);
		$this->load->view('one', $data);
	}
	
	/* call by localhost/ci/index.php/one/pp1/pp2 */
	public function oldone($p1, $p2="param2") {
		echo "This is the old one by Doug<br>";
		echo "These are the pararms: $p1, $p2";
	}
	
	public function two() {
		echo "This is the two by Doug<br>";
		echo "CodeIgniter is fun!";
	}
	


	public function one_again($p1, $p2) {
		echo "This is the one_again by Doug<br>";
		echo "These are the pararms: $p1, $p2";
	}
}
