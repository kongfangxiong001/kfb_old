<?php
/**
 * 孔方宝收益
 */
class allot{
  /**
   * 查询总有效资金
   * 
   */
	public function getTotalEffective(){
		 global $db;
		 $sql = "select sum(`amount`) as amount from `user`";
		 $smtm = $db->prepare($sql);
		 $smtm->execute();
		 $amount = $smtm->fetch(PDO::FETCH_ASSOC);
		 $amount = $amount['amount'];

		 $today = strtotime(date('Y-m-d',time()));
		 $time = time();
		 $todayIncomeSql = "select sum(`money`) as todayIncome from `income` where income_time>$today";
		 $smtm = $db->prepare($todayIncomeSql);
		 $smtm->execute();
		 $todayIncome = $smtm->fetch(PDO::FETCH_ASSOC);
		 $todayIncome = $todayIncome['todayIncome'];
		 
		 return $amount-$todayIncome;
	}
	/**
	 * 收益率.该rate为当日收益的rate而不是年化收益，故无需除以360
	 */
	public function getRate($todayTotalIncome){
		$totalEffective = $this->getTotalEffective();
		$rate = floor(($todayTotalIncome*100)/($totalEffective*100)*10000)/100;
		return $rate;
	}
	/**
	 * 获取用户有效资金
	 */
	public function getUserEffective($user_id){
		global $db;
		$sql = "select `amount` as amount from `user` where `user_id`=:user_id";
		$smtm = $db->prepare($sql);
		$smtm->bindParam(":user_id",$user_id);
		$smtm->execute();
		$amount = $smtm->fetch(PDO::FETCH_ASSOC);
		$amount = $amount['amount'];
		
		$today = strtotime(date('Y-m-d',time()));
		$time = time();
		$todayIncomeSql = "select sum(`money`) as todayIncome from `income` where income_time>$today and user_id=:user_id";
		$smtm = $db->prepare($todayIncomeSql);
		$smtm->bindParam(":user_id",$user_id);
		$smtm->execute();
		$todayIncome = $smtm->fetch(PDO::FETCH_ASSOC);
		$todayIncome = $todayIncome['todayIncome'];
		
		return $amount-$todayIncome;
		
	}
	/**
	 * 用户获得的收益入库
	 * 对更新出现问题的需要写日志或者其他方式记录
	 */
	public function recordAllot($user_id,$interest){
		global $db;
		$now = time();
		$sql = "insert into `allot`(`user_id`,`interest`,`allot_time`) values(:user_id,:interest,$now)";
		$smtm = $db->prepare($sql);
		$smtm->bindParam(":user_id",$user_id);
		$smtm->bindParam(":interest",$interest);
		$smtm->execute();
		
		$user = new user();
		$user->updateUserAmount($user_id,$interest);
	}
	
}
