<?php
class Judge extends CI_Controller
{
	public function index()
	{
		$this->load->model('log_model', 'log');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');

		$this->log->write($this->uri->uri_string(), '');
		
		$data['title']='PDOGS 4.0';
		$data['level']=0;
		$data['main']='index';
		
		$this->load->view('main.php' , $data);
	}
}
?>
