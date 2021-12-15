-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 09:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bank` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bank`, `status`) VALUES
(1, 'Nabil Bank', 1),
(2, 'Sidhdhartha Bank', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bankaccounttype`
--

CREATE TABLE `bankaccounttype` (
  `id` int(11) NOT NULL,
  `bankAccountType` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankaccounttype`
--

INSERT INTO `bankaccounttype` (`id`, `bankAccountType`, `status`) VALUES
(1, 'Saving Account', 1),
(2, 'Current Account', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `id` int(11) NOT NULL,
  `bankAccountType` int(11) DEFAULT NULL,
  `bankAccountno` varchar(50) NOT NULL,
  `bank` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`id`, `bankAccountType`, `bankAccountno`, `bank`, `branch`) VALUES
(1, 1, '546+789625', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `beneficialowner`
--

CREATE TABLE `beneficialowner` (
  `beneficialowner_id` int(11) NOT NULL,
  `title` int(11) DEFAULT NULL,
  `firstName` text NOT NULL,
  `middleName` text NOT NULL,
  `lastName` text NOT NULL,
  `fathersName` text NOT NULL,
  `grandFathersName` text NOT NULL,
  `mothersName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beneficialowner`
--

INSERT INTO `beneficialowner` (`beneficialowner_id`, `title`, `firstName`, `middleName`, `lastName`, `fathersName`, `grandFathersName`, `mothersName`) VALUES
(1, 1, 'Rabindra Dongol', 'Rabindra Dongol', 'Rabindra Dongol', 'Ram Krishna Dongol', 'Moti Lal Dongol', 'Nara Devi Dongol');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch`, `status`) VALUES
(1, 'Kalanki', 1),
(2, 'Kalimati', 1);

-- --------------------------------------------------------

--
-- Table structure for table `businesstype`
--

CREATE TABLE `businesstype` (
  `id` int(11) NOT NULL,
  `businessType` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesstype`
--

INSERT INTO `businesstype` (`id`, `businessType`, `status`) VALUES
(1, 'Manufacturing', 1),
(2, 'Services', 1);

-- --------------------------------------------------------

--
-- Table structure for table `certificatedetails`
--

CREATE TABLE `certificatedetails` (
  `id` int(11) NOT NULL,
  `citizenshipNo` varchar(50) DEFAULT NULL,
  `citizenshipIssueDistrict` int(11) DEFAULT NULL,
  `CitizenshipIssueDateBS` date NOT NULL,
  `CitizenshipIssueDateAD` date NOT NULL,
  `DOBBS` date NOT NULL,
  `DOBAD` date NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `panno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificatedetails`
--

INSERT INTO `certificatedetails` (`id`, `citizenshipNo`, `citizenshipIssueDistrict`, `CitizenshipIssueDateBS`, `CitizenshipIssueDateAD`, `DOBBS`, `DOBAD`, `gender`, `panno`) VALUES
(1, '32165456/6546548', 1, '2021-12-03', '2021-12-03', '2021-12-04', '2021-12-03', 3, '65465465456');

-- --------------------------------------------------------

--
-- Table structure for table `correspondenceaddress`
--

CREATE TABLE `correspondenceaddress` (
  `id` int(11) NOT NULL,
  `correspondence_province` int(11) DEFAULT NULL,
  `correspondence_zone` int(11) DEFAULT NULL,
  `correspondence_district` int(11) DEFAULT NULL,
  `correspondence_vdc` text NOT NULL,
  `correspondence_tole` text NOT NULL,
  `correspondence_ward` int(10) NOT NULL,
  `correspondence_blockno` int(10) NOT NULL,
  `correspondence_phoneno` int(10) NOT NULL,
  `correspondence_mobileno` int(10) NOT NULL,
  `correspondence_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `correspondenceaddress`
--

INSERT INTO `correspondenceaddress` (`id`, `correspondence_province`, `correspondence_zone`, `correspondence_district`, `correspondence_vdc`, `correspondence_tole`, `correspondence_ward`, `correspondence_blockno`, `correspondence_phoneno`, `correspondence_mobileno`, `correspondence_email`) VALUES
(1, 1, 1, 1, 'ktm', 'lampati', 14, 244, 2147483647, 2147483647, 'dongolmt@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`, `status`) VALUES
(1, 'Kathmandu', 1),
(2, 'Lalitpur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `firstsection`
--

CREATE TABLE `firstsection` (
  `firstsection_id` int(11) NOT NULL,
  `accountType` text NOT NULL,
  `minor` text NOT NULL,
  `meroShareService` text NOT NULL,
  `maritalStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `firstsection`
--

INSERT INTO `firstsection` (`firstsection_id`, `accountType`, `minor`, `meroShareService`, `maritalStatus`) VALUES
(1, 'NonResidentNepalese', 'minor', 'Yes', 'Unmarried');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `firstSection` int(11) DEFAULT NULL,
  `beneficialOwner` int(11) DEFAULT NULL,
  `correspondenceAddress` int(11) DEFAULT NULL,
  `permanentAddress` int(11) DEFAULT NULL,
  `certificateDetails` int(11) DEFAULT NULL,
  `bankDetails` int(11) DEFAULT NULL,
  `occupationDetails` int(11) DEFAULT NULL,
  `nomineeDetails` int(11) DEFAULT NULL,
  `guardianDetails` int(11) DEFAULT NULL,
  `otherDocuments` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `firstSection`, `beneficialOwner`, `correspondenceAddress`, `permanentAddress`, `certificateDetails`, `bankDetails`, `occupationDetails`, `nomineeDetails`, `guardianDetails`, `otherDocuments`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`, `status`) VALUES
(1, 'Male', 1),
(2, 'Female', 1),
(3, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guardiandetails`
--

CREATE TABLE `guardiandetails` (
  `id` int(11) NOT NULL,
  `guardianFirstName` text DEFAULT NULL,
  `guardianMiddleName` text DEFAULT NULL,
  `guardianLastName` text DEFAULT NULL,
  `guardianRelation` text DEFAULT NULL,
  `guardianFatherName` text DEFAULT NULL,
  `guardianGrandFatherName` text DEFAULT NULL,
  `guardianSpouseName` text DEFAULT NULL,
  `guardianCitizenshipNo` varchar(50) DEFAULT NULL,
  `guardianAddress` text DEFAULT NULL,
  `guardian_province` int(11) DEFAULT NULL,
  `guardian_zone` int(11) DEFAULT NULL,
  `guardian_district` int(11) DEFAULT NULL,
  `guardian_vdc` text DEFAULT NULL,
  `guardian_blockNo` int(5) DEFAULT NULL,
  `guardian_ward` int(5) DEFAULT NULL,
  `guardian_phoneno` int(10) DEFAULT NULL,
  `guardian_mobileno` int(10) DEFAULT NULL,
  `guardian_panno` int(50) DEFAULT NULL,
  `guardian_email` varchar(50) DEFAULT NULL,
  `guardian_citizenshiptIssueDistrict` int(11) DEFAULT NULL,
  `guardian_citizenshipIssueDateBS` date DEFAULT NULL,
  `guardian_citizenshipIssueDateAD` date DEFAULT NULL,
  `guardian_DOBBS` date DEFAULT NULL,
  `guardian_DOBAD` date DEFAULT NULL,
  `guardianPhoto` text DEFAULT NULL,
  `guardianSignature` text DEFAULT NULL,
  `guardianCitizenshipFront` text DEFAULT NULL,
  `guardianCitizenshipBack` text DEFAULT NULL,
  `guardianProof` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guardiandetails`
--

INSERT INTO `guardiandetails` (`id`, `guardianFirstName`, `guardianMiddleName`, `guardianLastName`, `guardianRelation`, `guardianFatherName`, `guardianGrandFatherName`, `guardianSpouseName`, `guardianCitizenshipNo`, `guardianAddress`, `guardian_province`, `guardian_zone`, `guardian_district`, `guardian_vdc`, `guardian_blockNo`, `guardian_ward`, `guardian_phoneno`, `guardian_mobileno`, `guardian_panno`, `guardian_email`, `guardian_citizenshiptIssueDistrict`, `guardian_citizenshipIssueDateBS`, `guardian_citizenshipIssueDateAD`, `guardian_DOBBS`, `guardian_DOBAD`, `guardianPhoto`, `guardianSignature`, `guardianCitizenshipFront`, `guardianCitizenshipBack`, `guardianProof`) VALUES
(1, 'Ram', 'Krishna', 'Dongol', 'Father', 'Moti Lal Dongol', 'Mohan Lal Dongol', 'Nara Devi Dongol', '2354234', 'Kalanki', 1, 1, 1, '', 244, 14, 1234567890, 1234567890, 234234, 'dongolrk@gmail.com', 2, '2021-12-02', '2021-12-09', '2021-12-10', '2021-12-02', 'GuardianPhoto-20211215093539962.jpg', 'GuardianSignature-20211215093539655.jpg', 'GuardianCitizenshipFront-2021121509353920.jpg', 'GuardianCitizenshipBack-20211215093539447.jpg', 'GuardianProof-20211215093539539.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `income` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `income`, `status`) VALUES
(1, 'Up to Rs. 100000', 1),
(2, 'From Rs. 100000 to Rs. 200000', 1),
(3, 'From Rs. 200001 to Rs. 500000', 1),
(4, 'Above Rs. 500000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nomineedetails`
--

CREATE TABLE `nomineedetails` (
  `id` int(11) NOT NULL,
  `nominee` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nomineedetails`
--

INSERT INTO `nomineedetails` (`id`, `nominee`) VALUES
(1, 'not_nominee');

-- --------------------------------------------------------

--
-- Table structure for table `occupationdetails`
--

CREATE TABLE `occupationdetails` (
  `id` int(11) NOT NULL,
  `occupationType` int(11) DEFAULT NULL,
  `businessType` int(11) DEFAULT NULL,
  `organizationName` text NOT NULL,
  `organizationAddress` text NOT NULL,
  `designation` text NOT NULL,
  `income` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occupationdetails`
--

INSERT INTO `occupationdetails` (`id`, `occupationType`, `businessType`, `organizationName`, `organizationAddress`, `designation`, `income`) VALUES
(1, 2, 1, 'Techtronix', 'Lazimpat', 'Developer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `occupationtype`
--

CREATE TABLE `occupationtype` (
  `id` int(11) NOT NULL,
  `occupationType` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occupationtype`
--

INSERT INTO `occupationtype` (`id`, `occupationType`, `status`) VALUES
(1, 'Public Sector', 1),
(2, 'Private Sector', 1),
(3, 'Business Person', 1),
(4, 'Student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otherdocuments`
--

CREATE TABLE `otherdocuments` (
  `id` int(11) NOT NULL,
  `applicantPhoto` text DEFAULT NULL,
  `applicantCitizenshipFrontPhoto` text DEFAULT NULL,
  `applicantCitizenshipBackPhoto` text DEFAULT NULL,
  `applicantThumbPhoto` text DEFAULT NULL,
  `applicantLocationMapPhoto` text DEFAULT NULL,
  `applicantSignaturePhoto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otherdocuments`
--

INSERT INTO `otherdocuments` (`id`, `applicantPhoto`, `applicantCitizenshipFrontPhoto`, `applicantCitizenshipBackPhoto`, `applicantThumbPhoto`, `applicantLocationMapPhoto`, `applicantSignaturePhoto`) VALUES
(1, 'ApplicantPhoto-20211215093539942.jpg', 'ApplicantCitizenshipFrontPhoto-20211215093539727.jpg', 'ApplicantCitizenshipBackPhoto-20211215093539989.jpg', 'ApplicantThumbPhoto-20211215093539486.jpg', 'ApplicantLocationMapPhoto-20211215093539521.jpg', 'ApplicantSignaturePhoto-20211215093539401.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `permanentaddress`
--

CREATE TABLE `permanentaddress` (
  `id` int(11) NOT NULL,
  `permanent_province` int(11) DEFAULT NULL,
  `permanent_zone` int(11) DEFAULT NULL,
  `permanent_district` int(11) DEFAULT NULL,
  `permanent_vdc` text NOT NULL,
  `permanent_tole` text NOT NULL,
  `permanent_ward` int(11) NOT NULL,
  `permanent_blockno` int(11) NOT NULL,
  `permanent_phoneno` int(10) NOT NULL,
  `permanent_mobileno` int(10) NOT NULL,
  `permanent_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permanentaddress`
--

INSERT INTO `permanentaddress` (`id`, `permanent_province`, `permanent_zone`, `permanent_district`, `permanent_vdc`, `permanent_tole`, `permanent_ward`, `permanent_blockno`, `permanent_phoneno`, `permanent_mobileno`, `permanent_email`) VALUES
(1, 1, 1, 1, 'ktm', 'lampati', 14, 244, 2147483647, 2147483647, 'dongolmt@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province`, `status`) VALUES
(1, 'Province 1', 1),
(2, 'Province 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title`, `status`) VALUES
(1, 'Mr.', 1),
(2, 'Mrs.', 1),
(3, 'Miss.', 1),
(4, 'Minor.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id` int(11) NOT NULL,
  `zone` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `zone`, `status`) VALUES
(1, 'Bagmati', 1),
(2, 'Lumbini', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankaccounttype`
--
ALTER TABLE `bankaccounttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bankAccountType` (`bankAccountType`),
  ADD UNIQUE KEY `bank` (`bank`),
  ADD UNIQUE KEY `branch` (`branch`);

--
-- Indexes for table `beneficialowner`
--
ALTER TABLE `beneficialowner`
  ADD PRIMARY KEY (`beneficialowner_id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesstype`
--
ALTER TABLE `businesstype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificatedetails`
--
ALTER TABLE `certificatedetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `citizenshipIssueDistrict` (`citizenshipIssueDistrict`),
  ADD UNIQUE KEY `gender` (`gender`);

--
-- Indexes for table `correspondenceaddress`
--
ALTER TABLE `correspondenceaddress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correspondence_province` (`correspondence_province`),
  ADD UNIQUE KEY `correspondence_zone` (`correspondence_zone`),
  ADD UNIQUE KEY `correspondence_distict` (`correspondence_district`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firstsection`
--
ALTER TABLE `firstsection`
  ADD PRIMARY KEY (`firstsection_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guardianDetails` (`guardianDetails`),
  ADD UNIQUE KEY `otherDocuments` (`otherDocuments`),
  ADD UNIQUE KEY `occupationDetails` (`occupationDetails`),
  ADD UNIQUE KEY `bankDetails` (`bankDetails`),
  ADD UNIQUE KEY `certificateDetails` (`certificateDetails`),
  ADD UNIQUE KEY `nomineeDetails` (`nomineeDetails`),
  ADD UNIQUE KEY `permanentAddress` (`permanentAddress`),
  ADD UNIQUE KEY `correspondenceAddress` (`correspondenceAddress`),
  ADD UNIQUE KEY `beneficialOwner` (`beneficialOwner`),
  ADD UNIQUE KEY `firstSection` (`firstSection`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardiandetails`
--
ALTER TABLE `guardiandetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guardian_province` (`guardian_province`),
  ADD UNIQUE KEY `guardian_zone` (`guardian_zone`),
  ADD UNIQUE KEY `guardian_district` (`guardian_district`),
  ADD UNIQUE KEY `guardian_citizenshiptIssueDistrict` (`guardian_citizenshiptIssueDistrict`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nomineedetails`
--
ALTER TABLE `nomineedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupationdetails`
--
ALTER TABLE `occupationdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `occupationType` (`occupationType`),
  ADD UNIQUE KEY `businessType` (`businessType`),
  ADD UNIQUE KEY `income` (`income`);

--
-- Indexes for table `occupationtype`
--
ALTER TABLE `occupationtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherdocuments`
--
ALTER TABLE `otherdocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permanentaddress`
--
ALTER TABLE `permanentaddress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permanent_province` (`permanent_province`),
  ADD UNIQUE KEY `permanent_zone` (`permanent_zone`),
  ADD UNIQUE KEY `permanent_district` (`permanent_district`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bankaccounttype`
--
ALTER TABLE `bankaccounttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficialowner`
--
ALTER TABLE `beneficialowner`
  MODIFY `beneficialowner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `businesstype`
--
ALTER TABLE `businesstype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificatedetails`
--
ALTER TABLE `certificatedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `correspondenceaddress`
--
ALTER TABLE `correspondenceaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `firstsection`
--
ALTER TABLE `firstsection`
  MODIFY `firstsection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guardiandetails`
--
ALTER TABLE `guardiandetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nomineedetails`
--
ALTER TABLE `nomineedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `occupationdetails`
--
ALTER TABLE `occupationdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `occupationtype`
--
ALTER TABLE `occupationtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `otherdocuments`
--
ALTER TABLE `otherdocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permanentaddress`
--
ALTER TABLE `permanentaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD CONSTRAINT `bankdetails_ibfk_1` FOREIGN KEY (`bank`) REFERENCES `bank` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `beneficialowner`
--
ALTER TABLE `beneficialowner`
  ADD CONSTRAINT `beneficialowner_ibfk_1` FOREIGN KEY (`title`) REFERENCES `title` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `certificatedetails`
--
ALTER TABLE `certificatedetails`
  ADD CONSTRAINT `certificatedetails_ibfk_1` FOREIGN KEY (`citizenshipIssueDistrict`) REFERENCES `district` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `certificatedetails_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `correspondenceaddress`
--
ALTER TABLE `correspondenceaddress`
  ADD CONSTRAINT `correspondenceaddress_ibfk_1` FOREIGN KEY (`correspondence_province`) REFERENCES `province` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `correspondenceaddress_ibfk_2` FOREIGN KEY (`correspondence_district`) REFERENCES `district` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `correspondenceaddress_ibfk_3` FOREIGN KEY (`correspondence_zone`) REFERENCES `zone` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`guardianDetails`) REFERENCES `guardiandetails` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `form_ibfk_10` FOREIGN KEY (`nomineeDetails`) REFERENCES `nomineedetails` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `form_ibfk_2` FOREIGN KEY (`beneficialOwner`) REFERENCES `beneficialowner` (`beneficialowner_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `form_ibfk_3` FOREIGN KEY (`certificateDetails`) REFERENCES `certificatedetails` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `form_ibfk_4` FOREIGN KEY (`otherDocuments`) REFERENCES `otherdocuments` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `form_ibfk_5` FOREIGN KEY (`firstSection`) REFERENCES `firstsection` (`firstsection_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `form_ibfk_6` FOREIGN KEY (`permanentAddress`) REFERENCES `permanentaddress` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `form_ibfk_7` FOREIGN KEY (`correspondenceAddress`) REFERENCES `correspondenceaddress` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `form_ibfk_8` FOREIGN KEY (`occupationDetails`) REFERENCES `occupationdetails` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `form_ibfk_9` FOREIGN KEY (`bankDetails`) REFERENCES `bankdetails` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `guardiandetails`
--
ALTER TABLE `guardiandetails`
  ADD CONSTRAINT `guardiandetails_ibfk_1` FOREIGN KEY (`guardian_zone`) REFERENCES `zone` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `guardiandetails_ibfk_2` FOREIGN KEY (`guardian_district`) REFERENCES `district` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `guardiandetails_ibfk_3` FOREIGN KEY (`guardian_province`) REFERENCES `province` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `guardiandetails_ibfk_4` FOREIGN KEY (`guardian_citizenshiptIssueDistrict`) REFERENCES `district` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `occupationdetails`
--
ALTER TABLE `occupationdetails`
  ADD CONSTRAINT `occupationdetails_ibfk_1` FOREIGN KEY (`businessType`) REFERENCES `businesstype` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `occupationdetails_ibfk_2` FOREIGN KEY (`occupationType`) REFERENCES `occupationtype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `occupationdetails_ibfk_3` FOREIGN KEY (`income`) REFERENCES `income` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permanentaddress`
--
ALTER TABLE `permanentaddress`
  ADD CONSTRAINT `permanentaddress_ibfk_1` FOREIGN KEY (`permanent_province`) REFERENCES `province` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `permanentaddress_ibfk_2` FOREIGN KEY (`permanent_zone`) REFERENCES `zone` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `permanentaddress_ibfk_3` FOREIGN KEY (`permanent_district`) REFERENCES `district` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
