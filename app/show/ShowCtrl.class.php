<?php
class ShowCtrl {	
	public $db;
	private $number;
	public function __construct($number){
		$this->db = new DatabaseCtrl();
		$this->number = $number;
	}
	public function showAJAX(){
		global $conf;
		include $conf->root_path.'/view/'.'show_AJAX.php';	
	}
	public function showStart(){
		global $conf;
		include $conf->root_path.'/view/'.'show_start.php';	
	}
	public function getCat(){
		$datas = $this->db->connector()->select("cat", [
			"cat_name",
			"cat_id"
		]);
		echo json_encode($datas);
	}	
	public function getMsg(){
		$datas = $this->db->connector()->select("comm", [
			"comm_msg",
			"comm_date",
			"comm_id",
			"comm_author"],[
			"ORDER" => "comm_id DESC"
		]);
		echo json_encode($datas);
	}
	public function delMsg(){
		$datas = $this->db->connector()->delete("comm", [
			"comm_id" => $_POST['id']
		]);	
		echo json_encode('ok');
	}	
	public function setMsg(){
		$datas = $this->db->connector()->insert("msg", [
			"comm_msg" => $_POST['msg'],
			"comm_author" => $_POST['nick'],
			"comm_date" => date('Y-m-d')
		]);
		echo json_encode($datas);
	}
	public function showAll(){
		global $conf;
		
		$datas = $this->db->connector()->select("msg", [
			"[>]users" => ["msg_user_id" => "user_id"]
			], [
			"msg.msg",
			"msg.msg_id",
			"msg.msg_title",
			"msg.msg_date",
			"users.name"
		], [
			"ORDER" => [
				"msg_id" => "ASC"
			]
		]);			
		
		//var_dump($this->db->connector()->error());			
		//echo json_encode($datas);
		include $conf->root_path.'/view/'.'show_articles.php';
	}
	public function showOne($number){
		global $conf;
		$datas = $this->db->connector()->select("msg", [
			"[>]users" => ["msg_user_id" => "user_id"]
			], [	
			"msg.msg",
			"msg.msg_id",
			"msg.msg_title",
			"msg.msg_date",
			"users.name"
		], [
			"msg.msg_id" => $this->number
		]);	
		//var_dump($this->db->connector()->error());			
		//echo json_encode($datas);
		//exit();
		include $conf->root_path.'/view/'.'show_article.php';	
	}
	public function getDemo(){
		$datas = $this->db->connector()->select("users", [
			"name",
			"user_id"
		]);
		echo json_encode($datas);
	}
}
