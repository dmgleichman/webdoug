<?php
class News extends CI_Controller {

        public function __construct()
        {
			parent::__construct();
			$this->load->model('news_model');
			$this->load->helper('url_helper');
        }

        public function index()
        {
			$data['allnews'] = $this->news_model->get_news();
			$data['title'] = 'News archive';
			
			$na = $this->news_model->get_author();
			$data['news_author'] = $na;
			
			$this->load->view('templates/header', $data);
			$this->load->view('news/index', $data);
			$this->load->view('templates/footer');
				
        }

        public function view($slug = NULL)
        {
			echo "this is the view function";
			
			$data['news_item_from_slug'] = $this->news_model->get_news($slug);
	
			$na = $this->news_model->get_author();
			$data['news_author'] = $na;
			
			
			if (empty($data['news_item_from_slug']))
			{
					show_404();
			}

			$data['title'] = $data['news_item_from_slug']['title'];

			$this->load->view('templates/header', $data);
			$this->load->view('news/view', $data);
			$this->load->view('templates/footer');
		}
		
		public function create()
		{		
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Create a news item';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('news/create');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->news_model->set_news();
				$this->load->view('news/success');
			}
			
		}
}
