-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2020 年 2 月 29 日 09:01
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `calc`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `columnNames`
--

CREATE TABLE `columnNames` (
  `c_id` int(8) NOT NULL,
  `u_id` int(8) NOT NULL,
  `c_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `columnNames`
--

INSERT INTO `columnNames` (`c_id`, `u_id`, `c_name`) VALUES
(1, 1, '食費'),
(2, 1, '雑費'),
(3, 1, '衣服費'),
(9, 1, '光熱費'),
(10, 1, '通信費'),
(12, 1, '保険料');

-- --------------------------------------------------------

--
-- テーブルの構造 `records`
--

CREATE TABLE `records` (
  `r_id` int(11) NOT NULL,
  `u_id` int(8) NOT NULL,
  `c_id` int(8) NOT NULL,
  `value` int(8) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `records`
--

INSERT INTO `records` (`r_id`, `u_id`, `c_id`, `value`, `date`) VALUES
(1, 1, 1, 2000, '2020-02-25 12:15:33'),
(3, 1, 1, 3000, '2020-02-26 11:13:52'),
(4, 1, 1, 1500, '2020-02-28 10:41:45'),
(16, 1, 1, 1200, '2020-02-29 05:08:23'),
(17, 1, 1, 4300, '2020-02-29 05:08:23'),
(18, 1, 1, 2000, '2020-02-29 05:08:23'),
(19, 1, 1, 3400, '2020-02-29 05:08:23'),
(20, 1, 1, 500, '2020-02-29 05:08:23'),
(21, 1, 1, 10000, '2020-02-29 05:08:23'),
(22, 1, 1, 2040, '2020-02-29 05:08:23'),
(23, 1, 1, 800, '2020-02-29 05:08:23'),
(24, 1, 1, 1000, '2020-02-29 05:08:23'),
(25, 1, 1, 1900, '2020-02-29 05:08:23'),
(26, 1, 1, 360, '2020-02-29 05:08:23'),
(27, 1, 2, 300, '2020-02-29 06:48:06'),
(28, 1, 1, 900, '2020-02-29 07:23:45'),
(30, 1, 2, 0, '2020-02-29 07:41:00'),
(31, 1, 2, 0, '2020-02-29 07:41:26'),
(32, 1, 3, 5000, '2020-02-29 07:42:45'),
(33, 1, 1, 600, '2020-02-29 07:43:34'),
(34, 1, 3, 7200, '2020-02-29 07:46:50'),
(35, 1, 9, 6700, '2020-02-29 08:16:10');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(16) NOT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `pass`) VALUES
(1, 'それいけかけふ', '$2y$10$shcHoe5HOGEcS1uH6T8eCu3OPk93o48FVlJuaL09ajWlx1sxwxKBC');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `columnNames`
--
ALTER TABLE `columnNames`
  ADD PRIMARY KEY (`c_id`);

--
-- テーブルのインデックス `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`r_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `columnNames`
--
ALTER TABLE `columnNames`
  MODIFY `c_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルのAUTO_INCREMENT `records`
--
ALTER TABLE `records`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
