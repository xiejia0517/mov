-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 12 月 08 日 14:04
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

CREATE TABLE IF NOT EXISTS `tp_admin` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` char(32) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `username`, `password`) VALUES
(47, 'wuhaoqi', 'e10adc3949ba59abbe56e057f20f883e'),
(1, 'xiejia', '2751c580c1b982a5b55ac7d96be0e706');

-- --------------------------------------------------------

--
-- 表的结构 `tp_article`
--

CREATE TABLE IF NOT EXISTS `tp_article` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `author` varchar(30) NOT NULL COMMENT '文章作者',
  `desc` varchar(255) NOT NULL COMMENT '文章简介',
  `keywords` varchar(255) NOT NULL COMMENT '文章关键词',
  `content` text NOT NULL COMMENT '文章内容',
  `pic` varchar(100) NOT NULL COMMENT '缩略图',
  `click` int(10) NOT NULL DEFAULT '0' COMMENT '点击数',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `time` int(10) NOT NULL COMMENT '发布时间',
  `cateid` mediumint(9) NOT NULL COMMENT '所属栏目',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `tp_article`
--

INSERT INTO `tp_article` (`id`, `title`, `author`, `desc`, `keywords`, `content`, `pic`, `click`, `state`, `time`, `cateid`) VALUES
(5, '测试文章888', '童年', '烧烤不管是男生还是女生都很热爱，而且是夏天冬天都适合的美食。如果你不想在外吃烤肉，那么你也可以在家自制哦。下面我们一起来看看在家如何自制烤肉吧。 ', '测试,文章', '<p>烧烤不管是男生还是女生都很热爱，而且是夏天冬天都适合的美食。如果你不想在外吃烤肉，那么你也可以在家自制哦。下面我们一起来看看在家如何自制烤肉吧。烧烤不管是男生还是女生都很热爱，而且是夏天冬天都适合的美食。如果你不想在外吃烤肉，那么你也可以在家自制哦。下面我们一起来看看在家如何自制烤肉吧。烧烤不管是男生还是女生都很热爱，而且是夏天冬天都适合的美食。如果你不想在外吃烤肉，那么你也可以在家自制哦。下面我们一起来看看在家如何自制烤肉吧。</p>', '/uploads/20181113\\e303d31f7c5386f44b3e409122844c9b.jpeg', 90, 1, 1475417556, 6),
(4, '测试文章2', '童攀', '描述', '童年,测试', '<p>222<br/></p>', '/uploads/20181112\\dad32947b38ba443e0106e369da0d51f.jpg', 5, 0, 1475147467, 3),
(6, '测试文章4', '童攀', '公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！ ', '童攀,Tp5', '<p>公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！</p>', '/uploads/20181112\\68aab2d0dc688ea848a87bdf82986b6c.jpeg', 10, 0, 1475417603, 1),
(7, '老爸过生日', 'Tp5', '父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ ', '老爸,生日', '<p>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/></p>', '/uploads/20181112\\68aab2d0dc688ea848a87bdf82986b6c.jpeg', 13, 0, 1475417731, 1),
(10, '3', '3', '3', '3', '', '/uploads/20181112\\dad32947b38ba443e0106e369da0d51f.jpg', 0, 1, 1542022566, 6),
(11, '5', '5', '5', '5', '', '/uploads/20181112\\dad32947b38ba443e0106e369da0d51f.jpg', 0, 1, 1542023048, 9),
(16, '123123', '123123123', '123', '123', '<p>123<br/></p>', '', 0, 1, 1542114401, 1),
(14, '123', '123123', '123', '123', '<p>12312<br/></p>', '/uploads/20181112\\974d2e0c49243b26cd03e6d7f1ae5acf.jpg', 0, 1, 1542027918, 1),
(15, '234234', '234', '234234', '234234', '<p>123123123123<br/></p>', '', 0, 1, 1542089215, 8);

-- --------------------------------------------------------

--
-- 表的结构 `tp_cate`
--

CREATE TABLE IF NOT EXISTS `tp_cate` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(30) NOT NULL COMMENT '栏目名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `tp_cate`
--

INSERT INTO `tp_cate` (`id`, `catename`) VALUES
(1, '美食'),
(2, '健身'),
(3, '养生'),
(4, '服装'),
(6, '生活'),
(7, '娱乐'),
(8, '婚嫁'),
(9, '美容');

-- --------------------------------------------------------

--
-- 表的结构 `tp_device`
--

CREATE TABLE IF NOT EXISTS `tp_device` (
  `device_id` tinyint(9) NOT NULL AUTO_INCREMENT COMMENT 'device主键',
  `device_code` varchar(255) DEFAULT NULL COMMENT 'post机器码',
  `device_license_code` varchar(255) DEFAULT NULL COMMENT 'license激活码',
  `device_status` bit(1) DEFAULT b'0',
  `device_active_time` int(11) DEFAULT NULL COMMENT '激活时间',
  PRIMARY KEY (`device_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `tp_device`
--

INSERT INTO `tp_device` (`device_id`, `device_code`, `device_license_code`, `device_status`, `device_active_time`) VALUES
(1, '067ada1272c4f8', '350a81eb2a9d661545e42e73d07fa020', b'0', NULL),
(2, '', '', b'0', NULL),
(14, 'FDD837A3-44DB-59A2-B9E4-2B0E00CB1BDF', '', b'0', NULL),
(3, 'aaaaaaaa', '', b'0', NULL),
(4, 'bbbbbbb', NULL, b'0', NULL),
(5, 'ccccc', NULL, b'0', NULL),
(6, 'dddd', NULL, b'0', NULL),
(7, 'eeeee', 'b62fa97b2a5ff516e2b0d2ae7cea10f4', b'1', NULL),
(8, 'ttttt', 'd8caae9a3ae968075b776f445ee526e7', b'1', NULL),
(9, 'uuuuu', NULL, b'0', NULL),
(10, 'fghfghfgh', 'd8caae9a3ae968075b776f445ee526e7', b'1', NULL),
(11, 'llllllllll', '4fdc595c8203ea71c30fecf73665c539', b'1', NULL),
(12, 'oooouuuououo', '4fdc595c8203ea71c30fecf73665c539', b'1', NULL),
(13, 'ooiuuyyyyyo', NULL, b'0', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_license`
--

CREATE TABLE IF NOT EXISTS `tp_license` (
  `license_id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `license_code` varchar(255) DEFAULT NULL,
  `license_count` int(9) unsigned DEFAULT NULL,
  `license_paypal_tx` varchar(255) DEFAULT NULL COMMENT '对应的paypal订单表的订单编号',
  `license_time` int(10) DEFAULT NULL COMMENT '购买license的时间戳',
  `license_user_email` varchar(255) DEFAULT NULL COMMENT '所属于的用户eamil',
  `license_status` bit(1) DEFAULT NULL,
  `license_pro_type` int(10) DEFAULT NULL COMMENT '所属产品种类',
  PRIMARY KEY (`license_id`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `tp_license`
--

INSERT INTO `tp_license` (`license_id`, `license_code`, `license_count`, `license_paypal_tx`, `license_time`, `license_user_email`, `license_status`, `license_pro_type`) VALUES
(41, '3421ec0ac72f236ba5f881291c726abe', 1, '4WS5433857787102K', 1544256356, 'videoeasysoft-buyer@163.com', b'1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_paypal`
--

CREATE TABLE IF NOT EXISTS `tp_paypal` (
  `id` tinyint(9) NOT NULL AUTO_INCREMENT COMMENT '本表主键',
  `mc_gross` int(9) DEFAULT NULL COMMENT '总价',
  `invoice` varchar(255) DEFAULT NULL COMMENT '本地订单号',
  `protection_eligibility` varchar(255) DEFAULT NULL COMMENT '保护资格',
  `payer_id` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `charset` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `mc_fee` float(255,0) DEFAULT NULL,
  `notify_version` float(255,0) DEFAULT NULL,
  `custom` varchar(255) DEFAULT NULL,
  `payer_status` varchar(255) DEFAULT NULL,
  `business` varchar(255) DEFAULT NULL COMMENT '商家邮箱',
  `quantity` int(255) DEFAULT NULL COMMENT '商品数量',
  `verify_sign` varchar(255) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL COMMENT '买家邮箱',
  `txn_id` varchar(255) DEFAULT NULL COMMENT '订单编号',
  `payment_type` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `receiver_email` varchar(255) DEFAULT NULL COMMENT '收款人email',
  `payment_fee` float(255,0) DEFAULT NULL COMMENT '支付费用',
  `shipping_discount` float(255,0) DEFAULT NULL COMMENT '运费',
  `receiver_id` varchar(255) DEFAULT NULL,
  `insurance_amount` float(255,0) DEFAULT NULL COMMENT '保险金',
  `txn_type` varchar(255) DEFAULT NULL COMMENT '交易方式',
  `item_name` varchar(255) DEFAULT NULL COMMENT '商品名称',
  `discount` float(255,0) DEFAULT NULL COMMENT '折扣',
  `mc_currency` varchar(255) DEFAULT NULL COMMENT '币种',
  `item_number` int(11) DEFAULT NULL COMMENT '商品编号',
  `residence_country` varchar(255) DEFAULT NULL COMMENT '地区',
  `test_ipn` int(255) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `transaction_subject` varchar(255) DEFAULT NULL COMMENT '交易主体',
  `payment_gross` float(255,0) DEFAULT NULL COMMENT '支付总额',
  `ipn_track_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- 转存表中的数据 `tp_paypal`
--

INSERT INTO `tp_paypal` (`id`, `mc_gross`, `invoice`, `protection_eligibility`, `payer_id`, `payment_date`, `payment_status`, `charset`, `first_name`, `mc_fee`, `notify_version`, `custom`, `payer_status`, `business`, `quantity`, `verify_sign`, `payer_email`, `txn_id`, `payment_type`, `last_name`, `receiver_email`, `payment_fee`, `shipping_discount`, `receiver_id`, `insurance_amount`, `txn_type`, `item_name`, `discount`, `mc_currency`, `item_number`, `residence_country`, `test_ipn`, `shipping_method`, `transaction_subject`, `payment_gross`, `ipn_track_id`) VALUES
(104, 5, '1544256328000629493', 'Eligible', 'NHW4HBLZ5Y6KJ', '00:10:30 Dec 08, 2018 PST', 'Completed', 'gb2312', 'test', 0, 4, '', 'verified', 'videoeasysoft-facilitator@163.com', 1, 'AlzNL.ngTGDarBQvIOo--kgIeerMAjSQ8UzR-jeZzBbpr-26cIlifvyb', 'videoeasysoft-buyer@163.com', '4WS5433857787102K', 'instant', 'buyer', 'videoeasysoft-facilitator@163.com', 0, 0, 'R3SULBHLDTLAY', 0, 'web_accept', '7D-1T-SELF', 0, 'USD', 1, 'CN', 1, 'Default', '', 5, '443ae99535434');

-- --------------------------------------------------------

--
-- 表的结构 `tp_pro`
--

CREATE TABLE IF NOT EXISTS `tp_pro` (
  `pro_id` tinyint(9) NOT NULL AUTO_INCREMENT,
  `pro_term` varchar(255) DEFAULT NULL COMMENT '期限',
  `pro_type` int(10) DEFAULT NULL COMMENT '产品种类',
  `pro_region` varchar(30) DEFAULT NULL COMMENT '茶品所属地区',
  `pro_price` float(30,2) DEFAULT NULL COMMENT '价格',
  `pro_device_count` int(10) DEFAULT NULL COMMENT '可激活产品数量',
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tp_pro`
--

INSERT INTO `tp_pro` (`pro_id`, `pro_term`, `pro_type`, `pro_region`, `pro_price`, `pro_device_count`) VALUES
(1, '1', 1, 'USD', 5.00, 1),
(2, '365', 2, 'USD', 35.00, 1),
(3, '0', 3, 'USD', 45.00, 1),
(4, '0', 4, 'USD', 99.00, 7);

-- --------------------------------------------------------

--
-- 表的结构 `tp_user`
--

CREATE TABLE IF NOT EXISTS `tp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) DEFAULT NULL,
  `user_active_status` varchar(255) DEFAULT '\0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- 转存表中的数据 `tp_user`
--

INSERT INTO `tp_user` (`id`, `user_email`, `user_active_status`) VALUES
(97, '1111111@qq.com', 'payment_status=Completed');

-- --------------------------------------------------------

--
-- 表的结构 `tp_version`
--

CREATE TABLE IF NOT EXISTS `tp_version` (
  `version_id` tinyint(9) NOT NULL AUTO_INCREMENT,
  `version_number` varchar(30) DEFAULT NULL COMMENT '版本号',
  `version_download` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`version_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tp_version`
--

INSERT INTO `tp_version` (`version_id`, `version_number`, `version_download`) VALUES
(1, '12312@11', 'aaaaaaaaaa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
