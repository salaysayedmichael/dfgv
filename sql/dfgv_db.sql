-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2019 at 05:25 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
-- Table structure for table `arawan_payment`
--

CREATE TABLE `arawan_payment` (
  `borrowerID` int(11) NOT NULL,
  `applicationNo` int(11) NOT NULL,
  `dateGranted` date DEFAULT NULL,
  `perWeekPayment` decimal(8,2) NOT NULL,
  `loanCycle` int(11) DEFAULT NULL,
  `dayPmt1` decimal(8,2) DEFAULT NULL,
  `datePaid1` date DEFAULT NULL,
  `dayPmt2` decimal(8,2) DEFAULT NULL,
  `datePaid2` date DEFAULT NULL,
  `dayPmt3` decimal(8,2) DEFAULT NULL,
  `datePaid3` date DEFAULT NULL,
  `dayPmt4` decimal(8,2) DEFAULT NULL,
  `datePaid4` date DEFAULT NULL,
  `dayPmt5` decimal(8,2) DEFAULT NULL,
  `datePaid5` date DEFAULT NULL,
  `dayPmt6` decimal(8,2) DEFAULT NULL,
  `datePaid6` date DEFAULT NULL,
  `dayPmt7` decimal(8,2) DEFAULT NULL,
  `datePaid7` date DEFAULT NULL,
  `dayPmt8` decimal(8,2) DEFAULT NULL,
  `datePaid8` date DEFAULT NULL,
  `dayPmt9` decimal(8,2) DEFAULT NULL,
  `datePaid9` date DEFAULT NULL,
  `dayPmt10` decimal(8,2) DEFAULT NULL,
  `datePaid10` date DEFAULT NULL,
  `dayPmt11` decimal(8,2) DEFAULT NULL,
  `datePaid11` date DEFAULT NULL,
  `dayPmt12` decimal(8,2) DEFAULT NULL,
  `datePaid12` date DEFAULT NULL,
  `dayPmt13` decimal(8,2) DEFAULT NULL,
  `datePaid13` date DEFAULT NULL,
  `dayPmt14` decimal(8,2) DEFAULT NULL,
  `datePaid14` date DEFAULT NULL,
  `dayPmt15` decimal(8,2) DEFAULT NULL,
  `datePaid15` date DEFAULT NULL,
  `dayPmt16` decimal(8,2) DEFAULT NULL,
  `datePaid16` date DEFAULT NULL,
  `dayPmt17` decimal(8,2) DEFAULT NULL,
  `datePaid17` date DEFAULT NULL,
  `dayPmt18` decimal(8,2) DEFAULT NULL,
  `datePaid18` date DEFAULT NULL,
  `dayPmt19` decimal(8,2) DEFAULT NULL,
  `datePaid19` date DEFAULT NULL,
  `dayPmt20` decimal(8,2) DEFAULT NULL,
  `datePaid20` date DEFAULT NULL,
  `dayPmt21` decimal(8,2) DEFAULT NULL,
  `datePaid21` date DEFAULT NULL,
  `dayPmt22` decimal(8,2) DEFAULT NULL,
  `datePaid22` date DEFAULT NULL,
  `dayPmt23` decimal(8,2) DEFAULT NULL,
  `datePaid23` date DEFAULT NULL,
  `dayPmt24` decimal(8,2) DEFAULT NULL,
  `datePaid24` date DEFAULT NULL,
  `dayPmt25` decimal(8,2) DEFAULT NULL,
  `datePaid25` date DEFAULT NULL,
  `dayPmt26` decimal(8,2) DEFAULT NULL,
  `datePaid26` date DEFAULT NULL,
  `dayPmt27` decimal(8,2) DEFAULT NULL,
  `datePaid27` date DEFAULT NULL,
  `dayPmt28` decimal(8,2) DEFAULT NULL,
  `datePaid28` date DEFAULT NULL,
  `dayPmt29` decimal(8,2) DEFAULT NULL,
  `datePaid29` date DEFAULT NULL,
  `dayPmt30` decimal(8,2) DEFAULT NULL,
  `datePaid30` date DEFAULT NULL,
  `dayPmt31` decimal(8,2) DEFAULT NULL,
  `datePaid31` date DEFAULT NULL,
  `dayPmt32` decimal(8,2) DEFAULT NULL,
  `datePaid32` date DEFAULT NULL,
  `dayPmt33` decimal(8,2) DEFAULT NULL,
  `datePaid33` date DEFAULT NULL,
  `dayPmt34` decimal(8,2) DEFAULT NULL,
  `datePaid34` date DEFAULT NULL,
  `dayPmt35` decimal(8,2) DEFAULT NULL,
  `datePaid35` date DEFAULT NULL,
  `dayPmt36` decimal(8,2) DEFAULT NULL,
  `datePaid36` date DEFAULT NULL,
  `dayPmt37` decimal(8,2) DEFAULT NULL,
  `datePaid37` date DEFAULT NULL,
  `dayPmt38` decimal(8,2) DEFAULT NULL,
  `datePaid38` date DEFAULT NULL,
  `dayPmt39` decimal(8,2) DEFAULT NULL,
  `datePaid39` date DEFAULT NULL,
  `dayPmt40` decimal(8,2) DEFAULT NULL,
  `datePaid40` date DEFAULT NULL,
  `dayPmt41` decimal(8,2) DEFAULT NULL,
  `datePaid41` date DEFAULT NULL,
  `dayPmt42` decimal(8,2) DEFAULT NULL,
  `datePaid42` date DEFAULT NULL,
  `dayPmt43` decimal(8,2) DEFAULT NULL,
  `datePaid43` date DEFAULT NULL,
  `dayPmt44` decimal(8,2) DEFAULT NULL,
  `datePaid44` date DEFAULT NULL,
  `dayPmt45` decimal(8,2) DEFAULT NULL,
  `datePaid45` date DEFAULT NULL,
  `dayPmt46` decimal(8,2) DEFAULT NULL,
  `datePaid46` date DEFAULT NULL,
  `dayPmt47` decimal(8,2) DEFAULT NULL,
  `datePaid47` date DEFAULT NULL,
  `dayPmt48` decimal(8,2) DEFAULT NULL,
  `datePaid48` date DEFAULT NULL,
  `dayPmt49` decimal(8,2) DEFAULT NULL,
  `datePaid49` date DEFAULT NULL,
  `dayPmt50` decimal(8,2) DEFAULT NULL,
  `datePaid50` date DEFAULT NULL,
  `dayPmt51` decimal(8,2) DEFAULT NULL,
  `datePaid51` date DEFAULT NULL,
  `dayPmt52` decimal(8,2) DEFAULT NULL,
  `datePaid52` date DEFAULT NULL,
  `dayPmt53` decimal(8,2) DEFAULT NULL,
  `datePaid53` date DEFAULT NULL,
  `dayPmt54` decimal(8,2) DEFAULT NULL,
  `datePaid54` date DEFAULT NULL,
  `dayPmt55` decimal(8,2) DEFAULT NULL,
  `datePaid55` date DEFAULT NULL,
  `dayPmt56` decimal(8,2) DEFAULT NULL,
  `datePaid56` date DEFAULT NULL,
  `dayPmt57` decimal(8,2) DEFAULT NULL,
  `datePaid57` date DEFAULT NULL,
  `dayPmt58` decimal(8,2) DEFAULT NULL,
  `datePaid58` date DEFAULT NULL,
  `dayPmt59` decimal(8,2) DEFAULT NULL,
  `datePaid59` date DEFAULT NULL,
  `dayPmt60` decimal(8,2) DEFAULT NULL,
  `datePaid60` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `comakerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `employerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `employerID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contactNo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `applicationNo` int(11) NOT NULL,
  `tradeReference` varchar(100) DEFAULT NULL,
  `loanAmount` decimal(8,2) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `paymentMod` varchar(20) NOT NULL,
  `term` varchar(30) NOT NULL,
  `lastLoan` decimal(8,2) NOT NULL,
  `finesPaid` decimal(8,2) NOT NULL,
  `percentage` decimal(4,2) NOT NULL,
  `monthsPrepaid` int(11) NOT NULL,
  `submitted` datetime DEFAULT NULL,
  `processed` datetime DEFAULT NULL,
  `loanStatus` varchar(15) NOT NULL,
  `borrowerID` int(11) DEFAULT NULL,
  `empID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `spouse`
--

CREATE TABLE `spouse` (
  `comakerID` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `deleted` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weekly_payment`
--

CREATE TABLE `weekly_payment` (
  `borrowerID` int(11) NOT NULL,
  `applicationNo` int(11) NOT NULL,
  `dateGranted` date DEFAULT NULL,
  `perWeekPayment` decimal(8,2) NOT NULL,
  `loanCycle` int(11) DEFAULT NULL,
  `wkPmt1` decimal(8,2) DEFAULT NULL,
  `datePaid1` date DEFAULT NULL,
  `wkPmt2` decimal(8,2) DEFAULT NULL,
  `datePaid2` date DEFAULT NULL,
  `wkPmt3` decimal(8,2) DEFAULT NULL,
  `datePaid3` date DEFAULT NULL,
  `wkPmt4` decimal(8,2) DEFAULT NULL,
  `datePaid4` date DEFAULT NULL,
  `wkPmt5` decimal(8,2) DEFAULT NULL,
  `datePaid5` date DEFAULT NULL,
  `wkPmt6` decimal(8,2) DEFAULT NULL,
  `datePaid6` date DEFAULT NULL,
  `wkPmt7` decimal(8,2) DEFAULT NULL,
  `datePaid7` date DEFAULT NULL,
  `wkPmt8` decimal(8,2) DEFAULT NULL,
  `datePaid8` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arawan_payment`
--
ALTER TABLE `arawan_payment`
  ADD PRIMARY KEY (`borrowerID`,`applicationNo`),
  ADD KEY `applicationNo` (`applicationNo`);

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
-- Indexes for table `collector_assignment`
--
ALTER TABLE `collector_assignment`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `borrowerID` (`borrowerID`),
  ADD KEY `applicationNo` (`applicationNo`);

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
  ADD KEY `borrowerID` (`borrowerID`),
  ADD KEY `empID` (`empID`);

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
  ADD PRIMARY KEY (`comakerID`),
  ADD KEY `employerID` (`employerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `weekly_payment`
--
ALTER TABLE `weekly_payment`
  ADD PRIMARY KEY (`borrowerID`,`applicationNo`),
  ADD KEY `applicationNo` (`applicationNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arawan_payment`
--
ALTER TABLE `arawan_payment`
  ADD CONSTRAINT `arawan_payment_ibfk_1` FOREIGN KEY (`borrowerID`) REFERENCES `borrower` (`borrowerID`),
  ADD CONSTRAINT `arawan_payment_ibfk_2` FOREIGN KEY (`applicationNo`) REFERENCES `loan` (`applicationNo`);

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `borrower_ibfk_1` FOREIGN KEY (`comakerID`) REFERENCES `comaker` (`comakerID`);

--
-- Constraints for table `borrower_employee_relationship`
--
ALTER TABLE `borrower_employee_relationship`
  ADD CONSTRAINT `borrower_employee_relationship_ibfk_1` FOREIGN KEY (`borrowerID`) REFERENCES `borrower` (`borrowerID`),
  ADD CONSTRAINT `borrower_employee_relationship_ibfk_2` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`);

--
-- Constraints for table `borrower_expense`
--
ALTER TABLE `borrower_expense`
  ADD CONSTRAINT `borrower_expense_ibfk_1` FOREIGN KEY (`borrowerID`) REFERENCES `borrower` (`borrowerID`);

--
-- Constraints for table `borrower_income`
--
ALTER TABLE `borrower_income`
  ADD CONSTRAINT `borrower_income_ibfk_1` FOREIGN KEY (`borrowerID`) REFERENCES `borrower` (`borrowerID`);

--
-- Constraints for table `collector_assignment`
--
ALTER TABLE `collector_assignment`
  ADD CONSTRAINT `collector_assignment_ibfk_1` FOREIGN KEY (`borrowerID`) REFERENCES `borrower` (`borrowerID`),
  ADD CONSTRAINT `collector_assignment_ibfk_2` FOREIGN KEY (`applicationNo`) REFERENCES `loan` (`applicationNo`);

--
-- Constraints for table `comaker`
--
ALTER TABLE `comaker`
  ADD CONSTRAINT `comaker_ibfk_1` FOREIGN KEY (`employerID`) REFERENCES `employer` (`employerID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`borrowerID`) REFERENCES `borrower` (`borrowerID`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`);

--
-- Constraints for table `loan_evaluation`
--
ALTER TABLE `loan_evaluation`
  ADD CONSTRAINT `loan_evaluation_ibfk_1` FOREIGN KEY (`approvedByEmpID`) REFERENCES `employee` (`empID`),
  ADD CONSTRAINT `loan_evaluation_ibfk_2` FOREIGN KEY (`processedByEmpID`) REFERENCES `employee` (`empID`);

--
-- Constraints for table `loan_requirements`
--
ALTER TABLE `loan_requirements`
  ADD CONSTRAINT `loan_requirements_ibfk_1` FOREIGN KEY (`applicationNo`) REFERENCES `loan` (`applicationNo`);

--
-- Constraints for table `spouse`
--
ALTER TABLE `spouse`
  ADD CONSTRAINT `spouse_ibfk_1` FOREIGN KEY (`comakerID`) REFERENCES `comaker` (`comakerID`),
  ADD CONSTRAINT `spouse_ibfk_2` FOREIGN KEY (`employerID`) REFERENCES `employer` (`employerID`);

--
-- Constraints for table `weekly_payment`
--
ALTER TABLE `weekly_payment`
  ADD CONSTRAINT `weekly_payment_ibfk_1` FOREIGN KEY (`borrowerID`) REFERENCES `borrower` (`borrowerID`),
  ADD CONSTRAINT `weekly_payment_ibfk_2` FOREIGN KEY (`applicationNo`) REFERENCES `loan` (`applicationNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
