<?php
date_default_timezone_set("Asia/Taipei");
class judge_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get($user, $problem, $challenge, $status, $start, $limit, $strict = false)
	{
		$this->db->select('submission.submission_id, submission.submission_status,
				submission.submission_time, submission.submission_mem,
				submission.submission_score, submission.submission_len,
				submission.user_id, submission.problem_id,
				submission.challenge_id, submission.submission_date, submission.submission_language,
				user.user_id, user.user_username,
				user.user_nick,user.student_id,user.user_name');

		$this->db->join('user', 'user.user_id = submission.user_id', 'INNER');
		$this->db->from('submission');
		$this->db->order_by('submission.submission_id', 'DESC');
		$this->db->limit($limit, $start);

		if($user && $strict) $this->db->where('user.user_username', $user);
		if($user && !$strict) $this->db->like('user.user_username', $user);
		if($status != -1) $this->db->where('submission.submission_status', $status);
		if($problem != -1) $this->db->where('submission.problem_id', $problem);
		if($challenge != -1) $this->db->where('submission.challenge_id', $challenge);
		$query = $this->db->get();
		
		$re = array();
		$pos = 0;
		foreach($query->result() as $row)
		{
			$re[$pos]['id'] = $row->submission_id;
			$re[$pos]['status'] = $row->submission_status;
			$re[$pos]['time'] = $row->submission_time;
			$re[$pos]['mem'] = $row->submission_mem;
			$re[$pos]['len'] = $row->submission_len;
			$re[$pos]['score'] = $row->submission_score;
			$re[$pos]['problem'] = $row->problem_id;
			$re[$pos]['user'] = $row->user_id;
			$re[$pos]['nick'] = $row->user_nick;
			$re[$pos]['username'] = $row->user_username;
			$re[$pos]['challenge'] = $row->challenge_id;
			$re[$pos]['date'] = $row->submission_date;
			$re[$pos]['language'] = $row->submission_language;
            $re[$pos]['student_id'] = $row->student_id;
            $re[$pos]['real_name'] = $row->user_name;
			$pos++;
		}
		$re['len'] = $pos;
		return $re;
	}
	
	function info($id)
	{
		$this->load->model('judge_model', 'judge');
		$this->db->select('submission.submission_id, submission.submission_status,
				submission.submission_result, submission.submission_score,
				submission.user_id, submission.problem_id,
				submission.submission_code, submission.submission_error,
				submission.submission_time, submission.submission_mem,
				submission.submission_len, submission.submission_date, submission.submission_language,
				user.user_id, user.user_username,user.student_id,user.user_name,
				user.user_nick, problem.problem_id,
				problem.problem_title, problem.problem_testdata,
				problem.problem_special,
				problem.problem_level');
		
		$this->db->from("submission");
		$this->db->where("submission_id", $id);
		$this->db->join('user', 'user.user_id = submission.user_id' , 'INNER');
		$this->db->join('problem','problem.problem_id = submission.problem_id','INNER');
		$this->db->limit(1);
		$query = $this->db->get();
		
		$re = array();
		foreach($query->result() as $row)
		{
			$re['id'] = $row->submission_id;
			$re['status'] = $row->submission_status;
			$re['score'] = $row->submission_score;
			$re['user_id'] = $row->user_id;
			$re['problem_id'] = $row->problem_id;
			$re['code'] = $row->submission_code;
			$re['error'] = $row->submission_error;
			$re['time'] = $row->submission_time;
			$re['mem'] = $row->submission_mem;
			$re['len'] = $row->submission_len;
			$re['date'] = $row->submission_date;
			$re['language'] = $row->submission_language;
			$re['username'] = $row->user_username;
			$re['student_id'] = $row->student_id;
			$re['name'] = $row->user_name;
			$re['challenge'] = $this->problem->in_challenge($re['problem_id']);
			$re['nick'] = $row->user_nick;
			$re['title'] = $row->problem_title;
			$re['level'] = $row->problem_level;
			$re['result'] = $this->judge->get_testdata($row->problem_testdata);
			$re['special_judge'] = $row->problem_special;
			if($row->problem_special == 2 || $row->problem_special == 4){
				$re['result'] = $this->judge->get_project_result($re['result'], $row->submission_result);
			}else{
				$re['result'] = $this->judge->get_result($re['result'], $row->submission_result);
			}
		}
		return $re;
	}
	
	function count($user, $problem, $challenge, $status)
	{
		$this->db->select('submission.submission_id, submission.user_id,
				user.user_id, user.user_username,
				submission.submission_status, submission.problem_id,
				submission.challenge_id');
		$this->db->join('user', 'user.user_id = submission.user_id', 'INNER');
		$this->db->limit(10000000);
		$this->db->from('submission');
		
		if($user) $this->db->like('user.user_username', $user);
		if($status != -1) $this->db->where('submission.submission_status', $status);
		if($problem != -1) $this->db->where('submission.problem_id', $problem);
		if($challenge != -1) $this->db->where('submission.challenge_id', $challenge);
		
		return $this->db->get()->num_rows();
	}
	
	function status($id)
	{
		$status = array(
			"Waiting for judge" , 
			"<span class='blue'>Accepted</span>" , 
			"<span class='red'>Runtime Error</span>" , 
			"<span class='red'>Compile Error</span>" , 
			"<span class='red'>Time Limit Exceed</span>" , 
			"<span class='red'>Memory Limit Exceed</span>" , 
			"<span class='red'>Wrong Answer</span>" , 
			"<span class='red'>Presentation Error</span>" , 
			"<span class='red'>Output Limit Exceed</span>" , 
			"<span class='red'>Other - Contact Staff</span>",
			"<span class='red'>System Error</span>",
			"<span class='red'>Restricted Function</span>"
		);
		
		if($id <= 11)return $status[$id];
		else return 'Get Data Error.';
	}
	
	function get_table($row)
	{
		$this->load->library('session');
		$this->load->model('problem_model', 'problem');
		$this->load->model('user_model', 'user');
		$lv = $this->session->userdata('user_level');
		
		$re = 
		'<table align="center" width="100%" class="activity">
		<tr class="wood">';
		
		if($lv >= 5)
			$re = $re. '<th>R</th>';
			
		$re=$re.
			'<th>ID</th>
			<th>Username</th>';
        if($lv >= 5)
            $re = $re. '<th>Name</th><th>Student ID</th>';
        $re=$re.
			'<th>Problem</th>
			<th>Status</th>
			<th>Score</th>
			<th>Time</th>
			<th>Memory</th>
			<th>Code Length</th>
			<th>Submission <br>Language</th>
			<th>Submit Date</th>
		</tr>';
		for($i=0; $i<$row['len']; $i++)
		{
			$in_challenge = $this->problem->in_challenge($row[$i]['problem']);
			$re = $re. '<tr ';
            if($row[$i]['status'] == 0){
                $re = $re. 'class="white-back"';
            }else if($row[$i]['status'] == 1){
                $re = $re. 'class="green-back"';
            }else{
                $re = $re. 'class="red-back"';
            }
            $re = $re. '>';
			if($lv >= 5) $re = $re. '<td><div class="rejudge">'. anchor('judge/rejudge/'.$row[$i]['id'], 'R'). '</div></td>';
			
			$re = $re. '<td>'. anchor("judge/submission/". $row[$i]['id'], $row[$i]['id']). '</td>';
			$re = $re. '<td>'. anchor("user/view/". $row[$i]['user'], $this->user->trans($row[$i]['username']) ). '</td>';
            if($lv >= 5) $re = $re. '<td>'. $row[$i]['real_name'] . '</td>';
            if($lv >= 5) $re = $re. '<td>'. $row[$i]['student_id'] . '</td>';
			$re = $re. '<td>'. anchor('problem/view/'. $row[$i]['problem'], $row[$i]['problem']). '</td>';
			$re = $re. '<td>'. $this->judge->status($row[$i]['status']). '</td>';
			
			$re = $re. '<td>';
				//if(!$in_challenge || $lv>=5)
			$score = $row[$i]['score'];
			if($row[$i]['problem']==16040101||$row[$i]['problem']==16040102)
				$score = (double)$score/100;
                    $re = $re. $score;
			$re = $re. '</td>';
			
			$re = $re. '<td>';
				//if(!$in_challenge || $lv>=5)
                    $re = $re. $row[$i]['time']. 'ms';
			$re = $re. '</td>';
			
			$re = $re. '<td>';
				//if(!$in_challenge || $lv>=5)
                    $re = $re. $row[$i]['mem']/1024 . 'kb';
			$re = $re. '</td>';
			
			$re = $re. '<td>';
				//if(!$in_challenge || $lv>=5)
                    $re = $re. $row[$i]['len'];
			$re = $re. '</td>';

			$re = $re. '<td>';
					switch ($row[$i]['language']) {
						case '0':
							$re = $re. "C++";
							break;

						case '1':
							$re = $re. "Python 2.7";
							break;
						
						default:
							$re = $re. "Unknown";
							break;
					}
			$re = $re. '</td>';
			
			$re = $re. '<td>'. $row[$i]['date']. '</td>';
			$re = $re. '</tr>';
		}
		$re = $re. '</table>';
		return $re;
	}
	
	function get_time()
	{
		$this->load->helper('date');
		return date("Y-m-d H:i:s");
	}
	
	function get_result($re, $str)
	{
		$result = preg_split("/[\s,]+/", $str, -1, PREG_SPLIT_NO_EMPTY);
		$len = count($result);
		$pos = 0;
		
		for($i=0; $i<$re['len']; $i++)
		{
			if($pos < $len)sscanf($result[$pos++], "%d", $re[$i]['status']);
			else $re[$i]['status'] = 0;
			if($pos < $len)sscanf($result[$pos++], "%d", $re[$i]['solve_time']);
			else $re[$i]['solve_time'] = 0;
			if($pos < $len)sscanf($result[$pos++], "%d", $re[$i]['solve_mem']);
			else $re[$i]['solve_mem'] = 0;
		}
		
		$ac = true;
		for($i=$re['len']-1; $i>=0; $i--)
		{
			if($re[$i]['small']!=-1 && $re[$i]['status'] != 1) $ac = false;
			if($re[$i]['small']==0)
			{
				$re[$i]['ac'] = $ac;
				$ac = true;
			}
		}
		
		return $re;
	}

	function get_project_result($re, $str)
	{
		$result = preg_split("/[\s,]+/", $str, -1, PREG_SPLIT_NO_EMPTY);
		$len = count($result);
		$pos = 0;
		
		for($i=0; $i<$re['len']; $i++)
		{
			if($pos < $len)sscanf($result[$pos++], "%d", $re[$i]['status']);
			else $re[$i]['status'] = 0;
			if($pos < $len)sscanf($result[$pos++], "%d", $re[$i]['project_score']);
			else $re[$i]['project_score'] = 0;
			if($pos < $len)sscanf($result[$pos++], "%d", $re[$i]['solve_time']);
			else $re[$i]['solve_time'] = 0;
			if($pos < $len)sscanf($result[$pos++], "%d", $re[$i]['solve_mem']);
			else $re[$i]['solve_mem'] = 0;
		}
		
		$ac = true;
		for($i=$re['len']-1; $i>=0; $i--)
		{
			if($re[$i]['small']!=-1 && $re[$i]['status'] != 1) $ac = false;
			if($re[$i]['small']==0)
			{
				$re[$i]['ac'] = $ac;
				$ac = true;
			}
		}
		
		return $re;
	}
	
	function get_testdata($str)
	{
		$re = array();
		$data = preg_split("/[\s,]+/", (string)$str, -1, PREG_SPLIT_NO_EMPTY);
		$len = count($data);
		$pos = 0;
		$cur = 0;
		$sample = $test = 0;
		
		if($pos < $len)sscanf($data[$pos++], "%d", $sample);
		if($pos < $len)sscanf($data[$pos++], "%d", $test);
		
		for($i=0; $i<$sample; $i++)
		{
			$re[$cur]['name'] = 'Sample';
			if($sample > 1) $re[$cur]['name'] = $re[$cur]['name']. '-'. chr(97 + $i);
			
			$re[$cur]['test'] = 0;
			$re[$cur]['small'] = $i;
			
			if($pos < $len)sscanf($data[$pos++], "%d", $re[$cur]['time']);
			if($pos < $len)sscanf($data[$pos++], "%d", $re[$cur]['mem']);
			$re[$cur]['score'] = 0;
			$cur++;
		}
		
		for($i=1; $i<=$test; $i++)
		{
			if($pos < $len)sscanf($data[$pos++], "%d", $small);
			if($pos < $len)sscanf($data[$pos++], "%d", $ocen);
			if($pos < $len)sscanf($data[$pos++], "%d", $score);
			
			if($ocen)
			{
				$re[$cur]['name'] = (string)$i. 'ocen';
				$re[$cur]['test'] = $i;
				$re[$cur]['small'] = -1;
				
				if($pos < $len)sscanf($data[$pos++], "%d", $re[$cur]['time']);
				if($pos < $len)sscanf($data[$pos++], "%d", $re[$cur]['mem']);
				$re[$cur]['score'] = $score;
				$cur++;
			}
			
			for($j=0; $j<$small; $j++)
			{
				$re[$cur]['name'] = (string) $i;
				if($small > 1) $re[$cur]['name'] = $re[$cur]['name']. chr(97+$j);
				$re[$cur]['test'] = $i;
				$re[$cur]['small'] = $j;
				
				if($pos < $len)sscanf($data[$pos++], "%d", $re[$cur]['time']);
				if($pos < $len)sscanf($data[$pos++], "%d", $re[$cur]['mem']);
				$re[$cur]['score'] = $score;
				$cur++;
			}
		}
		
		$re['len'] = $cur;
		return $re;
	}
	
	function show_info($info)
	{	
		$this->load->model('challenge_model', 'challenge');
		if($this->problem->in_challenge($info['problem_id']))
		{
			if($this->session->userdata('user_id') != $info['user_id']) return false;
			if($this->session->userdata('user_id') == $info['user_id'] && $info['status'] != 1)
			{
				$info_challenge = $this->challenge->info($info['challenge']);
				if(!$info_challenge['mode']) return false;
			}
		}
		return true;
	}
	
	function rejudge_problem($id)
	{
		$data = array
		(
			'submission_status' => 0,
		);
		$this->db->where('problem_id', $id);
		$this->db->update('submission', $data);
	}
	
	function rejudge_submit($id)
	{
		$data = array
		(
			'submission_status' => 0,
		);
		$this->db->where('submission_id', $id);
		$this->db->update('submission', $data);
	}
}
?>
