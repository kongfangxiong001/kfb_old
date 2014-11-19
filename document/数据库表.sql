
--
-- ��Ľṹ `allot`
--

CREATE TABLE IF NOT EXISTS `allot` (
  `allot_id` int(12) NOT NULL AUTO_INCREMENT COMMENT '����id',
  `interest` decimal(12,2) NOT NULL COMMENT '���������',
  `allot_time` int(10) NOT NULL COMMENT '����ʱ��',
  PRIMARY KEY (`allot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ͷ����������' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- ��Ľṹ `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `income_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Ͷ��id',
  `user_id` int(10) NOT NULL COMMENT 'Ͷ����id',
  `income_time` int(10) NOT NULL COMMENT 'Ͷ���ʱ��',
  `money` decimal(12,2) NOT NULL COMMENT 'ת����ʽ�',
  PRIMARY KEY (`income_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ͷ�ʼ�¼��' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- ��Ľṹ `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '�û�id',
  `name` varchar(30) NOT NULL COMMENT '�û���',
  `password` char(32) NOT NULL COMMENT '�û�����',
  `amount` decimal(12,2) NOT NULL COMMENT 'δת����ʽ�',
  `regtime` int(10) NOT NULL COMMENT 'ע��ʱ��',
  `login_time` int(10) NOT NULL COMMENT '���һ�ε�¼ʱ��',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='�û���' AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- ��Ľṹ `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(10) NOT NULL COMMENT '�û�id',
  `portrait` varchar(50) NOT NULL COMMENT 'ͷ��ĵ�ַ',
  `email` int(30) NOT NULL COMMENT 'email',
  `phone` int(16) NOT NULL COMMENT 'phone',
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�û����Ի�';

-- --------------------------------------------------------

--
-- ��Ľṹ `withdraw`
--

CREATE TABLE IF NOT EXISTS `withdraw` (
  `withdraw_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '����id',
  `user_id` int(10) NOT NULL COMMENT '������id',
  `money` decimal(12,2) NOT NULL COMMENT '���ֽ��',
  `with_draw_time` int(10) NOT NULL COMMENT '����ʱ��',
  `is_success` tinyint(1) NOT NULL COMMENT '�Ƿ����ֳɹ�',
  PRIMARY KEY (`withdraw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='���ֱ�' AUTO_INCREMENT=1 ;