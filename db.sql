-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-06-09 09:32:24
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `note`
--

CREATE TABLE `note` (
  `personalid` varchar(12) NOT NULL,
  `name` varchar(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `reason` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `note2`
--

CREATE TABLE `note2` (
  `id` int(11) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `note2`
--

INSERT INTO `note2` (`id`, `photo`, `description`) VALUES
(1, '1.jpg', '品種:巴哥，性別:女，個性:溫順乖巧。'),
(2, '2.jpg', '品種:吉娃娃，性別:男，個性:調皮搗蛋。'),
(3, '3.jpg', '品種:薩摩耶，性別:女，個性:活潑外向、善於社交。'),
(4, '4.jpg', '品種:柴犬，性別:男，個性:天然呆萌。'),
(5, '5.jpg', '品種:貓咪，性別:男，個性:溫柔婉約。'),
(6, '6.jpg', '品種:哈士奇，性別:女，個性:自我中心、傲嬌。');

-- --------------------------------------------------------

--
-- 資料表結構 `note3`
--

CREATE TABLE `note3` (
  `account` varchar(12) NOT NULL,
  `pwd` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `note3`
--

INSERT INTO `note3` (`account`, `pwd`) VALUES
('hannah', '1234');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`personalid`);

--
-- 資料表索引 `note2`
--
ALTER TABLE `note2`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `note3`
--
ALTER TABLE `note3`
  ADD PRIMARY KEY (`account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `note2`
--
ALTER TABLE `note2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
