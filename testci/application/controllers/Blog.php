<?php
class Blog extends CI_Controller {
	
	
	private function setup_blog()
	{
		$data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
		$data['shopping_list'] = array('Milk', 'Eggs', 'Bread', 'Bananas');
		
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";
		return $data;
	}
	
	public function index()
	{
		$data = $this->setup_blog();
		
		$this->load->view('blog_view', $data);
	
	}
	
	public function comments()
	{
		echo 'Look at this!';
	}
	
	public function silly()
	{
		echo 'You keep making silly commands!';
	}

	public function in_italics()
	{
		$data = $this->setup_blog();
		
		$string = $this->load->view('blog_view', $data, TRUE);	// returns view as a string
		
		$data['string'] = $string;
		
		$this->load->view('simple_view', $data);
	}		
	
}
