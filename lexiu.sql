-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-08-12 15:56:08
-- 服务器版本： 5.6.21
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lexiu`
--

-- --------------------------------------------------------

--
-- 表的结构 `yp_admin`
--

CREATE TABLE IF NOT EXISTS `yp_admin` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_name` varchar(120) NOT NULL,
  `kq_pwd` varchar(200) NOT NULL,
  `kq_uniqid` varchar(200) NOT NULL,
  `kq_checked` tinyint(4) NOT NULL,
  `kq_groupid` tinyint(4) NOT NULL,
  `kq_savebao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_admin`
--

INSERT INTO `yp_admin` (`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_pwd`, `kq_uniqid`, `kq_checked`, `kq_groupid`, `kq_savebao`) VALUES
(1, '6a4d964910683750b0ecfe6520fb75f3', '1400419288', 1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '781cdf4259e8679a67b9ea29f598443990302e6f', 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yp_admingroup`
--

CREATE TABLE IF NOT EXISTS `yp_admingroup` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_intro` varchar(120) DEFAULT NULL,
  `kq_group` varchar(120) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_admingroup`
--

INSERT INTO `yp_admingroup` (`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_intro`, `kq_group`) VALUES
(1, '0cff2e3816d1a447c8d9db3d422bf5f2', '1428323780', 0, '超级管理员', NULL, '["root"]'),
(2, 'b215a39888d1b0943c90fb8f030570e5', '1428323793', 0, '信息编辑', NULL, '["news_add","news_edt","news_dl"]'),
(3, '7402a04ae60c444b53ed51412e8475f0', '1428323801', 0, '游客', NULL, '["read"]');

-- --------------------------------------------------------

--
-- 表的结构 `yp_adv`
--

CREATE TABLE IF NOT EXISTS `yp_adv` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_checked` tinyint(4) DEFAULT '1',
  `kq_name` varchar(255) NOT NULL,
  `kq_type` varchar(120) NOT NULL,
  `kq_picurl` text,
  `kq_code` text,
  `kq_url` text,
  `kq_onclick` int(11) DEFAULT '1',
  `kq_position` varchar(120) DEFAULT NULL,
  `kq_diyposition` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_adv`
--

INSERT INTO `yp_adv` (`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_checked`, `kq_name`, `kq_type`, `kq_picurl`, `kq_code`, `kq_url`, `kq_onclick`, `kq_position`, `kq_diyposition`) VALUES
(1, '3dd21707f61c62a8d7e6df998d752fd5', '1438925361', 0, 1, '招聘', '1', '20150807135247_19258.gif', NULL, 'http://companyadc.51job.com/companyads/2015/gz/hengda0804c_7124wh/index.htm', 1, 'index', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yp_city`
--

CREATE TABLE IF NOT EXISTS `yp_city` (
`id` int(11) NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) NOT NULL,
  `kq_title` varchar(255) NOT NULL,
  `kq_fid` int(11) NOT NULL,
  `kq_ename` varchar(255) DEFAULT NULL,
  `kq_content` text,
  `kq_sort` int(11) DEFAULT '0',
  `kq_islast` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_city`
--

INSERT INTO `yp_city` (`id`, `kq_uuid`, `kq_ctime`, `kq_title`, `kq_fid`, `kq_ename`, `kq_content`, `kq_sort`, `kq_islast`) VALUES
(1, 'a95ab23c879f1e26751ac904f415bff3', '1439115604', '广西省', 0, NULL, NULL, 0, 1),
(2, '3f3169911fa45cf6e9267ffaaa511ebd', '1439119551', '南宁市', 1, NULL, NULL, 0, 0),
(3, 'a99764acfdec6356af0477f09e8401e8', '1439120180', '百色', 1, NULL, NULL, 0, 0),
(4, '91cef43caeeeed6a498ed4cdc25ea82a', '1439358010', '北海道', 1, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yp_config`
--

CREATE TABLE IF NOT EXISTS `yp_config` (
`id` int(4) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_keyword` varchar(200) DEFAULT NULL,
  `kq_description` varchar(255) DEFAULT NULL,
  `kq_closed` tinyint(1) DEFAULT NULL,
  `kq_closedip` text,
  `kq_rewrite` tinyint(1) DEFAULT NULL,
  `kq_link` tinyint(1) DEFAULT NULL,
  `kq_tongji` text,
  `kq_tel` varchar(60) DEFAULT NULL,
  `kq_telname` varchar(120) DEFAULT NULL,
  `kq_phone` varchar(60) DEFAULT NULL,
  `kq_fax` varchar(60) DEFAULT NULL,
  `kq_qq` varchar(60) DEFAULT NULL,
  `kq_url` varchar(255) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_icp` varchar(60) DEFAULT NULL,
  `kq_youbian` varchar(60) DEFAULT NULL,
  `kq_basename` varchar(120) DEFAULT 'kongqi',
  `kq_openconfig` text,
  `kq_number` int(11) DEFAULT '1',
  `kq_setlanmu` varchar(255) DEFAULT NULL,
  `kq_shuxing` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_config`
--

INSERT INTO `yp_config` (`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_title`, `kq_keyword`, `kq_description`, `kq_closed`, `kq_closedip`, `kq_rewrite`, `kq_link`, `kq_tongji`, `kq_tel`, `kq_telname`, `kq_phone`, `kq_fax`, `kq_qq`, `kq_url`, `kq_email`, `kq_address`, `kq_icp`, `kq_youbian`, `kq_basename`, `kq_openconfig`, `kq_number`, `kq_setlanmu`, `kq_shuxing`) VALUES
(1, '', NULL, 0, '秀动全城', '秀动全城，同城资讯传播最快的网站。', '秀动全城', '收录全城商业、生活资讯；提供同城最具价值招商代理、生活服务、购物消费、投资理财等信息，支持直达商家的搜索服务；快速传播商家促销信息，解决生意推广难题。', 0, '', 1, 1, '', '0771-5823405', '', '', '', '475118371', 'www.tctct.cn', '', '广西南宁市东葛路31号东葛华都5楼513室', '桂ICP备12005595号', '', 'kongqi', '{\r\n"gz":"2",\r\n"tel":"4",\r\n"wx":"3",\r\n"qq":"5",\r\n"zj":"6"\r\n}', 26241, '{"adv":"搜全城","gonggao":"公告","advlist":"广告列表"}', '{\r\n	"0":"不选择",\r\n	"1":"已解决",\r\n	"2":"未解决",\r\n	"3":"解决中",\r\n	"4":"本地招商",\r\n	"5":"本地代理",\r\n"6":"注册"\r\n\r\n}');

-- --------------------------------------------------------

--
-- 表的结构 `yp_fankui`
--

CREATE TABLE IF NOT EXISTS `yp_fankui` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_ip` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_content` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_fankui`
--

INSERT INTO `yp_fankui` (`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_title`, `kq_ip`, `kq_email`, `kq_tel`, `kq_address`, `kq_content`) VALUES
(1, '25c4f727381edbe9856b85065fba8175', '1436847811', 0, NULL, '高规格', '113.12.247.36', NULL, NULL, NULL, '高规格');

-- --------------------------------------------------------

--
-- 表的结构 `yp_file`
--

CREATE TABLE IF NOT EXISTS `yp_file` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_type` tinyint(4) DEFAULT '1',
  `kq_url` text,
  `kq_aburl` text
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_file`
--

INSERT INTO `yp_file` (`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_title`, `kq_type`, `kq_url`, `kq_aburl`) VALUES
(1, '38b153c2a07d14c5cbad67fa8bdd845e', '20150409', 0, 'QQ图片20141203001157.jpg', 1, '20150409233746_77604.jpg', 'D:/server/youpin/updatefile//thumbs/20150409233746_77604.jpg'),
(2, 'bf22518822e66e5ca7b468fa8fc523fb', '20150410', 0, 'dd.png', 1, '20150410215837_10774.png', 'D:/server/youpin/updatefile//thumbs/20150410215837_10774.png'),
(3, '1523cc51b075883633a39b4cd727a243', '20150410', 0, 'pic1.jpg', 1, '20150410221351_54181.jpg', 'D:/server/youpin/updatefile//thumbs/20150410221351_54181.jpg'),
(4, 'e19afc0cb8e1418e987de4a7757add02', '20150410', 0, 'pic1.jpg', 1, '20150410230811_57845.jpg', 'D:/server/youpin/updatefile//thumbs/20150410230811_57845.jpg'),
(5, '31c3008587688fb593abcf9f5a5fe1eb', '20150410', 0, 'pci2.jpg', 1, '20150410231106_48757.jpg', 'D:/server/youpin/updatefile//thumbs/20150410231106_48757.jpg'),
(6, '393937093590b1d252fe28e2407c3110', '20150410', 0, 'pci2.jpg', 1, '20150410231738_56892.jpg', 'D:/server/youpin/updatefile//thumbs/20150410231738_56892.jpg'),
(7, '5615b27cba13d76f510c959a8db00e16', '20150410', 0, 'pic1.jpg', 1, '20150410231752_62745.jpg', 'D:/server/youpin/updatefile//thumbs/20150410231752_62745.jpg'),
(8, '820594c16b95e46e5b54738bfa8c8df3', '20150410', 0, '空气工作室宣传.jpg', 1, '20150410231809_33694.jpg', 'D:/server/youpin/updatefile//thumbs/20150410231809_33694.jpg'),
(9, '60234a9aad8b392fb871b879c57fb157', '20150410', 0, 'dd.png', 1, '20150410231826_88348.png', 'D:/server/youpin/updatefile//thumbs/20150410231826_88348.png'),
(10, 'e00a4d589e00ca01e60ee38e2c63450a', '20150410', 0, '1.gif', 1, '20150410232004_24397.gif', 'D:/server/youpin/updatefile//thumbs/20150410232004_24397.gif'),
(11, '278e7a36ea20ae12554c5cbb6d37b0dd', '20150410', 0, 'qr.png', 1, '20150410234105_93232.png', 'D:/server/youpin/updatefile//thumbs/20150410234105_93232.png'),
(12, '868d26dd52dc8dfa2abf7c7461a963ff', '20150410', 0, 'dd.gif', 1, '20150410234328_63319.gif', 'D:/server/youpin/updatefile//thumbs/20150410234328_63319.gif'),
(13, 'ff4077f364442a604d6eba9b18e8320a', '20150410', 0, 'dd.png', 1, '20150410234514_29135.png', 'D:/server/youpin/updatefile//thumbs/20150410234514_29135.png'),
(14, '0586132ce7008b1418e35914850ac4c2', '20150411', 0, 'adv.jpg', 1, '20150411000213_59243.jpg', 'D:/server/youpin/updatefile//thumbs/20150411000213_59243.jpg'),
(15, '405de65e9bfc776ae191dd74579fdbf9', '20150411', 0, 'adv.jpg', 1, '20150411004034_80208.jpg', 'D:/server/youpin/updatefile//thumbs/20150411004034_80208.jpg'),
(16, 'a08fad648fc6e0fc459139a89d14d9fc', '20150411', 0, 'guize.png', 1, '20150411004101_45087.png', 'D:/server/youpin/updatefile//thumbs/20150411004101_45087.png'),
(17, 'a8eba53ee5ff04f1dcdccadebe7b2512', '20150411', 0, 'dd.png', 1, '20150411035205_65011.png', 'D:/server/youpin/updatefile//thumbs/20150411035205_65011.png'),
(18, 'e3679d81c41a581f4bdf8859ff149189', '20150411', 0, 'index_05.jpg', 1, '20150411184354_14133.jpg', 'D:/server/youpin/updatefile//thumbs/20150411184354_14133.jpg'),
(19, '8e8db77f5838ac400a863ead3c74abc1', '20150413', 0, 'IMG_20150411_162012.jpg', 1, '20150413105451_34927.jpg', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150413105451_34927.jpg'),
(20, 'ff18237804a3de09c987e77dcfc1722f', '20150413', 0, 'IMG_20150411_162012.jpg', 1, '20150413105519_47001.jpg', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150413105519_47001.jpg'),
(21, 'b98805f6caf6e439ac170f3965fb8176', '20150413', 0, '9 001.jpg', 1, '20150413105613_51907.jpg', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150413105613_51907.jpg'),
(22, 'a64ff4f21b925746717598ffe432ccb4', '20150413', 0, 'pci2.jpg', 1, '20150413121740_56933.jpg', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150413121740_56933.jpg'),
(23, 'c14674f8dbd86bb356e24090e947c521', '20150416', 0, '1.png', 1, '20150416053920_36240.png', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150416053920_36240.png'),
(24, '122b6fca2864953d5e840155c5dab42a', '20150416', 0, '2.jpg', 1, '20150416061702_51712.jpg', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150416061702_51712.jpg'),
(25, 'b0efea59714e1af885fa3e3abc7c1c44', '20150416', 0, 'b0a2521c0659708c73aaafcbc2c4cdc2918cd549.jpg', 1, '20150416225541_96033.jpg', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150416225541_96033.jpg'),
(26, 'f0707dc45495a99a914845376b63439d', '20150417', 0, '1.png', 1, '20150417003353_77326.png', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150417003353_77326.png'),
(27, '6e998945b7c9271713d478d669467e51', '20150417', 0, '3.png', 1, '20150417004122_39226.png', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150417004122_39226.png'),
(28, '90abb01058c5297a8030f0c69c78861d', '20150417', 0, '4.png', 1, '20150417005227_19522.png', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150417005227_19522.png'),
(29, 'ff9a47f6839ae5482135253bcd1dc572', '20150417', 0, '4.png', 1, '20150417011626_48161.png', 'D:/wwwroot/youpin/wwwroot/updatefile//thumbs/20150417011626_48161.png'),
(30, '68d723deea4f07314ebc2e3312c586ad', '20150419', 0, 'IMG_20150419_184628.jpg', 1, '20150419234357_38987.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150419234357_38987.jpg'),
(31, 'a94c2261575c466f7526f13aa7a16932', '20150420', 0, '5318339988B5B0CA3F12F838E05AF703FEBCAD49A.jpg', 1, '20150420212327_49059.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150420212327_49059.jpg'),
(32, '4d7adbd43996902bc00e4d27062989e4', '20150421', 0, '8.png', 1, '20150421232325_72237.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150421232325_72237.png'),
(33, 'e5fa82c1b9ebc79f75ca1233042b6889', '20150421', 0, '空气工作室宣传.jpg', 1, '20150421233851_65296.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150421233851_65296.jpg'),
(34, '99f83e232a397eb8672b84306d3dc50d', '20150421', 0, '二维码.jpg', 1, '20150421233957_98371.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150421233957_98371.jpg'),
(35, 'de91454667fbef1cf0955496511b97b8', '20150421', 0, '空气工作室宣传.jpg', 1, '20150421234007_77686.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150421234007_77686.jpg'),
(36, '2cfc18ef551b308ba3e6ccc4a8ed2141', '20150421', 0, 'logo1.png', 1, '20150421234506_64676.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150421234506_64676.png'),
(37, 'd961b7e1e4a039ad3bf05aacf28be35f', '20150421', 0, '空气工作室宣传.jpg', 1, '20150421234547_88656.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150421234547_88656.jpg'),
(38, '6c9dc251f753b6d7d59862ed544ddc11', '20150421', 0, 'logo1.png', 1, '20150421234641_23224.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150421234641_23224.png'),
(39, 'efecf9ed64de03b67821b636de6aeaa2', '20150421', 0, 'fax.png', 1, '20150421234708_25147.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150421234708_25147.png'),
(40, 'e82f0ce0cf822f61cd5c946d825a405d', '20150421', 0, '发票样本.jpg', 1, '20150421235521_43332.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150421235521_43332.jpg'),
(41, 'bda4704e016b222618aedb8c1a0f59ab', '20150422', 0, '20150420212327_49059.jpg', 1, '20150422001902_84242.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150422001902_84242.jpg'),
(42, 'a23be2e67535e57e8f3d68cab6f6a3c3', '20150422', 0, '4.jpg', 1, '20150422003351_91686.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150422003351_91686.jpg'),
(43, 'a603fe32624c4ae62e6c922178c3da68', '20150422', 0, '1.jpg', 1, '20150422003456_82235.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150422003456_82235.jpg'),
(44, '49aab0568000cf71b10889780833ad32', '20150422', 0, '二维码.jpg', 1, '20150422003552_69815.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150422003552_69815.jpg'),
(45, '94bd4fbfb01d13e26f81436dc48ec14b', '20150422', 0, '1.jpg', 1, '20150422003742_86379.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150422003742_86379.jpg'),
(46, '49c46043ab9f0eb8185925fbf28986cc', '20150424', 0, 'IMG_20150419_184628.jpg', 1, '20150424100615_61281.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150424100615_61281.jpg'),
(47, 'eb386bfa1ea28dfa9af5de395713edf8', '20150424', 0, 'IMG_20150421_200956.jpg', 1, '20150424101422_55019.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150424101422_55019.jpg'),
(48, '179525b8b1b6838c9e35efd4b0b5794c', '20150514', 0, '88.jpg', 1, '20150514194543_63673.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150514194543_63673.jpg'),
(49, '33b0b71bfe6661b2224cc15b3194e20d', '20150514', 0, '77.jpg', 1, '20150514195101_18679.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150514195101_18679.jpg'),
(50, 'f0dfd9c5141c9f9f9000e54c790f5207', '20150514', 0, '99.jpg', 1, '20150514201333_34958.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150514201333_34958.jpg'),
(51, 'aaa3be67c6ab4fe09637ba0e7a7ff6d0', '20150521', 0, '999_副本.jpg', 1, '20150521230659_13026.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150521230659_13026.jpg'),
(52, 'bc8361095b3209fe14e6e36d846204c9', '20150521', 0, '999_副本.jpg', 1, '20150521230823_61470.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150521230823_61470.jpg'),
(53, '127795c353924e1501376bc25e5e2ec5', '20150521', 0, '1111_副本.jpg', 1, '20150521234941_44554.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150521234941_44554.jpg'),
(54, '5a857c498724f49131abe3eb94ccca7f', '20150523', 0, '99.jpg', 1, '20150523220310_30478.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523220310_30478.jpg'),
(55, '347ea109ec2fa2f00da2a5214f74db5a', '20150523', 0, '博爱汽车网广告.jpg', 1, '20150523220357_91680.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523220357_91680.jpg'),
(56, '89a5cf5bd050ee1615df4baedfe408bd', '20150523', 0, '博爱汽车网广告2.jpg', 1, '20150523220404_20170.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523220404_20170.jpg'),
(57, '7f3cebe884e65031cc974353d5b82433', '20150523', 0, '博爱汽车网广告2.jpg', 1, '20150523220751_33595.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523220751_33595.jpg'),
(58, '09707d85f22b9c7f7655c1c837fd54fb', '20150523', 0, '博爱汽车网广告.jpg', 1, '20150523220756_13216.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523220756_13216.jpg'),
(59, '13e66dd6bc0f7b5f875aa8500f11836f', '20150523', 0, '博爱汽车网广告2.jpg', 1, '20150523220926_64714.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523220926_64714.jpg'),
(60, 'e6f4aa83e2e2b9e09e59e6702f39eead', '20150523', 0, '博爱汽车网广告2.jpg', 1, '20150523221012_57861.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523221012_57861.jpg'),
(61, '6e54399d4da70567c4643ad8a49b7b48', '20150523', 0, '博爱汽车网广告.jpg', 1, '20150523221017_36553.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523221017_36553.jpg'),
(62, '95ac145abb824690107be869f59af927', '20150523', 0, '博爱汽车网广告2.jpg', 1, '20150523221114_54544.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523221114_54544.jpg'),
(63, 'a763819e0c82dfa1c5ee7f9543afb742', '20150523', 0, '博爱汽车网广告2.jpg', 1, '20150523221204_14292.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523221204_14292.jpg'),
(64, '90029c677002376411715420213560fe', '20150523', 0, '博爱汽车网广告.jpg', 1, '20150523221208_55510.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523221208_55510.jpg'),
(65, '44362b0159cf0446fe2c5797f7a33cce', '20150523', 0, '活动1.jpg', 1, '20150523221641_64813.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523221641_64813.jpg'),
(66, 'e842fb12ac6a4e9bf6703afe100dce27', '20150523', 0, '6.png', 1, '20150523225556_55186.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523225556_55186.png'),
(67, '23e9aecc2f82f298c706ca182657e185', '20150523', 0, '6.png', 1, '20150523231448_30569.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523231448_30569.png'),
(68, '875a4a9c52deb2919f8f6adb0b1b2c82', '20150523', 0, '22.jpg', 1, '20150523231534_26888.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523231534_26888.jpg'),
(69, '6b466a9c4d4f18a7316f9a14cd32a73a', '20150523', 0, '秋季.jpg', 1, '20150523231550_99450.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523231550_99450.jpg'),
(70, 'b87436963cbcb78c3e7633a875ba3365', '20150523', 0, '6.png', 1, '20150523232847_73564.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523232847_73564.png'),
(71, '717aba7037b8ee70f08eb04a3a2e67ea', '20150523', 0, '6.png', 1, '20150523234032_81954.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150523234032_81954.png'),
(72, '42919701864a2c47933d38b86be494fe', '20150524', 0, 'Screenshot_2015-05-24-01-16-16.png', 1, '20150524011541_54733.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150524011541_54733.png'),
(73, '2486704774101c2483cc56fc69e90477', '20150524', 0, 'Screenshot_2015-05-24-01-23-23.png', 1, '20150524011925_38240.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150524011925_38240.png'),
(74, '229ee5e8f48474d1505ebb88f13bdaf8', '20150525', 0, '654_副本.jpg', 1, '20150525165730_47249.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150525165730_47249.jpg'),
(75, '8849d6d8607997a8894d11f6b3f4e3a2', '20150525', 0, '987.jpg', 1, '20150525173411_82847.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150525173411_82847.jpg'),
(76, '62a3910100c4ff090521c35b51c0bb85', '20150525', 0, '654.jpg', 1, '20150525181515_38814.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150525181515_38814.jpg'),
(77, '0df654733741b3526a3e1069d08d3701', '20150525', 0, '654_副本.jpg', 1, '20150525181605_35046.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150525181605_35046.jpg'),
(78, '53f474d8e4e1588d4926ef1f2cb11fc0', '20150525', 0, '654.jpg', 1, '20150525181630_31417.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150525181630_31417.jpg'),
(79, 'e6bad465cf9687b1ebfdc59398c2e2bc', '20150525', 0, '987.jpg', 1, '20150525181652_98607.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150525181652_98607.jpg'),
(80, '55f956afd966018b1034e7a28a9cecc9', '20150525', 0, '654_副本.jpg', 1, '20150525182315_37704.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150525182315_37704.jpg'),
(81, 'a5bac5b9fcdf2bface6dd21a4471bd95', '20150525', 0, '654.jpg', 1, '20150525183004_36949.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150525183004_36949.jpg'),
(82, '2e663d763d3a42af8b84c3abf998971d', '20150525', 0, 'TB2R2iObpXXXXaPXXXXXXXXXXXX_!!2232026620.jpg', 1, '20150525190450_35241.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150525190450_35241.jpg'),
(83, 'f7adc2c26a5be5d9fe5d900b89fc6137', '20150526', 0, '883.jpg', 1, '20150526005354_50764.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150526005354_50764.jpg'),
(84, 'a0e56e0a7ede13fd1c96fb3bb10d6858', '20150526', 0, '987.jpg', 1, '20150526223213_93987.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150526223213_93987.jpg'),
(85, '313ada42bd7d357d4cff366d55bb7241', '20150526', 0, '6.png', 1, '20150526223345_33719.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150526223345_33719.png'),
(86, '570cffe9024ea5d9e976eaf35d63d841', '20150527', 0, '直客.jpg', 1, '20150527165329_34158.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527165329_34158.jpg'),
(87, '5cc941cdc65601cbb141d3ae83088245', '20150527', 0, '654_副本_副本.jpg', 1, '20150527175814_21217.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527175814_21217.jpg'),
(88, '85ea39c40dcd90b8ebf655aba4b42377', '20150527', 0, '6.png', 1, '20150527232721_59916.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527232721_59916.png'),
(89, '20474089b87b0bd7ba2251c7e44bceb6', '20150527', 0, '6.png', 1, '20150527233033_23798.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527233033_23798.png'),
(90, 'ed082cc604fe86b76066e4cad103549e', '20150527', 0, '6.png', 1, '20150527233241_88458.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527233241_88458.png'),
(91, '7ae8f36e7ab22a9c3e19916b7babda31', '20150527', 0, '6.png', 1, '20150527233648_41975.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527233648_41975.png'),
(92, '37e3c7d7f1be239996429c1d35909a50', '20150527', 0, '654.jpg', 1, '20150527233826_64799.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527233826_64799.jpg'),
(93, 'f4bd748d8044d72f7405f27b0aeb503e', '20150527', 0, '654.jpg', 1, '20150527233838_58977.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527233838_58977.jpg'),
(94, '3118f72070d991aea95fb77f1bef44d2', '20150527', 0, '654.jpg', 1, '20150527233910_35386.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527233910_35386.jpg'),
(95, 'a7c5f9ad645b4df7d701872de3a1e909', '20150527', 0, '654.jpg', 1, '20150527233922_57947.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150527233922_57947.jpg'),
(96, '80dc56794968765be67ca0143e9ac2c8', '20150528', 0, '2.jpg', 1, '20150528120810_25317.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150528120810_25317.jpg'),
(97, '40c7e694c23598af54cbc16fa7b56c5d', '20150528', 0, '1394855621.jpg', 1, '20150528123437_25726.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150528123437_25726.jpg'),
(98, 'e447397e4a1e797f638c2b65700bcbe0', '20150528', 0, '55.jpg', 1, '20150528124720_52371.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150528124720_52371.jpg'),
(99, '68766302bbfe29fc2b60ff8e9d630aea', '20150528', 0, '66.jpg', 1, '20150528125021_40940.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150528125021_40940.jpg'),
(100, '601b0e4e0b64c869a1ee0941a9ee8f66', '20150528', 0, '000.jpg', 1, '20150528125306_23631.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150528125306_23631.jpg'),
(101, '72458ac5cc566c819c658443a5f1ccbc', '20150528', 0, '2.jpg', 1, '20150528132022_64148.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150528132022_64148.jpg'),
(102, '5e41252c1dbddf08cfd249d3c2a0a3e0', '20150528', 0, '1_副本.jpg', 1, '20150528141537_58815.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150528141537_58815.jpg'),
(103, 'd7b89d77f188d3fdb509790791bec082', '20150529', 0, '22_副本.jpg', 1, '20150529165606_15114.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150529165606_15114.jpg'),
(104, '26181ae4ef9a99c72fda031e270bd0cc', '20150529', 0, '22_副本.jpg', 1, '20150529175355_90702.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150529175355_90702.jpg'),
(105, '50976121205f0ef472a694acd29e53a2', '20150529', 0, '22_副本.jpg', 1, '20150529181550_89711.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150529181550_89711.jpg'),
(106, '99c341a8ad153ad6b12e67cf5bf3c450', '20150530', 0, '58_副本.png', 1, '20150530120155_58771.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150530120155_58771.png'),
(107, '89ebbb29e0460d439d8eabbfef2441f3', '20150530', 0, '99.jpg', 1, '20150530222107_15405.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150530222107_15405.jpg'),
(108, 'bbc93f56a823dfc2ee87a55cffcfa362', '20150530', 0, '883.jpg', 1, '20150530222423_46169.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150530222423_46169.jpg'),
(109, 'abc3a026eb75d72cf81e10b6b31212a9', '20150530', 0, '374982_副本.jpg', 1, '20150530233007_35290.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150530233007_35290.jpg'),
(110, '8c6ed5cbbd2c3151e0b280ea7d460df7', '20150531', 0, '66.jpg', 1, '20150531000243_56867.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150531000243_56867.jpg'),
(111, '03b78174e50a8d33599ed727ee102ac8', '20150531', 0, '66.jpg', 1, '20150531000308_28231.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150531000308_28231.jpg'),
(112, '6f437161f9cc56c9260aab2647d33f5f', '20150531', 0, '66.jpg', 1, '20150531000438_73800.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150531000438_73800.jpg'),
(113, 'ae122d6635410832b86c8d2e0e2f104f', '20150601', 0, 'mmexport1422104669619.jpeg', 1, '20150601010052_24433.jpeg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150601010052_24433.jpeg'),
(114, 'd30dfa438b818371dc1e9ad64b3a9285', '20150601', 0, '007_副本.jpg', 1, '20150601162825_72677.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150601162825_72677.jpg'),
(115, 'be2ac14438045d2b421809afeeeb7414', '20150601', 0, '22_副本_副本.jpg', 1, '20150601173343_96080.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150601173343_96080.jpg'),
(116, '3acbe3fc33dcd9d6906a2a055269d2b5', '20150601', 0, '999.jpg', 1, '20150601174942_54862.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150601174942_54862.jpg'),
(117, 'ae583f75755dcd82e77c3d1e13aa108a', '20150602', 0, '022.jpg', 1, '20150602155655_56376.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150602155655_56376.jpg'),
(118, 'df99c875a32c76198d6c28ddf5689178', '20150602', 0, '6.jpg', 1, '20150602160403_88461.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150602160403_88461.jpg'),
(119, 'f4bddcf59678b9a08d6ad507ee1e0ea1', '20150602', 0, '6.jpg', 1, '20150602164703_56944.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150602164703_56944.jpg'),
(120, 'b4a98a9b9c0ad24115396e2c1ef17580', '20150603', 0, '空气工作室宣传.jpg', 1, '20150603001604_26446.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603001604_26446.jpg'),
(121, '2afdee3e3410e251ae908b16bd6dec79', '20150603', 0, '空气工作室宣传.jpg', 1, '20150603005105_45917.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603005105_45917.jpg'),
(122, 'c3a2ea62d52849b6438b014c4c9338fa', '20150603', 0, '1.jpg', 1, '20150603015044_50899.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603015044_50899.jpg'),
(123, '8caff3f5ecb2580cba46d7887071d7b7', '20150603', 0, '66.jpg', 1, '20150603015210_37507.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603015210_37507.jpg'),
(124, 'eab0890438dfbe3ba6f8cfa46a741197', '20150603', 0, '20150411000213_59243.jpg', 1, '20150603015807_17748.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603015807_17748.jpg'),
(125, '8d0154b025924cac40f2c510df588989', '20150603', 0, 'xiu.jpg', 1, '20150603015908_43739.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603015908_43739.jpg'),
(126, '5fd6efd161f922768921c1dd26fec5e2', '20150603', 0, 'xiu.jpg', 1, '20150603015939_31448.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603015939_31448.jpg'),
(127, 'd2aa53302809df75016887c106e0d1ad', '20150603', 0, '0.jpg', 1, '20150603020142_97006.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603020142_97006.jpg'),
(128, '9e8766a5c7739e76a9eec49fc6431def', '20150603', 0, '空气工作室宣传.jpg', 1, '20150603232619_54024.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603232619_54024.jpg'),
(129, 'f7ca51c2462c5ed4623ce87e2d71c0ae', '20150603', 0, '空气工作室宣传.jpg', 1, '20150603232704_31838.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603232704_31838.jpg'),
(130, 'a1d44560a883395730ca5c2aab7ca3d6', '20150603', 0, '空气工作室宣传.jpg', 1, '20150603233109_80595.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603233109_80595.jpg'),
(131, '092d9b1860d1d1702aa10353bc2121a2', '20150603', 0, 'mmexport1430148726988.jpeg', 1, '20150603234429_93141.jpeg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150603234429_93141.jpeg'),
(132, '96d7d410ddeb0134c4b59e14a56f17e7', '20150604', 0, 'IMG_20150228_185342.jpg', 1, '20150604133300_15210.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604133300_15210.jpg'),
(133, 'd3be6cf5ae689606a1489c3b4189c0c7', '20150604', 0, '5522_副本.jpg', 1, '20150604134425_40379.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604134425_40379.jpg'),
(134, '7773f2d69b32031d998a407b36db8e1c', '20150604', 0, '13.jpg', 1, '20150604184335_79760.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604184335_79760.jpg'),
(135, '9b438bfd52e58b625e3a77218ce2c05b', '20150604', 0, '11.jpg', 1, '20150604184516_31255.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604184516_31255.jpg'),
(136, '7f5599c53d7b413d41a2e570fad777cb', '20150604', 0, '12.jpg', 1, '20150604184700_33972.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604184700_33972.jpg'),
(137, 'ebc080e137ae54472cdac8e65c915200', '20150604', 0, '015_副本.jpg', 1, '20150604201312_37594.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604201312_37594.jpg'),
(138, '994b3acbd9903dab6d41cbfdad37481c', '20150604', 0, '023_副本.jpg', 1, '20150604202249_40014.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604202249_40014.jpg'),
(139, 'f740c8dc4003e7fdc91d2591f8bd5b59', '20150604', 0, '023_副本.jpg', 1, '20150604202310_80639.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604202310_80639.jpg'),
(140, '59e0fc8bdd8585df57c1140aad05e829', '20150604', 0, '023_副本.jpg', 1, '20150604203751_27124.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604203751_27124.jpg'),
(141, 'eedffce99be884e9a3f961d7deecdb50', '20150604', 0, '22_副本.jpg', 1, '20150604205102_28393.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150604205102_28393.jpg'),
(142, '7067b9332368c34558459c74a0c44b83', '20150605', 0, '我的4级.jpg', 1, '20150605230924_49696.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150605230924_49696.jpg'),
(143, 'bf97c71ca1e79154bcb4de41274da6a3', '20150605', 0, '苹果密保.jpg', 1, '20150605230932_57345.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150605230932_57345.jpg'),
(144, '71db224f6e3ea810fe50ba6817593ae1', '20150605', 0, '500密保.jpg', 1, '20150605230938_69100.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150605230938_69100.jpg'),
(145, 'e41f060a65f79f8947e0ac57c6f6c4fb', '20150605', 0, '空气工作室宣传.jpg', 1, '20150605234647_52107.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150605234647_52107.jpg'),
(146, '59c43e4d2b74147e163afb684a5d7d66', '20150605', 0, '空气工作室宣传.jpg', 1, '20150605234834_37853.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150605234834_37853.jpg'),
(147, '5aa06217e0f9054928f33270de272e44', '20150605', 0, '空气工作室宣传.jpg', 1, '20150605234912_50130.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150605234912_50130.jpg'),
(148, 'acb3c6f9fd7e0ff0160e4736c16171d9', '20150605', 0, '空气工作室宣传.jpg', 1, '20150605234923_79884.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150605234923_79884.jpg'),
(149, '76a3ae4a9df1eec5e915bfa677ed0f68', '20150606', 0, '364116ab34266fb830e833662f33507d09e79d3e.jpg', 1, '20150606092423_77640.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606092423_77640.jpg'),
(150, 'c6c2c1649c4d4901855a4213ac641a4b', '20150606', 0, '364116ab34266fb830e833662f33507d09e79d3e.jpg', 1, '20150606092528_75571.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606092528_75571.jpg'),
(151, 'f31bdb49dbe3dc7ffd36b8ae451eecf7', '20150606', 0, '0f4ec119eb4ae496d88b7e23c45d94e5f956c2a2.jpg', 1, '20150606092542_24600.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606092542_24600.jpg'),
(152, 'e0c1bc14f826895a017fa035777ac259', '20150606', 0, '4c7ab033e6b41c7170e568beb8a02ce6d309cfce.jpg', 1, '20150606092625_74953.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606092625_74953.jpg'),
(153, 'f89a9dceebe4a677948830efafd56c55', '20150606', 0, '44d59f680397499218e3511e861afca6bd64e240.jpg', 1, '20150606092654_76016.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606092654_76016.jpg'),
(154, 'dd348eae665fce188ebf05cccc1b058f', '20150606', 0, '0f4ec119eb4ae496d88b7e23c45d94e5f956c2a2.jpg', 1, '20150606092918_52717.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606092918_52717.jpg'),
(155, '74612335b107d49ff5bb23469262a136', '20150606', 0, '497eb04c140159512db6406f8f547809c81b15bb.jpg', 1, '20150606093001_71688.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606093001_71688.jpg'),
(156, 'feaef4368fc411cf7c826b0e37bc60e0', '20150606', 0, '0f4ec119eb4ae496d88b7e23c45d94e5f956c2a2.jpg', 1, '20150606093016_53173.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606093016_53173.jpg'),
(157, '89fa48d41611b5ab92ad6d34a5ed1598', '20150606', 0, '0f4ec119eb4ae496d88b7e23c45d94e5f956c2a2.jpg', 1, '20150606093149_51380.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606093149_51380.jpg'),
(158, '47f2ca5b35767db8b0a4f4f4ead7664e', '20150606', 0, '0f4ec119eb4ae496d88b7e23c45d94e5f956c2a2.jpg', 1, '20150606093230_11194.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606093230_11194.jpg'),
(159, '11740cecf0066ac8356e6018373044e7', '20150606', 0, '4c7ab033e6b41c7170e568beb8a02ce6d309cfce.jpg', 1, '20150606093244_96995.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606093244_96995.jpg'),
(160, '956ec430f15200710ae98de8fb8114a3', '20150606', 0, '364116ab34266fb830e833662f33507d09e79d3e.jpg', 1, '20150606093255_64950.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150606093255_64950.jpg'),
(161, 'aaf50652e3da130cecaf042b335d0f8f', '20150607', 0, '1433399925371.jpeg', 1, '20150607103619_26820.jpeg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607103619_26820.jpeg'),
(162, 'c6cdf4db2d9767831cc78d8a11ff9ff1', '20150607', 0, '1433399925371.jpeg', 1, '20150607103707_29682.jpeg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607103707_29682.jpeg'),
(163, '9f5e7ee5765330ca01ba8434667f0559', '20150607', 0, '1433399925371.jpeg', 1, '20150607103724_56628.jpeg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607103724_56628.jpeg'),
(164, '77cf42648a9492e0e337ca9e6785eeac', '20150607', 0, 'IMG_20150528_204034.jpg', 1, '20150607103806_45312.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607103806_45312.jpg'),
(165, 'fbdfe6169e6cde36b23eb275ca3f7d23', '20150607', 0, '0f4ec119eb4ae496d88b7e23c45d94e5f956c2a2.jpg', 1, '20150607104137_77813.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607104137_77813.jpg'),
(166, 'cfa758d204c603d53bd7c2b72325e7c7', '20150607', 0, '0f4ec119eb4ae496d88b7e23c45d94e5f956c2a2.jpg', 1, '20150607104139_82682.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607104139_82682.jpg'),
(167, '30823ac0cb267a06fd29fce6c1092a5b', '20150607', 0, '58_副本.png', 1, '20150607160545_11667.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607160545_11667.png'),
(168, '805ba0c8e91e8a8523ae96f65c8b0252', '20150607', 0, '0_副本.jpg', 1, '20150607160614_35208.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607160614_35208.jpg'),
(169, '207d31e135f0471971dd602f7b939b4e', '20150607', 0, '空气工作室宣传.jpg', 1, '20150607225314_52269.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607225314_52269.jpg'),
(170, 'b69e430c44254247c5b5d1969519879b', '20150607', 0, '7-8月団期.jpg', 1, '20150607225425_62006.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607225425_62006.jpg'),
(171, 'd56e151194f06783f1a6fbf178a158a3', '20150607', 0, '空气工作室宣传.jpg', 1, '20150607225559_72602.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607225559_72602.jpg'),
(172, 'f905d4480d07cc0b057f978fcb450312', '20150607', 0, '7-8月団期.jpg', 1, '20150607225625_83572.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607225625_83572.jpg'),
(173, 'cd4860b048a47056a42a9c87354f3e11', '20150607', 0, '宝丰首页.jpg', 1, '20150607225650_40064.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607225650_40064.jpg'),
(174, '27a307385eaf46452d74747640f3cc85', '20150607', 0, '空气工作室宣传.jpg', 1, '20150607232548_81312.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607232548_81312.jpg'),
(175, '5bd9273fc8df8c5cd88196c1d0cf9360', '20150607', 0, '空气工作室宣传.jpg', 1, '20150607232602_64854.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607232602_64854.jpg'),
(176, '30c16b49a5fb1d58f7a4db4082a1cb80', '20150607', 0, '冲绳物语-美之海五天游.jpg', 1, '20150607234340_60701.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607234340_60701.jpg'),
(177, 'ae3f0a4f5781d35906267bfc3c2b8f5f', '20150607', 0, '乐天世界五天超值乐购游.jpg', 1, '20150607234347_99148.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607234347_99148.jpg'),
(178, 'cca1b0fa81f7e4c2305b0537db5474a6', '20150607', 0, '漫游日本广告.jpg', 1, '20150607234355_60688.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607234355_60688.jpg'),
(179, 'f837900137ebb42a32d35045e938c069', '20150607', 0, '首尔济州五天尊享之旅.jpg', 1, '20150607234855_59704.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150607234855_59704.jpg'),
(180, '4714d721f00dc6a29bc58ba50df8a960', '20150608', 0, 'IMG_20150520_145814.jpg', 1, '20150608145352_91765.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150608145352_91765.jpg'),
(181, '9caa7611de0d314ec5b6dcb0717ccacb', '20150608', 0, '1433399925371.jpeg', 1, '20150608145413_51028.jpeg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150608145413_51028.jpeg'),
(182, '00ed62fde1b9d0c1b6d99978d050987c', '20150608', 0, 'mmexport1430148726988.jpeg', 1, '20150608145434_87849.jpeg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150608145434_87849.jpeg'),
(183, '1b6afda0eed089505f7b3ec63b6ba4dd', '20150608', 0, '21-53-10-20150421233957_98371.jpg', 1, '20150608145451_14389.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150608145451_14389.jpg'),
(184, '1a35606cd25814606ec0371c4755bede', '20150608', 0, '-ce30eab6e5b3405.jpg', 1, '20150608145545_13356.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150608145545_13356.jpg'),
(185, '81423e0a0a55b4c5f21583836af88724', '20150608', 0, '44d59f680397499218e3511e861afca6bd64e240.jpg', 1, '20150608145559_48611.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150608145559_48611.jpg'),
(186, '03923f4c7d928b7e4e932e5a36991a65', '20150729', 0, '777_副本.jpg', 1, '20150729005103_48526.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150729005103_48526.jpg'),
(187, '6e57c4ec3ca4b7db61f85c0206058d58', '20150730', 0, '未标题-1.jpg', 1, '20150730005858_34334.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150730005858_34334.jpg'),
(188, '02df91477bda8fc3903831aa78cf004f', '20150730', 0, '777_副本.jpg', 1, '20150730011414_79175.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150730011414_79175.jpg'),
(189, 'd2e3510cbd4d857757c90c7a4e335ac2', '20150730', 0, '777.jpg', 1, '20150730011451_64080.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150730011451_64080.jpg'),
(190, 'eefbab54f849fc42226711fa30ea155d', '20150730', 0, '99999.jpg', 1, '20150730011522_85624.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150730011522_85624.jpg'),
(191, '0b956c971004db76d76e6e33619323b8', '20150730', 0, 'N@P6C}{$RG9G{JQ3R]G6$X3.png', 1, '20150730011538_85585.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150730011538_85585.png'),
(192, '10d7347df9a2b711b93674da1a71f05b', '20150730', 0, '13_副本.jpg', 1, '20150730213947_79233.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150730213947_79233.jpg'),
(193, '073135998e93b165c76d9b46575035c2', '20150730', 0, '444_副本.jpg', 1, '20150730223521_57719.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150730223521_57719.jpg'),
(194, 'c1fdc144ae71a7dbd39deb7d1bd0cbe8', '20150730', 0, '0.jpg', 1, '20150730223834_54252.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150730223834_54252.jpg'),
(195, 'cbd5d3278655984553e0136b340270ab', '20150801', 0, '03.jpg', 1, '20150801175535_19225.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150801175535_19225.jpg'),
(196, '2a027b7dffc34b4b8b830e167b93270d', '20150802', 0, '02.jpg', 1, '20150802001532_23691.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150802001532_23691.jpg'),
(197, '4df8a24d91b84c875a3282b6681d423e', '20150802', 0, '02.jpg', 1, '20150802001612_28970.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150802001612_28970.jpg'),
(198, '5075ebeb8376454d7d439bbd5c316090', '20150802', 0, '02.jpg', 1, '20150802001724_29465.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150802001724_29465.jpg'),
(199, '68bcfb3f41dd6be9bb924a0f9f0385a2', '20150802', 0, '01.jpg', 1, '20150802001931_35057.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150802001931_35057.jpg'),
(200, '5f2571301187be588397196a7df7447c', '20150802', 0, '11_副本.png', 1, '20150802010350_59216.png', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150802010350_59216.png'),
(201, 'f1dc389e7e105bc7a691e78c4768d3f6', '20150807', 0, '2.jpg', 1, '20150807105455_18253.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150807105455_18253.jpg'),
(202, 'c96d3cb275da5b9c8f924bb44c8f7ceb', '20150807', 0, '20150730005858_34334.jpg', 1, '20150807105903_70276.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150807105903_70276.jpg'),
(203, '9b3beb4d8bf6928f8c20eba8d6fa93a8', '20150807', 0, 'qrcode_for_gh_ca53e54bbdfc_258.jpg', 1, '20150807105953_92238.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150807105953_92238.jpg'),
(204, 'a190cf6bfa142c2c1b3f59575ae0269d', '20150807', 0, '1.gif', 1, '20150807132914_61828.gif', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150807132914_61828.gif'),
(205, 'e7ed0c739454ee262a1d4c0d1eca7622', '20150807', 0, '未命名.gif', 1, '20150807134412_73814.gif', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150807134412_73814.gif'),
(206, 'd5e6bf90c92bf480fefc53d93058f1ca', '20150807', 0, 'uupoop.jpg', 1, '20150807134536_77417.jpg', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150807134536_77417.jpg'),
(207, '8d0d2194789bf5339d04c14008f6a104', '20150807', 0, '未命名.gif', 1, '20150807135247_19258.gif', 'D:/wwwroot/lexiu/wwwroot/updatefile//thumbs/20150807135247_19258.gif'),
(208, '565bb84ad17473ee1a52870e107aaf15', '20150809', 0, '南怡岛统一展望台五天超值乐购游.jpg', 1, '20150809201253_33411.jpg', 'D:/server/youpin/updatefile//thumbs/20150809201253_33411.jpg'),
(209, '361eba25d6954e7210aa566c4d832722', '20150809', 0, '透明.png', 1, '20150809201335_41967.png', 'D:/server/youpin/updatefile//thumbs/20150809201335_41967.png');

-- --------------------------------------------------------

--
-- 表的结构 `yp_index`
--

CREATE TABLE IF NOT EXISTS `yp_index` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_ctime` varchar(120) NOT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_type` varchar(120) DEFAULT NULL,
  `kq_content` text,
  `kq_code` text,
  `kq_thumbs` text,
  `kq_checked` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_index`
--

INSERT INTO `yp_index` (`id`, `kq_uuid`, `kq_sort`, `kq_ctime`, `kq_title`, `kq_type`, `kq_content`, `kq_code`, `kq_thumbs`, `kq_checked`) VALUES
(2, '2d7e1f07d44b17d34cc706c9cdd04bb9', 0, '1428680188', '活动规则', 'code', NULL, '', '', 1),
(3, '7cdaabd165e9aef93ea680bd0e9e45c1', 0, '1428680591', '微信公众二维码', 'pic', NULL, NULL, '["20150807105953_92238.jpg"]', 1),
(4, 'aff9cefc5eeb994e44dd4816946c0f68', 0, '1428680907', '电话号码', 'code', NULL, '0771-58 23405', '', 1),
(5, '4347a61d83e0a9becc14273191e88ae3', 0, '1428687500', 'QQ号码', 'code', NULL, '475118371', '', 1),
(6, '47512d5fdd34e545ac6c077cd0d8e479', 0, '1432389716', '特别说明', 'cont', '<p>\r\n	&nbsp;&nbsp;&nbsp; 客服电话只接受广告咨询，请联系带您到这里的客户经理，由客户经理为您安排广告投放事宜，谢谢配合！\r\n</p>', NULL, '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `yp_lanmu`
--

CREATE TABLE IF NOT EXISTS `yp_lanmu` (
`id` int(11) unsigned NOT NULL,
  `kq_fid` int(11) unsigned NOT NULL,
  `kq_cpid` int(11) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) NOT NULL,
  `kq_ename` varchar(120) DEFAULT NULL,
  `kq_model` tinyint(1) DEFAULT NULL,
  `kq_type` varchar(120) DEFAULT NULL,
  `kq_show` tinyint(1) DEFAULT NULL,
  `kq_islast` tinyint(1) NOT NULL DEFAULT '0',
  `kq_picurl` text,
  `kq_url` varchar(255) DEFAULT NULL,
  `kq_wburl` varchar(255) DEFAULT NULL,
  `kq_moban` varchar(255) DEFAULT NULL,
  `kq_daohan` tinyint(1) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_keyword` varchar(255) DEFAULT NULL,
  `kq_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_lanmu`
--

INSERT INTO `yp_lanmu` (`id`, `kq_fid`, `kq_cpid`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_ename`, `kq_model`, `kq_type`, `kq_show`, `kq_islast`, `kq_picurl`, `kq_url`, `kq_wburl`, `kq_moban`, `kq_daohan`, `kq_title`, `kq_keyword`, `kq_description`) VALUES
(1, 0, NULL, '693047a6d16ce5b129a6241143b27d8b', '1428591016', 1, '搜全城', 'nanningxuqiu', 1, 'adv', NULL, 1, '', 'xiudongquancheng', '', NULL, NULL, '', '', '																																																																																																																																																																																																																																																															'),
(2, 0, NULL, '5366d5003855e0ad1c7673a75ca22db0', '1428591040', 0, '帮助中心', 'help', 0, NULL, 2, 0, '', 'help', '', NULL, NULL, '', '', '																				'),
(3, 2, NULL, 'fae05c11b28848a77615faec817ff1ea', '1428591066', 0, '推广合作', 'adv_help', 2, NULL, NULL, 1, '', 'advhelp', '', NULL, NULL, '', '', '																																																																																																																								'),
(4, 2, NULL, '85d884c45df6ea1d9be3249bc560da7f', '1428591088', 0, '服务说明', 'helpmsg', 2, NULL, NULL, 1, '', 'helpmsg', '', NULL, NULL, '', '', '																														'),
(5, 0, NULL, '939b4f929ee54c3a77e41c7acaaff9d1', '1428674271', 2, '右侧小广告', '', 1, 'advlist', NULL, 1, '', 'adv', '', NULL, NULL, '', '', '																																																												'),
(6, 0, NULL, '6d83607bb5df7a7cbfb844b0afc59c7e', '1428765063', 0, '公告', 'gongao', 2, 'gonggao', NULL, 1, '', 'gongao', '', NULL, NULL, '', '', '										'),
(7, 0, NULL, '7d2c6f67922d3eaf3d8925a7bc81aab1', '1432389768', 0, '猜奖活动', '', 1, '0', NULL, 1, '', 'gitf', '', NULL, NULL, '', '', '																																																																																																														'),
(8, 0, NULL, 'e95a5a1cd6fc3a24c25ac336cf1334f5', '1439212552', 0, '顶部广告', 'topadv', 1, 'advlist', NULL, 1, NULL, 'topadv', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yp_liuyan`
--

CREATE TABLE IF NOT EXISTS `yp_liuyan` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_number` int(11) DEFAULT NULL,
  `kq_picurl` text,
  `kq_checked` tinyint(1) DEFAULT '1',
  `kq_search` tinyint(4) DEFAULT '1',
  `kq_newsid` varchar(120) DEFAULT NULL,
  `kq_qishu` int(11) DEFAULT NULL,
  `kq_userid` varchar(120) DEFAULT NULL,
  `kq_ip` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_content` text
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_liuyan`
--

INSERT INTO `yp_liuyan` (`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_title`, `kq_number`, `kq_picurl`, `kq_checked`, `kq_search`, `kq_newsid`, `kq_qishu`, `kq_userid`, `kq_ip`, `kq_email`, `kq_tel`, `kq_address`, `kq_content`) VALUES
(62, 'deadfd414b519566a3303a7e8d79a082', '1432223742', 0, 'andy', '【壮锦大道】德州汉堡冰淇淋1元一个特价团购活动进行中，无需预约。', 1, NULL, 1, 1, '45', NULL, '33', '117.140.8.96', NULL, NULL, NULL, '超值'),
(77, 'de47980221aed42eefb8073ce8298be2', '1433006415', 0, '乐秀儿', '【壮锦大道】德州汉堡冰淇淋1元一个特价团购活动进行中，无需预约。', 2, NULL, 1, 1, '45', NULL, '38', '117.140.8.9', NULL, NULL, NULL, '支持'),
(78, '9f6c3cff2364c755a1e9c4caddae6664', '1433006622', 0, '乐秀儿', '送你一次赢1000万元大奖的机会，你猜我买赢大奖活动等你来！（内部测试中）', 1, '', 1, 1, '48', 1, '38', '117.140.8.9', NULL, NULL, NULL, '11 15 18 28 29 32 +02\r\n我是第一个留言的，不知道能不能中一等奖呵呵呵.....'),
(79, '84511c818d6a69bdb4fd671c25415710', '1433086807', 0, 'andy', '送你一次赢1000万元大奖的机会，你猜我买赢大奖活动等你来！', 2, '', 1, 1, '48', 1, '33', '117.140.8.9', NULL, NULL, NULL, '02 06 12 23 26 29 +11  我研究了好久才选出这注号码，中了请谁吃饭号呢！！！！'),
(80, 'd353caf215ae9ffd939bb20a355286ad', '1433089377', 0, '空气', '送你一次赢1000万元大奖的机会，你猜我买赢大奖活动等你来！', 3, '', 1, 1, '48', 1, '32', '114.117.36.194', NULL, NULL, NULL, '08 09 15 19 25 30 +14  中个两三千我也愿意了'),
(81, '56dd4b5ac190616a7dcfc3f3bcfa249e', '1433089455', 0, '空气', '全南宁范围上门修电脑，各种疑难问题修好只收20元，修不好不收钱！', 1, NULL, 1, 1, '44', NULL, '32', '114.117.36.194', NULL, NULL, NULL, '顶一下'),
(82, '7e4052724a91c6b8265e18de61002bbd', '1433089497', 0, '空气', '【壮锦大道】德州汉堡冰淇淋1元一个特价团购活动进行中，无需预约。', 3, NULL, 1, 1, '45', NULL, '32', '114.117.36.194', NULL, NULL, NULL, '支持'),
(85, 'cd5139e8e43f6d943cd8e3d1372ae1b6', '1433091831', 0, 'andy', '【壮锦大道】德州汉堡冰淇淋1元一个特价团购活动进行中，无需预约。', 4, NULL, 1, 1, '45', NULL, '37', '117.140.8.9', NULL, NULL, NULL, '不错'),
(86, '626f521e4aa643927f8f592a58c001b4', '1433148149', 0, 'Apple', '送你一次赢1000万元大奖的机会，你猜我买赢大奖活动等你来！', 4, '', 1, 1, '48', 1, '35', '222.216.31.150', NULL, NULL, NULL, '05 06 11 21 22 23 +12'),
(88, '5fe885492d198202be3b4f10659c4b84', '1433265497', 0, '空气', '空气工作室', 1, NULL, 1, 1, '63', NULL, '32', '114.117.36.194', NULL, NULL, NULL, 'fdfdfdfdf'),
(89, 'd3f44e7654a607aea0e8bcd73db5091a', '1433267801', 0, 'andy', '999999', 1, NULL, 1, 1, '64', NULL, '33', '117.140.8.135', NULL, NULL, NULL, '就'),
(90, '018bac51915c15264dbacd22b6f7a6b0', '1433267823', 0, 'andy', '高效南宁广告直达', 1, NULL, 1, 1, '60', NULL, '33', '117.140.8.135', NULL, NULL, NULL, '很好'),
(91, '43684ecd1c951db4d9f7dfad6c341fd7', '1436591420', 0, 'andy', '广告好好', 1, NULL, 1, 1, '79', NULL, '33', '117.140.8.28', NULL, NULL, NULL, '广告'),
(92, '6bb87438b2f6d34623548aa8c99b0cc8', '1436627696', 0, 'andy', '找关系处理一个离婚的案件，希望找到有经验的律师，谢谢，请联系我。', 1, NULL, 1, 1, '85', NULL, '33', '117.140.8.28', NULL, NULL, NULL, '不错');

-- --------------------------------------------------------

--
-- 表的结构 `yp_lyreply`
--

CREATE TABLE IF NOT EXISTS `yp_lyreply` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_lyid` int(11) NOT NULL,
  `kq_content` text,
  `kq_adminid` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yp_nav`
--

CREATE TABLE IF NOT EXISTS `yp_nav` (
`id` int(11) unsigned NOT NULL,
  `kq_fid` int(11) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_ename` varchar(120) DEFAULT NULL,
  `kq_picurl` text,
  `kq_url` varchar(255) DEFAULT NULL,
  `kq_wburl` varchar(255) DEFAULT NULL,
  `kq_type` varchar(120) DEFAULT NULL,
  `kq_checked` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_nav`
--

INSERT INTO `yp_nav` (`id`, `kq_fid`, `kq_uuid`, `kq_sort`, `kq_ctime`, `kq_name`, `kq_ename`, `kq_picurl`, `kq_url`, `kq_wburl`, `kq_type`, `kq_checked`) VALUES
(1, 0, '7172eabb2fdd4eed9447f29fa5add82f', 4, '1428682232', '搜全城', 'index', '', '', '/', 'nav', 1),
(2, 0, 'd8c41a2c23691e59ddf1acebba66ad3a', 0, '1428929763', '推广合作', 'help_3', '', '3', 'adv.html', 'nav', 1),
(3, 0, '2e1f5960f4d0008a53b19e999fed0eb7', 1, '1428929801', '服务说明', 'help_4', '', '2', 'help.html', 'nav', 1);

-- --------------------------------------------------------

--
-- 表的结构 `yp_news`
--

CREATE TABLE IF NOT EXISTS `yp_news` (
`id` int(11) unsigned NOT NULL,
  `kq_lmid` int(11) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_wburl` varchar(255) DEFAULT NULL,
  `kq_source` varchar(255) DEFAULT NULL,
  `kq_author` varchar(120) DEFAULT NULL,
  `kq_userid` varchar(120) DEFAULT NULL,
  `kq_intro` text,
  `kq_city` varchar(255) DEFAULT NULL,
  `kq_picurl` text,
  `kq_thumbs` text,
  `kq_content` longtext,
  `kq_number` varchar(255) DEFAULT NULL,
  `kq_pdtitle` varchar(255) DEFAULT NULL,
  `kq_guize` text,
  `kq_zhongjiang` varchar(255) DEFAULT NULL,
  `kq_qishu` tinyint(4) DEFAULT NULL,
  `kq_zhanzu` text,
  `kq_zhanzupic` text,
  `kq_mbcontent` mediumtext,
  `kq_checked` tinyint(1) DEFAULT '1',
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_weixin` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_guanjc` varchar(255) DEFAULT NULL,
  `kq_qq` varchar(120) DEFAULT NULL,
  `kq_hidden` tinyint(1) DEFAULT '1',
  `kq_index` tinyint(1) DEFAULT NULL,
  `kq_isok` tinyint(1) DEFAULT '2',
  `kq_looknum` int(11) DEFAULT '1',
  `kq_keyword` varchar(255) DEFAULT NULL,
  `kq_description` varchar(255) DEFAULT NULL,
  `kq_sttime` varchar(120) DEFAULT NULL,
  `kq_endtime` varchar(120) DEFAULT NULL,
  `kq_uptime` varchar(120) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_news`
--

INSERT INTO `yp_news` (`id`, `kq_lmid`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_title`, `kq_wburl`, `kq_source`, `kq_author`, `kq_userid`, `kq_intro`, `kq_city`, `kq_picurl`, `kq_thumbs`, `kq_content`, `kq_number`, `kq_pdtitle`, `kq_guize`, `kq_zhongjiang`, `kq_qishu`, `kq_zhanzu`, `kq_zhanzupic`, `kq_mbcontent`, `kq_checked`, `kq_tel`, `kq_weixin`, `kq_address`, `kq_guanjc`, `kq_qq`, `kq_hidden`, `kq_index`, `kq_isok`, `kq_looknum`, `kq_keyword`, `kq_description`, `kq_sttime`, `kq_endtime`, `kq_uptime`) VALUES
(48, 7, '45dc676e104f0bc6fe37a4adddf50b5b', '1432549043', 0, '送你一次赢1000万元大奖的机会，你猜我买赢大奖活动等你来！', '', '', NULL, NULL, NULL, NULL, '20150601174942_54862.jpg', NULL, NULL, '500', NULL, '<p align="center">\r\n	<img alt="" src="http://www.tctct.cn/updatefile/image/20150531/20150531163837_43005.jpg" /> \r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	<span style="font-size:24px;">1、登录网站：</span><img alt="" src="http://www.tctct.cn/updatefile/image/20150527/20150527191155_82443.png" /> \r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	<span style="font-size:24px;">2、给我们留言：提供一注双色球彩票心水号<span style="font-size:24px;">码</span></span><span style="font-size:24px;">就OK了</span>&nbsp;\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p align="center">\r\n	<img alt="" src="http://www.tctct.cn/updatefile/image/20150531/20150531164110_58880.jpg" /> \r\n</p>\r\n<div>\r\n	&nbsp;\r\n</div>\r\n<div>\r\n	&nbsp;<span style="font-size:24px;">A组：任意选6个数字</span> \r\n</div>\r\n<div>\r\n	<span style="font-size:24px;"><span style="color:#e53333;"><strong>01&nbsp;02&nbsp;03&nbsp;04&nbsp;05&nbsp;06&nbsp;07&nbsp;08&nbsp;09&nbsp;10&nbsp;11&nbsp;12&nbsp;13&nbsp;14&nbsp;15&nbsp;16&nbsp;1718&nbsp;19&nbsp;&nbsp;</strong></span></span> \r\n</div>\r\n<div>\r\n	<span style="color:#e53333;font-size:24px;"><strong>20&nbsp;21&nbsp;22&nbsp;23&nbsp;24&nbsp;25&nbsp;26&nbsp;27&nbsp;28&nbsp;29&nbsp;30&nbsp;31&nbsp;32&nbsp;33</strong></span> \r\n</div>\r\n<div>\r\n	&nbsp;\r\n</div>\r\n<div>\r\n	<span style="font-size:24px;">B组：任意选1个数字</span> \r\n</div>\r\n<div>\r\n	<span style="color:#337fe5;font-size:24px;"><strong>01&nbsp; 02&nbsp; 03&nbsp; 04&nbsp; 05&nbsp; 06&nbsp; 07&nbsp; 08&nbsp; 09&nbsp; 10&nbsp; 11&nbsp; 12&nbsp; 13&nbsp; 14&nbsp; 15&nbsp; 16&nbsp;</strong></span> \r\n</div>\r\n<div>\r\n	&nbsp;\r\n</div>\r\n<div>\r\n	<strong><span style="font-size:24px;">例如：</span></strong> \r\n</div>\r\n<div>\r\n	<strong><span style="font-size:24px;"><span style="color:#e53333;">05 09 16 26 28 30 </span><span style="color:#337fe5;">+ 10&nbsp;&nbsp; </span></span></strong><span style="font-size:24px;"><strong>这样就是一注</strong></span><span style="font-size:24px;"><strong>完整的双色球彩票号</strong></span> \r\n</div>\r\n<div>\r\n	&nbsp;&nbsp;\r\n</div>\r\n<p>\r\n	<span style="background-color:#ffffff;color:#003399;font-size:32px;"></span>&nbsp;\r\n</p>\r\n<p align="center">\r\n	&nbsp;<img alt="" src="http://www.tctct.cn/updatefile/image/20150531/20150531165005_27498.jpg" /> \r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	<span style="font-size:24px;"><strong><span style="color:#ee33ee;">温馨提示：</span></strong>&nbsp;</span> \r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	<span style="font-size:24px;">1、为了确认中奖的会员身份，请在会员中心留下你的电话号码。</span> \r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	<span style="font-size:24px;">2、人数限制：本期活动仅限1楼-500楼留言有效。（活动结束后的第二天开始下一期活动）</span> \r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	<span style="font-size:24px;">3、兑奖：请中奖的会员联系我们，电话0771-5823405，<a href="http://shang.qq.com/open_webaio.html?sigt=9a5c16fb82f29e3819503bb9121f0eef5ac91e627fbe0b0aadd164b3aff676a613ae8f5799adc7d9760945cf66b1ff2d&amp;sigu=25614e1a0f11d6b3d331408138b08865747e1955a306c106f294afd1ce5f8f15a041d5db601addcb&amp;tuin=919857059" target="_blank">客服QQ</a>点这里。</span> \r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	<span style="font-size:24px;">4、免责：</span><a href="http://www.tctct.cn/help-4-58.html" target="_blank"><span style="color:#337fe5;font-size:24px;">免责声明</span></a><span style="font-size:24px;">&nbsp;点这里，谢谢！</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:32px;">&nbsp;</span> \r\n</p>\r\n<p align="center">\r\n	&nbsp;\r\n</p>\r\n<p align="center">\r\n	<a href="http://baidu.lecai.com/lottery/draw/sorts/ssq.php?agentId=5576" target="_blank"><span style="color:#ffe500;font-size:32px;">双色球彩票中奖规则</span></a><span style="color:#ffe500;font-size:32px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="http://www.zhcw.com/video/kaijiangzhibo/" target="_blank"><span style="color:#ffe500;font-size:32px;">开奖视频直播</span></a> \r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p align="center">\r\n	<img alt="" src="http://www.tctct.cn/updatefile/image/20150601/20150601171757_10340.jpg" />&nbsp;\r\n</p>\r\n<p align="center">\r\n	&nbsp;\r\n</p>\r\n<p align="left">\r\n	<span style="color:#ee33ee;font-size:24px;">分享</span><span style="font-size:24px;"><span style="color:#ee33ee;">：</span></span><span style="font-size:24px;">点击下面</span><img alt="" src="http://www.tctct.cn/updatefile/image/20150531/20150531172847_84564.png" />&nbsp;<span style="font-size:24px;">或加</span><span style="font-size:24px;">微信服务号：<strong><span style="font-size:32px;">nn</span></strong><strong><span style="font-size:32px;">swws&nbsp;</span> 或</strong> 微信</span><span style="font-size:24px;">扫一</span><span style="font-size:24px;">扫二维码，</span><span style="font-size:24px;">&nbsp;即可在微信号便捷</span><span style="font-size:24px;">登录</span><span style="font-size:24px;">网站和分享活动</span><span style="font-size:24px;">到朋友圈</span> \r\n</p>\r\n<p align="left">\r\n	&nbsp;\r\n</p>\r\n<p align="left">\r\n	&nbsp;\r\n</p>', '本期活动仅限500人参加（即：1楼--500楼留言的会员） 6月7日晚上9:15开奖，9:30公布中奖信息，敬请关注！', 1, '<p>\r\n	<span style="font-size:24px;">&nbsp;&nbsp;&nbsp; 本项活动由<span style="color:#337fe5;"><strong>《</strong></span></span><span style="font-size:24px;"><span style="color:#337fe5;"><strong>秀动全城》</strong></span>联合<span style="color:#337fe5;"><strong>《</strong></span></span><span style="color:#337fe5;font-size:24px;"><span style="color:#337fe5;"><strong>双色球</strong><strong>》</strong></span><strong>体育彩票发行中心</strong></span><span style="font-size:24px;">长期举办；我们出钱购买你提供的彩票号码，中奖后赠送给你奖金的50%，祝你好运！</span> \r\n</p>', '', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 17, '', '', '1432396800', '1433088000', '0'),
(49, 4, '4a653d6d4379e14695ea452fd0bba11e', '1432559099', 200, '服务说明', '', '', NULL, NULL, NULL, NULL, '', NULL, '<p>\r\n	<span style="line-height:1.5;color:#666666;font-size:14px;"><strong><span style="color:#337fe5;"></span></strong></span>&nbsp;\r\n</p>\r\n<p>\r\n	<span style="line-height:1.5;color:#666666;font-size:14px;"><strong><span style="color:#337fe5;">经营说明</span></strong>：</span> \r\n</p>\r\n<p>\r\n	<span style="line-height:1.5;color:#666666;font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 网站内一切产品和服务均由本公司（南宁品三传媒广告有限公司）联合上游服务商推出，<strong>唯一</strong><strong>授权给</strong><strong>南宁品三传媒广告有限公司旗下《有求必应网》业务团队为客户</strong><strong>提供服务；</strong></span><span style="line-height:1.5;color:#666666;font-size:14px;">并由合作伙伴（南宁青秀区新竹区法律咨询有限公司）提供与法律相关的一切服务，保证所有代理商和客户合法权益，提供法律服务支持，期待与大家合作愉快！</span> \r\n</p>\r\n<p>\r\n	<span style="line-height:1.5;color:#666666;font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>我们郑重承诺：</strong>网站内所有业务都正规真实，如果因为上游业务变更来不及修改的，我们也会在核实后及时更正，努力营造一个和谐信任的交易环境，杜绝欺诈。</span> \r\n</p>\r\n<p>\r\n	<span style="line-height:1.5;color:#666666;font-size:14px;"></span>&nbsp;\r\n</p>\r\n<p>\r\n	<span style="line-height:1.5;color:#666666;font-size:14px;"><strong><span style="color:#337fe5;">服务说明：</span></strong></span> \r\n</p>\r\n<p>\r\n	<span style="line-height:1.5;color:#e53333;font-size:14px;"><span><span style="color:#666666;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 如果你是客户，请</span><span style="color:#666666;">拨打客服</span><span style="color:#666666;">电话</span><span style="color:#666666;">了解</span><span style="color:#666666;">站内所有</span><span style="color:#666666;">业务详情；</span></span></span> \r\n</p>\r\n<p>\r\n	<span style="line-height:1.5;color:#e53333;font-size:14px;"><span><span style="color:#666666;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 如果你</span><span style="color:#666666;">需要</span><span style="color:#666666;">提供服务，请联系带你到这里的小伙伴（业务专员</span><span style="color:#666666;">）</span><span style="color:#666666;">，由该专员为你安排后续服务。</span></span></span> \r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	<span style="color:#666666;font-size:14px;"></span>\r\n</p>\r\n<p>\r\n	<span style="color:#337fe5;font-size:14px;"><strong>服务概述：</strong></span> \r\n</p>\r\n<p>\r\n	<span style="color:#666666;font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 简单的说，网站只是一个展示我们所有产品和服务的地方，</span><span style="background-color:#ffffff;color:#e53333;font-size:14px;">客服只</span><span style="background-color:#ffffff;color:#e53333;font-size:14px;">接受咨询，并</span><span style="background-color:#ffffff;color:#e53333;font-size:14px;"><span style="background-color:#ffffff;font-size:14px;">为你解答疑问；<span style="background-color:#ffe500;color:#e53333;"><span style="background-color:#ffffff;font-size:14px;">业务专员负责宣传+安排人员为你服务</span></span>；</span></span><span style="background-color:#ffffff;color:#666666;font-size:14px;"><span style="background-color:#ffffff;color:#666666;font-size:14px;"><span style="color:#666666;font-size:14px;"></span></span></span>&nbsp;\r\n</p>', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 2, 1, '', '', NULL, NULL, '0'),
(59, 3, 'd7a16b3186babfe96c2bcd4ccdc6c447', '1433059289', 10, '业务合作', '', '', NULL, NULL, NULL, NULL, '', NULL, '<p>\r\n	如果你想轻松的赚钱，就加入我们吧！\r\n</p>\r\n<p>\r\n	好好利用你身边的人脉资源，&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 2, 1, '', '', NULL, NULL, '0'),
(65, 5, '8a142e34d68a626d941643101a6fd5f5', '1433268018', 0, '招商信用卡养卡提额（垫钱代养） ', '', '', NULL, NULL, NULL, NULL, '20150730223834_54252.jpg', NULL, '<p class="MsoNormal">\r\n	<span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:宋体;font-size:16px;"></span>&nbsp;\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:宋体;font-size:16px;">承诺：</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:宋体;font-size:16px;">1、绝对把你的信用额提到</span><span style="font-size:16px;">6</span><span style="font-family:宋体;font-size:16px;">万；（操作时间</span><span style="font-size:16px;">1-6</span><span style="font-family:宋体;font-size:16px;">个月不等）</span> <span style="font-family:宋体;background:yellow;color:red;font-size:16px;">签协议</span><span style="background:yellow;color:red;font-size:16px;">100%在约定时间</span><span style="font-family:宋体;background:yellow;color:red;font-size:16px;">提额成功</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	&nbsp;\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:宋体;color:red;font-size:16px;">2、你只需把空的信用卡给我们，一直到提额成功，你不需支付一分钱。</span>&nbsp;\r\n</p>\r\n<p class="MsoNormal">\r\n	&nbsp;\r\n</p>\r\n<p class="MsoNormal">\r\n	<span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:宋体;font-size:16px;">3、你的卡</span><span style="font-family:宋体;font-size:16px;">额度</span><span style="font-size:16px;">8000</span><span style="font-family:宋体;font-size:16px;">以上</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	&nbsp;\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:宋体;color:red;font-size:16px;">4、只要你在银行的征信不是很差，没有太多逾期，偶尔逾期没关系</span><span style="color:red;"></span> \r\n</p>\r\n<p class="MsoNormal">\r\n	&nbsp;&nbsp;\r\n</p>\r\n<p class="MsoNormal">\r\n	<span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:宋体;background:yellow;color:red;font-size:16px;"><strong>特别说明：在委托期间我方有义务保管好你的信用卡，如有丢失、产生逾期、滞纳金，甲方负责你的一切损失。</strong></span><span style="color:red;"></span> \r\n</p>\r\n<p class="MsoNormal">\r\n	&nbsp;\r\n</p>\r\n<p class="MsoNormal">\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '0771-5823405', '', '', '招商信用卡提额', '', 1, 2, 2, 1, '', '', '1433174400', '1443542400', '0'),
(87, 1, 'eb75ed81afe09e6088c5053d3e1ad700', '1436627738', 0, '找人帮追债，本人有合法借款欠条20万元左右，欠款人家在玉林，电话联系得上，就是不愿还钱，希望有能力的收债人帮忙，（不可暴力收债）具体酬劳可以面议，请通过客服跟我联系！', '', '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '无', '', 1, NULL, 1, 1, '', '', '1437062400', '1439654400', '0'),
(89, 1, 'cd201cb1666b4d6833fc70dc75aac5a8', '1437131832', 0, '本公司想参加今年东盟博览会，希望能拿到展位最优惠的价格，如果你有关系解决问题，请通过客服联系我，酬劳一定让你满意。', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, 1, NULL, NULL, '1437062400', '1439740800', '0'),
(90, 1, 'ca771e2ed2ef5a0c79fe01b892ef98aa', '1437131854', 0, '聘一个生活秘书，到宾阳工作生活，月薪8000元，包吃住，希望是大学生，长相靓丽，有意者请通过客服与我联系，谢谢！', '', '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 6, 1, '', '', '1437062400', '1439740800', '0'),
(91, 1, '487375321284e66c524c221ad274d43a', '1437131873', 0, '本人新家盛天东郡（清水房约100平米）即将进入装修阶段，有没有人可以先装修，一年后再付款；诚信合作，希望找到可以为我解决装修问题的公司或个人提供帮助，请通过客服与我联系，谢谢！', '', '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 3, 1, '', '', '1437062400', '1439740800', '0'),
(93, 1, '6aa1b98b5fb0764c879c334cb2617438', '1437464606', 0, '南宁市江南区某商店需要办理一个香烟销售许可证，（因为在该店铺比较近的地方已经有人销售香烟，因距离近原因申请不下来）希望有关系的人帮帮忙，请通过客服与我联系，酬谢面议！', '', '13557388818黄老板（星光大道2号）', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 2, 1, '', '', '1437408000', '1443542400', '0'),
(94, 1, '0852222a39270b152e3c438bb18551da', '1437471007', 0, '特急需求：南宁帝王大厦附近价值2000万办公楼和个人房产，急需资金1500万过桥，抵押1个月，利息一分五，能帮忙解决的公司或个人请通过客服联系我，必须7月24号前资金到位，具体面谈。', '', '13036816663', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 2, 1, '', '', '1437580800', '1438272000', '0'),
(95, 1, 'cbb10f33c8b62cf34a0136fc9d0f9268', '1437542513', 0, '男，四川人，47岁，在南宁生活，需要凭身份证贷款10000元，或求办一张大约10000元左右额度信用卡，酬谢15%左右，急求帮助！', '', '张17081572316-15677147136', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 3, 1, '', '', '1437494400', '1440864000', '0'),
(96, 1, '465084c3b99697a3cf2d55759a4493e6', '1437561910', 0, '南宁某单位教授已经离世几年，离世前有公积金10万左右，现在全权委托代办，有能力帮解决问题的公司或个人尽快联系，重重酬谢。', '', '13036889779周小姐', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 2, 1, '', '', '1437494400', '1446220800', '0'),
(97, 1, 'ab714dd6c710315e0e15b26e82a3a16c', '1437630446', 0, '河池一位考生考分450分左右（二本），距离一本分数相差大约10多分，希望进入桂林医学院或右江医学院就读，有关系的请帮忙解决，有重酬！', NULL, '韦先生15296579804', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, NULL, '1437580800', '1441036800', '0'),
(98, 1, 'c950648a9bd26944b46bcd593058c9bf', '1437814488', 0, '隆安县人，有A2驾驶证20年；在县城有商品房正在办理房产证，有招商信用卡用了几年，在银行负债30万左右，目前人在南宁，需要贷款10万投资货运生意，急用，能帮忙解决问题的朋友通过客服联系我，利息好商量！', '', '王15278021070', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 2, 1, '', '', '1439049600', '1472572800', '0'),
(99, 5, '4a34017c65ab5c663ee9cfd7cd74ea02', '1438190058', 0, '测试', '', '', NULL, NULL, NULL, NULL, '20150730223521_57719.jpg', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', '', '', '', '', 1, 2, 2, 1, '', '', '1437494400', '1445443200', '0'),
(102, 5, '98e8fdaacbbe06d012eaa14d9d7c52a1', '1438263610', 0, '大学生贷款', '', '', NULL, NULL, NULL, NULL, '20150730213947_79233.jpg', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, 2, 2, 1, '', '', '1438185600', '1456675200', '0'),
(104, 5, '93c40ef5136b161215443871294db2fb', '1438422961', 0, '房产过户加急办理', '', '', NULL, NULL, NULL, NULL, '20150801175535_19225.jpg', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, 2, 2, 1, '', '', '1438358400', '1446220800', '0'),
(105, 5, 'fe123674db62f927ff80d749fd3dbf5d', '1438445847', 3, '房产抵押3个工作日出它项权证，加急费680元。', '', '', NULL, NULL, NULL, NULL, '20150802001724_29465.jpg', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, 2, 2, 1, '', '', '1438358400', '1459353600', '0'),
(106, 5, '6e0243bae7bc082dcfc4842fc9812a69', '1438446012', 0, '房产注销抵押最快当天领证', NULL, NULL, NULL, NULL, NULL, NULL, '20150802001931_35057.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 2, 1, NULL, NULL, '1438358400', '1464624000', '0'),
(107, 5, '8a7d1c7919d29af6d9c0045902953c66', '1438448659', 0, '房屋查档或个人名下房产查档当天得结果', NULL, NULL, NULL, NULL, NULL, NULL, '20150802010350_59216.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 2, 1, NULL, NULL, '1438358400', '1464624000', '0'),
(108, 4, 'c60841603cba2e8fc396edd33a3c346e', '1438454832', 0, '关于我们', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, NULL, NULL, NULL, '0'),
(109, 6, '80f859b202af20c17247569ef2a6c318', '1438828386', 0, '2015年8月起，秀动全城网正式启动“云传播”计划，招聘1000名网络推广员，每人每天发布自己微信朋友圈广告一次，本地QQ群20个；累计每天传播QQ群最高达到2万个，固定传播到朋友圈1000个，让你的广告飞起来！！！2', 'http://www.tctct.cn/adv.html', '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '', '', '', '', 1, NULL, 2, 1, '', '', NULL, NULL, '0'),
(112, 5, '6b4cd119be2c742fe0bedf38749224b1', '1439122381', 0, 'DFFDDF2', NULL, 'DFDFDF', NULL, NULL, NULL, NULL, '20150809201253_33411.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, '', '', '1439654400', '1442246400', '0'),
(113, 1, '7b6c424e8d7cdcbf24f4491dbddbc669', '1439122402', 0, '23434222', '二二23434', '的方法对方', NULL, NULL, NULL, NULL, '20150809201335_41967.png', NULL, '二二二的辅导辅导辅导', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '二二', '二二', '辅导费', '二恶', 1, NULL, 2, 1, '', '', NULL, NULL, '0'),
(115, 5, '7962b536093d9a4c75d6bd77e8260606', '1439360880', 0, '深圳口岸中旅', 'DFDF', NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, NULL, '1440259200', '1441814400', '0'),
(116, 5, 'be5f960a289a619eae13f334a3a0dfef', '1439360881', 0, '深圳口岸中旅', 'DFDF', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, NULL, '1440259200', '1441814400', '0'),
(117, 5, '7cf7302ae37843e33e235f2ac0d645c0', '1439361145', 0, '辅导费发', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, NULL, '1439913600', '1443283200', '0'),
(118, 5, '9ce1af41afd623acf012c175a3040f66', '1439361221', 0, '通天塔', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, NULL, '1440777600', '1445270400', '0'),
(119, 5, 'a27f6b318bb1fb45b02ac3dfdd8842e8', '1439361244', 0, '1111', NULL, '', NULL, NULL, NULL, '3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, '', '', '1439913600', '1439913600', '0'),
(123, 1, '27fd27a2392facefd209962c9846ce80', '1439365121', 0, '大幅度发放', '但发大幅度发', NULL, NULL, NULL, NULL, '2', NULL, NULL, '发但纷纷辅导费大幅度发', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '大幅度发', NULL, NULL, NULL, 1, NULL, 2, 1, NULL, NULL, NULL, NULL, '0'),
(124, 1, 'dc55c8bb37fa6bff7d22f91c6f1bb0a3', '1439365121', 0, '大幅度发放', '但发大幅度发', '', NULL, NULL, NULL, '4', '', NULL, '发但纷纷辅导费大幅度发', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '', '大幅度发', '', '', '', 1, NULL, 2, 1, '', '', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- 表的结构 `yp_newspic`
--

CREATE TABLE IF NOT EXISTS `yp_newspic` (
`npic_id` int(11) NOT NULL,
  `npic_sort` int(11) DEFAULT NULL,
  `npic_picurl` text NOT NULL,
  `npic_newsid` int(11) NOT NULL,
  `uuid` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yp_order`
--

CREATE TABLE IF NOT EXISTS `yp_order` (
`id` int(11) unsigned NOT NULL,
  `kq_cpid` int(11) DEFAULT NULL,
  `kq_adminid` varchar(120) DEFAULT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_status` tinyint(1) DEFAULT '1',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_name` varchar(255) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_price` varchar(11) DEFAULT NULL,
  `kq_number` int(11) DEFAULT NULL,
  `kq_total` int(11) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_liuyan` text,
  `kq_beizhu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yp_user`
--

CREATE TABLE IF NOT EXISTS `yp_user` (
`id` int(11) NOT NULL,
  `kq_uuid` varchar(120) DEFAULT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_name` varchar(255) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_sex` varchar(120) DEFAULT NULL,
  `kq_age` varchar(120) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_qq` varchar(25) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_checked` tinyint(4) DEFAULT '1',
  `kq_pwd` varchar(120) DEFAULT NULL,
  `kq_uniqueid` varchar(120) DEFAULT NULL,
  `kq_type` varchar(60) DEFAULT NULL,
  `kq_openid` varchar(120) DEFAULT NULL,
  `kq_token` varchar(255) DEFAULT NULL,
  `kq_picurl` text
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_user`
--

INSERT INTO `yp_user` (`id`, `kq_uuid`, `kq_ctime`, `kq_sort`, `kq_name`, `kq_email`, `kq_sex`, `kq_age`, `kq_tel`, `kq_qq`, `kq_address`, `kq_checked`, `kq_pwd`, `kq_uniqueid`, `kq_type`, `kq_openid`, `kq_token`, `kq_picurl`) VALUES
(31, '061e2eec5d732af293a73451b1e01be4', '1431607428', 0, '呼庚呼癸', NULL, '1', NULL, NULL, NULL, NULL, 1, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ec1f5ff2c7651da8d50bbab887ea17bb9fd3211a', NULL, NULL, NULL, NULL),
(32, '110e0fbe6125ed6948747c7dd170a2e1', '1431608425', 0, '空气', NULL, '1', NULL, NULL, NULL, NULL, 1, NULL, 'c0adda8ada9bde24c1be247510ff492d2634aee4', NULL, '658774F16D9D3CA30BB75299D7A63979', 'F29FD7E6F01FDC1F7E54789C5755603C', 'http://q.qlogo.cn/qqapp/101207722/658774F16D9D3CA30BB75299D7A63979/100'),
(33, 'ea37d01860e32e56c422c8ddd75c0332', '1431670352', 0, 'andy', NULL, '1', NULL, '15278018938', '', '南宁青秀区', 1, NULL, '75685472e31f188ffb541e19c24b695bf2e32561', NULL, '186A50983D6F572D6AC7BF98C75C9E7F', '1166DC45480DBCEB20FA0F4A29A5BADA', 'http://q.qlogo.cn/qqapp/101207722/186A50983D6F572D6AC7BF98C75C9E7F/100'),
(34, 'fadaa249b219125822d9dcc8b5d6667f', '1432039287', 0, '迅', NULL, '1', NULL, NULL, NULL, NULL, 1, NULL, '43d19cd6740f995bcb1a4c95eb059ecf76157f60', NULL, 'BC93288634DDB852DF8A2799F070F198', 'D0864C5EAD69AA9542D268C5646FE42A', 'http://q.qlogo.cn/qqapp/101207722/BC93288634DDB852DF8A2799F070F198/100'),
(35, 'c1d7f9e0240f5eee084ef13e3c291288', '1432041768', 0, 'Apple', NULL, '2', NULL, NULL, NULL, NULL, 1, NULL, 'ed2897dbb814e6d6848885ed0b4e0e2afb9009c8', NULL, '74DD123FDB882D457BDE6A37D9B1E0C4', '160D85A8E9E6580F71A28B3359E2ACA0', 'http://q.qlogo.cn/qqapp/101207722/74DD123FDB882D457BDE6A37D9B1E0C4/100'),
(36, 'ad89903d71b5deb5d11702b515b227e1', '1432522619', 0, '秋风落叶', NULL, '1', NULL, NULL, NULL, NULL, 1, NULL, '5efb2759905d77171d0f86f27b5f297266e560ea', NULL, 'A62FB9E86A36EA2BF3229BC3C059F4FE', 'E36CE7E0D5B28C0D30C0BCF3BE27F997', 'http://q.qlogo.cn/qqapp/101207722/A62FB9E86A36EA2BF3229BC3C059F4FE/100'),
(37, 'b981cad6af3320e9caab1d29a26b9574', '1432740415', 0, 'andy', NULL, '1', NULL, NULL, NULL, NULL, 1, NULL, '754472aaf800cc4611d608838bac5efda26e54f2', NULL, '00D26A423895C06F6033B3AB4C5DC232', '5F1D4A75385A26D3A5C1CE9642779B4E', 'http://q.qlogo.cn/qqapp/101207722/00D26A423895C06F6033B3AB4C5DC232/100'),
(38, '2dfb2de94bebfcaefa5b7bc19a79c70a', '1432958721', 0, '乐秀儿', NULL, '2', NULL, NULL, NULL, NULL, 1, NULL, '13a848fbf1d2184d6818607d06c7bb48fd4b91db', NULL, 'E0AE71FFB852AB558762281059A797BB', '06B9734D9091E6F3B255F154DB480635', 'http://q.qlogo.cn/qqapp/101207722/E0AE71FFB852AB558762281059A797BB/100'),
(39, '4bd87d7ff6c7a93fc8f3dbe53d45a2ae', '1432970021', 0, '最美', NULL, '2', NULL, NULL, NULL, NULL, 1, NULL, 'ad5d891feba80d5a5cea2d63054717167529e3ea', NULL, '793B1493C13813F9CEF76717C5E11C50', '44AC1AEC41F1B0FB7EC3CE10896231EF', 'http://q.qlogo.cn/qqapp/101207722/793B1493C13813F9CEF76717C5E11C50/100'),
(40, '845eb1dee5718c89d1c9d4ad912c9943', '1432976893', 0, '自恋女子', NULL, '2', NULL, NULL, NULL, NULL, 1, NULL, '6835b3d5864685f5dbef67968765e1edba2b4012', NULL, 'BF19C66CC1B426E46FCF7D6A0850DDA9', '31AD83ED0A788F174983F5D48F7BED0F', 'http://q.qlogo.cn/qqapp/101207722/BF19C66CC1B426E46FCF7D6A0850DDA9/100');

-- --------------------------------------------------------

--
-- 表的结构 `yp_winmsg`
--

CREATE TABLE IF NOT EXISTS `yp_winmsg` (
`id` int(11) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_ftime` varchar(120) DEFAULT NULL,
  `kq_sort` tinyint(4) DEFAULT '0',
  `kq_uuid` varchar(120) DEFAULT NULL,
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_newsid` int(11) DEFAULT NULL,
  `kq_userid` varchar(255) DEFAULT NULL,
  `kq_username` varchar(255) DEFAULT NULL,
  `kq_checked` tinyint(4) DEFAULT '1',
  `kq_beizhu` text
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yp_winmsg`
--

INSERT INTO `yp_winmsg` (`id`, `kq_ctime`, `kq_ftime`, `kq_sort`, `kq_uuid`, `kq_title`, `kq_newsid`, `kq_userid`, `kq_username`, `kq_checked`, `kq_beizhu`) VALUES
(17, '1436583166', NULL, 0, 'b8d139ab068d7c0ae7fe5353981f4645', '急需找一个南宁供电局领导关系', 86, NULL, NULL, 1, '15278067788');

-- --------------------------------------------------------

--
-- 表的结构 `yp_youlink`
--

CREATE TABLE IF NOT EXISTS `yp_youlink` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_endtime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_follow` tinyint(1) DEFAULT '0',
  `kq_name` varchar(255) DEFAULT NULL,
  `kq_type` varchar(120) DEFAULT NULL,
  `kq_url` text,
  `kq_pic` text,
  `kq_pr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yp_zhaoshang`
--

CREATE TABLE IF NOT EXISTS `yp_zhaoshang` (
`id` int(11) unsigned NOT NULL,
  `kq_uuid` varchar(120) NOT NULL,
  `kq_ctime` varchar(120) DEFAULT NULL,
  `kq_sort` int(11) DEFAULT '0',
  `kq_title` varchar(255) DEFAULT NULL,
  `kq_type` varchar(255) DEFAULT NULL,
  `kq_name` varchar(120) DEFAULT NULL,
  `kq_tel` varchar(120) DEFAULT NULL,
  `kq_phone` varchar(120) DEFAULT NULL,
  `kq_email` varchar(120) DEFAULT NULL,
  `kq_address` varchar(255) DEFAULT NULL,
  `kq_qq` varchar(120) DEFAULT NULL,
  `kq_content` mediumtext,
  `kq_beizhu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yp_admin`
--
ALTER TABLE `yp_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_admingroup`
--
ALTER TABLE `yp_admingroup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_adv`
--
ALTER TABLE `yp_adv`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_city`
--
ALTER TABLE `yp_city`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_config`
--
ALTER TABLE `yp_config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_fankui`
--
ALTER TABLE `yp_fankui`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_file`
--
ALTER TABLE `yp_file`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_index`
--
ALTER TABLE `yp_index`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_lanmu`
--
ALTER TABLE `yp_lanmu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_liuyan`
--
ALTER TABLE `yp_liuyan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_lyreply`
--
ALTER TABLE `yp_lyreply`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_nav`
--
ALTER TABLE `yp_nav`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_news`
--
ALTER TABLE `yp_news`
 ADD PRIMARY KEY (`id`), ADD KEY `kq_title` (`kq_title`);

--
-- Indexes for table `yp_newspic`
--
ALTER TABLE `yp_newspic`
 ADD PRIMARY KEY (`npic_id`), ADD KEY `npic_newsid` (`npic_newsid`);

--
-- Indexes for table `yp_order`
--
ALTER TABLE `yp_order`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_user`
--
ALTER TABLE `yp_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_winmsg`
--
ALTER TABLE `yp_winmsg`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_youlink`
--
ALTER TABLE `yp_youlink`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yp_zhaoshang`
--
ALTER TABLE `yp_zhaoshang`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `yp_admin`
--
ALTER TABLE `yp_admin`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yp_admingroup`
--
ALTER TABLE `yp_admingroup`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `yp_adv`
--
ALTER TABLE `yp_adv`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yp_city`
--
ALTER TABLE `yp_city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `yp_config`
--
ALTER TABLE `yp_config`
MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yp_fankui`
--
ALTER TABLE `yp_fankui`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yp_file`
--
ALTER TABLE `yp_file`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `yp_index`
--
ALTER TABLE `yp_index`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `yp_lanmu`
--
ALTER TABLE `yp_lanmu`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `yp_liuyan`
--
ALTER TABLE `yp_liuyan`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `yp_lyreply`
--
ALTER TABLE `yp_lyreply`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yp_nav`
--
ALTER TABLE `yp_nav`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `yp_news`
--
ALTER TABLE `yp_news`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `yp_newspic`
--
ALTER TABLE `yp_newspic`
MODIFY `npic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yp_order`
--
ALTER TABLE `yp_order`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yp_user`
--
ALTER TABLE `yp_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `yp_winmsg`
--
ALTER TABLE `yp_winmsg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `yp_youlink`
--
ALTER TABLE `yp_youlink`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yp_zhaoshang`
--
ALTER TABLE `yp_zhaoshang`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
