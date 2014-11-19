<?php
/*
 * 用户转入资金
 */
class income{
	public function incomeMoney($param){
		global $db;
		$now = time();
		$user_id = $param['user_id'];
		$money = $param['money'];
		
		$bindParam = array(':user_id' => $user_id, ':money' =>$money);
		
		$memlock = new memlock();
		$memlock->lock("income");
		
		$db->beginTransaction();
		//更新income表
		$sql = "insert into `income`(`user_id`,`income_time`,`money`) values(:user_id,$now,:money)";
		$smtm = $db->prepare($sql);
		$income = $smtm->execute($bindParam);
		
		$user = new user();
		$amountUpdate = $user->updateUserAmount($user_id,$money);
		
		if($income&&$amountUpdate){
			$db->commit();
			$memlock->unlock("income");
			return true;
		}else{
			$db->rollback();
			$memlock->unlock("income");
			return false;
		}
		
	}
}