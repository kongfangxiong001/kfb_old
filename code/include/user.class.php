<?php
class user{
	#@param array
	public function addUser($param){
		global $db;
		
		if(!$this->is_valid($param)){
			return false;
		}
		
		$now = time();
		$stmt = $db->prepare("insert into `user`(`name`,`password`,regtime`,`login_time`)values(:name,:password,$now,$now)");
		$stmt->bindParam(':name',$param['name']);
		$stmt->bindParam(':password',$this->encrypt($param['password']));
		if($stmt->execute()){
			return true;
		}else{
			$errorMsg = $stmt->errorInfo();
			echo $errorMsg[1].":".$errorMsg[2];
		}
	}
	
	#@password
	public function encrypt($password){
		return md5(SALT.$password);
	}
	
	#@param array('name','password')
	public function login($param){
		global $db;
		$param['password'] = $this->encrypt($param['password']);
		$sql = "select `user_id`,`name` from `user` where `name`=? and password=?";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(1,$param['name']);
		$stmt->bindParam(2,$param['password']);
		if($stmt->execute()){
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if(empty($result)){
				return false;
			}
			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['user_id'] = $result['user_id'];
			$_SESSION['name'] = $result['name'];
			return true;
		}else{
			$errorMsg = $stmt->errorInfo();
			echo $errorMsg[1].":".$errorMsg[2];
		}
	}
	#验证用户名，密码等是否符合规则
	public function is_valid($param){
	}
	
	/**
	 * 分页获取用户信息
	 */
	public function getUserInfo($page,$pagesize){
		global $db;
		$page = max($page,1);
		$start = ($page-1)*$pagesize;
		$sql = "select `user_id` from `user` limit :start,:pagesize";
		$smtm = $db->prepare($sql);
		$smtm->bindValue(":start", $start, PDO::PARAM_INT);
		$smtm->bindValue(":pagesize", $pagesize, PDO::PARAM_INT);
		$smtm->execute();
		$result = $smtm->fetchAll();
		return $result;
	}
	
	/**
	 * 更新用户的总金额
	 */
	public function updateUserAmount($user_id,$money){
		global $db;
		$sql = "update `user` set `amount`=`amount`+:money where `user_id`=:user_id";
		$amountSmtm = $db->prepare($sql);
		$amountSmtm->bindParam(":money",$money);
		$amountSmtm->bindParam(":user_id",$user_id);
		return $amountSmtm->execute();
	}
}