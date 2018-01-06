<?php
class Pages extends CI_Controller {
	
		
	public function viewer($page = 'home')
	{
		//echo "Hello this my page<br>";
		//echo "Call with http://localhost/webdoug/testci/index.php/Pages/view/hello";
		
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			// oops we don't have that page
			show_404();
		}
		
		$data['title'] = ucfirst($page);  // Capitalize the first charcter
		
		$data['name'] = "My name is Doug!";
		

		$this->load->view('templates/header_name', $data);

				
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
		
	}
}
