-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 13 2019 г., 00:34
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `saveThechildren`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `role`) VALUES
(1, 'Tatyana Sidorenko', 'yagoda303@gmail.com', '12121212', '+3790 555-84-84', 'admin'),
(24, 'Irina Olegovna', 'yagoda303@gmail.com', '000', '093 477 55 55', 'security'),
(55, 'fleet-gca', 'yagoda303@gmail.com', '123123123123', '0998765566', 'fleet-gca'),
(58, 'fleet-ngca', 'yagoda303@gmail.com', '234234234', '09677777777', 'fleet-ngca'),
(61, 'ngca-admin', 'yagoda303@gmail.com', '567576575', '0998760098', 'ngca-admin'),
(62, 'Ngca-Area-Coordinator', 'yagoda304@gmail.com', '7897768888886', '09987656556', 'NgcaAreaCoordinator'),
(63, 'gca-admin', 'yagoda304@gmail.com', '8989898989', '07767676777', 'gca-admin'),
(64, 'Director Country', 'yagoda303@gmail.com', '9897787878888', '09967588666', 'country-director'),
(67, 'User finance', 'yagoda304@gmail.com', '123908756', '0998765544', 'finance'),
(70, 'Anton Sergeevich', 'yagoda303@gmail.com', '4645645645645', '09987655555', 'maneger'),
(71, 'Valeriy Harlamov', 'yagoda303@gmail.com', '123098765', '099875666666', 'maneger'),
(72, 'Kristiano Ronaldo', 'yagoda303@gmail.com', 'chriano5665', '0986668888', 'maneger'),
(73, 'Tatyana Alexandrovna', 'yagoda303@gmail.com', 'tatyana123', '099870676767', 'user'),
(74, 'Tanya S', 'yagoda303@gmail.com', 'trtrt564564', '09945623412', 'user'),
(75, 'None', 'yagoda303@children.org', 'childrenorg', '09987055500', 'maneger');

-- --------------------------------------------------------

--
-- Структура таблицы `degelation`
--

CREATE TABLE `degelation` (
  `id_degelation` int(11) NOT NULL,
  `who_degel` varchar(150) NOT NULL,
  `was_degel` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `join_user_travel`
--

CREATE TABLE `join_user_travel` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_travel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `join_user_travel`
--

INSERT INTO `join_user_travel` (`id`, `id_user`, `id_travel`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 2, 1),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `travel`
--

CREATE TABLE `travel` (
  `id_travel` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `departingFrom` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `returnto` varchar(200) NOT NULL,
  `dateRequested` date NOT NULL,
  `datedeparture` datetime NOT NULL,
  `deteArrial` datetime NOT NULL,
  `dateReturn` datetime NOT NULL,
  `purpose` varchar(250) NOT NULL,
  `groupTravel` varchar(20) NOT NULL,
  `ifGroupTravelWho` varchar(200) NOT NULL,
  `ChildSafeguardingTrainingCompleted` varchar(20) NOT NULL,
  `ifNoChildSafeguardingWhy` text NOT NULL,
  `PersonalSSTraining` varchar(20) NOT NULL,
  `ifNoPersonalWhy` text NOT NULL,
  `DetailedItinerary` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `teamLeader` varchar(200) NOT NULL,
  `accommodationRequired` varchar(200) NOT NULL,
  `locationCountry` varchar(200) NOT NULL,
  `locationCountry2` varchar(200) NOT NULL,
  `locationFrom` date NOT NULL,
  `locationTo` date NOT NULL,
  `locationFrom2` date NOT NULL,
  `locationTo2` date NOT NULL,
  `methodTravel` varchar(200) NOT NULL,
  `supportNeeded` varchar(250) NOT NULL,
  `extraLuggage` text NOT NULL,
  `accountCode` int(11) NOT NULL,
  `costCentre` int(11) NOT NULL,
  `projectCode` int(11) NOT NULL,
  `procent` int(11) NOT NULL,
  `soft` int(11) NOT NULL,
  `DEACode` int(11) NOT NULL,
  `LineManager` varchar(200) NOT NULL,
  `countryDirector` varchar(200) NOT NULL,
  `securityCoordinator` varchar(200) NOT NULL,
  `NgcaCoordinator` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `registration` date NOT NULL,
  `finance_status` int(11) NOT NULL,
  `lineManedgerStatus` int(11) NOT NULL,
  `CountryDirectorStatus` int(11) NOT NULL,
  `securytiStatus` int(11) NOT NULL,
  `NgcaAreaCstatus` int(11) NOT NULL,
  `GcaStatus` int(11) NOT NULL,
  `NgcaAdminStatus` int(11) NOT NULL,
  `FleetNgcaStatus` int(11) NOT NULL,
  `FleetGcaStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `travel`
--

INSERT INTO `travel` (`id_travel`, `type`, `name`, `departingFrom`, `destination`, `returnto`, `dateRequested`, `datedeparture`, `deteArrial`, `dateReturn`, `purpose`, `groupTravel`, `ifGroupTravelWho`, `ChildSafeguardingTrainingCompleted`, `ifNoChildSafeguardingWhy`, `PersonalSSTraining`, `ifNoPersonalWhy`, `DetailedItinerary`, `email`, `mobile`, `teamLeader`, `accommodationRequired`, `locationCountry`, `locationCountry2`, `locationFrom`, `locationTo`, `locationFrom2`, `locationTo2`, `methodTravel`, `supportNeeded`, `extraLuggage`, `accountCode`, `costCentre`, `projectCode`, `procent`, `soft`, `DEACode`, `LineManager`, `countryDirector`, `securityCoordinator`, `NgcaCoordinator`, `status`, `id_user`, `registration`, `finance_status`, `lineManedgerStatus`, `CountryDirectorStatus`, `securytiStatus`, `NgcaAreaCstatus`, `GcaStatus`, `NgcaAdminStatus`, `FleetNgcaStatus`, `FleetGcaStatus`) VALUES
(89, 'Within GCA', 'Tanya S', 'doneck', 'kramatorsk', 'slav', '0000-00-00', '2018-07-19 00:59:00', '2018-07-14 09:00:00', '2018-07-19 09:00:00', 'purpose', 'No', '', 'Yes', '', 'Yes', '', '', 'yagoda303@gmail.com', '09945623412', '', 'Hotel room to be booked', 'slav', '', '2018-07-04', '2018-07-05', '0000-00-00', '0000-00-00', 'Taxi', 'Admin to book tickets', '', 68768, 0, 0, 0, 0, 0, 'Kristiano Ronaldo', 'Director Country', 'Irina Olegovna', 'Ngca-Area-Coordinator', 1, 74, '2018-07-31', 1, 1, 1, 1, 1, 0, 0, 0, 0),
(90, 'Within NGCA', 'Tanya S', 'doneck', 'kramatorsk', 'slav', '0000-00-00', '2018-07-12 09:00:00', '2018-07-05 09:00:00', '2018-07-19 09:00:00', 'purpose', 'Yes', 'alex', 'Yes', '', 'Yes', '', '', 'yagoda303@gmail.com', '09945623412', 'alex', 'Guesthouse', 'slav', '', '2018-07-04', '2018-07-04', '0000-00-00', '0000-00-00', 'Vehicle', 'Admin to order a taxi', '', 0, 0, 0, 0, 0, 0, 'Valeriy Harlamov', 'Director Country', 'Irina Olegovna', 'Ngca-Area-Coordinator', 0, 74, '2018-07-31', 1, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 'Expats Personal Travel > 10km', 'Tanya S', 'doneck', 'kramatorsk', 'slav', '0000-00-00', '2018-07-13 09:00:00', '2018-07-14 09:00:00', '2018-07-13 09:00:00', 'purpose', 'No', '', 'Yes', '', 'Yes', '', '', 'yagoda303@gmail.com', '09945623412', '', 'Guesthouse', 'slav', '', '2018-07-11', '2018-07-04', '0000-00-00', '0000-00-00', 'Taxi', 'Admin to order a taxi', '', 0, 0, 0, 0, 0, 0, 'Kristiano Ronaldo', 'Director Country', 'Irina Olegovna', 'Ngca-Area-Coordinator', 1, 74, '2018-07-31', 1, 1, 1, 1, 1, 0, 0, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `degelation`
--
ALTER TABLE `degelation`
  ADD PRIMARY KEY (`id_degelation`);

--
-- Индексы таблицы `join_user_travel`
--
ALTER TABLE `join_user_travel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `travel`
--
ALTER TABLE `travel`
  ADD UNIQUE KEY `id_travel_2` (`id_travel`,`type`,`name`,`departingFrom`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT для таблицы `degelation`
--
ALTER TABLE `degelation`
  MODIFY `id_degelation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `join_user_travel`
--
ALTER TABLE `join_user_travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `travel`
--
ALTER TABLE `travel`
  MODIFY `id_travel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
