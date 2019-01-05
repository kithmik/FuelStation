-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 07:11 PM
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
-- Database: `fuel_new`
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
  `Date` date NOT NULL,
  `Amount` float NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 'KERO01', 70, '2019-01-04');

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
  `OMReading` float NOT NULL,
  `CMReading` float NOT NULL,
  `Stime` datetime NOT NULL,
  `Etime` datetime NOT NULL,
  `DebtorSales` float NOT NULL,
  `CardSales` float NOT NULL,
  `Shortages` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Cashsale` float NOT NULL,
  `Debtorsale` float NOT NULL,
  `Cardsale` float NOT NULL,
  `NoOfItems` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pump`
--

CREATE TABLE `pump` (
  `id` int(100) NOT NULL,
  `PumpId` varchar(20) NOT NULL,
  `FuelId` varchar(20) NOT NULL,
  `TankId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pumper`
--

CREATE TABLE `pumper` (
  `id` int(100) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `EmpId` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(20) NOT NULL,
  `TelephoneNo` int(11) NOT NULL,
  `BasicSalary` float NOT NULL,
  `Allowances` int(11) NOT NULL,
  `OTRate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debtorlubsale`
--
ALTER TABLE `debtorlubsale`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fuelprice`
--
ALTER TABLE `fuelprice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fuelpurchase`
--
ALTER TABLE `fuelpurchase`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuelsale`
--
ALTER TABLE `fuelsale`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pumper`
--
ALTER TABLE `pumper`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tankfill`
--
ALTER TABLE `tankfill`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
