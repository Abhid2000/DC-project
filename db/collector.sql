-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 04:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collector`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(255) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'Collector', 'collector@224#');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_birth`
--

CREATE TABLE `tbl_birth` (
  `id` int(255) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `salutation` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `fsalutation` varchar(500) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `birthtime` varchar(500) NOT NULL,
  `birthplace` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `street` varchar(500) NOT NULL,
  `section` varchar(500) NOT NULL,
  `building` varchar(500) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `district` varchar(500) NOT NULL,
  `taluka` varchar(500) NOT NULL,
  `village` varchar(500) NOT NULL,
  `pincode` varchar(500) NOT NULL,
  `phoneno` varchar(500) NOT NULL,
  `panno` varchar(500) NOT NULL,
  `aadhaar` varchar(500) NOT NULL,
  `paadhaarpic` varchar(500) NOT NULL,
  `pbirth` varchar(500) NOT NULL,
  `birthletter` varchar(500) NOT NULL,
  `marriage` varchar(500) NOT NULL,
  `agreement` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_birth`
--

INSERT INTO `tbl_birth` (`id`, `user_id`, `type`, `salutation`, `name`, `fsalutation`, `fname`, `dob`, `birthtime`, `birthplace`, `gender`, `address`, `street`, `section`, `building`, `landmark`, `district`, `taluka`, `village`, `pincode`, `phoneno`, `panno`, `aadhaar`, `paadhaarpic`, `pbirth`, `birthletter`, `marriage`, `agreement`, `status`, `added_on`) VALUES
(1, '1', 'Birth Certificate', 'Mr.', 'Ashish Kawale', 'Mr.', 'Wasudeo Kawale', '2022-05-18', '1:15 AM', 'Hinganghat', 'Male', 'Gadchiroli', 'Sai Nagari', 'Mata Mandir Ward', '321', 'near mata mandir', 'wardha', 'Hinganghat', 'Hinganghat', '442301', '+918830783878', 'GHGHJH889H', '34356577657', 'counselor-img.jpg', 'discover-bg.jpg', 'discover-img.jpg', 'discover-img-3.jpg', 'agree', 'Done', '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_caste`
--

CREATE TABLE `tbl_caste` (
  `id` int(255) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `salutation` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `fsalutation` varchar(500) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `occupation` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `street` varchar(500) NOT NULL,
  `section` varchar(500) NOT NULL,
  `building` varchar(500) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `district` varchar(500) NOT NULL,
  `taluka` varchar(500) NOT NULL,
  `village` varchar(500) NOT NULL,
  `pincode` varchar(500) NOT NULL,
  `phoneno` varchar(500) NOT NULL,
  `panno` varchar(500) NOT NULL,
  `aadhaar` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `aadhaarpic` varchar(500) NOT NULL,
  `ration` varchar(500) NOT NULL,
  `birth` varchar(500) NOT NULL,
  `caste` varchar(500) NOT NULL,
  `voter` varchar(500) NOT NULL,
  `residance` varchar(500) NOT NULL,
  `income` varchar(500) NOT NULL,
  `agreement` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_caste`
--

INSERT INTO `tbl_caste` (`id`, `user_id`, `type`, `salutation`, `name`, `fsalutation`, `fname`, `dob`, `age`, `gender`, `occupation`, `address`, `street`, `section`, `building`, `landmark`, `district`, `taluka`, `village`, `pincode`, `phoneno`, `panno`, `aadhaar`, `email`, `photo`, `aadhaarpic`, `ration`, `birth`, `caste`, `voter`, `residance`, `income`, `agreement`, `status`, `added_on`) VALUES
(2, '1', 'Caste Certificate', 'Mr.', 'Ashish Kawale', 'Mr.', 'Wasudeo Kawale', '2022-05-19', '25', 'Male', 'Worker', 'Gadchiroli', 'Sai Nagari', 'Mata Mandir Ward', '321', 'near mata mandir', 'wardha', 'Hinganghat', 'Hinganghat', '442301', '+918830783878', 'GHGHJH889H', '34356577657', 'ak84637@gmail.com', 'advertizing.jpg', 'blog-details.jpg', 'comment-1.jpg', 'comment-2.jpg', 'OBC', 'comment-3.jpg', 'coming-soon-bg.jpg', 'contact-bg.jpg', 'agree', 'Done', '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `id` int(255) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `salutation` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `doc` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `street` varchar(500) NOT NULL,
  `section` varchar(500) NOT NULL,
  `building` varchar(500) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `district` varchar(500) NOT NULL,
  `taluka` varchar(500) NOT NULL,
  `village` varchar(500) NOT NULL,
  `pincode` varchar(500) NOT NULL,
  `laddress` varchar(500) NOT NULL,
  `pdesc` text NOT NULL,
  `lphoto` varchar(500) NOT NULL,
  `agreement` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`id`, `user_id`, `salutation`, `name`, `gender`, `doc`, `address`, `street`, `section`, `building`, `landmark`, `district`, `taluka`, `village`, `pincode`, `laddress`, `pdesc`, `lphoto`, `agreement`, `status`, `added_on`) VALUES
(1, '1', 'Mr.', 'Ashish Kawale', 'Male', '2022-05-22', 'Gadchiroli', 'Sai Nagari', 'Mata Mandir Ward', '321', 'near mata mandir', 'wardha', 'Hinganghat', 'Hinganghat', '442301', 'sant dnyaneshwar ward', 'jkgjhgfhhb hkjbkjk hjb lhhlhkh hl hlhl hlh kjhklhoiloohigf igifgg gugj', 'collector1.jpg', 'agree', 'Processing', '2022-05-22 02:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_councilor`
--

CREATE TABLE `tbl_councilor` (
  `id` int(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `images` varchar(500) NOT NULL,
  `fblink` varchar(500) NOT NULL,
  `instalink` varchar(500) NOT NULL,
  `twitterlink` varchar(500) NOT NULL,
  `linkedin` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_councilor`
--

INSERT INTO `tbl_councilor` (`id`, `name`, `designation`, `images`, `fblink`, `instalink`, `twitterlink`, `linkedin`) VALUES
(1, 'Ashish Kawale1', 'Web Developer1', 'event-4.jpg', 'https://facebook.com1', 'https://instagram.com1', 'https://twitter.com1', 'https://linkedin.com1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_death`
--

CREATE TABLE `tbl_death` (
  `id` int(255) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `salutation` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `dod` date NOT NULL,
  `gender` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `street` varchar(500) NOT NULL,
  `section` varchar(500) NOT NULL,
  `building` varchar(500) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `district` varchar(500) NOT NULL,
  `taluka` varchar(500) NOT NULL,
  `village` varchar(500) NOT NULL,
  `pincode` varchar(500) NOT NULL,
  `aadhaar` varchar(500) NOT NULL,
  `aadhaarpic` varchar(500) NOT NULL,
  `birth` varchar(500) NOT NULL,
  `ration` varchar(500) NOT NULL,
  `medical` varchar(500) NOT NULL,
  `deathslip` varchar(500) NOT NULL,
  `agreement` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_death`
--

INSERT INTO `tbl_death` (`id`, `user_id`, `type`, `salutation`, `name`, `dod`, `gender`, `address`, `street`, `section`, `building`, `landmark`, `district`, `taluka`, `village`, `pincode`, `aadhaar`, `aadhaarpic`, `birth`, `ration`, `medical`, `deathslip`, `agreement`, `status`, `added_on`) VALUES
(1, '1', 'Death Certificate', 'Mr.', 'Ashish Kawale', '2022-05-22', 'Male', 'Gadchiroli', 'Sai Nagari', 'Mata Mandir Ward', '321', 'near mata mandir', 'wardha', 'Hinganghat', 'Hinganghat', '442301', '34356577657', 'coming-soon-bg.jpg', 'contact-bg.jpg', 'counselor-img.jpg', 'counselor-img-2.jpg', 'discover-img.jpg', 'agree', 'Done', '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `id` int(255) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `salutation` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `fsalutation` varchar(500) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `income` varchar(500) NOT NULL,
  `incomeyear` varchar(500) NOT NULL,
  `income_words` varchar(500) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `street` varchar(500) NOT NULL,
  `section` varchar(500) NOT NULL,
  `building` varchar(500) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `district` varchar(500) NOT NULL,
  `taluka` varchar(500) NOT NULL,
  `village` varchar(500) NOT NULL,
  `pincode` varchar(500) NOT NULL,
  `phoneno` varchar(500) NOT NULL,
  `panno` varchar(500) NOT NULL,
  `aadhaar` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `aadhaarpic` varchar(500) NOT NULL,
  `ration_voting` varchar(500) NOT NULL,
  `birth_school_pan` varchar(500) NOT NULL,
  `frm16_tax_salary` varchar(500) NOT NULL,
  `agreement` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_documents`
--

INSERT INTO `tbl_documents` (`id`, `user_id`, `type`, `salutation`, `name`, `fsalutation`, `fname`, `income`, `incomeyear`, `income_words`, `reason`, `dob`, `age`, `gender`, `occupation`, `address`, `street`, `section`, `building`, `landmark`, `district`, `taluka`, `village`, `pincode`, `phoneno`, `panno`, `aadhaar`, `email`, `photo`, `aadhaarpic`, `ration_voting`, `birth_school_pan`, `frm16_tax_salary`, `agreement`, `status`, `added_on`) VALUES
(1, '1', 'Income Certificate', 'Mr.', 'Ashish Kawale', 'Mr.', 'Wasudeo Kawale', '50,000', '2022 - 2023', 'Fifty Thousand', 'Education', '2022-05-03', '25', 'Male', 'Worker', 'Gadchiroli', 'Sai Nagari', 'Mata Mandir Ward', '321', 'near mata mandir', 'wardha', 'Hinganghat', 'Hinganghat', '442301', '+918830783878', 'GHGHJH889H', '34356577657', 'ak84637@gmail.com', 'event-details.jpg', 'advertizing.jpg', 'blog-details.jpg', 'comment-1.jpg', 'comment-3.jpg', 'agree', 'Done', '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `images` varchar(500) NOT NULL,
  `edate` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `puser` varchar(500) NOT NULL,
  `shortdesc` varchar(500) NOT NULL,
  `longdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `images`, `edate`, `address`, `puser`, `shortdesc`, `longdesc`) VALUES
(1, 'Responds to citizens advice1', 'event-6.jpg', '2022-05-20', '318, Radhika Hall, Sitabuldi, Nagpur', 'Andrew lawson23', 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla quis lorem ut libero malesuada feugiat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim. adipiscing elit2222222222222', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur commodo. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem ex necessitatibus dolor placeat fuga deleniti doloremque? Ratione officia quia aliquam possimus Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.33333333333333333');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `ndate` date NOT NULL,
  `puser` varchar(500) NOT NULL,
  `shortdesc` varchar(500) NOT NULL,
  `longdesc` text NOT NULL,
  `images` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title`, `ndate`, `puser`, `shortdesc`, `longdesc`, `images`) VALUES
(1, 'Responds to citizens advice1', '2022-05-18', 'Andrew lawson1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n\r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.222', 'event-details.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `id` int(255) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tender`
--

CREATE TABLE `tbl_tender` (
  `id` int(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `images` varchar(500) NOT NULL,
  `headings` varchar(500) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tender`
--

INSERT INTO `tbl_tender` (`id`, `title`, `images`, `headings`, `description`) VALUES
(5, 'Nagpur City Ring Road-Package - II', 'thumb1.jpg', 'Project Details', 'Four-lane standalone Ring Road / Bypass (km 34.5- 62.035) for Nagpur city package\r\n\r\n\r\n\r\nProject Asset  Nagpur City Ring Road-Package - II\r\n\r\nLane kms    :	138.0\r\nAuthority    :	NHAI\r\nState	     :  Maharashtra\r\nBidder	     :  MEPIDL – Sanjose India JV\r\nMEPIDL’s Stake   :	74%\r\nBid Project Cost (BPC)    :	INR 6,390.0 Mn\r\nConstruction Period       :	2.5 Years\r\nConcession Period          :	15 Years');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tender_details`
--

CREATE TABLE `tbl_tender_details` (
  `id` int(255) NOT NULL,
  `tender_id` varchar(500) NOT NULL,
  `tender_images` varchar(500) NOT NULL,
  `headingsd` varchar(500) NOT NULL,
  `descriptiond` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `number` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `number`, `password`) VALUES
(1, 'Ashish Kawale', 'ak84637@gmail.com', '+918830783878', 'Ashish@224#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_birth`
--
ALTER TABLE `tbl_birth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_caste`
--
ALTER TABLE `tbl_caste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_councilor`
--
ALTER TABLE `tbl_councilor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_death`
--
ALTER TABLE `tbl_death`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tender`
--
ALTER TABLE `tbl_tender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tender_details`
--
ALTER TABLE `tbl_tender_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_birth`
--
ALTER TABLE `tbl_birth`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_caste`
--
ALTER TABLE `tbl_caste`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_councilor`
--
ALTER TABLE `tbl_councilor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_death`
--
ALTER TABLE `tbl_death`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tender`
--
ALTER TABLE `tbl_tender`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tender_details`
--
ALTER TABLE `tbl_tender_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
