-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:51419
-- Generation Time: Apr 24, 2022 at 07:57 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Company_id` int(11) NOT NULL,
  `Phone_number` int(11) DEFAULT NULL,
  `Website` varchar(45) DEFAULT NULL,
  `Logo` blob,
  `Email` varchar(45) DEFAULT NULL,
  `Name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Company_id`, `Phone_number`, `Website`, `Logo`, `Email`, `Name`) VALUES
(1, 12345678, 'sadfdfa.com', NULL, 'adnd1323@gmail.com', 'fred'),
(2, 1234, 'sadfdfa.com', NULL, 'adnd1323@gmail.com', 'TechCompany');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_number` int(11) NOT NULL,
  `HR` varchar(45) DEFAULT NULL,
  `Accounting` varchar(45) DEFAULT NULL,
  `FrontEnd_Developers` varchar(45) DEFAULT NULL,
  `BackEnd_Developers` varchar(45) DEFAULT NULL,
  `Company_Company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Department_number`, `HR`, `Accounting`, `FrontEnd_Developers`, `BackEnd_Developers`, `Company_Company_id`) VALUES
(1, 'Yes', 'No', 'Yes', 'Yes', 1),
(2, 'No', 'Yes', 'No', 'No', 2);

--
-- Triggers `departments`
--
DELIMITER $$
CREATE TRIGGER `delete_employee` BEFORE DELETE ON `departments` FOR EACH ROW DELETE FROM employee
WHERE Departments_Department_number = OLD.`Department_number`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_project` BEFORE DELETE ON `departments` FOR EACH ROW DELETE FROM project
WHERE Departments_Department_number = OLD.`Department_number`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `depart_error_message` BEFORE INSERT ON `departments` FOR EACH ROW BEGIN
IF (NEW.`Department_number` = ''OR NEW.`HR` = '' OR NEW.`Accounting` = '' OR NEW.`FrontEnd_Developers` = '' OR NEW.`BackEnd_Developers` = '' OR NEW.`Company_Company_id` = '') THEN
           
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = "ERROR: ONE OR MORE GIVEN VALUES ARE EMPTY. PLEASE GO BACK AND REVIEW YOUR SUBMISSION.";
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dependent`
--

CREATE TABLE `dependent` (
  `Phone_number` bigint(22) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `RelationShip_with_employee` varchar(45) DEFAULT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Sex` varchar(45) DEFAULT NULL,
  `Employee_Employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dependent`
--

INSERT INTO `dependent` (`Phone_number`, `Age`, `RelationShip_with_employee`, `Name`, `Sex`, `Employee_Employee_id`) VALUES
(1234560923, 42069, 'None', 'none', 'M', 9999),
(2057404161, 29, 'Spouse', 'Kendra Blackburn', 'F', 1),
(2098761527, 18, 'Son', 'Timothy Li', 'M', 6),
(2102064253, 27, 'Spouse', 'Samson Sanford', 'M', 10),
(2102099528, 24, 'Father', 'Bill Charlton', 'M', 19),
(2102189709, 30, 'Father', 'Sam Houghton', 'M', 16),
(2102338383, 48, 'Spouse', 'Jill Mccormack', 'F', 17),
(2102344617, 32, 'Father', 'Dainel Montes', 'M', 20),
(2102384886, 25, 'Father', 'Jack Steven', 'M', 18),
(2102435268, 43, 'Spouse', 'James Bond', 'M', 11),
(2102494966, 35, 'Father', 'Samuel Paul', 'M', 15),
(2102578812, 22, 'Mother', 'Lauren Hardy', 'F', 12),
(2102623421, 55, 'Spouse', 'Betty Tally', 'F', 13),
(2102721317, 43, 'Brother', 'Angel Christian', 'M', 14),
(2467298502, 57, 'Mother', 'Jenna Li', 'F', 3),
(2708167593, 26, 'Spouse', 'Breanne Flynn', 'F', 22),
(2815672957, 23, 'Brother', 'Authur Johnson', 'M', 5),
(3248503651, 21, 'Brother', 'Javier Vega', 'M', 9),
(3493482039, 41, 'Father', 'Andy Nguyen', 'M', 28),
(4013508132, 25, 'Sister', 'Alona Forbes', 'F', 2),
(4346942591, 31, 'Spouse', 'Andrew Murillo', 'M', 7),
(5830583619, 25, 'Brother', 'Damian Garcia', 'M', 26),
(6046958270, 44, 'Spouse', 'Hannah Stump', 'F', 24),
(6179160350, 22, 'Brother', 'Harrison Ingram', 'M', 4),
(6285044491, 21, 'Brother', 'Joshua Bowler', 'M', 21),
(7134369770, 24, 'Brother', 'Drexler Knight', 'M', 27),
(7531592845, 48, 'Father', 'Griffin Smith', 'M', 25),
(7930958192, 36, 'Spouse', 'Reggie George', 'M', 29),
(8325710460, 21, 'None', 'None', 'M', 999999),
(9277453685, 31, 'Brother', 'Steve Clifford', 'M', 23),
(9556085821, 27, 'Cousin', 'Natalia King', 'F', 8),
(9999999999, 99, 'None', 'None', 'M', 999);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_id` int(11) NOT NULL,
  `Name` text,
  `Date` varchar(45) DEFAULT NULL,
  `Clock_in` timestamp NULL DEFAULT NULL,
  `Clock_out` timestamp NULL DEFAULT NULL,
  `Status` text NOT NULL,
  `Total_hours` float DEFAULT NULL,
  `Address` text,
  `Departments_Department_number` int(11) NOT NULL,
  `project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_id`, `Name`, `Date`, `Clock_in`, `Clock_out`, `Status`, `Total_hours`, `Address`, `Departments_Department_number`, `project_project_id`) VALUES
(1, 'Kate BlackBurn', '02/21/89', '2022-04-24 06:08:46', '2022-04-23 14:52:06', 'Clocked out', 0, 'kblackburn@gmail.com', 1, 1),
(2, 'Andy Forbes', '04/22/00', '2022-04-24 01:38:49', '2022-04-24 01:39:37', 'Clocked out', 9.091, 'aforbes@gmail.com', 2, 2),
(3, 'John Li', '04/22/96', '2022-04-24 01:40:19', '2022-04-24 00:25:03', 'Clocked in', 44.0718, 'jli@gmail.com', 1, 1),
(4, 'Tina Ingram', '12/19/1981', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'tingram@gmail.com', 2, 2),
(5, 'Liam Johnson', '07/28/2001', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'ljohnson@gmail.com', 2, 2),
(6, 'Kenneth Li', '12/18/1976', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'kli@gmail.com', 2, 2),
(7, 'Daniel Murillo', '09/13/1991', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'dmurillo@gmail.com', 2, 5),
(8, 'Henry King', '10/31/1979', '2022-04-24 00:11:52', '2022-04-24 00:12:03', 'Clocked out', 0, 'hking@gmail.com', 1, 1),
(9, 'Justise Vega', '07/07/1997', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'jvega@gmail.com', 2, 2),
(10, 'Zeeshan Sanford', '01/16/95', '2022-04-23 17:27:20', '2022-04-23 23:31:47', 'Clocked out', 0, 'zsanford@gmail.com', 1, 5),
(11, 'Money Bond', '12/15/79', '2022-04-23 12:47:29', '2022-04-24 00:26:44', 'Clocked out', 5.6542, 'mbond@gmail.com', 2, 2),
(12, 'Natalie Hardy', '09/29/99', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 14, 'nHardy@gmail.com', 1, 6),
(13, 'Money Bond', '10/05/67', '2022-04-23 23:46:27', '0000-00-00 00:00:00', 'Clocked in', 0, 'kTalley@gmail.com', 2, 2),
(14, 'Andrew Christian', '08/11/79', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'aChristian@gmail.com', 1, 3),
(15, 'Hunter Paul', '08/23/87', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'hpaul@gmail.com', 2, 4),
(16, 'Stanley Houghton', '05/31/92', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'shoughton@gmail.com', 1, 3),
(17, 'Timothy Mccormack', '08/16/74', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'tmccormack@gmail.com', 2, 2),
(18, 'Isobell Steven', '11/15/97', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'istevens@gmail.com', 2, 4),
(19, 'Greg Charlton', '06/03/98', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'gcharlton@gmail.com', 1, 1),
(20, 'Vince Montes', '09/02/90', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'vmontes@gmail.com', 2, 2),
(21, 'Flame Bowler', '09/10/89', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'fbowler@gmail.com', 1, 3),
(22, 'Johnny Flynn', '06/24/94', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'jflynn@gmail.com', 1, 5),
(23, 'Tim Clifford', '10/01/89', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'tclifford@gmail.com', 1, 6),
(24, 'Brandon Stump', '09/07/1974', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'bstump@gmail.com', 2, 2),
(25, 'Brandon Smith', '09/02/74', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'bsmith@gmail.com', 2, 4),
(26, 'Serge Garcia', '1998-06-07', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'sgarcia@gmail.com', 2, 4),
(27, 'Nathan Knight', '1991-07-09', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'nknight@gmail.com', 2, 2),
(28, 'Kobe Nguyen', '2000-09-08', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'knguyen@gmail.com', 1, 1),
(29, 'Brianna George', '1988-04-22', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'bstewart@gmail.com', 2, 4),
(999, 'admin', '01/01/9999', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 'Clocked out', 0, 'admin@gmail.com', 1, 6),
(9999, 'employee', '99/99/9999', '2022-04-24 19:44:45', '2022-04-24 19:55:10', 'Clocked out', 0.175, 'employee@gmail.com', 1, 6),
(999999, 'manager', '99/99/9999', '2022-04-24 21:11:01', '2022-04-24 21:11:15', 'Clocked out', 0.0039, 'manager@gmail.com', 1, 5);

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `delete_daccess` BEFORE DELETE ON `employee` FOR EACH ROW DELETE FROM employeedatabaseaccess
WHERE Employee_Employee_id = old.`Employee_id`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_dependent` BEFORE DELETE ON `employee` FOR EACH ROW DELETE FROM dependent
WHERE Employee_Employee_id = old.`Employee_id`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `max_hours` AFTER UPDATE ON `employee` FOR EACH ROW IF OLD.`Total_hours` >= 40
THEN
	INSERT INTO log(message) VALUES('Employee has reached their max hours');
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `send_email` AFTER INSERT ON `employee` FOR EACH ROW INSERT INTO log (message) 
VALUES(NEW.`Address`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `send_message` BEFORE INSERT ON `employee` FOR EACH ROW BEGIN
IF (NEW.`Address` IS NULL OR NEW.`Address` = 'NULL' OR NEW.`Address` = ''
   OR NEW.`Date` IS NULL OR NEW.`Date` = NULL OR NEW.`Date` = ''
   OR NEW.`Name` IS NULL OR NEW.`Name` = NULL OR NEW.`Name` = ''
   OR NEW.`Salary` IS NULL OR NEW.`Salary` = NULL OR NEW.`Salary` = '') THEN
           
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = "ERROR: GIVEN VALUES WERE EITHER SET TO NULL OR ARE EMPTY. PLEASE GO BACK AND REVIEW YOUR SUBMISSION.";
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employeedatabaseaccess`
--

CREATE TABLE `employeedatabaseaccess` (
  `Login_id` int(11) NOT NULL,
  `Login_password` varchar(45) DEFAULT NULL,
  `Login_role` varchar(45) DEFAULT NULL,
  `Login_username` varchar(45) DEFAULT NULL,
  `Employee_Employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeedatabaseaccess`
--

INSERT INTO `employeedatabaseaccess` (`Login_id`, `Login_password`, `Login_role`, `Login_username`, `Employee_Employee_id`) VALUES
(64, 'pwkblackburn', 'manager', 'kblackburn', 1),
(65, 'pwzsanford', 'employee', 'zsanford', 10),
(66, 'aforbes2000', 'employee', 'aforbes', 2),
(67, 'pwmBond', 'employee', '', 11),
(68, 'pwnHardy', 'employee', 'nhardy', 12),
(69, 'pwKTally', 'employee', 'ktally', 13),
(71, 'pwaChristian', 'employee', 'achristian', 14),
(72, 'pwhpaul', 'employee', 'hpaul', 15),
(73, 'pwshoughton', 'employee', 'shoughton', 16),
(74, 'pwtmccormack', 'employee', 'tmccormack', 17),
(75, 'pwistevens', 'employee', 'isteven', 18),
(77, 'pwgcharlton', 'employee', 'gcharlton', 19),
(78, 'pwvmontes', 'employee', 'vmontes', 20),
(79, 'pwjli', 'employee', 'jli', 3),
(80, 'tingram1981', 'employee', 'tingram', 4),
(81, 'admin', 'admin', 'admin', 999),
(83, 'ljohnsonpw', 'employee', 'ljohnson', 5),
(84, 'kli1976', 'employee', 'kli', 6),
(85, 'dmurillo1991', 'admin', 'dmurillo', 7),
(86, 'hking1979', 'employee', 'hking', 8),
(87, 'jvega1998', 'employee', 'jvega', 9),
(88, 'fbowler1989', 'employee', 'fbowler', 21),
(89, 'jflynn1994', 'employee', 'jflynn', 22),
(90, 'tclifford1989', 'manager', 'tclifford', 23),
(91, 'pwbsmith', 'manager', 'bsmith', 25),
(92, 'bstump1974', 'admin', 'bstump', 24),
(93, 'employee', 'employee', 'employee', 9999),
(94, 'manager', 'manager', 'manager', 999999),
(96, 'sgarcia199', 'employee', 'sgarcia', 26),
(97, 'nknight91', 'employee', 'nknight', 27),
(98, 'knguyen00', 'employee', 'knguyen', 28),
(99, 'bstewart88', 'admin', 'bstewart', 29);

-- --------------------------------------------------------

--
-- Table structure for table `history_work`
--

CREATE TABLE `history_work` (
  `Work_id` int(11) NOT NULL,
  `Employee_name` varchar(45) NOT NULL,
  `Clock_in` timestamp NOT NULL,
  `Clock_out` timestamp NOT NULL,
  `Total_hours` float NOT NULL,
  `Project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_work`
--

INSERT INTO `history_work` (`Work_id`, `Employee_name`, `Clock_in`, `Clock_out`, `Total_hours`, `Project_id`) VALUES
(3, 'Kate BlackBurn', '2022-04-24 06:08:46', '2022-04-23 14:52:06', 0, 1),
(4, 'Andy Forbes', '2022-04-24 01:38:49', '2022-04-24 01:39:37', 9.091, 2),
(5, 'John Li', '2022-04-24 01:40:19', '2022-04-24 00:25:03', 44.0718, 1),
(6, 'Tina Ingram', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 2),
(7, 'Liam Johnson', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 2),
(8, 'Kenneth Li', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 2),
(9, 'Daniel Murillo', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 5),
(10, 'Henry King', '2022-04-24 00:11:52', '2022-04-24 00:12:03', 0, 1),
(11, 'Justise Vega', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 2),
(12, 'Zeeshan Sanford', '2022-04-23 17:27:20', '2022-04-23 23:31:47', 0, 5),
(13, 'Money Bond', '2022-04-23 12:47:29', '2022-04-24 00:26:44', 5.6542, 2),
(14, 'Natalie Hardy', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 14, 6),
(15, 'Money Bond', '2022-04-23 23:46:27', '0000-00-00 00:00:00', 0, 2),
(16, 'Andrew Christian', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 3),
(17, 'Hunter Paul', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 4),
(18, 'Stanley Houghton', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 3),
(19, 'Timothy Mccormack', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 2),
(20, 'Isobell Steven', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 4),
(21, 'Greg Charlton', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 1),
(22, 'Vince Montes', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 2),
(23, 'Flame Bowler', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 3),
(24, 'Johnny Flynn', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 5),
(25, 'Tim Clifford', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 6),
(26, 'Brandon Stump', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 2),
(27, 'Brandon Smith', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 4),
(28, 'Serge Garcia', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 4),
(29, 'Nathan Knight', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 2),
(30, 'Kobe Nguyen', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 1),
(31, 'Brianna George', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 4),
(32, 'admin', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 6),
(33, 'employee', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 6),
(34, 'manager', '2022-04-23 12:47:29', '0000-00-00 00:00:00', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `message_id` int(11) NOT NULL,
  `message` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`message_id`, `message`) VALUES
(1, 'Employee has reached their max hours');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Project_id` int(11) NOT NULL,
  `Project_name` varchar(45) DEFAULT NULL,
  `Hours` varchar(45) DEFAULT NULL,
  `Cost` float DEFAULT NULL,
  `Status_of_project` varchar(45) DEFAULT NULL,
  `Departments_Department_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_id`, `Project_name`, `Hours`, `Cost`, `Status_of_project`, `Departments_Department_number`) VALUES
(1, 'Research', '44.07', 1101.75, 'Ongoing', 1),
(2, 'Funding', '14.75', 368.75, 'Ongoing', 2),
(3, 'Workplace Design', '0', 0, 'Ongoing', 1),
(4, 'Advertising', '0', 0, 'Ongoing', 2),
(5, 'Site Management', '0', 0, 'Ongoing', 1),
(6, 'Retail ', '14', 350, 'Ongoing', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Company_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_number`),
  ADD KEY `fk_Departments_Company1_idx` (`Company_Company_id`);

--
-- Indexes for table `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`Phone_number`),
  ADD KEY `fk_Dependent_Employee1_idx` (`Employee_Employee_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_id`),
  ADD KEY `fk_Employee_Departments_idx` (`Departments_Department_number`),
  ADD KEY `fk_Employee_project` (`project_project_id`);

--
-- Indexes for table `employeedatabaseaccess`
--
ALTER TABLE `employeedatabaseaccess`
  ADD PRIMARY KEY (`Login_id`),
  ADD UNIQUE KEY `Login_username` (`Login_username`),
  ADD KEY `fk_EmployeeDataBaseAccess_Employee1_idx` (`Employee_Employee_id`);

--
-- Indexes for table `history_work`
--
ALTER TABLE `history_work`
  ADD PRIMARY KEY (`Work_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_id`),
  ADD KEY `fk_Project_Departments1_idx` (`Departments_Department_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeedatabaseaccess`
--
ALTER TABLE `employeedatabaseaccess`
  MODIFY `Login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `history_work`
--
ALTER TABLE `history_work`
  MODIFY `Work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_Departments_Company1` FOREIGN KEY (`Company_Company_id`) REFERENCES `company` (`Company_id`);

--
-- Constraints for table `dependent`
--
ALTER TABLE `dependent`
  ADD CONSTRAINT `fk_Dependent_Employee1` FOREIGN KEY (`Employee_Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_Employee_Departments` FOREIGN KEY (`Departments_Department_number`) REFERENCES `departments` (`Department_number`),
  ADD CONSTRAINT `fk_Employee_project` FOREIGN KEY (`project_project_id`) REFERENCES `project` (`Project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeedatabaseaccess`
--
ALTER TABLE `employeedatabaseaccess`
  ADD CONSTRAINT `fk_EmployeeDataBaseAccess_Employee1` FOREIGN KEY (`Employee_Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_Project_Departments1` FOREIGN KEY (`Departments_Department_number`) REFERENCES `departments` (`Department_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
