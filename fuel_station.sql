-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 06:48 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuel_station`
--

-- --------------------------------------------------------

--
-- Table structure for table `debtor`
--

CREATE TABLE `debtor` (
  `id` int(100) NOT NULL,
  `DebtorId` varchar(20) NOT NULL,
  `DebtorName` varchar(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `TelephoneNo` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `debtorbalance`
--

CREATE TABLE `debtorbalance` (
  `id` int(100) NOT NULL,
  `DebtorId` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `DepositAmount` float NOT NULL,
  `Expense` float NOT NULL,
  `Balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `debtorfuelsale`
--

CREATE TABLE `debtorfuelsale` (
  `id` int(100) NOT NULL,
  `DebtorId` varchar(20) NOT NULL,
  `FuelId` varchar(20) NOT NULL,
  `PumpId` varchar(20) NOT NULL,
  `PumperId` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Amount` float NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtorfuelsale`
--

INSERT INTO `debtorfuelsale` (`id`, `DebtorId`, `FuelId`, `PumpId`, `PumperId`, `Date`, `Amount`, `Time`) VALUES
(1, '001', 'PET921', '1', '', '2019-01-01', 1344, '13:20:00'),
(2, '12', 'LAD001', '22', '', '2019-01-02', 765, '22:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `debtorlubsale`
--

CREATE TABLE `debtorlubsale` (
  `id` int(100) NOT NULL,
  `DebtorId` varchar(20) NOT NULL,
  `LubricantId` varchar(20) NOT NULL,
  `Amount` float NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(100) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `EmpId` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(20) NOT NULL,
  `TelephoneNo` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `BasicSalary` float NOT NULL,
  `Allowances` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `NIC`, `EmpId`, `FirstName`, `LastName`, `DOB`, `Address`, `TelephoneNo`, `Email`, `Type`, `Password`, `BasicSalary`, `Allowances`) VALUES
(3, '957062822V', '12', 'hdst', 'sdxsa', '2019-01-01', 'sxczx', 21435, 'ki@gmail.com', 'Data Entry Operator', '123', 234, 232);

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `id` int(100) NOT NULL,
  `FuelId` varchar(20) NOT NULL,
  `FuelName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id`, `FuelId`, `FuelName`) VALUES
(1, 'PET921', 'Petrol 92 Octane'),
(2, 'PET951', 'Petrol 95 Octane'),
(3, 'LAD001', 'Lanka Auto Diesel'),
(4, 'LSD001', 'Lanka Super Diesel'),
(5, 'KERO01', 'Kerosene');

-- --------------------------------------------------------

--
-- Table structure for table `fuelprice`
--

CREATE TABLE `fuelprice` (
  `id` int(100) NOT NULL,
  `FuelId` varchar(20) NOT NULL,
  `UnitPrice` float NOT NULL,
  `UnitPricedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuelprice`
--

INSERT INTO `fuelprice` (`id`, `FuelId`, `UnitPrice`, `UnitPricedDate`) VALUES
(1, 'PET921', 125, '2019-01-04'),
(2, 'PET951', 149, '2019-01-04'),
(3, 'LAD001', 101, '2019-01-04'),
(4, 'LSD001', 121, '2019-01-04'),
(5, 'KERO01', 70, '2019-01-04'),
(6, 'PET921', 153, '2019-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `fuelpurchase`
--

CREATE TABLE `fuelpurchase` (
  `id` int(100) NOT NULL,
  `FuelId` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fuelsale`
--

CREATE TABLE `fuelsale` (
  `id` int(100) NOT NULL,
  `PumpId` varchar(20) NOT NULL,
  `PumperId` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `OMReading` float NOT NULL,
  `CMReading` float NOT NULL,
  `Stime` time NOT NULL,
  `Etime` time NOT NULL,
  `TotalAmount` float NOT NULL,
  `Cashsale` float NOT NULL,
  `DebtorSales` float NOT NULL,
  `CardSales` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuelsale`
--

INSERT INTO `fuelsale` (`id`, `PumpId`, `PumperId`, `Date`, `OMReading`, `CMReading`, `Stime`, `Etime`, `TotalAmount`, `Cashsale`, `DebtorSales`, `CardSales`) VALUES
(1, '123', '456', '2019-01-02', 0, 0, '00:00:00', '00:00:00', 0, 0, 0, 0),
(2, '789', '135', '2019-01-03', 0, 0, '00:00:00', '00:00:00', 0, 0, 0, 0),
(3, '789', '456', '2019-01-06', 0, 0, '00:00:00', '00:00:00', 0, 0, 0, 0),
(4, '3445', '5235', '2019-01-04', 24, 124, '03:14:00', '14:21:00', 0, 314, 0, 23423),
(5, '3445', '5235', '2019-01-05', 24, 124, '03:14:00', '14:21:00', 100, 314, 0, 23423);

-- --------------------------------------------------------

--
-- Table structure for table `lubricant`
--

CREATE TABLE `lubricant` (
  `id` int(100) NOT NULL,
  `LubricantId` varchar(20) NOT NULL,
  `LubricantName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lubricantprice`
--

CREATE TABLE `lubricantprice` (
  `id` int(100) NOT NULL,
  `LubricantId` varchar(20) NOT NULL,
  `UnitPrice` float NOT NULL,
  `UnitPricedDate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lubricantpurchase`
--

CREATE TABLE `lubricantpurchase` (
  `id` int(100) NOT NULL,
  `LubricantId` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lubricantsale`
--

CREATE TABLE `lubricantsale` (
  `id` int(100) NOT NULL,
  `LubricantId` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `NoOfItems` int(11) NOT NULL,
  `TotalAmount` float NOT NULL,
  `Cashsale` float NOT NULL,
  `Debtorsale` float NOT NULL,
  `Cardsale` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pump`
--

CREATE TABLE `pump` (
  `id` int(100) NOT NULL,
  `PumpId` varchar(20) NOT NULL,
  `TankId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pump`
--

INSERT INTO `pump` (`id`, `PumpId`, `TankId`) VALUES
(1, '001', '002');

-- --------------------------------------------------------

--
-- Table structure for table `pumper`
--

CREATE TABLE `pumper` (
  `id` int(100) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `EmpId` varchar(20) DEFAULT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(20) NOT NULL,
  `TelephoneNo` int(11) NOT NULL,
  `BasicSalary` float NOT NULL,
  `Allowances` int(11) NOT NULL,
  `OTRate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pumper`
--

INSERT INTO `pumper` (`id`, `NIC`, `EmpId`, `FirstName`, `LastName`, `DOB`, `Address`, `TelephoneNo`, `BasicSalary`, `Allowances`, `OTRate`) VALUES
(1, '943132v', NULL, 'dsf', 'fd', '2019-01-02', 'dfv', 2324, 322, 232, 23);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(100) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salarydetails`
--

CREATE TABLE `salarydetails` (
  `id` int(100) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Intime` time NOT NULL,
  `Outtime` time NOT NULL,
  `OTHours` int(11) NOT NULL,
  `Shortages` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tank`
--

CREATE TABLE `tank` (
  `id` int(100) NOT NULL,
  `TankId` varchar(20) NOT NULL,
  `FuelId` varchar(20) NOT NULL,
  `Capacity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tank`
--

INSERT INTO `tank` (`id`, `TankId`, `FuelId`, `Capacity`) VALUES
(1, '002', 'PET921', 2113);

-- --------------------------------------------------------

--
-- Table structure for table `tankfill`
--

CREATE TABLE `tankfill` (
  `id` int(100) NOT NULL,
  `TankId` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Out` float NOT NULL,
  `In` float NOT NULL,
  `Balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `debtor`
--
ALTER TABLE `debtor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtorbalance`
--
ALTER TABLE `debtorbalance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtorfuelsale`
--
ALTER TABLE `debtorfuelsale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtorlubsale`
--
ALTER TABLE `debtorlubsale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuelprice`
--
ALTER TABLE `fuelprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuelpurchase`
--
ALTER TABLE `fuelpurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuelsale`
--
ALTER TABLE `fuelsale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lubricant`
--
ALTER TABLE `lubricant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lubricantprice`
--
ALTER TABLE `lubricantprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lubricantpurchase`
--
ALTER TABLE `lubricantpurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lubricantsale`
--
ALTER TABLE `lubricantsale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pump`
--
ALTER TABLE `pump`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pumper`
--
ALTER TABLE `pumper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salarydetails`
--
ALTER TABLE `salarydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tank`
--
ALTER TABLE `tank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tankfill`
--
ALTER TABLE `tankfill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `debtor`
--
ALTER TABLE `debtor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debtorbalance`
--
ALTER TABLE `debtorbalance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debtorfuelsale`
--
ALTER TABLE `debtorfuelsale`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `debtorlubsale`
--
ALTER TABLE `debtorlubsale`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fuelprice`
--
ALTER TABLE `fuelprice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fuelpurchase`
--
ALTER TABLE `fuelpurchase`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuelsale`
--
ALTER TABLE `fuelsale`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lubricant`
--
ALTER TABLE `lubricant`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lubricantprice`
--
ALTER TABLE `lubricantprice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lubricantpurchase`
--
ALTER TABLE `lubricantpurchase`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lubricantsale`
--
ALTER TABLE `lubricantsale`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pump`
--
ALTER TABLE `pump`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pumper`
--
ALTER TABLE `pumper`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salarydetails`
--
ALTER TABLE `salarydetails`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tank`
--
ALTER TABLE `tank`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tankfill`
--
ALTER TABLE `tankfill`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
