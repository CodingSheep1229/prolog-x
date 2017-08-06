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
			'name' => $_POST['name'],
			'birthday' => $_POST['birthday'],
			'gender' => $_POST['gender'],
			'email'=>$_POST['email'],
			'phone'=>$_POST['phone'],
			'emergency_contact'=>$_POST['emergency_contact'],
			'emergency_phone'=>$_POST['emergency_phone'],
			'emergency_relation'=>$_POST['emergency_relation'],
			'id'=>$_POST['id'],
			'size'=>$_POST['size'],
			'eat'=>$_POST['eat'],
			'other'=>$_POST['other'],
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
