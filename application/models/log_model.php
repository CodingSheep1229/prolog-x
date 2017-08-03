<?php
class log_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	function write($path, $event)
	{
		$this->load->library('session');
		$this->load->model('judge_model', 'judge');

		$user = 0;
		if($this->session->userdata('user_id'))
			$user = $this->session->userdata('user_id');

		$ip = $this->input->ip_address();

		$data = array
		(
			'user_id' => $user,
			'log_event' => $event,
			'log_time' => $this->judge->get_time(),
			'log_ip' => $ip,
			'log_page' => $path
		);

		$this->db->insert('log',$data);
	}

	
}


?>
