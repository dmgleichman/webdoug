<?php
class Blog extends CI_Controller {
	
	public function index()
	{
		//echo 'Hello World!';
		
		$data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
		$data['shopping_list'] = array('Milk', 'Eggs', 'Bread', 'Bananas');
		
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";
		
		$string = $this->load->view('blog_view', $data, TRUE);
		
		$data['string'] = $string;
		
		$this->load->view('simple_view', $data);
	}
	
	public function comments()
	{
		echo 'Look at this!';
	}
	
	public function silly()
	{
		echo 'You keep making silly commands!';
	}

	
}
