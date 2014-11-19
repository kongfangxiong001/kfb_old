<?php
/*
 * memcache锁
 */
class memlock {
	private static $memcache = null;
	
	public static function getConnection() {
		if (! isset ( self::$memcache )) {
			self::$memcache = new Memcache ();
			self::$memcache->connect ( '127.0.0.1', 11211 );
		}
		return self::$memcache;
	}
	public static function lock($key, $expireTime = 30) {
		$memcache = self::getConnection ();
		if($memcache->add($key, 1, false, $expireTime)) {
			return true;
		}
		return false;
	}
	public static function unLock($key) {
		$memcache = self::getConnection ();
		return $memcache->delete ( $key );
	}
}