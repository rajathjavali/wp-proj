-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2015 at 06:15 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `USN` varchar(10) NOT NULL DEFAULT '',
  `addr` varchar(100) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `pincode` varchar(10) NOT NULL DEFAULT '',
  `P_email` varchar(20) NOT NULL,
  `P_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`USN`, `addr`, `city`, `state`, `pincode`, `P_email`, `P_no`) VALUES
('1rv12is053', 'Bmp no38,brindavan layout,padmanabhanahanagar', 'Bangalore', 'Karnataka', '560061', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `RegDeadline` datetime DEFAULT NULL,
  `eleDeadline` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `RegDeadline`, `eleDeadline`) VALUES
('root', 'root', '2016-01-01 01:00:00', '2016-01-01 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `approve_1`
--

CREATE TABLE IF NOT EXISTS `approve_1` (
  `USN` varchar(10) NOT NULL,
  `Sem` int(1) NOT NULL DEFAULT '0',
  `acy` int(4) NOT NULL DEFAULT '2015',
  `sgpa` float DEFAULT NULL,
  `approve` int(11) NOT NULL,
  `staff_ID` varchar(3) NOT NULL,
  `registered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approve_1`
--

INSERT INTO `approve_1` (`USN`, `Sem`, `acy`, `sgpa`, `approve`, `staff_ID`, `registered`) VALUES
('1RV12IS041', 3, 2015, 9.01, 1, 'AS', 1),
('1RV12IS042', 6, 2015, 8.2, 0, 'AS', 1),
('1RV12IS042', 7, 2015, 88, 0, 'AS', 1),
('1RV12IS043', 6, 2015, 8.2, 0, 'AS', 1),
('1RV12IS045', 5, 2015, 7, 0, '', 1),
('1RV12IS045', 6, 2015, 8.01, 0, '', 1),
('1RV12IS048', 6, 2015, 9.02, 0, '', 1),
('1RV12IS051', 6, 2015, 8.2, 0, '', 1),
('1RV12IS052', 6, 2015, 9, 0, '', 1),
('1RV12IS053', 6, 2015, 9, 1, 'AS', 1),
('1RV12IS054', 6, 2015, 8.2, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE IF NOT EXISTS `attends` (
  `susn` varchar(10) NOT NULL DEFAULT '',
  `cdte` varchar(12) NOT NULL,
  `ctme` varchar(5) NOT NULL,
  `ccode` varchar(10) NOT NULL DEFAULT '',
  `acy` year(4) NOT NULL,
  `sem` int(11) NOT NULL DEFAULT '0',
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attends`
--

INSERT INTO `attends` (`susn`, `cdte`, `ctme`, `ccode`, `acy`, `sem`, `status`) VALUES
('1rv12is004', '2015-06-05', '16:12', '12HSM61', 2014, 6, '0'),
('1rv12is004', '2015-06-06', '12:25', '12HSM61', 2014, 6, '1'),
('1rv12is004', '2015-06-07', '12:33', '12HSM61', 2014, 6, '1'),
('1rv12is023', '2015-06-05', '16:12', '12HSM61', 2014, 6, '0'),
('1rv12is023', '2015-06-06', '12:25', '12HSM61', 2014, 6, '1'),
('1rv12is023', '2015-06-07', '12:33', '12HSM61', 2014, 6, '1'),
('1rv12is051', '2015-06-05', '16:12', '12HSM61', 2014, 6, '1'),
('1rv12is051', '2015-06-06', '12:25', '12HSM61', 2014, 6, '1'),
('1rv12is051', '2015-06-07', '12:33', '12HSM61', 2014, 6, '1'),
('1rv12is053', '2015-06-05', '16:12', '12HSM61', 2014, 6, '0'),
('1rv12is053', '2015-06-06', '12:25', '12HSM61', 2014, 6, '0'),
('1rv12is053', '2015-06-07', '12:33', '12HSM61', 2014, 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE IF NOT EXISTS `checks` (
  `USN` varchar(10) NOT NULL DEFAULT '',
  `nsno` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`USN`, `nsno`) VALUES
('1rv12is041', 1),
('1rv12is041', 2),
('1rv12is041', 3),
('1rv12is041', 5),
('1rv12is041', 6),
('1rv12is041', 7),
('1rv12is041', 8),
('1rv12is041', 9),
('1rv12is041', 10);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `ccode` varchar(7) NOT NULL DEFAULT '',
  `dte` varchar(12) NOT NULL,
  `tme` varchar(8) NOT NULL,
  `roomno` varchar(6) DEFAULT NULL,
  `acy` year(4) NOT NULL,
  `sem` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ccode`, `dte`, `tme`, `roomno`, `acy`, `sem`) VALUES
('12HSM61', '10-APR-2015', '09:00', '110', 2014, 6),
('12IS63', '10-APR-2015', '10:00', '110', 2014, 6);

-- --------------------------------------------------------

--
-- Table structure for table `elective`
--

CREATE TABLE IF NOT EXISTS `elective` (
  `E_Code` varchar(7) DEFAULT NULL,
  `E_Type` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elective`
--

INSERT INTO `elective` (`E_Code`, `E_Type`) VALUES
('12IS6D5', 'D'),
('12IS6D4', 'D'),
('12IS6D3', 'D'),
('12IS6D2', 'D'),
('12IS6D1', 'D'),
('12IS6C2', 'C'),
('12IS6C5', 'C'),
('12IS6C4', 'C'),
('12IS6C3', 'C'),
('12IS6C1', 'C'),
('12IS5A1', 'A'),
('12IS5B6', 'B'),
('12IS5B5', 'B'),
('12IS5B4', 'B'),
('12IS5A2', 'A'),
('12IS5B3', 'B'),
('12IS5A3', 'A'),
('12IS5B2', 'B'),
('12IS5B1', 'B'),
('12IS5A4', 'A'),
('12IS5A5', 'A'),
('12IS5A6', 'A'),
('12BT5A3', 'A'),
('12BT5A4', 'A'),
('12BT5A5', 'A'),
('12BT5A6', 'A'),
('12BT5B1', 'B'),
('12BT5B3', 'B'),
('12BT5B5', 'B'),
('12BT5B6', 'B'),
('12BT6C1', 'C'),
('12BT6C2', 'C'),
('12BT6C3', 'C'),
('12BT6C4', 'C'),
('12BT6C5', 'C'),
('12BT6D1', 'D'),
('12BT6D2', 'D'),
('12BT6D3', 'D'),
('12BT6D4', 'D'),
('12BT6D5', 'D'),
('12BT7E1', 'E'),
('12BT7E2', 'E'),
('12BT7E3', 'E'),
('12BT7E4', 'E'),
('12BT7E5', 'E'),
('12BT7E6', 'E'),
('12BT7E7', 'E'),
('12BT7E8', 'E'),
('12BTS5A', 'A'),
('12BTTB2', 'B'),
('12CS5A1', 'A'),
('12CS5A2', 'A'),
('12CS5A3', 'A'),
('12CS5A4', 'A'),
('12CS5A5', 'A'),
('12CS5A6', 'A'),
('12CS5B1', 'B'),
('12CS5B2', 'B'),
('12CS5B3', 'B'),
('12CS5B4', 'B'),
('12CS5B5', 'B'),
('12CS5B6', 'B'),
('12CS6C1', 'C'),
('12CS6C2', 'C'),
('12CS6C3', 'C'),
('12CS6C4', 'C'),
('12CS6C5', 'C'),
('12CS6D1', 'D'),
('12CS6D2', 'D'),
('12CS6D3', 'D'),
('12CS6D4', 'D'),
('12CS6D5', 'D'),
('12CS7E1', 'E'),
('12CS7E2', 'E'),
('12CS7E3', 'E'),
('12CS7E4', 'E'),
('12CS7E5', 'E'),
('12CS7E6', 'E'),
('12CS7E7', 'E'),
('12CS7E8', 'E'),
('12ECE7E', 'E'),
('12EEE5A', 'A'),
('12EEE7E', 'E'),
('12EEES5', 'E'),
('12ES5A1', 'A'),
('12ES5A2', 'A'),
('12ES5A3', 'A'),
('12ES5A4', 'A'),
('12ES5A5', 'A'),
('12ES5A6', 'A'),
('12ES5B1', 'B'),
('12ES5B2', 'B'),
('12ES5B3', 'B'),
('12ES5B5', 'B'),
('12ES5B6', 'B'),
('12ES6C1', 'C'),
('12ES6C2', 'C'),
('12ES6C3', 'C'),
('12ES6C4', 'C'),
('12ES6C5', 'C'),
('12ES6D1', 'D'),
('12ES6D2', 'D'),
('12ES6D3', 'D'),
('12ES6D4', 'D'),
('12ES6D5', 'D'),
('12ETS5A', 'A'),
('12GF02', 'F'),
('12GF03', 'F'),
('12GF04', 'F'),
('12GF05', 'F'),
('12GF06', 'F'),
('12GF07', 'F'),
('12GF08', 'F'),
('12GF701', 'F'),
('12GG01', 'G'),
('12GG02', 'G'),
('12GG03', 'G'),
('12GG04', 'G'),
('12GG05', 'G'),
('12GG06', 'G'),
('12GG07', 'G'),
('12GG08', 'G'),
('12GG09', 'G'),
('12IS7E1', 'E'),
('12IS7E2', 'E'),
('12IS7E3', 'E'),
('12IS7E4', 'E'),
('12IS7E5', 'E'),
('12IS7E6', 'E'),
('12IS7E7', 'E'),
('12IS7E8', 'E'),
('12IT5A2', 'A'),
('12IT5A3', 'A'),
('12IT5A4', 'A'),
('12IT5A5', 'A'),
('12IT5A6', 'A'),
('12IT5B1', 'B'),
('12IT5B3', 'B'),
('12IT5B5', 'B'),
('12IT5B6', 'B'),
('12IT6C1', 'C'),
('12IT6C2', 'C'),
('12IT6C3', 'C'),
('12IT6C4', 'C'),
('12IT6C5', 'C'),
('12IT6D1', 'D'),
('12IT6D2', 'D'),
('12IT6D3', 'D'),
('12IT6D4', 'D'),
('12IT6D5', 'D'),
('12IT7E1', 'E'),
('12IT7E2', 'E'),
('12IT7E3', 'E'),
('12IT7E4', 'E'),
('12IT7E5', 'E'),
('12IT7E6', 'E'),
('12IT7E7', 'E'),
('12IT7E8', 'E'),
('12ITS5A', 'A'),
('12ITTB2', 'B'),
('12ME5A2', 'A'),
('12ME5A3', 'A'),
('12ME5A4', 'A'),
('12ME5A5', 'A'),
('12ME5A6', 'A'),
('12ME5B1', 'A'),
('12ME5B3', 'A'),
('12ME5B5', 'A'),
('12ME5B6', 'A'),
('12ME6C1', 'C'),
('12ME6C2', 'C'),
('12ME6C3', 'C'),
('12ME6C4', 'C'),
('12ME6C5', 'C'),
('12ME6D1', 'D'),
('12ME6D2', 'D'),
('12ME6D3', 'D'),
('12ME6D4', 'D'),
('12ME6D5', 'D'),
('12MES5A', 'A'),
('12METB2', 'B'),
('12TS5A2', 'A'),
('12TS5A3', 'A'),
('12TS5A4', 'A'),
('12TS5A5', 'A'),
('12TS5A6', 'A'),
('12TS5B1', 'B'),
('12TS5B3', 'B'),
('12TS5B5', 'B'),
('12TS5B6', 'B'),
('12TS6C1', 'C'),
('12TS6C2', 'C'),
('12TS6C3', 'C'),
('12TS6C4', 'C'),
('12TS6C5', 'C'),
('12TS6D1', 'D'),
('12TS6D2', 'D'),
('12TS6D3', 'D'),
('12TS6D4', 'D'),
('12TS6D5', 'D'),
('12TSTB2', 'B'),
('1BT5B4', 'B'),
('1EES5B4', 'B'),
('1IT5B4', 'B'),
('1MET5B4', 'B'),
('1TES5B4', 'B'),
('12GF02', 'F'),
('12GF03', 'F'),
('12GF04', 'F'),
('12GF05', 'F'),
('12GF06', 'F'),
('12GF07', 'F'),
('12GF08', 'F'),
('12GF701', 'F'),
('12GG01', 'G'),
('12GG02', 'G'),
('12GG03', 'G'),
('12GG04', 'G'),
('12GG05', 'G'),
('12GG06', 'G'),
('12GG07', 'G'),
('12GG07', 'G'),
('12GG09', 'G'),
('12IS6D5', 'D'),
('12IS6D4', 'D'),
('12IS6D3', 'D'),
('12IS6D2', 'D'),
('12IS6D1', 'D'),
('12IS6C2', 'C'),
('12IS6C5', 'C'),
('12IS6C4', 'C'),
('12IS6C3', 'C'),
('12IS6C1', 'C'),
('12IS5A1', 'A'),
('12IS5B6', 'B'),
('12IS5B5', 'B'),
('12IS5B4', 'B'),
('12IS5A2', 'A'),
('12IS5B3', 'B'),
('12IS5A3', 'A'),
('12IS5B2', 'B'),
('12IS5B1', 'B'),
('12IS5A4', 'A'),
('12IS5A5', 'A'),
('12IS5A6', 'A'),
('12BT5A3', 'A'),
('12BT5A4', 'A'),
('12BT5A5', 'A'),
('12BT5A6', 'A'),
('12BT5B1', 'B'),
('12BT5B3', 'B'),
('12BT5B5', 'B'),
('12BT5B6', 'B'),
('12BT6C1', 'C'),
('12BT6C2', 'C'),
('12BT6C3', 'C'),
('12BT6C4', 'C'),
('12BT6C5', 'C'),
('12BT6D1', 'D'),
('12BT6D2', 'D'),
('12BT6D3', 'D'),
('12BT6D4', 'D'),
('12BT6D5', 'D'),
('12BT7E1', 'E'),
('12BT7E2', 'E'),
('12BT7E3', 'E'),
('12BT7E4', 'E'),
('12BT7E5', 'E'),
('12BT7E6', 'E'),
('12BT7E7', 'E'),
('12BT7E8', 'E'),
('12BTS5A', 'A'),
('12BTTB2', 'B'),
('12CS5A1', 'A'),
('12CS5A2', 'A'),
('12CS5A3', 'A'),
('12CS5A4', 'A'),
('12CS5A5', 'A'),
('12CS5A6', 'A'),
('12CS5B1', 'B'),
('12CS5B2', 'B'),
('12CS5B3', 'B'),
('12CS5B4', 'B'),
('12CS5B5', 'B'),
('12CS5B6', 'B'),
('12CS6C1', 'C'),
('12CS6C2', 'C'),
('12CS6C3', 'C'),
('12CS6C4', 'C'),
('12CS6C5', 'C'),
('12CS6D1', 'D'),
('12CS6D2', 'D'),
('12CS6D3', 'D'),
('12CS6D4', 'D'),
('12CS6D5', 'D'),
('12CS7E1', 'E'),
('12CS7E2', 'E'),
('12CS7E3', 'E'),
('12CS7E4', 'E'),
('12CS7E5', 'E'),
('12CS7E6', 'E'),
('12CS7E7', 'E'),
('12CS7E8', 'E'),
('12ECE7E', 'E'),
('12EEE5A', 'A'),
('12EEE7E', 'E'),
('12EEES5', 'E'),
('12ES5A1', 'A'),
('12ES5A2', 'A'),
('12ES5A3', 'A'),
('12ES5A4', 'A'),
('12ES5A5', 'A'),
('12ES5A6', 'A'),
('12ES5B1', 'B'),
('12ES5B2', 'B'),
('12ES5B3', 'B'),
('12ES5B5', 'B'),
('12ES5B6', 'B'),
('12ES6C1', 'C'),
('12ES6C2', 'C'),
('12ES6C3', 'C'),
('12ES6C4', 'C'),
('12ES6C5', 'C'),
('12ES6D1', 'D'),
('12ES6D2', 'D'),
('12ES6D3', 'D'),
('12ES6D4', 'D'),
('12ES6D5', 'D'),
('12ETS5A', 'A'),
('12GF02', 'F'),
('12GF03', 'F'),
('12GF04', 'F'),
('12GF05', 'F'),
('12GF06', 'F'),
('12GF07', 'F'),
('12GF08', 'F'),
('12GF701', 'F'),
('12GG01', 'G'),
('12GG02', 'G'),
('12GG03', 'G'),
('12GG04', 'G'),
('12GG05', 'G'),
('12GG06', 'G'),
('12GG07', 'G'),
('12GG08', 'G'),
('12GG09', 'G'),
('12IS7E1', 'E'),
('12IS7E2', 'E'),
('12IS7E3', 'E'),
('12IS7E4', 'E'),
('12IS7E5', 'E'),
('12IS7E6', 'E'),
('12IS7E7', 'E'),
('12IS7E8', 'E'),
('12IT5A2', 'A'),
('12IT5A3', 'A'),
('12IT5A4', 'A'),
('12IT5A5', 'A'),
('12IT5A6', 'A'),
('12IT5B1', 'B'),
('12IT5B3', 'B'),
('12IT5B5', 'B'),
('12IT5B6', 'B'),
('12IT6C1', 'C'),
('12IT6C2', 'C'),
('12IT6C3', 'C'),
('12IT6C4', 'C'),
('12IT6C5', 'C'),
('12IT6D1', 'D'),
('12IT6D2', 'D'),
('12IT6D3', 'D'),
('12IT6D4', 'D'),
('12IT6D5', 'D'),
('12IT7E1', 'E'),
('12IT7E2', 'E'),
('12IT7E3', 'E'),
('12IT7E4', 'E'),
('12IT7E5', 'E'),
('12IT7E6', 'E'),
('12IT7E7', 'E'),
('12IT7E8', 'E'),
('12ITS5A', 'A'),
('12ITTB2', 'B'),
('12ME5A2', 'A'),
('12ME5A3', 'A'),
('12ME5A4', 'A'),
('12ME5A5', 'A'),
('12ME5A6', 'A'),
('12ME5B1', 'A'),
('12ME5B3', 'A'),
('12ME5B5', 'A'),
('12ME5B6', 'A'),
('12ME6C1', 'C'),
('12ME6C2', 'C'),
('12ME6C3', 'C'),
('12ME6C4', 'C'),
('12ME6C5', 'C'),
('12ME6D1', 'D'),
('12ME6D2', 'D'),
('12ME6D3', 'D'),
('12ME6D4', 'D'),
('12ME6D5', 'D'),
('12MES5A', 'A'),
('12METB2', 'B'),
('12TS5A2', 'A'),
('12TS5A3', 'A'),
('12TS5A4', 'A'),
('12TS5A5', 'A'),
('12TS5A6', 'A'),
('12TS5B1', 'B'),
('12TS5B3', 'B'),
('12TS5B5', 'B'),
('12TS5B6', 'B'),
('12TS6C1', 'C'),
('12TS6C2', 'C'),
('12TS6C3', 'C'),
('12TS6C4', 'C'),
('12TS6C5', 'C'),
('12TS6D1', 'D'),
('12TS6D2', 'D'),
('12TS6D3', 'D'),
('12TS6D4', 'D'),
('12TS6D5', 'D'),
('12TSTB2', 'B'),
('1BT5B4', 'B'),
('1EES5B4', 'B'),
('1IT5B4', 'B'),
('1MET5B4', 'B'),
('1TES5B4', 'B'),
('12GF02', 'F'),
('12GF03', 'F'),
('12GF04', 'F'),
('12GF05', 'F'),
('12GF06', 'F'),
('12GF07', 'F'),
('12GF08', 'F'),
('12GF701', 'F'),
('12GG01', 'G'),
('12GG02', 'G'),
('12GG03', 'G'),
('12GG04', 'G'),
('12GG05', 'G'),
('12GG06', 'G'),
('12GG07', 'G'),
('12GG07', 'G'),
('12GG09', 'G');

-- --------------------------------------------------------

--
-- Table structure for table `handles`
--

CREATE TABLE IF NOT EXISTS `handles` (
  `lid` varchar(10) NOT NULL DEFAULT '',
  `ccode` varchar(7) NOT NULL DEFAULT '',
  `acy` year(4) NOT NULL DEFAULT '0000',
  `sem` int(11) NOT NULL DEFAULT '0',
  `section` varchar(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `handles`
--

INSERT INTO `handles` (`lid`, `ccode`, `acy`, `sem`, `section`) VALUES
('003', '12IS62', 2014, 6, 'A'),
('004', '12IS62', 2014, 6, 'B'),
('123', '12IS62', 2014, 6, 'A'),
('123', '12IS63', 2014, 6, 'A'),
('123', '12IS65', 2014, 6, 'B'),
('123', '12IS6C1', 2014, 6, 'B'),
('234', '12IS6D4', 2014, 6, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `lab` int(2) NOT NULL DEFAULT '0',
  `t1` int(3) NOT NULL DEFAULT '0',
  `q1` int(2) NOT NULL DEFAULT '0',
  `t2` int(3) NOT NULL DEFAULT '0',
  `q2` int(2) NOT NULL DEFAULT '0',
  `t3` int(3) NOT NULL DEFAULT '0',
  `q3` int(2) NOT NULL DEFAULT '0',
  `assign` int(2) NOT NULL DEFAULT '0',
  `ccode` varchar(7) NOT NULL DEFAULT '',
  `susn` varchar(10) NOT NULL DEFAULT '',
  `acy` year(4) NOT NULL,
  `sem` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
`serialno` int(11) NOT NULL,
  `info` varchar(1000) DEFAULT NULL,
  `dte` varchar(12) DEFAULT NULL,
  `tme` varchar(5) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `id` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`serialno`, `info`, `dte`, `tme`, `type`, `id`) VALUES
(1, 'extra class on 21st april 2015', '19-Apr-2015', '12:45', NULL, '123'),
(2, 'hello everyone\n', '19-Apr-2015', '12:50', NULL, '123'),
(3, 'lab internals cn on Monday - 20-Apr-2015', '19-Apr-2015', '12:50', NULL, '123'),
(5, 'lab internals dbms on Monday - 22-Apr-2015', '19-Apr-2015', '12:51', NULL, '123'),
(6, 'lab internals portions include all programs except kerberos\n', '19-Apr-2015', '12:52', NULL, '123'),
(7, 'bsjxnxn do CFI cup dry coo cry so do CCI do so chu cut sy cl by srry CV Hi do cook j try do no dry srry er guy coo hi srry coo hi dry coo chu guy chu boo no cry srry hi no cut sy book CCI go chu CCU srry cut CCI vu chu CCU srry coo chu CCU CCU CCU CCU CCU CCU srry do CFI so cool HVO srry do CCI do CCI vu set chu CCU sy cl so do CCI vu chu at food do so so so quejrnsksbcndjd hdbdjdbdjdbdys xhd c xje jxkemdje f fbfjrbruvznnsjslndjfkdkdkdjfjdkdkd djdndndndjd djdnfmfmkfncgjbfb.   hnnsjdmckdbdjs jdndndndncndkwnzvdjd jx', '19-Apr-2015', '12:56', NULL, '123'),
(8, 'hello student\n', '21-Apr-2015', '02:18', NULL, '123'),
(9, 'hello\n', '04-May-2015', '17:05', NULL, '123'),
(10, 'hello@$-$', '04-May-2015', '17:45', NULL, '123');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `Staff_ID` varchar(10) NOT NULL,
  `FName` varchar(20) DEFAULT NULL,
  `Mname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `Phone_No` bigint(10) DEFAULT NULL,
  `Email_ID` varchar(40) DEFAULT NULL,
  `Shortname` varchar(10) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `FName`, `Mname`, `Lname`, `Phone_No`, `Email_ID`, `Shortname`, `password`) VALUES
('001', 'Arjun', '', 'Singar', 9008639196, 'as@rvce.edu.in', 'AS', 'pass1'),
('003', 'G', 'Srinivas', 'S', 24864, 'gns@rvce.edu', 'GNS', 'pass3'),
('004', 'Cavery', 'K', 'N', 3754, 'ckn@rvce.edu', 'CKN', 'pass3'),
('005', 'Smitha', 'A', 'B', 4586, 'abs@rvce.edu', 'ABS', 'pass'),
('100', 'Mamatha', 'M', NULL, 34756, 'mm@rvce.edu.in', 'MM', 'pass1'),
('123', 'Padmashree', '', '', 9632359395, 'pad@gmail.com', 'PT', 'rtyu'),
('234', 'Anisha', '', '', 943187947, 'anisha@gmail.com', 'ASB', 'rtyu');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `stateno` int(11) NOT NULL,
  `state` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateno`, `state`) VALUES
(1, 'Andhra Pradesh'),
(2, ' Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jammu & Kashmir'),
(11, 'Jharkhand'),
(12, 'Karnataka'),
(13, 'Kerala'),
(14, 'Madhya Pradesh'),
(15, 'Maharashtra'),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, 'Nagaland'),
(20, 'Odisha'),
(21, 'Punjab'),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu'),
(25, 'Telangana'),
(26, 'Tripura'),
(27, 'Uttar Pradesh'),
(28, 'Uttarakhand'),
(29, 'West Bengal'),
(30, 'Andaman and Nicobar '),
(31, 'Chandigarh'),
(32, 'Dadra and Nagar Have'),
(33, 'Daman and Diu'),
(34, 'Lakshadweep'),
(35, 'Delhi'),
(36, 'Puducherry');

-- --------------------------------------------------------

--
-- Table structure for table `studcourse`
--

CREATE TABLE IF NOT EXISTS `studcourse` (
  `USN` varchar(10) NOT NULL DEFAULT '',
  `ccode` varchar(7) NOT NULL DEFAULT '',
  `acy` year(4) NOT NULL DEFAULT '0000',
  `sem` varchar(2) NOT NULL DEFAULT '0',
  `section` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studcourse`
--

INSERT INTO `studcourse` (`USN`, `ccode`, `acy`, `sem`, `section`) VALUES
('1rv12is004', '12IS61', 2014, '6', 'A'),
('1rv12is004', '12IS62', 2014, '6', 'A'),
('1rv12is004', '12IS63', 2014, '6', 'A'),
('1rv12is004', '12IS64', 2014, '6', 'A'),
('1rv12is004', '12IS65', 2014, '6', 'A'),
('1rv12is004', '12IS6C1', 2014, '6', 'A'),
('1rv12is004', '12IS6D4', 2014, '6', 'A'),
('1RV12IS009', '12HSM61', 2014, '6', 'B'),
('1rv12is009', '12IS62', 2014, '6', 'B'),
('1rv12is009', '12IS63', 2014, '6', 'B'),
('1rv12is009', '12IS64', 2014, '6', 'B'),
('1rv12is009', '12IS65', 2014, '6', 'B'),
('1rv12is009', '12IS6C1', 2014, '6', 'C'),
('1rv12is009', '12IS6D4', 2014, '6', 'D'),
('1RV12IS022', '12HSM61', 2014, '6', 'B'),
('1rv12is023', '12IS61', 2014, '6', 'A'),
('1rv12is023', '12IS61', 2014, '6', 'B'),
('1rv12is023', '12IS62', 2014, '6', 'A'),
('1rv12is023', '12IS62', 2014, '6', 'B'),
('1rv12is023', '12IS63', 2014, '6', 'A'),
('1rv12is023', '12IS63', 2014, '6', 'B'),
('1rv12is023', '12IS64', 2014, '6', 'A'),
('1rv12is023', '12IS64', 2014, '6', 'B'),
('1rv12is023', '12IS65', 2014, '6', 'A'),
('1rv12is023', '12IS6C1', 2014, '6', 'A'),
('1rv12is023', '12IS6C3', 2014, '6', 'E'),
('1rv12is023', '12IS6D3', 2014, '6', 'F'),
('1rv12is023', '12IS6D4', 2014, '6', 'A'),
('1RV12IS041', '12HSM61', 2014, '6', 'A'),
('1RV12IS041', '12IS62', 2014, '6', 'A'),
('1RV12IS041', '12IS63', 2014, '6', 'A'),
('1RV12IS041', '12IS64', 2014, '6', 'A'),
('1rv12is041', '12IS65', 2014, '6', 'A'),
('1rv12is041', '12IS6C1', 2014, '6', 'A'),
('1rv12is041', '12IS6D4', 2014, '6', 'A'),
('1rv12is045', '12IS61', 2014, '6', 'A'),
('1rv12is045', '12IS62', 2014, '6', 'A'),
('1rv12is045', '12IS63', 2014, '6', 'A'),
('1rv12is045', '12IS64', 2014, '6', 'A'),
('1rv12is045', '12IS65', 2014, '6', 'A'),
('1rv12is045', '12IS6C1', 2014, '6', 'A'),
('1rv12is045', '12IS6D4', 2014, '6', 'A'),
('1rv12is051', '12IS61', 2014, '6', 'A'),
('1rv12is051', '12IS62', 2014, '6', 'A'),
('1rv12is051', '12IS63', 2014, '6', 'A'),
('1rv12is051', '12IS64', 2014, '6', 'A'),
('1rv12is051', '12IS65', 2014, '6', 'A'),
('1rv12is051', '12IS6C1', 2014, '6', 'A'),
('1rv12is051', '12IS6D4', 2014, '6', 'A'),
('1rv12is052', '12IS65', 2014, '6', 'A'),
('1RV12IS053', '12IS6C2', 2014, '6 ', ''),
('1rv12is054', '12IS61', 2014, '6', 'A'),
('1rv12is054', '12IS62', 2014, '6', 'A'),
('1rv12is054', '12IS63', 2014, '6', 'A'),
('1rv12is054', '12IS64', 2014, '6', 'A'),
('1rv12is054', '12IS65', 2014, '6', 'A'),
('1rv12is054', '12IS6C1', 2014, '6', 'A'),
('1rv12is054', '12IS6D4', 2014, '6', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `USN` varchar(10) NOT NULL,
  `FName` varchar(20) DEFAULT NULL,
  `Mname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `Phone_No` bigint(10) DEFAULT NULL,
  `Email_ID` varchar(40) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `timeor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `FName`, `Mname`, `Lname`, `Phone_No`, `Email_ID`, `password`, `timeor`) VALUES
('1RV12IS004', 'ANIRUDH', 'V', 'C', 9739030486, 'anirudh2694@gmail.com', 'qwerty', '2015-11-15 06:22:39'),
('1RV12IS009', 'APOORVA', 'N', '', 9611939150, 'apoorvanagaraj95@gmail.com', 'qwerty', '2015-11-15 06:22:39'),
('1RV12IS022', 'LALITHA', 'R', 'RAKSHITHA', 9686687303, 'lalitharr@gmail.com', 'qwerty', '2015-11-15 06:22:39'),
('1RV12IS023', 'MEGHASHYAM', 'K', '', 9535701567, 'shyam2801951@gmail.com', 'qwerty', '2015-11-15 06:22:39'),
('1rv12is041', 'Rajath', 'P', 'Javali', 8867662232, 'rajathjavali@gmail.com', 'qwerty', '2015-11-15 06:22:39'),
('1RV12IS045', 'ROHITH', 'M', '', 8951205938, 'rohith.m94@gmail.com', 'qwerty', '2015-11-15 06:22:39'),
('1RV12IS051', 'SHYAM', 'KUMAR', 'S', 7760025234, 'shyamks111@gmail.com', 'qwerty', '2015-11-15 06:22:39'),
('1RV12IS052', 'SOURABH', '', '', 8861943745, 'sourabhshirgur@gmail.com', 'qwerty', '2015-11-15 06:22:39'),
('1rv12is053', 'Spoorthi', '', 'Pujari', 9632359395, 'spoorthi.pujari@gmail.com', 'qwerty', '2015-11-15 06:22:39'),
('1RV12IS054', 'SUHAS', 'BHATTA', 'A', 7259368949, 'suhasbhatta.a@gmail.com', 'qwerty', '2015-11-15 06:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE IF NOT EXISTS `syllabus` (
  `Name` varchar(50) DEFAULT NULL,
  `Host_Dpt` varchar(10) NOT NULL,
  `S_Code` varchar(7) NOT NULL DEFAULT '',
  `Credits` int(11) DEFAULT NULL,
  `acy` year(4) NOT NULL,
  `sem` int(11) NOT NULL DEFAULT '0',
  `S_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`Name`, `Host_Dpt`, `S_Code`, `Credits`, `acy`, `sem`, `S_type`) VALUES
('', '', '', 0, 0000, 0, ''),
('', '', '', 0, 2000, 0, ''),
('Physics', 'BT', '12BT11', 5, 2014, 1, 'core'),
('Chemistry', 'BT', '12BT12', 5, 2014, 2, 'core'),
('Engineering Mechanics', 'BT', '12BT15', 5, 2014, 1, 'core'),
('Programmon in C', 'BT', '12BT16', 4, 2014, 1, 'core'),
('Soft Skills', 'BT', '12BT162', 4, 2014, 2, 'core'),
('Computer aided Drawing', 'BT', '12BT17', 3, 2014, 1, 'core'),
('Civil and Applied Science', 'BT', '12BT18', 4, 2014, 2, 'core'),
('Engineering Materials', 'BT', '12BT19', 3, 2014, 2, 'core'),
('Concepts in Operating System', 'BT', '12BT1B3', 3, 2014, 2, 'core'),
('Envirnomental Svience', 'BT', '12BT1B5', 3, 2014, 2, 'core'),
('Natural Language Processing with Python', 'BT', '12BT1B6', 3, 2014, 2, 'core'),
('System Software', 'BT', '12BT52', 5, 2014, 5, 'core'),
('Microprocessors and Multicore Programming', 'BT', '12BT53', 5, 2014, 5, 'core'),
('Computer Network', 'BT', '12BT54', 5, 2014, 5, 'core'),
('Soft Computing', 'BT', '12BT5A2', 4, 2014, 5, 'local'),
('Compiler Design', 'BT', '12BT5A3', 4, 2014, 5, 'local'),
('File Structure', 'BT', '12BT5A4', 4, 2014, 5, 'local'),
('Management Information System', 'BT', '12BT5A5', 4, 2014, 5, 'local'),
('Computer Graphics', 'BT', '12BT5A6', 4, 2014, 5, 'local'),
('Graph Theory and Application', 'BT', '12BT5B1', 3, 2014, 5, 'local'),
('Advanced Concept in Operating System', 'BT', '12BT5B3', 3, 2014, 5, 'local'),
('Java & J2EE', 'BT', '12BT5B5', 3, 2014, 5, 'local'),
('Natural Language Processing with Python', 'BT', '12BT5B6', 3, 2014, 5, 'local'),
('Software Engineering', 'BT', '12BT62', 4, 2014, 6, 'core'),
('Computer Networks and Security', 'BT', '12BT63', 5, 2014, 6, 'core'),
('Database Management Systems', 'BT', '12BT64', 5, 2014, 6, 'core'),
('Emerging Technologies', 'BT', '12BT65', 2, 2014, 6, 'core'),
('Information Security', 'BT', '12BT6C1', 4, 2014, 6, 'local'),
('Computer System Performance & Analysis', 'BT', '12BT6C2', 4, 2014, 6, 'local'),
('High Performance Computing', 'BT', '12BT6C3', 4, 2014, 6, 'local'),
('Image Processing and Computer Vision', 'BT', '12BT6C4', 4, 2014, 6, 'local'),
('Software Architecture', 'BT', '12BT6C5', 4, 2014, 6, 'local'),
('Information System Management', 'BT', '12BT6D1', 3, 2014, 6, 'local'),
('Network Management', 'BT', '12BT6D2', 3, 2014, 6, 'local'),
('Patern Recognition', 'BT', '12BT6D3', 3, 2014, 6, 'local'),
('Mobile Application Development', 'BT', '12BT6D4', 3, 2014, 6, 'local'),
('Enterprise Information Systems', 'BT', '12BT6D5', 3, 2014, 6, 'local'),
('Software Testing', 'BT', '12BT72', 5, 2014, 7, 'core'),
('Human Computer Interaction', 'BT', '12BT74', 3, 2014, 7, 'core'),
('Information Retriveal', 'BT', '12BT7E1', 4, 2014, 7, 'local'),
('Information Security', 'BT', '12BT7E2', 4, 2014, 7, 'local'),
('Information Storage', 'BT', '12BT7E3', 4, 2014, 7, 'local'),
('Big Data Analysis', 'BT', '12BT7E4', 4, 2014, 7, 'local'),
('Computer System Performance & Analysis', 'BT', '12BT7E5', 4, 2014, 7, 'local'),
('Adhoc Wireless Networks', 'BT', '12BT7E6', 4, 2014, 7, 'local'),
('Fuzzy Graph Theory and Application', 'BT', '12BT7E7', 4, 2014, 7, 'local'),
('Human Computer Interaction', 'BT', '12BT7E8', 4, 2014, 7, 'local'),
('Project Work', 'BT', '12BT81', 18, 2014, 8, 'core'),
('Technical Seminar', 'BT', '12BT82', 1, 2014, 8, 'core'),
('Advanced Algorithm', 'BT', '12BTS5A', 4, 2014, 5, 'local'),
('Information Coding Theory', 'BT', '12BTTB2', 3, 2014, 5, 'local'),
('System Software', 'CSE', '12CS52', 5, 2014, 5, 'core'),
('Microprocessors and Multicore Programming', 'CSE', '12CS53', 5, 2014, 5, 'core'),
('Computer Network', 'CSE', '12CS54', 5, 2014, 5, 'core'),
('Advanced Algorithm', 'CSE', '12CS5A1', 4, 2014, 5, 'local'),
('Soft Computing', 'CSE', '12CS5A2', 4, 2014, 5, 'local'),
('Compiler Design', 'CSE', '12CS5A3', 4, 2014, 5, 'local'),
('File Structure', 'CSE', '12CS5A4', 4, 2014, 5, 'local'),
('Management Information System', 'CSE', '12CS5A5', 4, 2014, 5, 'local'),
('Computer Graphics', 'CSE', '12CS5A6', 4, 2014, 5, 'local'),
('Graph Theory and Application', 'CSE', '12CS5B1', 3, 2014, 5, 'local'),
('Information Coding Theory', 'CSE', '12CS5B2', 3, 2014, 5, 'local'),
('Advanced Concept in Operating System', 'CSE', '12CS5B3', 3, 2014, 5, 'local'),
('Network Programming', 'CSE', '12CS5B4', 3, 2014, 5, 'local'),
('Java & J2EE', 'CSE', '12CS5B5', 3, 2014, 5, 'local'),
('Natural Language Processing with Python', 'CSE', '12CS5B6', 3, 2014, 5, 'local'),
('Software Engineering', 'CSE', '12CS62', 4, 2014, 6, 'core'),
('Computer Networks and Security', 'CSE', '12CS63', 5, 2014, 6, 'core'),
('Database Management Systems', 'CSE', '12CS64', 5, 2014, 6, 'core'),
('Emerging Technologies', 'CSE', '12CS65', 2, 2014, 6, 'core'),
('Information Security', 'CSE', '12CS6C1', 4, 2014, 6, 'local'),
('Computer System Performance & Analysis', 'CSE', '12CS6C2', 4, 2014, 6, 'local'),
('High Performance Computing', 'CSE', '12CS6C3', 4, 2014, 6, 'local'),
('Image Processing and Computer Vision', 'CSE', '12CS6C4', 4, 2014, 6, 'local'),
('Software Architecture', 'CSE', '12CS6C5', 4, 2014, 6, 'local'),
('Information System Management', 'CSE', '12CS6D1', 3, 2014, 6, 'local'),
('Network Management', 'CSE', '12CS6D2', 3, 2014, 6, 'local'),
('Patern Recognition', 'CSE', '12CS6D3', 3, 2014, 6, 'local'),
('Mobile Application Development', 'CSE', '12CS6D4', 3, 2014, 6, 'local'),
('Enterprise Information Systems', 'CSE', '12CS6D5', 3, 2014, 6, 'local'),
('Computer Graphics', 'CSE', '12CS72', 5, 2014, 7, 'core'),
('Minor Project', 'CSE', '12CS74', 3, 2014, 7, 'core'),
('Information Retriveal', 'CSE', '12CS7E1', 4, 2014, 7, 'local'),
('Information Security', 'CSE', '12CS7E2', 4, 2014, 7, 'local'),
('Information Storage', 'CSE', '12CS7E3', 4, 2014, 7, 'local'),
('Big Data Analysis', 'CSE', '12CS7E4', 4, 2014, 7, 'local'),
('Computer System Performance & Analysis', 'CSE', '12CS7E5', 4, 2014, 7, 'local'),
('Adhoc Wireless Networks', 'CSE', '12CS7E6', 4, 2014, 7, 'local'),
('Fuzzy Graph Theory and Application', 'CSE', '12CS7E7', 4, 2014, 7, 'local'),
('Human Computer Interaction', 'CSE', '12CS7E8', 4, 2014, 7, 'local'),
('Major Project', 'CSE', '12CS81', 18, 2014, 8, 'core'),
('Technical Seminar', 'CSE', '12CS82', 1, 2014, 8, 'core'),
('Physics', 'CSE', '12CSE11', 5, 2014, 1, 'core'),
('Chemistry', 'CSE', '12CSE12', 5, 2014, 2, 'core'),
('Engineering Mechanics', 'CSE', '12CSE15', 5, 2014, 1, 'core'),
('Programmon in C', 'CSE', '12CSE16', 4, 2014, 1, 'core'),
('Computer aided Drawing', 'CSE', '12CSE17', 3, 2014, 1, 'core'),
('Civil and Applied Science', 'CSE', '12CSE18', 4, 2014, 2, 'core'),
('Engineering Materials', 'CSE', '12CSE19', 3, 2014, 2, 'core'),
('Concepts in Operating System', 'CSE', '12CSE1B', 3, 2014, 2, 'core'),
('Environmental Science and Biology for Engineers', 'Sc', '12EB42', 4, 2014, 4, 'core'),
('Information Retriveal', 'ECE', '12ECE7E', 4, 2014, 7, 'local'),
('Physics', 'EEE', '12EEE11', 5, 2014, 1, 'core'),
('Chemistry', 'EEE', '12EEE12', 5, 2014, 2, 'core'),
('Engineering Mechanics', 'EEE', '12EEE15', 5, 2014, 1, 'core'),
('Programmon in C', 'EEE', '12EEE16', 4, 2014, 1, 'core'),
('Computer aided Drawing', 'EEE', '12EEE17', 3, 2014, 1, 'core'),
('Civil and Applied Science', 'EEE', '12EEE18', 4, 2014, 2, 'core'),
('Engineering Materials', 'EEE', '12EEE19', 3, 2014, 2, 'core'),
('Concepts in Operating System', 'EEE', '12EEE1B', 3, 2014, 2, 'core'),
('System Software', 'EEE', '12EEE52', 5, 2014, 5, 'core'),
('Microprocessors and Multicore Programming', 'EEE', '12EEE53', 5, 2014, 5, 'core'),
('Computer Network', 'EEE', '12EEE54', 5, 2014, 5, 'core'),
('Soft Computing', 'EEE', '12EEE5A', 4, 2014, 5, 'local'),
('Information Retriveal', 'EEE', '12EEE7E', 4, 2014, 7, 'local'),
('Advanced Algorithm', 'EEE', '12EEES5', 4, 2014, 5, 'local'),
('Engineering Materials', 'ME', '12EM32', 3, 2014, 3, 'core'),
('System Software', 'EC', '12ES52', 5, 2014, 5, 'core'),
('Microprocessors and Multicore Programming', 'EC', '12ES53', 5, 2014, 5, 'core'),
('Computer Network', 'EC', '12ES54', 5, 2014, 5, 'core'),
('Advanced Algorithm', 'EC', '12ES5A1', 4, 2014, 5, 'local'),
('Soft Computing', 'EC', '12ES5A2', 4, 2014, 5, 'local'),
('Compiler Design', 'EC', '12ES5A3', 4, 2014, 5, 'local'),
('File Structure', 'EC', '12ES5A4', 4, 2014, 5, 'local'),
('Management Information System', 'EC', '12ES5A5', 4, 2014, 5, 'local'),
('Computer Graphics', 'EC', '12ES5A6', 4, 2014, 5, 'local'),
('Graph Theory and Application', 'EC', '12ES5B1', 3, 2014, 5, 'local'),
('Information Coding Theory', 'EC', '12ES5B2', 3, 2014, 5, 'local'),
('Advanced Concept in Operating System', 'EC', '12ES5B3', 3, 2014, 5, 'local'),
('Java & J2EE', 'EC', '12ES5B5', 3, 2014, 5, 'local'),
('Natural Language Processing with Python', 'EC', '12ES5B6', 3, 2014, 5, 'local'),
('Software Engineering', 'EC', '12ES62', 4, 2014, 6, 'core'),
('Computer Networks and Security', 'EC', '12ES63', 5, 2014, 6, 'core'),
('Database Management Systems', 'EC', '12ES64', 5, 2014, 6, 'core'),
('Emerging Technologies', 'EC', '12ES65', 2, 2014, 6, 'core'),
('Information Security', 'EC', '12ES6C1', 4, 2014, 6, 'local'),
('Computer System Performance & Analysis', 'EC', '12ES6C2', 4, 2014, 6, 'local'),
('High Performance Computing', 'EC', '12ES6C3', 4, 2014, 6, 'local'),
('Image Processing and Computer Vision', 'EC', '12ES6C4', 4, 2014, 6, 'local'),
('Software Architecture', 'EC', '12ES6C5', 4, 2014, 6, 'local'),
('Information System Management', 'EC', '12ES6D1', 3, 2014, 6, 'local'),
('Network Management', 'EC', '12ES6D2', 3, 2014, 6, 'local'),
('Patern Recognition', 'EC', '12ES6D3', 3, 2014, 6, 'local'),
('Mobile Application Development', 'EC', '12ES6D4', 3, 2014, 6, 'local'),
('Enterprise Information Systems', 'EC', '12ES6D5', 3, 2014, 6, 'local'),
('Software Testing', 'EC', '12ES72', 5, 2014, 7, 'core'),
('Human Computer Interaction', 'EC', '12ES74', 3, 2014, 7, 'core'),
('Project Work', 'EC', '12ES81', 18, 2014, 8, 'core'),
('Technical Seminar', 'EC', '12ES82', 1, 2014, 8, 'core'),
('Advanced Algorithm', 'TC', '12ETS5A', 4, 2014, 5, 'local'),
('Green Technology', 'CH', '12GF02', 4, 2014, 7, 'global'),
('Mobile Application Development', 'CS', '12GF03', 4, 2014, 7, 'global'),
('Disaster Management', 'CV', '12GF04', 4, 2014, 7, 'global'),
('Artificial Neural Network', 'EC', '12GF05', 4, 2014, 7, 'global'),
('Renewable Energy System', 'EE', '12GF06', 4, 2014, 7, 'global'),
('Optimization Technigues', 'IM', '12GF07', 4, 2014, 7, 'global'),
('Java & J2EE', 'IM', '12GF08', 4, 2014, 7, 'global'),
('Nano material', 'BT', '12GF701', 4, 2014, 7, 'global'),
('Bioinfomatics', 'BT', '12GG01', 4, 2014, 7, 'global'),
('Industrial Safety', 'CH', '12GG02', 4, 2014, 7, 'global'),
('Intelligent System', 'CS', '12GG03', 4, 2014, 7, 'global'),
('Solid waste Management', 'CV', '12GG04', 4, 2014, 7, 'global'),
('Sutomotive Electronics', 'EC', '12GG05', 4, 2014, 7, 'global'),
('industrial electronics', 'EE', '12GG06', 4, 2014, 7, 'global'),
('Cloud Computing', 'IM', '12GG07', 4, 2014, 7, 'global'),
('MEMS', 'IM', '12GG08', 4, 2014, 7, 'global'),
('Space technology', 'TE', '12GG09', 4, 2014, 7, 'global'),
('Legal Studies & Professional Ethics for Engineers', 'HSS', '12HSC73', 2, 2014, 7, 'core'),
('Intellectual Property and Entrepreneurship', 'HSS', '12HSI51', 3, 2014, 5, 'core'),
('Management and Organizational Behavior', 'HSS', '12HSM61', 3, 2014, 6, 'core'),
('Innovation and Social Skills', 'HSS', '12HSS', 1, 2014, 4, 'core'),
('Innovation and Soft Skills', 'HSS', '12HSS83', 1, 2014, 8, 'core'),
('Physics', 'IS', '12IS11', 5, 2014, 1, 'core'),
('Chemistry', 'IS', '12IS12', 5, 2014, 2, 'core'),
('Engineering Mechanics', 'IS', '12IS15', 5, 2014, 1, 'core'),
('Programmon in C', 'IS', '12IS16', 4, 2014, 1, 'core'),
('Soft Skills', 'IS', '12IS162', 4, 2014, 2, 'core'),
('Computer aided Drawing', 'IS', '12IS17', 3, 2014, 1, 'core'),
('Civil and Applied Science', 'IS', '12IS18', 4, 2014, 2, 'core'),
('Engineering Materials', 'IS', '12IS19', 3, 2014, 2, 'core'),
('Concepts in Operating System', 'IS', '12IS1B3', 3, 2014, 2, 'core'),
('Envirnomental Svience', 'IS', '12IS1B5', 3, 2014, 2, 'core'),
('Natural Language Processing with Python', 'IS', '12IS1B6', 3, 2014, 2, 'core'),
('Data Structure in C', 'ISE', '12IS33', 5, 2014, 3, 'core'),
('Digital Logic Design', 'ISE', '12IS34', 5, 2014, 3, 'core'),
('Object Oriented Programming', 'ISE', '12IS35', 5, 2014, 3, 'core'),
('Discrete Mathematical Structures', 'CSE', '12IS36', 5, 2014, 3, 'core'),
('Theroy of Computation', 'ISE', '12iS43', 4, 2014, 4, 'core'),
('Computer Organization and Architecture', 'ISE', '12IS44', 5, 2014, 4, 'core'),
('Design and Analysis of Algorithms', 'CSE', '12IS45', 5, 2014, 4, 'core'),
('Operating System', 'ISE', '12IS46', 3, 2014, 4, 'core'),
('Unix System Programming', 'ISE', '12IS49', 5, 2014, 4, 'core'),
('System Software', 'ISE', '12IS52', 5, 2014, 5, 'core'),
('Microprocessors and Multicore Programming', 'ISE', '12IS53', 5, 2014, 5, 'core'),
('Computer Network', 'ISE', '12IS54', 5, 2014, 5, 'core'),
('Advanced Algorithm', 'ISE', '12IS5A1', 4, 2014, 5, 'local'),
('Soft Computing', 'ISE', '12IS5A2', 4, 2014, 5, 'local'),
('Compiler Design', 'ISE', '12IS5A3', 4, 2014, 5, 'local'),
('File Structure', 'ISE', '12IS5A4', 4, 2014, 5, 'local'),
('Management Information System', 'ISE', '12IS5A5', 4, 2014, 5, 'local'),
('Computer Graphics', 'ISE', '12IS5A6', 4, 2014, 5, 'local'),
('Graph Theory and Application', 'Sc', '12IS5B1', 3, 2014, 5, 'local'),
('Information Coding Theory', 'ISe', '12IS5B2', 3, 2014, 5, 'local'),
('Advanced Concept in Operating System', 'ISE', '12IS5B3', 3, 2014, 5, 'local'),
('Network Programming', 'ISE', '12IS5B4', 3, 2014, 5, 'local'),
('Java & J2EE', 'ISE', '12IS5B5', 3, 2014, 5, 'local'),
('Natural Language Processing with Python', 'ISE', '12IS5B6', 3, 2014, 5, 'local'),
('Software Engineering', 'ISE', '12IS62', 4, 2014, 6, 'core'),
('Computer Networks and Security', 'ISE', '12IS63', 5, 2014, 6, 'core'),
('Database Management Systems', 'ISE', '12IS64', 5, 2014, 6, 'core'),
('Emerging Technologies', 'ISE', '12IS65', 2, 2014, 6, 'core'),
('Information Security', 'ISE', '12IS6C1', 4, 2014, 6, 'local'),
('Computer System Performance & Analysis', 'ISE', '12IS6C2', 4, 2014, 6, 'local'),
('High Performance Computing', 'ISE', '12IS6C3', 4, 2014, 6, 'local'),
('Image Processing and Computer Vision', 'ISE', '12IS6C4', 4, 2014, 6, 'local'),
('Software Architecture', 'ISE', '12IS6C5', 4, 2014, 6, 'local'),
('Information System Management', 'ISE', '12IS6D1', 3, 2014, 6, 'local'),
('Network Management', 'ISE', '12IS6D2', 3, 2014, 6, 'local'),
('Patern Recognition', 'ISE', '12IS6D3', 3, 2014, 6, 'local'),
('Mobile Application Development', 'ISE', '12IS6D4', 3, 2014, 6, 'local'),
('Enterprise Information Systems', 'ISE', '12IS6D5', 3, 2014, 6, 'local'),
('Software Testing', 'ISE', '12IS72', 5, 2014, 7, 'core'),
('Human Computer Interaction', 'ISE', '12IS74', 3, 2014, 7, 'core'),
('Information Retriveal', 'ISE', '12IS7E1', 4, 2014, 7, 'local'),
('Information Security', 'ISE', '12IS7E2', 4, 2014, 7, 'local'),
('Information Storage', 'ISE', '12IS7E3', 4, 2014, 7, 'local'),
('Big Data Analysis', 'ISE', '12IS7E4', 4, 2014, 7, 'local'),
('Computer System Performance & Analysis', 'ISE', '12IS7E5', 4, 2014, 7, 'local'),
('Adhoc Wireless Networks', 'ISE', '12IS7E6', 4, 2014, 7, 'local'),
('Fuzzy Graph Theory and Application', 'ISE', '12IS7E7', 4, 2014, 7, 'local'),
('Human Computer Interaction', 'ISE', '12IS7E8', 4, 2014, 7, 'local'),
('Project Work', 'ISE', '12IS81', 18, 2014, 8, 'core'),
('Technical Seminar', 'ISE', '12IS82', 1, 2014, 8, 'core'),
('Physics', 'IT', '12IT11', 5, 2014, 1, 'core'),
('Chemistry', 'IT', '12IT12', 5, 2014, 2, 'core'),
('Engineering Mechanics', 'IT', '12IT15', 5, 2014, 1, 'core'),
('Programmon in C', 'IT', '12IT16', 4, 2014, 1, 'core'),
('Soft Skills', 'IT', '12IT162', 4, 2014, 2, 'core'),
('Computer aided Drawing', 'IT', '12IT17', 3, 2014, 1, 'core'),
('Civil and Applied Science', 'IT', '12IT18', 4, 2014, 2, 'core'),
('Engineering Materials', 'IT', '12IT19', 3, 2014, 2, 'core'),
('Concepts in Operating System', 'IT', '12IT1B3', 3, 2014, 2, 'core'),
('Envirnomental Svience', 'IT', '12IT1B5', 3, 2014, 2, 'core'),
('Natural Language Processing with Python', 'IT', '12IT1B6', 3, 2014, 2, 'core'),
('System Software', 'IT', '12IT52', 5, 2014, 5, 'core'),
('Microprocessors and Multicore Programming', 'IT', '12IT53', 5, 2014, 5, 'core'),
('Computer Network', 'IT', '12IT54', 5, 2014, 5, 'core'),
('Soft Computing', 'IT', '12IT5A2', 4, 2014, 5, 'local'),
('Compiler Design', 'IT', '12IT5A3', 4, 2014, 5, 'local'),
('File Structure', 'IT', '12IT5A4', 4, 2014, 5, 'local'),
('Management Information System', 'IT', '12IT5A5', 4, 2014, 5, 'local'),
('Computer Graphics', 'IT', '12IT5A6', 4, 2014, 5, 'local'),
('Graph Theory and Application', 'IT', '12IT5B1', 3, 2014, 5, 'local'),
('Advanced Concept in Operating System', 'IT', '12IT5B3', 3, 2014, 5, 'local'),
('Java & J2EE', 'IT', '12IT5B5', 3, 2014, 5, 'local'),
('Natural Language Processing with Python', 'IT', '12IT5B6', 3, 2014, 5, 'local'),
('Software Engineering', 'IT', '12IT62', 4, 2014, 6, 'core'),
('Computer Networks and Security', 'IT', '12IT63', 5, 2014, 6, 'core'),
('Database Management Systems', 'IT', '12IT64', 5, 2014, 6, 'core'),
('Emerging Technologies', 'IT', '12IT65', 2, 2014, 6, 'core'),
('Information Security', 'IT', '12IT6C1', 4, 2014, 6, 'local'),
('Computer System Performance & Analysis', 'IT', '12IT6C2', 4, 2014, 6, 'local'),
('High Performance Computing', 'IT', '12IT6C3', 4, 2014, 6, 'local'),
('Image Processing and Computer Vision', 'IT', '12IT6C4', 4, 2014, 6, 'local'),
('Software Architecture', 'IT', '12IT6C5', 4, 2014, 6, 'local'),
('Information System Management', 'IT', '12IT6D1', 3, 2014, 6, 'local'),
('Network Management', 'IT', '12IT6D2', 3, 2014, 6, 'local'),
('Patern Recognition', 'IT', '12IT6D3', 3, 2014, 6, 'local'),
('Mobile Application Development', 'IT', '12IT6D4', 3, 2014, 6, 'local'),
('Enterprise Information Systems', 'IT', '12IT6D5', 3, 2014, 6, 'local'),
('Software Testing', 'IT', '12IT72', 5, 2014, 7, 'core'),
('Human Computer Interaction', 'IT', '12IT74', 3, 2014, 7, 'core'),
('Information Retriveal', 'IT', '12IT7E1', 4, 2014, 7, 'local'),
('Information Security', 'IT', '12IT7E2', 4, 2014, 7, 'local'),
('Information Storage', 'IT', '12IT7E3', 4, 2014, 7, 'local'),
('Big Data Analysis', 'IT', '12IT7E4', 4, 2014, 7, 'local'),
('Computer System Performance & Analysis', 'IT', '12IT7E5', 4, 2014, 7, 'local'),
('Adhoc Wireless Networks', 'IT', '12IT7E6', 4, 2014, 7, 'local'),
('Fuzzy Graph Theory and Application', 'IT', '12IT7E7', 4, 2014, 7, 'local'),
('Human Computer Interaction', 'IT', '12IT7E8', 4, 2014, 7, 'local'),
('Project Work', 'IT', '12IT81', 18, 2014, 8, 'core'),
('Technical Seminar', 'IT', '12IT82', 1, 2014, 8, 'core'),
('Advanced Algorithm', 'IT', '12ITS5A', 4, 2014, 5, 'local'),
('Information Coding Theory', 'IT', '12ITTB2', 3, 2014, 5, 'local'),
('Applied Mathematics-III', 'Sc', '12MA31', 4, 2014, 3, 'core'),
('Applied Mathematics IV', 'Sc', '12MA41', 4, 2014, 4, 'core'),
('Applied Maths 1', 'BT', '12MBT13', 5, 2014, 1, 'core'),
('Applied Maths 2', 'BT', '12MBT14', 5, 2014, 2, 'core'),
('Applied Maths 1', 'CSE', '12MCSE1', 5, 2014, 1, 'core'),
('Applied Maths 2', 'CSE', '12MCSE1', 5, 2014, 2, 'core'),
('System Software', 'ME', '12ME52', 5, 2014, 5, 'core'),
('Microprocessors and Multicore Programming', 'ME', '12ME53', 5, 2014, 5, 'core'),
('Computer Network', 'ME', '12ME54', 5, 2014, 5, 'core'),
('Soft Computing', 'ME', '12ME5A2', 4, 2014, 5, 'local'),
('Compiler Design', 'ME', '12ME5A3', 4, 2014, 5, 'local'),
('File Structure', 'ME', '12ME5A4', 4, 2014, 5, 'local'),
('Management Information System', 'ME', '12ME5A5', 4, 2014, 5, 'local'),
('Computer Graphics', 'ME', '12ME5A6', 4, 2014, 5, 'local'),
('Graph Theory and Application', 'ME', '12ME5B1', 3, 2014, 5, 'local'),
('Advanced Concept in Operating System', 'ME', '12ME5B3', 3, 2014, 5, 'local'),
('Java & J2EE', 'ME', '12ME5B5', 3, 2014, 5, 'local'),
('Natural Language Processing with Python', 'ME', '12ME5B6', 3, 2014, 5, 'local'),
('Software Engineering', 'ME', '12ME62', 4, 2014, 6, 'core'),
('Computer Networks and Security', 'ME', '12ME63', 5, 2014, 6, 'core'),
('Database Management Systems', 'ME', '12ME64', 5, 2014, 6, 'core'),
('Emerging Technologies', 'ME', '12ME65', 2, 2014, 6, 'core'),
('Information Security', 'ME', '12ME6C1', 4, 2014, 6, 'local'),
('Computer System Performance & Analysis', 'ME', '12ME6C2', 4, 2014, 6, 'local'),
('High Performance Computing', 'ME', '12ME6C3', 4, 2014, 6, 'local'),
('Image Processing and Computer Vision', 'ME', '12ME6C4', 4, 2014, 6, 'local'),
('Software Architecture', 'ME', '12ME6C5', 4, 2014, 6, 'local'),
('Information System Management', 'ME', '12ME6D1', 3, 2014, 6, 'local'),
('Network Management', 'ME', '12ME6D2', 3, 2014, 6, 'local'),
('Patern Recognition', 'ME', '12ME6D3', 3, 2014, 6, 'local'),
('Mobile Application Development', 'ME', '12ME6D4', 3, 2014, 6, 'local'),
('Enterprise Information Systems', 'ME', '12ME6D5', 3, 2014, 6, 'local'),
('Software Testing', 'ME', '12ME72', 5, 2014, 7, 'core'),
('Human Computer Interaction', 'ME', '12ME74', 3, 2014, 7, 'core'),
('Project Work', 'ME', '12ME81', 18, 2014, 8, 'core'),
('Technical Seminar', 'ME', '12ME82', 1, 2014, 8, 'core'),
('Applied Maths 1', 'EEE', '12MEEE1', 5, 2014, 1, 'core'),
('Applied Maths 2', 'EEE', '12MEEE1', 5, 2014, 2, 'core'),
('Advanced Algorithm', 'ME', '12MES5A', 4, 2014, 5, 'local'),
('Information Coding Theory', 'ME', '12METB2', 3, 2014, 5, 'local'),
('Applied Maths 1', 'IS', '12MiS13', 5, 2014, 1, 'core'),
('Applied Maths 2', 'IS', '12Mis14', 5, 2014, 2, 'core'),
('Applied Maths 1', 'IT', '12MIT13', 5, 2014, 1, 'core'),
('Applied Maths 2', 'IT', '12MIT14', 5, 2014, 2, 'core'),
('Applied Maths 1', 'TC', '12MTC13', 5, 2014, 1, 'core'),
('Applied Maths 2', 'TC', '12MTC14', 5, 2014, 2, 'core'),
('Physics', 'TC', '12TC11', 5, 2014, 1, 'core'),
('Chemistry', 'TC', '12TC12', 5, 2014, 2, 'core'),
('Engineering Mechanics', 'TC', '12TC15', 5, 2014, 1, 'core'),
('Programmon in C', 'TC', '12TC16', 4, 2014, 1, 'core'),
('Soft Skills', 'TC', '12TC162', 4, 2014, 2, 'core'),
('Computer aided Drawing', 'TC', '12TC17', 3, 2014, 1, 'core'),
('Civil and Applied Science', 'TC', '12TC18', 4, 2014, 2, 'core'),
('Engineering Materials', 'TC', '12TC19', 3, 2014, 2, 'core'),
('Concepts in Operating System', 'TC', '12TC1B3', 3, 2014, 2, 'core'),
('Natural Language Processing with Python', 'TC', '12TC1B6', 3, 2014, 2, 'core'),
('System Software', 'TC', '12TS52', 5, 2014, 5, 'core'),
('Microprocessors and Multicore Programming', 'TC', '12TS53', 5, 2014, 5, 'core'),
('Computer Network', 'TC', '12TS54', 5, 2014, 5, 'core'),
('Soft Computing', 'TC', '12TS5A2', 4, 2014, 5, 'local'),
('Compiler Design', 'TC', '12TS5A3', 4, 2014, 5, 'local'),
('File Structure', 'TC', '12TS5A4', 4, 2014, 5, 'local'),
('Management Information System', 'TC', '12TS5A5', 4, 2014, 5, 'local'),
('Computer Graphics', 'TC', '12TS5A6', 4, 2014, 5, 'local'),
('Graph Theory and Application', 'TC', '12TS5B1', 3, 2014, 5, 'local'),
('Advanced Concept in Operating System', 'TC', '12TS5B3', 3, 2014, 5, 'local'),
('Java & J2EE', 'TC', '12TS5B5', 3, 2014, 5, 'local'),
('Natural Language Processing with Python', 'TC', '12TS5B6', 3, 2014, 5, 'local'),
('Software Engineering', 'TC', '12TS62', 4, 2014, 6, 'core'),
('Computer Networks and Security', 'TC', '12TS63', 5, 2014, 6, 'core'),
('Database Management Systems', 'TC', '12TS64', 5, 2014, 6, 'core'),
('Emerging Technologies', 'TC', '12TS65', 2, 2014, 6, 'core'),
('Information Security', 'TC', '12TS6C1', 4, 2014, 6, 'local'),
('Computer System Performance & Analysis', 'TC', '12TS6C2', 4, 2014, 6, 'local'),
('High Performance Computing', 'TC', '12TS6C3', 4, 2014, 6, 'local'),
('Image Processing and Computer Vision', 'TC', '12TS6C4', 4, 2014, 6, 'local'),
('Software Architecture', 'TC', '12TS6C5', 4, 2014, 6, 'local'),
('Information System Management', 'TC', '12TS6D1', 3, 2014, 6, 'local'),
('Network Management', 'TC', '12TS6D2', 3, 2014, 6, 'local'),
('Patern Recognition', 'TC', '12TS6D3', 3, 2014, 6, 'local'),
('Mobile Application Development', 'TC', '12TS6D4', 3, 2014, 6, 'local'),
('Enterprise Information Systems', 'TC', '12TS6D5', 3, 2014, 6, 'local'),
('Software Testing', 'TC', '12TS72', 5, 2014, 7, 'core'),
('Human Computer Interaction', 'TC', '12TS74', 3, 2014, 7, 'core'),
('Project Work', 'TC', '12TS81', 18, 2014, 8, 'core'),
('Technical Seminar', 'TC', '12TS82', 1, 2014, 8, 'core'),
('Information Coding Theory', 'TC', '12TSTB2', 3, 2014, 5, 'local'),
('Network Programming', 'BT', '1BT5B4', 3, 2014, 5, 'local'),
('Network Programming', 'EC', '1EES5B4', 3, 2014, 5, 'local'),
('Network Programming', 'IT', '1IT5B4', 3, 2014, 5, 'local'),
('Network Programming', 'ME', '1MET5B4', 3, 2014, 5, 'local'),
('Network Programming', 'TC', '1TES5B4', 3, 2014, 5, 'local');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
 ADD PRIMARY KEY (`USN`,`pincode`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `approve_1`
--
ALTER TABLE `approve_1`
 ADD PRIMARY KEY (`USN`,`Sem`);

--
-- Indexes for table `attends`
--
ALTER TABLE `attends`
 ADD PRIMARY KEY (`susn`,`cdte`,`ctme`);

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
 ADD PRIMARY KEY (`USN`,`nsno`), ADD KEY `nsno` (`nsno`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`ccode`,`dte`,`tme`,`acy`,`sem`);

--
-- Indexes for table `handles`
--
ALTER TABLE `handles`
 ADD PRIMARY KEY (`lid`,`ccode`,`acy`,`sem`,`section`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
 ADD PRIMARY KEY (`lab`,`t1`,`q1`,`t2`,`q2`,`t3`,`q3`,`assign`,`ccode`,`susn`,`acy`,`sem`), ADD KEY `marks_ibfk_1` (`susn`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
 ADD PRIMARY KEY (`serialno`,`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
 ADD PRIMARY KEY (`stateno`);

--
-- Indexes for table `studcourse`
--
ALTER TABLE `studcourse`
 ADD PRIMARY KEY (`USN`,`ccode`,`acy`,`sem`,`section`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`USN`,`timeor`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
 ADD PRIMARY KEY (`S_Code`,`acy`,`sem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
MODIFY `serialno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`) ON DELETE CASCADE;

--
-- Constraints for table `attends`
--
ALTER TABLE `attends`
ADD CONSTRAINT `attends_ibfk_1` FOREIGN KEY (`susn`) REFERENCES `student` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `handles`
--
ALTER TABLE `handles`
ADD CONSTRAINT `handles_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `staff` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`susn`) REFERENCES `student` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
ADD CONSTRAINT `notices_ibfk_1` FOREIGN KEY (`id`) REFERENCES `staff` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studcourse`
--
ALTER TABLE `studcourse`
ADD CONSTRAINT `studcourse_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
