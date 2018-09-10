-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2018 at 10:20 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `judahtips`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `job_activities` text NOT NULL,
  `related_occupations` text NOT NULL,
  `educational_req` text NOT NULL,
  `further_studies` text NOT NULL,
  `entry_to_work` text NOT NULL,
  `level_of_skills` text NOT NULL,
  `employment_indicators` text NOT NULL,
  `possible_employers` text NOT NULL,
  `contact_details` text NOT NULL,
  `career_progress` text NOT NULL,
  `emp_stability` text NOT NULL,
  `career_consideration` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `name`, `description`, `job_activities`, `related_occupations`, `educational_req`, `further_studies`, `entry_to_work`, `level_of_skills`, `employment_indicators`, `possible_employers`, `contact_details`, `career_progress`, `emp_stability`, `career_consideration`, `created`, `modified`) VALUES
(2, 'Accountant', '<p><b>Description – what is this occupation?</b><br></p><p>In a company, the accountant is at the focus of all business activities. The main responsibility of an</p><p>accountant is to analyse and evaluate financial information and to effectively communicate the results to</p><p>senior management to enable them to make good business decisions.</p>', '<p><b>Typical Job Activities – what will I do in this occupation?</b><br></p><p>Very often the accountant is part of the senior management team, in which case you will use the</p><p>information to make decisions, convince your senior management colleagues of a certain course of action</p><p>and then implement that action. The services of a well-qualified accountant are indispensable in modern</p><p>business world as you provide the knowledge and skills that enable businesses to run effectively.</p><p>This pivotal role in business is the reason that many accountants rise quickly to senior management</p><p>positions. Chartered accountants, because of their rigorous training, are most in demand. Accounting</p><p>graduates with lower qualifications will probably work as accounting officers and will not usually rise to the</p><p>same levels of seniority.</p><p>Accountants can specialise in any one of the following fields of accountancy:</p><p>Auditing, pure accounting, taxation, legal accounting, financial accounting, management accounting,</p><p>computer accounting, cost and management accounting.</p>', '<div><b>Related Occupations – which occupations are more or less the same?</b><br></div><div>- Actuary</div><div>- Assessor</div><div>- Auditor</div><div>- Bank official</div><div>- Bookkeeper</div><div>- Chartered accountant</div><div>- Cost and management accountant</div><div>- Financial analyst</div><div>- Financial consultant</div><div>- Loan officer</div><div>- Marketing manager</div><div>- Valuer/Appraiser</div>', '<p><b>Educational Requirements - which qualifications do I need to enter this occupation?</b><br></p><ul><li>Exceptionally High 4-7 years University/Technikon Studies</li><li>High 3-4 years University/Technikon Studies</li><li>Moderate 1-3 Years FET or practical training</li><li>Low One year or less or on the job training</li></ul><p><span style="color: rgb(51, 51, 51); font-weight: 700;">Entry to Tertiary or Further Studies</span></p><ul><li>Senior Certificate with matric exemption for a degree course.</li><li>Senior Certificate for a diploma course.</li><li>COMPULSORY SUBJECTS: Mathematics</li></ul><p>RECOMMENDED SUBJECTS: Accounting, Economics, Business Economics</p><p></p><p><ul></ul></p><p><span style="font-weight: 700;">Entry to Work Place</span><br></p><p></p><p></p><p>Diploma or degree with accounting or auditing subjects. Sometimes you can enter with a Grade 12 with accountancy as a subject. However further studies would be required.</p><p></p><p><span style="color: rgb(51, 51, 51); font-weight: 700;"><br></span></p><p><br></p>', '<p><br></p>', '<p><br></p>', '<p><br></p><table class="table table-bordered"><tbody><tr><td>Exceptionally High<br></td><td><b>High</b><br></td><td>Moderate<br></td><td>Low<br></td></tr></tbody></table><p>An accountant should:</p><p>- have integrity;</p><p>- have a strong aptitude for Mathematics;</p><p>- be intelligent and able to make sound judgements;</p><p>- be able to analyse, compare and interpret facts and figures quickly;</p><p>- be able to work accurately and convey recommendations clearly</p>', '<p><b>Employment Indicators – what are the important employment facts regarding this occupation</b></p><p><b>Employment Opportunities in South Africa for this Career</b></p><table class="table table-bordered" style="width: 1177.78px;"><tbody><tr><td style="line-height: 1.42857;">Exceptionally High<br></td><td style="line-height: 1.42857;"><span style="font-weight: 700;">High</span><br></td><td style="line-height: 1.42857;">Moderate<br></td><td style="line-height: 1.42857;">Low</td></tr></tbody></table><p><b>Supply of People</b></p><p>The number of people with the qualifications, skills (able to do it) or interest in this career, that I have to compete with</p><table class="table table-bordered" style="width: 1177.78px;"><tbody><tr><td style="line-height: 1.42857;"></td><td style="line-height: 1.42857;">Exceptionally High number</td><td style="line-height: 1.42857;">of people</td><td style="line-height: 1.42857;">High number of people<br></td><td style="line-height: 1.42857;"><b>Moderate number of people</b><br></td><td style="line-height: 1.42857;">Low number of people<br></td></tr></tbody></table><p><b>Income Potential</b><br></p><p></p><p>Estimated average income for people in this occupation (excluding extreme examples of high or low income):</p><table class="table table-bordered" style="width: 1177.78px;"><tbody><tr><td style="line-height: 1.42857;">R300 000+per year<br></td><td style="line-height: 1.42857;"><b>R144 000 - R300 000</b><br></td><td style="line-height: 1.42857;">R60 000 - R144 000<br></td><td style="line-height: 1.42857;"><p>R 60 000 per year</p></td></tr></tbody></table>\r\n<p><b>Income based on Performance</b></p><p>What is the chance to improve my pay in this occupation through exceptional performance, skills or business ideas?</p>\r\n<table class="table table-bordered" style="width: 1177.78px;"><tbody><tr><td style="line-height: 1.42857;">Exceptionally High<br></td><td style="line-height: 1.42857;"><span style="font-weight: 700;">High</span><br></td><td style="line-height: 1.42857;">Moderate<br></td><td style="line-height: 1.42857;"><p>Low</p></td></tr></tbody></table>\r\n<p><b>Self Employment</b></p><p>Can I use this career to work for myself or to start a small company in this career field?<br></p>\r\n<table class="table table-bordered" style="width: 1177.78px;"><tbody><tr><td style="line-height: 1.42857;">Exceptionally High<br></td><td style="line-height: 1.42857;"><span style="font-weight: 700;">High</span><br></td><td style="line-height: 1.42857;">Moderate<br></td><td style="line-height: 1.42857;">Low</td></tr></tbody></table><p><b>General Management Opportunities</b></p><p>What is the potential to use this occupation as a platform to become a general manager in a medium to big company or</p><p>organisation?</p><table class="table table-bordered" style="width: 1177.78px;"><tbody><tr><td style="line-height: 1.42857;">Exceptionally High<br></td><td style="line-height: 1.42857;"><span style="font-weight: 700;">High</span><br></td><td style="line-height: 1.42857;">Moderate<br></td><td style="line-height: 1.42857;">Low</td></tr></tbody></table><p><b>International Employment Market</b></p><p>What is the chance of being able to use this career’s qualifications and skills in the international labour market?</p><table class="table table-bordered" style="width: 1177.78px;"><tbody><tr><td style="line-height: 1.42857;">Exceptionally High<br></td><td style="line-height: 1.42857;"><span style="font-weight: 700;">High</span><br></td><td style="line-height: 1.42857;">Moderate<br></td><td style="line-height: 1.42857;">Low</td></tr></tbody></table>', '<p><b>Possible Employers – where do I find this occupation?</b></p><ul><li>Government (national,provincial, localcouncils andgovernment relateorganisations likeuniversities, semigovernment,etc.</li><li>Big private companies</li><li>Medium or small companies Self-employed: Contractor, consultant, own practise, freelance</li></ul><p></p><p></p><p>Employment opportunities for accountants are excellent. The demand for their skills usually exceeds the availability of qualified people in the job market, so the financial rewards are generally substantially more attractive than in most other careers.</p><p>- Stay on with the company where he received practical training</p><p>- Registered firms of practising chartered accountants</p><p>- In commerce and all kinds of industries</p><p>- Technikons and Colleges as lecturers</p>', '<p><b>Relevant Contact Details – where can I get more information on this occupation?</b></p><p>- The South African Institute of Chartered Accountants, P.O. Box 59875, Kengray, Johannesburg, 2100. Tel: (011)</p><p>6216600 Fax: (011) 622 3321 Website: www.saica.co.za</p><p>- South African Institute for Business Accountants, P.O. Box 362, Rand &amp; Dal. Tel: (011) 6603837.</p><p>- Public Accounts\' and Auditors\' Board, P.O. Box 751595, Gardenview, 2047. Tel: (011) 6228533.</p><p>- The Institute of Commercial and Financial Accountants of Southern Africa, P.O. Box 1791, Houghton, 2041. Tel:</p><p>(011) 4860283 Fax: (011) 4860632 Website: www.cfa-sa.co.za</p><p><b></b><br></p>', '<p><b>Career Progress and Path</b></p><p><b>Activities to enhance career progress – what can I do to improve my career progress in this occupation?</b></p><ul><li>Further Studies in the specific career field</li><li>Further studies in related fields</li><li>Experience in specific field</li><li>Work performance</li><li>Experience in related fields</li><li>General management studies</li></ul><p><b></b><br></p>', '<p><b>Employment Stability</b></p><p>Is the demand (the need) for this particular skills stable over the years?</p><table class="table table-bordered"><tbody><tr><td>Exceptionally Stable<br></td><td><b>Very stable</b><br></td><td>Moderately stable<br></td><td>Not very stable<br></td></tr></tbody></table><p><b>The need for people in this occupation and with these skills is influenced by:</b></p><ul><li>Government policy and legislation</li><li>Government strategy and activities</li><li>The growth of private companies (big and small)</li><li>Technology </li><li>Direct consumer demands – “man in the street” </li><li>My own performance and skills</li></ul><p><br></p>', '<p><b>Possible reasons to consider this career – I should consider this career if I want a job where:</b></p><ul><li>The job is ideal for becoming a general manager</li><li>I can study for a number of years and face intellectual challenges</li><li>I am very interested in a specific subject or field</li><li>I can progress in the business world</li><li>I can apply my special skills</li><li>I can work with numbers</li></ul>', '2018-08-18 18:37:19', '2018-08-18 22:07:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
