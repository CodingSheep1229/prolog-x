<?php
class user extends CI_Controller
{
	public function index()
	{

		$data['main']='user';
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('string');


		$this->load->view('main.php' , $data);
	}

	public function register()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$data = array(
			'name' => $_GET['name'],
			'birthday' => $_GET['birthday'],
			'gender' => $_GET['gender'],
			'email'=>$_GET['email'],
			'phone'=>$_GET['phone'],
			'emergency_contact'=>$_GET['emergency_contact'],
			'emergency_phone'=>$_GET['emergency_phone'],
			'emergency_relation'=>$_GET['emergency_relation'],
			'id'=>$_GET['id'],
			'size'=>$_GET['size'],
			'eat'=>$_GET['eat'],
			'other'=>$_GET['other'],
		);

		// if (empty($data['name']))
		// {
		// 	echo '<script>
		// 		alert("敢問尊姓大名?");
		// 		history.go(-1);
		// 		</script>';
		// 	redirect('','refresh');
		// }
		// if (empty($data['birthday']))
		// {
		// 	echo '<script>
		// 		alert("生日不能空白!");
		// 		history.go(-1);
		// 		</script>';
		// 	redirect('','refresh');
		// }
		// if (empty($data['gender']))
		// {
		// 	echo '<script>
		// 		alert("請選擇性別!");
		// 		history.go(-1);
		// 		</script>';
		// 	redirect('','refresh');
		// }

		// if(intval($data['phone'])>=1000000000 || intval($data['phone'])<900000000 || empty($data['phone']) ){
  //           echo 
  //           '
  //           <script>
  //               alert("來個台灣的手機號碼好嗎？");
  //               history.go(-1);
  //           </script>
  //           ';
  //           redirect('','refresh');
  //       }
  //       if (empty($data['emergency_contact']))
		// {
		// 	echo '<script>
		// 		alert("請輸入緊急聯絡人姓名!");
		// 		history.go(-1);
		// 		</script>';
		// 	redirect('','refresh');
		// }
  //       if(intval($data['emergency_phone'])>=1000000000 || intval($data['emergency_phone'])<900000000 || empty($data['emergency_phone'])){
  //           echo 
  //           '
  //           <script>
  //               alert("你的緊急聯絡人總有隻台灣的手機號碼吧");
  //               history.go(-1);
  //           </script>
  //           ';
  //           redirect('','refresh');
  //       }
  //       if (empty($data['id']))
		// {
		// 	echo '<script>
		// 		alert("請輸入身分證字號!");
		// 		history.go(-1);
		// 		</script>';
		// 	redirect('','refresh');
		// }

			$this->db->insert('register', $data);
			// echo '<script>
			// 		alert("報名成功!!!");
			// 		</script>';
			redirect('','refresh');
		
	}

}
?>
