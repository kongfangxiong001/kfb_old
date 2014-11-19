
--
-- 表的结构 `allot`
--

CREATE TABLE IF NOT EXISTS `allot` (
  `allot_id` int(12) NOT NULL AUTO_INCREMENT COMMENT '分配id',
  `interest` decimal(12,2) NOT NULL COMMENT '分配的收益',
  `allot_time` int(10) NOT NULL COMMENT '分配时间',
  PRIMARY KEY (`allot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='投资收益分配表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `income_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '投资id',
  `user_id` int(10) NOT NULL COMMENT '投资者id',
  `income_time` int(10) NOT NULL COMMENT '投入的时刻',
  `money` decimal(12,2) NOT NULL COMMENT '转入的资金',
  PRIMARY KEY (`income_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='投资记录表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(30) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '用户密码',
  `amount` decimal(12,2) NOT NULL COMMENT '未转入得资金',
  `regtime` int(10) NOT NULL COMMENT '注册时间',
  `login_time` int(10) NOT NULL COMMENT '最近一次登录时间',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `portrait` varchar(50) NOT NULL COMMENT '头像的地址',
  `email` int(30) NOT NULL COMMENT 'email',
  `phone` int(16) NOT NULL COMMENT 'phone',
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户个性化';

-- --------------------------------------------------------

--
-- 表的结构 `withdraw`
--

CREATE TABLE IF NOT EXISTS `withdraw` (
  `withdraw_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '提现id',
  `user_id` int(10) NOT NULL COMMENT '提现人id',
  `money` decimal(12,2) NOT NULL COMMENT '提现金额',
  `with_draw_time` int(10) NOT NULL COMMENT '提现时间',
  `is_success` tinyint(1) NOT NULL COMMENT '是否提现成功',
  PRIMARY KEY (`withdraw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='提现表' AUTO_INCREMENT=1 ;