-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 08:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dfgv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `borrowerID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) DEFAULT NULL,
  `lName` varchar(50) NOT NULL,
  `bDay` date NOT NULL,
  `civilStatus` varchar(25) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `presentAddr` varchar(100) NOT NULL,
  `homeAddr` varchar(100) NOT NULL,
  `ownHouse` varchar(5) NOT NULL,
  `renting` varchar(5) NOT NULL,
  `lengthOfStay` varchar(30) NOT NULL,
  `noOfChildren` int(11) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `validID` varchar(50) NOT NULL,
  `loanCount` int(11) DEFAULT NULL,
  `empID` int(11) NOT NULL,
  `comakerID` int(11) NOT NULL,
  `borrower_deleted` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`borrowerID`, `fName`, `mName`, `lName`, `bDay`, `civilStatus`, `gender`, `presentAddr`, `homeAddr`, `ownHouse`, `renting`, `lengthOfStay`, `noOfChildren`, `occupation`, `contactNo`, `validID`, `loanCount`, `empID`, `comakerID`, `borrower_deleted`) VALUES
(1, 'Firstname', '', 'Labajo', '2019-05-10', 'married', 'female', 'present', 'home', 'yes', 'no', '23', 23, '23', '23', '23', 0, 1, 0, 1),
(4, 'Joe June', 'Montemor', 'Labajo', '2019-05-15', 'single', 'male', 'Tisa', 'Labangon', 'no', 'no', '20', 0, 'Programmer', '09225235236', 'Alumni', 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrower_employee_relationship`
--

CREATE TABLE `borrower_employee_relationship` (
  `borrowerID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `relationship` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrower_expense`
--

CREATE TABLE `borrower_expense` (
  `borrowerID` int(11) NOT NULL,
  `food` decimal(6,2) NOT NULL,
  `bills` decimal(6,2) NOT NULL,
  `education` decimal(8,2) NOT NULL,
  `rental` decimal(8,2) NOT NULL,
  `repairMaintenance` decimal(6,2) NOT NULL,
  `misc` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower_expense`
--

INSERT INTO `borrower_expense` (`borrowerID`, `food`, `bills`, `education`, `rental`, `repairMaintenance`, `misc`) VALUES
(1, '10.00', '10.00', '10.00', '10.00', '10.00', '10.00'),
(2, '2000.00', '2000.00', '2000.00', '2000.00', '2000.00', '2000.00');

-- --------------------------------------------------------

--
-- Table structure for table `borrower_income`
--

CREATE TABLE `borrower_income` (
  `borrowerID` int(11) NOT NULL,
  `incomeOrSalary` decimal(10,2) NOT NULL,
  `otherIncome` decimal(8,2) NOT NULL,
  `otherIncomeDetails` varchar(100) DEFAULT NULL,
  `netIncome` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower_income`
--

INSERT INTO `borrower_income` (`borrowerID`, `incomeOrSalary`, `otherIncome`, `otherIncomeDetails`, `netIncome`) VALUES
(1, '6000.00', '6000.00', 'details', '11940.00'),
(2, '14000.00', '16000.00', 'Other Income Details', '18000.00');

-- --------------------------------------------------------

--
-- Table structure for table `collection_info`
--

CREATE TABLE `collection_info` (
  `collection_id` int(11) NOT NULL,
  `collector_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `application_no` int(11) NOT NULL,
  `collection_amount` double NOT NULL,
  `arrear` varchar(50) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `collection_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection_info`
--

INSERT INTO `collection_info` (`collection_id`, `collector_id`, `borrower_id`, `application_no`, `collection_amount`, `arrear`, `comment`, `collection_date`) VALUES
(1, 6, 4, 5, 500, '100', '', '2019-05-01'),
(2, 6, 4, 5, 600, '(200)', '', '2019-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `collector_assignment`
--

CREATE TABLE `collector_assignment` (
  `empID` int(11) NOT NULL,
  `borrowerID` int(11) DEFAULT NULL,
  `applicationNo` int(11) DEFAULT NULL,
  `dateAssigned` date DEFAULT NULL,
  `dateReAssigned` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comaker`
--

CREATE TABLE `comaker` (
  `comakerID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `midName` varchar(50) DEFAULT NULL,
  `lName` varchar(50) NOT NULL,
  `bDay` date NOT NULL,
  `civilStatus` varchar(25) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `presentAddr` varchar(50) NOT NULL,
  `homeAddr` varchar(100) NOT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `salaryOrIncome` decimal(10,2) DEFAULT NULL,
  `employerID` int(11) NOT NULL,
  `comaker_deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comaker`
--

INSERT INTO `comaker` (`comakerID`, `fName`, `midName`, `lName`, `bDay`, `civilStatus`, `contactNo`, `presentAddr`, `homeAddr`, `occupation`, `salaryOrIncome`, `employerID`, `comaker_deleted`) VALUES
(0, 'Ed Michael', 'Lastimoso', 'Salaysay', '1994-02-05', 'single', '011', 'cebu', 'cebu', 'developer', '23000.00', 1, 0),
(1, 'Gina', 'Taan', 'Sabaw', '2019-04-03', 'Complicated', '+999 555 666 44', 'Labangon', 'Punta', 'Teacher', '50000.00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) DEFAULT NULL,
  `lName` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `home_phone` varchar(20) NOT NULL,
  `personal_phone` varchar(15) DEFAULT NULL,
  `userID` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `employee_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `fName`, `mName`, `lName`, `gender`, `position`, `address`, `email`, `birthdate`, `marital_status`, `home_phone`, `personal_phone`, `userID`, `created`, `employee_deleted`) VALUES
(1, 'John', 'Dave', 'Omandam', 'male', 'admin', 'Lipata', 'itsmedaveomandam@gmail.com', '2019-04-01', 'Single', '0909462782', '09094627892', '123', '2019-04-06 15:47:08', 0),
(2, 'Joenel', 'June', 'Labajo', 'male', 'admin', 'Tisa', 'itsmejoejune@gmail.com', '2019-04-08', 'Single', '09094627892', '09094627892', '456', '2019-04-06 17:59:18', 1),
(6, 'Mark', 'Jeff', 'Aninon', 'male', 'collector', 'Tungkop', 'mymarkjeff@gmail.com', '2019-05-12', 'Single', '09094627892', '09094627892', '', '2019-05-05 04:10:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `employerID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contactNo` varchar(15) DEFAULT NULL,
  `employer_deleted` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employerID`, `name`, `address`, `contactNo`, `employer_deleted`) VALUES
(1, 'New Alchemy', 'Crown', '+11 22 33 44 ', 0),
(2, 'JJ Labajo', 'Tisa, Cebu City', '123123123123', 0),
(3, 'JJ Labajo', 'Tisa, Cebu City', '123123123123', 0),
(4, 'asd', 'asd', 'asd', 0),
(5, 'asd', 'asda', 'sdasdasdasdasd', 0),
(6, 'asd', 'asd', 'asd', 0),
(7, '123123', '12312', '21312312', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `applicationNo` int(8) UNSIGNED ZEROFILL NOT NULL,
  `tradeReference` varchar(100) DEFAULT NULL,
  `loanAmount` decimal(8,2) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `paymentMod` varchar(20) NOT NULL,
  `term` varchar(30) NOT NULL,
  `lastLoan` decimal(8,2) NOT NULL,
  `finesPaid` decimal(8,2) NOT NULL,
  `percentage` decimal(4,0) NOT NULL,
  `totalPayable` double NOT NULL,
  `monthsPrepaid` int(11) NOT NULL,
  `submitted` datetime DEFAULT NULL,
  `processed` datetime DEFAULT NULL,
  `loanStatus` varchar(15) NOT NULL COMMENT '1=processing; 2=approved; 3= rejected; 4=completed',
  `borrowerID` int(11) DEFAULT NULL,
  `empID` int(11) DEFAULT NULL,
  `loan_type` int(11) NOT NULL COMMENT '1 = arawan; 2= weekly'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`applicationNo`, `tradeReference`, `loanAmount`, `purpose`, `paymentMod`, `term`, `lastLoan`, `finesPaid`, `percentage`, `totalPayable`, `monthsPrepaid`, `submitted`, `processed`, `loanStatus`, `borrowerID`, `empID`, `loan_type`) VALUES
(00000001, NULL, '2000.00', '', '', '', '100.00', '100.00', '1', 0, 1, NULL, NULL, 'IGP', 1, 6, 0),
(00000002, NULL, '2000.00', '', '', '', '100.00', '100.00', '1', 0, 1, NULL, NULL, 'Expired', 2, 6, 0),
(00000004, NULL, '100000.00', 'secret', '', '', '0.00', '0.00', '5', 0, 0, '0000-00-00 00:00:00', NULL, '1', 3, 0, 1),
(00000005, NULL, '15000.00', 'sample', '', '', '0.00', '0.00', '5', 0, 0, '0000-00-00 00:00:00', NULL, '1', 4, 0, 1),
(00000006, NULL, '500.00', 'asdfasfd', '', '', '0.00', '0.00', '5', 525, 0, '2019-05-05 00:00:00', NULL, '1', 1, 123, 2),
(00000007, NULL, '300000.00', 'secret', '', '', '0.00', '0.00', '10', 330000, 0, '2019-05-05 00:00:00', NULL, '1', 2, 123, 1),
(00000008, NULL, '700000.00', 'Hospital Bills', '', '', '0.00', '0.00', '5', 735000, 0, '2019-05-05 00:00:00', NULL, '1', 4, 123, 2),
(00000009, NULL, '780000.00', 'Personal', '', '', '0.00', '0.00', '5', 819000, 0, '2019-05-05 00:00:00', NULL, '1', 2, 123, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loan_evaluation`
--

CREATE TABLE `loan_evaluation` (
  `applicationNo` int(11) NOT NULL,
  `charEval` varchar(30) DEFAULT NULL,
  `capacity` varchar(30) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  `collateral` varchar(30) DEFAULT NULL,
  `approvedByEmpID` int(11) DEFAULT NULL,
  `processedByEmpID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_requirements`
--

CREATE TABLE `loan_requirements` (
  `applicationNo` int(11) NOT NULL,
  `idNo` varchar(20) NOT NULL,
  `idDateIssued` date NOT NULL,
  `idPlaceIssued` varchar(50) NOT NULL,
  `propertyType` varchar(50) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `serialNo` varchar(50) DEFAULT NULL,
  `purchasePrice` decimal(10,2) DEFAULT NULL,
  `yearPurchased` year(4) DEFAULT NULL,
  `appraisedValue` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_status`
--

CREATE TABLE `loan_status` (
  `ls_id` int(11) NOT NULL,
  `ls_label` varchar(50) NOT NULL,
  `ls_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_status`
--

INSERT INTO `loan_status` (`ls_id`, `ls_label`, `ls_deleted`) VALUES
(1, 'Processing', 0),
(2, 'Approved', 0),
(3, 'Rejected', 0),
(4, 'Completed', 0),
(5, 'Terminated', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `lt_id` int(11) DEFAULT NULL,
  `lt_label` varchar(50) DEFAULT NULL,
  `lt_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_type`
--

INSERT INTO `loan_type` (`lt_id`, `lt_label`, `lt_status`) VALUES
(0, 'Not Set', 0),
(1, 'Daily (Arawan)', 0),
(2, 'Weekly', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spouse`
--

CREATE TABLE `spouse` (
  `borrowerID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bDay` date NOT NULL,
  `civilStatus` varchar(25) NOT NULL,
  `presentAddr` varchar(100) NOT NULL,
  `homeAddr` varchar(100) NOT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `salaryOrIncome` decimal(8,2) DEFAULT NULL,
  `validID` varchar(50) DEFAULT NULL,
  `contactNo` varchar(15) DEFAULT NULL,
  `employerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spouse`
--

INSERT INTO `spouse` (`borrowerID`, `name`, `bDay`, `civilStatus`, `presentAddr`, `homeAddr`, `occupation`, `salaryOrIncome`, `validID`, `contactNo`, `employerID`) VALUES
(1, 'Spouse', '2019-05-09', 'married', 'Present', 'Home', 'Occupation', '6000.00', 'id', '+44 55 5 56', 1),
(2, 'Irene Navarro', '2019-05-16', 'married', 'Hipodromo', 'Mabolo', 'Encoder', '10000.00', 'NA', '09446554', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `users_deleted` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `password`, `userType`, `users_deleted`) VALUES
('123', 'password', 'admin', 0),
('456', 'password', 'teller', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`borrowerID`),
  ADD KEY `comakerID` (`comakerID`);

--
-- Indexes for table `borrower_employee_relationship`
--
ALTER TABLE `borrower_employee_relationship`
  ADD PRIMARY KEY (`borrowerID`,`empID`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `borrower_expense`
--
ALTER TABLE `borrower_expense`
  ADD PRIMARY KEY (`borrowerID`);

--
-- Indexes for table `borrower_income`
--
ALTER TABLE `borrower_income`
  ADD PRIMARY KEY (`borrowerID`);

--
-- Indexes for table `collection_info`
--
ALTER TABLE `collection_info`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `collector_assignment`
--
ALTER TABLE `collector_assignment`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `collector_assignment_ibfk_1` (`borrowerID`);

--
-- Indexes for table `comaker`
--
ALTER TABLE `comaker`
  ADD PRIMARY KEY (`comakerID`),
  ADD KEY `employerID` (`employerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`employerID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`applicationNo`),
  ADD KEY `borrowerID` (`borrowerID`);

--
-- Indexes for table `loan_evaluation`
--
ALTER TABLE `loan_evaluation`
  ADD PRIMARY KEY (`applicationNo`),
  ADD KEY `approvedByEmpID` (`approvedByEmpID`),
  ADD KEY `processedByEmpID` (`processedByEmpID`);

--
-- Indexes for table `loan_requirements`
--
ALTER TABLE `loan_requirements`
  ADD PRIMARY KEY (`applicationNo`);

--
-- Indexes for table `spouse`
--
ALTER TABLE `spouse`
  ADD PRIMARY KEY (`borrowerID`),
  ADD KEY `employerID` (`employerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `borrowerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collection_info`
--
ALTER TABLE `collection_info`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `employerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `applicationNo` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrower_employee_relationship`
--
ALTER TABLE `borrower_employee_relationship`
  ADD CONSTRAINT `borrower_employee_relationship_ibfk_2` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
