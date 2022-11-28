-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 08:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ll-elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_id`, `firstname`, `lastname`, `email`, `gender`, `password`, `status`, `date_created`, `date_modified`) VALUES
(1, 38, 'Rodelio B.', 'Domingo Jr.', 'rodel@sample.com', 'Male', 'admin', 'active', '2022-06-22 14:59:20.000000', '2022-06-22 14:59:20.000000');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(100) NOT NULL,
  `student_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL,
  `time` time(6) NOT NULL,
  `status` varchar(10) NOT NULL,
  `notif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `student_id`, `name`, `email`, `subject`, `message`, `date_created`, `date_modified`, `time`, `status`, `notif`) VALUES
(1, 0, 'Rodelio B. Domingo Jr.', 'rodeliobdomingojr@gmail.com', 'Sample Con', 'Ayoko ng tumanda', '2022-10-05 04:27:34.000000', '2022-10-05 04:27:34.000000', '00:00:00.000000', 'active', ''),
(2, 0, 'Rodelio Domingo', 'rodeliobdomingojr@gmail.com', 'Sample Aga', 'Ngayon tama na lahat ng bagay dito sa mundong ibabaw\r\n', '2022-10-05 04:28:21.000000', '2022-10-05 04:28:21.000000', '00:00:00.000000', 'active', ''),
(3, 0, 'Rodelio Domingo', 'rodeliobdomingojr@gmail.com', 'Sample Aga', 'Ngayon tama na lahat ng bagay dito sa mundong ibabaw\r\n', '2022-10-05 04:29:44.000000', '2022-10-05 04:29:44.000000', '00:00:00.000000', 'active', ''),
(4, 0, 'Rodelio Domingo', 'rodeliobdomingojr@gmail.com', 'Sample Aga', 'Ngayon tama na lahat ng bagay dito sa mundong ibabaw\r\n', '2022-10-05 04:29:52.000000', '2022-10-05 04:29:52.000000', '00:00:00.000000', 'active', ''),
(5, 0, 'Rodelio Domingo', 'rodeliobdomingojr@gmail.com', 'Sample Aga', 'Ngayon tama na lahat ng bagay dito sa mundong ibabaw\r\n', '2022-10-05 04:30:13.000000', '2022-10-05 04:30:13.000000', '00:00:00.000000', 'active', 'pending'),
(6, 0, '', '', 'Day 1', 'Sample Message', '2022-10-06 09:43:28.000000', '2022-10-06 09:43:28.000000', '00:00:00.000000', 'active', 'pending'),
(7, 0, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Sample Message 2', '2022-10-06 09:49:58.000000', '2022-10-06 09:49:58.000000', '00:00:00.000000', 'active', 'pending'),
(8, 0, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Sample 3', '2022-10-06 09:51:45.000000', '2022-10-06 09:51:45.000000', '00:00:00.000000', 'active', 'pending'),
(9, 0, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1 ', 'Sample to pass Student id', '2022-10-06 09:55:06.000000', '2022-10-06 09:55:06.000000', '00:00:00.000000', 'active', 'pending'),
(10, 45, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Game, sending student id\r\n', '2022-10-06 10:04:00.000000', '2022-10-06 10:04:00.000000', '00:00:00.000000', 'active', 'pending'),
(11, 45, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Sending back history', '2022-10-06 10:05:12.000000', '2022-10-06 10:05:12.000000', '00:00:00.000000', 'active', 'pending'),
(12, 45, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'sending back to broom broom', '2022-10-06 10:05:24.000000', '2022-10-06 10:05:24.000000', '00:00:00.000000', 'active', 'pending'),
(13, 45, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Staying to contact site', '2022-10-06 10:05:51.000000', '2022-10-06 10:05:51.000000', '00:00:00.000000', 'active', 'pending'),
(14, 45, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Including the connection', '2022-10-06 10:06:59.000000', '2022-10-06 10:06:59.000000', '00:00:00.000000', 'active', 'pending'),
(15, 45, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Including the connection 2', '2022-10-06 10:07:19.000000', '2022-10-06 10:07:19.000000', '00:00:00.000000', 'active', 'viewed'),
(16, 45, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Including the connection and sending back to history', '2022-10-06 10:07:50.000000', '2022-10-06 10:07:50.000000', '00:00:00.000000', 'active', 'viewed'),
(17, 45, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Broom b', '2022-10-06 10:08:47.000000', '2022-10-06 10:08:47.000000', '02:20:03.000000', 'active', 'viewed'),
(18, 45, 'Rodelio Domingo', 'rodelio@student.com', 'Day 1', 'Veiwing Message', '2022-10-06 10:11:29.000000', '2022-10-06 10:11:29.000000', '00:00:00.000000', 'active', 'viewed'),
(19, 45, 'Rodelio Domingo', 'rodelio@student.com', 'I want you', 'that my life is broom broom', '2022-10-06 10:17:21.000000', '2022-10-06 10:17:21.000000', '00:00:00.000000', 'active', 'viewed'),
(20, 0, 'My time', 'Your@time.com', 'time', 'example time', '2022-10-24 02:28:15.000000', '2022-10-24 02:28:15.000000', '02:40:03.000000', 'active', 'viewed'),
(22, 0, 'Luh time', 'time@sample.com', 'time ko to', 'my time\r\n', '2022-10-24 02:40:03.000000', '2022-10-24 02:40:03.000000', '02:40:03.000000', 'active', 'viewed'),
(23, 0, 'High', 'high@sample.com', 'High this ', 'Broom Broom', '2022-10-24 04:12:09.000000', '2022-10-24 04:12:09.000000', '04:12:09.000000', 'active', 'viewed'),
(24, 0, 'Rodelio Gwapo', 'gwapo@sample.com', 'This is th', 'High my name is Rodelio Domingo, I lived in Munoz broom broom\r\n', '2022-11-21 10:44:11.000000', '2022-11-21 10:44:11.000000', '10:44:11.000000', 'active', 'viewed'),
(25, 0, 'Another Notification', 'notif@sample.com', 'Notification Sample', 'Tba=df;kasjdl;fnzxlkdufhaskljdhasdf', '2022-11-21 10:47:06.000000', '2022-11-21 10:47:06.000000', '10:47:06.000000', 'active', 'viewed');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(10) NOT NULL,
  `course_type_id` int(10) NOT NULL,
  `cat_no` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `objectives` varchar(1000) NOT NULL,
  `course_outcomes_id` int(100) NOT NULL,
  `no_of_units` int(10) NOT NULL,
  `hours` int(10) NOT NULL,
  `preq` varchar(10) NOT NULL,
  `course_outline_id` int(10) NOT NULL,
  `lab_equipment` varchar(100) NOT NULL,
  `suggested_reading_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_type_id`, `cat_no`, `name`, `description`, `objectives`, `course_outcomes_id`, `no_of_units`, `hours`, `preq`, `course_outline_id`, `lab_equipment`, `suggested_reading_id`, `status`, `date_created`, `date_modified`) VALUES
(8, 1, 'LITT  1101', 'Introduction to Literature and Literary Studies', ' The course familiarizes the students with the  fundamentals of the scholarly discipline of literary  studies, specifically its history and practice. It prepares  the students for endeavors that require the tools of both scholar5s and lifelong learners, including literary and  rhetorical expressions, critical and imaginative thinking,  creative and effective presentation and productions,  social and cultural analysis, and the basic concepts,  genres, approaches, and methods in such undertakings.', '', 0, 3, 3, '0', 0, 'None', 0, 'active', '2022-07-22 03:23:32.000000', '2022-07-29 10:42:48.000000'),
(9, 1, 'LITT 1102', 'Introduction to Literary Theory', 'The course introduces the students to the scholarly  discipline of literary studies to the basic tools,  techniques, and frameworks. A survey of methods and  key concepts and categories in literary studies, the  course examines how texts (“literary” versus “non￾literary”) are produced and read. It explores  fundamental questions that relate to the nature of  literature, the function of interpretation, and the uses of  a broad range of forms of textual communications  today. Organized around the most influential theoretical  paradigms in literary studies, it encourages the students  to appreciate the relevance of description and  evaluatuion of literary works toward developing in them  analytical and interpretive skills needed to engage with  27 Bachelor of Arts in Literature and produce close reading of texts. The intellectual and  practical skills learned from this course may extend into  digital literatures and new media, critical methodologies  used in conjunction with current techn', '', 0, 3, 3, '0', 0, 'None', 0, 'active', '2022-07-22 03:27:42.000000', '2022-07-29 10:57:16.000000'),
(10, 1, 'LITT 2103', 'Introduction to Cultural Theory', 'A survey of theories and methodologies in the  interdisciplinary study of culture, the course examines  how cultural practices are codified, disseminated,  interpreted, and appropriated as texts across a range of  human endeavors. It explores questions that relate to  the production of culture, the social implications of  theory, the use of critique, and the aesthetic of form.  Organized around the most influential theoretical  paradigms in cultural theory today, it encourages the  student to appreciate the relevance of culture in  forming human societies and in securing the survival of  the planet.', '', 0, 3, 3, '0', 0, 'None', 0, 'active', '2022-07-22 03:28:16.000000', '2022-07-22 03:28:16.000000'),
(11, 1, 'LITT 2104', 'Introduction to the Postcolonial Tradition', 'A study of the foundational literary texts from the  decolonizing world, the class introduces the student to  the politics, motifs, and aesthetics of postcolonial  writing. It foregrounds postcolonial texts from the  Philkippines, as well as those from the Filipino diaspora,  and explores them in relation to other postcolonial  traditions in Asia, Africa, the Caribbean, and Latin  America. Approaching literary studies from a  postcolonial perspective, the class encourages the  appreciation of a situated yet comparative knowledge.', '', 0, 3, 3, '0', 0, 'None', 0, 'active', '2022-07-27 01:18:15.000000', '2022-07-27 01:18:15.000000'),
(12, 1, 'LITT 2105', 'Introduction to Creative Writing', 'This introductory course provides a venue to develop  student creativity and fluency in different genres as  well as critical reading of texts through writing  assignments and workshops, acquainting the students  with the literary works of representative authors from  the nation, the region and the world.', 'Write poetry, prose, drama and other hybrid forms. Expose the students to important literary modelsin  major genres and their social relevance. Criticize or review a literary piece in terms of textual  and contextual considerations.  Write a reflection paper on assigned texts applying  basic concepts and methods. Participate in a workshop on a poetry, prose and  drama.', 0, 3, 3, '0', 0, 'None', 0, 'active', '2022-07-27 01:19:12.000000', '2022-07-27 01:28:45.000000'),
(13, 1, 'LITT 2106', 'Introduction to Literature and the Professions', 'The course introduces the students to the range of  theoretical and practical issues in academic and  professional settings involving written, oral and other  communication skills, and documentation and research  principles and protocols intersecting disciplines like  literary and cultural studies, English studies, creative  writing, media studies, education, and communication,  and professions in publishing, advertising, broadcasting,  journalism, law, marketing, customer service, among  others. It also provides hands-on work experience in  literature-specific academic settings and Literaturegeneric careers through the Practicum requirement in  order to meet both disciplinal and professional  outcomes', '', 0, 3, 3, '', 0, '', 0, 'active', '2022-07-27 01:29:35.000000', '2022-07-27 01:29:35.000000'),
(14, 1, 'LITT 2107', 'Literary Research', 'The course introduces the students to various research  methods in literary and cultural studies, and across the  professions. Focus is on skills in analyzing, interpreting  materials, and implementing data/text gathering  36 Bachelor of Arts in Literature protocols and procedures and the theoretical and  conceptual frameworks that influence the methods.  Students are expected to submit a sound and original  research proposal and a draft paper in preparation for  oral defense.', 'Students should be able to: 1. Submit an original and relevant research proposal in  any topic in Philippine literature, including  ruminations on the research methods being  appropriated. 2. Submit a reflective essay discussing the researcher’s  own methods being appropriated. 3. Submit an original and relevant research on any  topic in Philippine literature, including ruminations  on the research methods being appropriated. 4. Submit a reflexive essay discussing the researcher’s  own methods, biases, limitations, etc.', 0, 0, 0, '', 0, '', 0, 'active', '2022-07-27 01:30:36.000000', '2022-07-27 01:30:57.000000'),
(15, 1, 'LITT 2108', 'Introduction to Translation', 'An introduction to the art and practice of translation, as  well as the history of translation theory. The course is  divided into three parts, hoping to provide an analysis  of the process as well as practical advice for intending  translators, namely: the theory of translation, the  practice of translation, and the appreciation of literary  translations as texts. In covering these issues, the  course stresses the importance of understanding the  unfamiliar and the need to see human experience from  as many angles.', '', 0, 3, 3, '', 0, '', 0, 'active', '2022-07-27 01:32:47.000000', '2022-07-27 01:32:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `course_objectives`
--

CREATE TABLE `course_objectives` (
  `c_objective_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `number` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_objectives`
--

INSERT INTO `course_objectives` (`c_objective_id`, `course_id`, `number`, `description`, `date_created`, `date_modified`, `status`) VALUES
(2, 8, 0, 'Geh?', '2022-07-28 10:25:06.000000', '2022-09-28 01:42:56.000000', 'active'),
(3, 11, 0, 'Sample', '2022-07-29 02:14:06.000000', '2022-07-29 02:14:14.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `course_outcomes`
--

CREATE TABLE `course_outcomes` (
  `c_outcome_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `number` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_outcomes`
--

INSERT INTO `course_outcomes` (`c_outcome_id`, `course_id`, `number`, `description`, `date_created`, `date_modified`, `status`) VALUES
(1, 8, 0, 'Identify time periods in the history of literature  and criticism in the West and non-west.', '2022-07-22 02:42:21.000000', '2022-07-27 02:41:08.000000', 'active'),
(2, 8, 0, 'Demonstrate knowledge and understanding of  time periods, basic theoretical and  methodological orientations and literary  movements.?', '2022-07-22 02:43:17.000000', '2022-07-27 02:41:35.000000', 'active'),
(3, 8, 0, 'Read and write critically and creatively in the  understanding of literary studies as practice.', '2022-07-22 03:32:15.000000', '2022-07-27 02:48:04.000000', 'active'),
(4, 8, 0, 'Interpret literary and cultural productions that  are text-specific and context-specific.', '2022-07-22 03:32:30.000000', '2022-07-27 02:38:46.000000', 'active'),
(5, 8, 0, 'Deploy reading and writing strategies in the  production of materials for a variety of rhetorical  contexts, including oral presentations and  creative productions.', '2022-07-22 03:32:59.000000', '2022-07-27 02:40:58.000000', 'active'),
(6, 9, 0, 'The students should be able to write an essay that  draws on a range of critical concepts.', '2022-07-27 01:42:49.000000', '2022-07-27 01:42:49.000000', 'active'),
(11, 8, 0, 'Another Description for outcome', '2022-07-27 02:56:25.000000', '2022-07-29 02:52:56.000000', 'active'),
(13, 10, 0, 'The students should be able to:', '2022-07-27 03:38:02.000000', '2022-07-29 02:14:18.000000', 'active'),
(14, 10, 0, 'A. Write an interdisciplinary essay that draws on a  range of critical concepts in cultural theory;', '2022-07-27 03:38:10.000000', '2022-07-27 03:38:10.000000', 'active'),
(15, 10, 0, 'B. Discern the connection between and among the  disciplines, for example, in an interdisciplinary  essay.', '2022-07-27 03:38:16.000000', '2022-07-27 03:38:16.000000', 'active'),
(16, 10, 0, 'C. Practice interdisciplinary thinking in an applied  study or project.', '2022-07-27 03:38:22.000000', '2022-07-27 03:38:22.000000', 'active'),
(17, 11, 0, 'Students should be able to:', '2022-07-27 03:46:35.000000', '2022-07-27 03:46:35.000000', 'active'),
(18, 11, 0, 'A. Write an essay that draws on a range of critical  concepts;', '2022-07-27 03:46:39.000000', '2022-07-27 03:46:39.000000', 'active'),
(19, 11, 0, 'B. Produce a creative output on a key author;', '2022-07-27 03:46:44.000000', '2022-07-27 03:46:44.000000', 'active'),
(20, 11, 0, 'C. Write a short intellectual biography of a key  figure.', '2022-07-27 03:46:48.000000', '2022-07-27 03:46:48.000000', 'active'),
(21, 13, 0, 'a) Apply close reading of texts in the analysis and  interpretation of texts across the professions,  such as advertising, marketing, media, etc.', '2022-07-27 03:47:32.000000', '2022-07-27 03:47:32.000000', 'active'),
(22, 13, 0, 'b) Deploy critical perspectives in the analysis and  interpretation of texts across the professions.', '2022-07-27 03:47:40.000000', '2022-07-27 03:47:40.000000', 'active'),
(23, 13, 0, 'c) Produce a literary or non-literary text in one of  the genres, forms or types across the  professions.', '2022-07-27 03:47:44.000000', '2022-07-27 03:47:44.000000', 'active'),
(24, 13, 0, 'd) Produce a non-literary text that may be useful  across the professions.', '2022-07-27 03:47:48.000000', '2022-07-27 03:47:48.000000', 'active'),
(25, 13, 0, 'e) With the above-mentioned skills and  competencies, plan and execute written and  non-written work or projects for careers in  which Literature graduates are traditionally  considered highly competitive including Media,  Advertising, Marketing, Administration, Civil  Service, Customer Relations, BPOs, and others.', '2022-07-27 03:47:51.000000', '2022-07-27 03:47:51.000000', 'active'),
(26, 15, 0, 'The students should be able to:', '2022-07-27 03:49:18.000000', '2022-07-27 03:49:18.000000', 'active'),
(27, 15, 0, 'A. Translate a literary text in a chosen genre with an  accompanying critical introduction that reflects on  the process of translation;', '2022-07-27 03:49:23.000000', '2022-07-27 03:49:23.000000', 'active'),
(28, 15, 0, 'B. Deploy the critical apparatus in translation theory;', '2022-07-27 03:49:29.000000', '2022-07-27 03:49:29.000000', 'active'),
(29, 15, 0, 'C. Discern the issues and challenges in the practice of  translation.', '2022-07-27 03:49:37.000000', '2022-07-27 03:49:37.000000', 'active'),
(30, 15, 0, 'D. Know the representative texts in translation', '2022-07-27 03:49:38.000000', '2022-07-27 03:49:38.000000', 'active'),
(31, 15, 0, 'E. Understand the history of translation theory.', '2022-07-27 03:49:43.000000', '2022-07-27 03:49:43.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `course_outline`
--

CREATE TABLE `course_outline` (
  `c_outline_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `number` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_outline`
--

INSERT INTO `course_outline` (`c_outline_id`, `course_id`, `number`, `description`, `date_created`, `date_modified`, `status`) VALUES
(1, 8, 1, 'What is Literary? What is “Theory”? What is  Literature?', '2022-07-25 03:30:06.000000', '2022-07-26 09:23:40.000000', 'active'),
(2, 8, 2, 'History of “theory” from the Ancient to the  Postmodern Period.', '2022-07-25 03:30:46.000000', '2022-07-27 04:15:20.000000', 'active'),
(3, 0, 2, 'History of “theory” from the Ancient to the  Postmodern Period.', '2022-07-25 03:31:39.000000', '2022-07-25 03:31:51.000000', 'active'),
(4, 8, 3, 'Language and Meaning: Poetic,? Narrative,  Dramatic, Rhetorical', '2022-07-25 03:32:51.000000', '2022-07-26 04:49:36.000000', 'active'),
(5, 8, 4, 'Texts and Contexts: text-specific and Context-specific Critical orientations', '2022-07-25 03:33:36.000000', '2022-07-25 03:33:36.000000', 'active'),
(6, 8, 5, 'Concepts, Approaches, Methods', '2022-07-25 03:33:47.000000', '2022-07-29 02:16:21.000000', 'active'),
(7, 9, 1, 'Key theoretical movements in the study of literary from  formalism to posthumanism', '2022-07-27 01:43:49.000000', '2022-07-27 01:44:10.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `course_type`
--

CREATE TABLE `course_type` (
  `ct_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_type`
--

INSERT INTO `course_type` (`ct_id`, `name`, `status`, `date_created`, `date_modified`) VALUES
(1, 'Core Courses', 'active', '2022-06-16 02:02:43.000000', '2022-06-16 02:02:43.000000'),
(2, 'Major Courses', 'active', '2022-06-16 02:03:01.000000', '2022-06-16 02:03:01.000000'),
(3, 'Cognates ( Choice of 3 )', 'active', '2022-06-16 02:03:19.000000', '2022-07-29 10:57:13.000000'),
(4, 'Required Course', 'active', '2022-06-16 02:03:39.000000', '2022-06-16 02:45:01.000000'),
(5, 'Thesis', 'active', '2022-06-16 02:03:50.000000', '2022-06-16 02:44:59.000000'),
(6, 'Computer Applicants 2', 'active', '2022-06-16 02:04:23.000000', '2022-06-16 02:32:32.000000');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `doc_id` int(100) NOT NULL,
  `doc_img` varchar(100) NOT NULL,
  `material_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file_size` int(100) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `file_uploader_id` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_id`, `doc_img`, `material_id`, `title`, `file_size`, `file_type`, `description`, `file_uploader_id`, `date`, `time`, `date_created`, `date_modified`, `status`) VALUES
(3, '', 3, 'GAD_Endorsement-letter-for-Student-Congress_etc__-_DSS', 342780, 'pdf', 'Gad Endorsement letter for student congress', 3, 'Jun 06, 2022', '16:50:34', '2022-06-06 04:50:34', '2022-06-06 04:50:34', 'active'),
(5, '', 2, 'DINIO and PADUA_BALITT-CHANGE-OF-THESIS-COMMITTEE-FORM', 348290, 'pdf', 'Dinio and Padua Balitt', 1, 'Jun 07, 2022', '08:50:41', '2022-06-07 08:50:41', '2022-06-10 12:31:42', 'active'),
(7, '', 3, 'Letter of Intent_CARA_CASS-DEH', 346773, 'pdf', 'Letter Intent', 3, 'Jun 07, 2022', '09:38:43', '2022-06-07 09:38:43', '2022-06-07 09:38:43', 'active'),
(8, '', 8, 'CLSU-GRADUATION-PROTOCOL', 18059, 'docx', 'Graduation Protocol Policy', 1, 'Jun 07, 2022', '09:47:06', '2022-06-07 09:47:06', '2022-06-14 03:59:58', 'active'),
(9, '', 6, 'ESTEBAN, A._LITT 2108', 347276, 'pdf', 'Sir Esteban Syllabi', 3, 'Jun 08, 2022', '13:40:50', '2022-06-08 01:40:50', '2022-06-08 01:40:50', 'active'),
(12, '', 8, 'csc-form-no-48-daily-time-record-dtr', 96455, 'pdf', 'Daily time record', 1, 'Jun 14, 2022', '16:05:06', '2022-06-14 04:05:06', '2022-06-30 11:52:02', 'active'),
(13, '', 8, 'CALICA_Thesis-Proposal-Defense-Schedule-Form', 242451, 'pdf', 'Defense Schedule', 1, 'Jun 14, 2022', '16:05:41', '2022-06-14 04:05:41', '2022-06-14 04:05:41', 'active'),
(14, '', 8, 'CALICA_Thesis-Proposal-Defense-Schedule-Form', 242451, 'pdf', 'Defense Schedule', 1, 'Jun 14, 2022', '16:09:43', '2022-06-14 04:09:43', '2022-06-30 11:51:58', 'active'),
(15, '', 8, 'graduate-program_-for-rqat', 165102, 'pdf', 'Graduate Program', 1, 'Jun 14, 2022', '16:10:33', '2022-06-14 04:10:33', '2022-07-26 04:50:29', 'active'),
(16, '', 1, 'Transcript of records_mclapurga', 1947719, 'pdf', 'Sample life', 3, 'Jun 14, 2022', '16:24:33', '2022-06-14 04:24:33', '2022-07-29 10:57:23', 'active'),
(17, '', 8, 'CALICA_Thesis-Proposal-Defense-Schedule-Form', 242451, 'pdf', 'Thesis Proposal For me', 4, 'Jun 15, 2022', '13:50:16', '2022-06-15 01:50:16', '2022-06-15 01:50:16', 'active'),
(18, '', 6, 'CULMINATING-ACTIVITY_SCORES', 27515, 'docx', 'sample', 4, 'Jun 15, 2022', '14:24:08', '2022-06-15 02:24:08', '2022-08-16 03:42:07', 'active'),
(19, '', 3, 'DEH_LL_VOUCHER', 733894, 'pdf', 'Voucher', 13, 'Jun 16, 2022', '13:29:47', '2022-06-16 01:29:47', '2022-10-07 01:58:25', 'archive'),
(21, '', 8, 'OVPAA-MEMO-NO.-2022-10-05-13-ATTENDANCE-TO-THE-RESEARCH-INNOVATION-AND-DEVELOPMENT-RIDE-FESTIVAL-202', 280561, 'pdf', 'OVPAA MEMO', 1, 'Oct 07, 2022', '13:40:22', '2022-10-07 01:40:22', '2022-10-07 01:40:22', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `link` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `img`, `title`, `description`, `link`, `date_created`, `time_created`, `date_modified`, `time_modified`, `status`) VALUES
(7, 'Screenshot (23).png', 'An overwhelming and remarkable day in TEACH AND REACH 2022!', 'Thank you so much dear participants, resource speakers, organizers, DEH and UGADO for this successful webinar.  Till next time!', '', '2022-08-30', '00:00:00.000000', '2022-11-25', '15:59:30.000000', 'active'),
(10, 'TEACH AND REACH 2022 JPG.jpg', 'Sir Second Photo', 'This Photo Broken', '', '2022-09-05', '00:00:00.000000', '2022-09-28', '00:00:00.000000', 'active'),
(13, 'TEACH AND REACH 2022 JPG.jpg', 'Kaboom', 'Another Sample', '', '2022-09-05', '00:00:00.000000', '2022-09-28', '00:00:00.000000', 'active'),
(16, 'Screenshot (45).png', 'Amazings', 'broom broom Skrt skrt road trip', '', '2022-09-28', '00:00:00.000000', '2022-09-28', '00:00:00.000000', 'active'),
(17, 'Joel.jpg', 'Joel Certificate', 'Broom Broom', '', '2022-09-28', '00:00:00.000000', '2022-09-28', '00:00:00.000000', 'active'),
(18, 'zoom backgroud tar.jpg', 'Dear Participants,  Here is the zoom link for our two-day webinar workshop (Sept. 15-16, 2022).  Tha', 'Topic: TEACH AND REACH 2022: Developing Course Content in Language and Literature Through Gender Responsiveness and Sensitivity  https://zoom.us/j/91474010381... Meeting ID: 914 7401 0381 Passcode: CASSDEH', '', '2022-10-03', '00:00:00.000000', '2022-10-03', '00:00:00.000000', 'active'),
(19, 'moa.jpg', 'MOA SIGNING', 'Another MOA successfully forged for extension project, \"Empowering Teachers through Partnership: Department of English and Humanities and Sto. Tomas Elementary School Team-Up\"  October 20, 2022', '', '2022-11-18', '00:00:00.000000', '2022-11-18', '00:00:00.000000', 'active'),
(20, '316802380_532549848893570_7787520928222799767_n.jpg', 'Back to back extension activities! ', 'The DEH faculty extended their expertise to their partner institutions, Sto. Tomas Elementary School and Palusapis Integrated School (Elementary) through seminar-workshops on Campus Journalism last November 18, 2022 and November 22, 2022 respectively.  The said activities were attended by teachers and students to train and/or assist them in news writing, editorial writing, feature writing, editorial cartooning, sports writing, collab and desktop publishing, radio broadcasting/scriptwriting, science writing and photojournalism in preparation to their incoming Division Press Conference.', 'https://www.facebook.com/englishandhumanities/posts/pfbid0pnopq14fVSS9pkxwj7v7BLeKNYA9swxkbk3FiubAeR', '2022-11-25', '03:14:46.000000', '2022-11-25', '00:00:00.000000', 'active'),
(21, 'moa.jpg', 'Another MOA successfully forged for extension project', 'Another MOA successfully forged for extension project, \"Empowering Teachers through Partnership: Department of English and Humanities and Sto. Tomas Elementary School Team-Up\"  October 20, 2022', 'https://www.facebook.com/englishandhumanities/posts/pfbid0x5ZTfXeFDAKS9JcXzdTsgkn4VWYTZo5vHp6AtPZAox', '2022-11-25', '15:21:50.000000', '2022-11-25', '00:00:00.000000', 'active'),
(23, '316802380_532549848893570_7787520928222799767_n.jpg', 'Moa Signing', 'Broom', '', '2022-11-25', '16:01:08.000000', '2022-11-25', '16:01:08.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `event_photo`
--

CREATE TABLE `event_photo` (
  `ep_id` int(100) NOT NULL,
  `event_id` int(10) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_photo`
--

INSERT INTO `event_photo` (`ep_id`, `event_id`, `image_name`, `status`, `date_created`, `date_modified`) VALUES
(1, 0, '298909100_607719180952165_2904811333870711623_n-1661848812.jpg', '', '2022-08-30 04:40:12.000000', '2022-08-30 04:40:12.000000'),
(2, 0, '299208439_908318250130367_4123392048727828910_n.jpg', '', '2022-08-30 04:40:12.000000', '2022-08-30 04:40:12.000000');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `faculty_id_no` varchar(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middle_initial` varchar(10) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `research` varchar(10000) NOT NULL,
  `position` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `user_id`, `faculty_id_no`, `img`, `firstname`, `middle_initial`, `lastname`, `email`, `gender`, `password`, `research`, `position`, `contact_no`, `address`, `description`, `date_created`, `date_modified`, `status`) VALUES
(1, 39, 'JO-2022', 'Profile Picture.png', 'Rodelio', 'B.', 'Domingo Jr.', 'rodel@faculty.com', 'Female', 'faculty', 'Programming, Cloud, Music, Sports', 'Software Engineer', 0, '', 'Porgrammer', '2022-06-03 10:15:24', '2022-11-24 09:32:24', 'active'),
(3, 43, 'DS-202', '16.png', 'Allan Jay', '', 'Esteban', 'allan@sample.com', 'Male', 'faculty', 'MA Language & Literature', 'Department Secretary', 0, '', 'Research Interest: Language and Culture, Language Learning', '2022-06-03 10:48:57', '2022-10-14 02:56:28', 'active'),
(4, 45, 'DA-203', '3.png', 'Daisy', 'O.', 'Casipit', 'daisy@sample.com', 'Female', 'faculty', 'Language Assessment, Language Pedagogy, Language and Technology, Language and Society, Pragmatics, S', 'Department Secretary', 0, '', 'Assistant Professor', '2022-06-15 10:17:58', '2022-10-17 03:55:49', 'active'),
(5, 46, 'DF-200', '13.png', 'Evelita', 'V.', 'Carla', 'evelita@sample.com', 'Female', 'faculty', 'Cultural Studies, Philippine Literature, Crime Fiction, Graphic Novels/Comics', 'BaLitt 2-2 Adviser', 0, '', 'Faculty', '2022-06-15 01:24:33', '2022-10-17 03:53:59', 'active'),
(6, 47, 'DF-201', '11.png', 'Gina', 'C.', 'Tagasa', 'gina@sample.com', 'Female', 'faculty', 'Language, Arts', 'Balitt 2-1 Adviser', 0, '', 'Faculty', '2022-06-15 01:24:55', '2022-10-04 10:20:44', 'active'),
(7, 48, 'DF-202', '7.png', 'Jenalyn', 'B.', 'Pagay', 'jenalyn@sample.com', 'Female', 'faculty', 'Mass Communication; Journalism; Philippine Studies', 'Dept. Alumni Relations Officer', 0, '', 'Faculty', '2022-06-15 01:25:45', '2022-10-04 10:19:51', 'active'),
(8, 49, 'DF-203', '8.png', 'Joan', 'C.', 'Ravago', 'joan@sample.com', 'Female', 'faculty', 'Discourse Analysis, Sociolinguistics, Critical Discourse', 'Department GAD Focal Person', 0, '', 'Instructor', '2022-06-15 01:27:24', '2022-10-04 10:20:05', 'active'),
(9, 50, 'DF-204', '2.png', 'Karryl Angelie', 'G.', 'Abon-Amis', 'karryl@sample.com', 'Female', 'faculty', 'Cultural Studies, Theoretical Criticism, Gender Studies, Philippine Literature, Creative Writing', 'BALITT3 Adviser', 0, '', 'Faculty', '2022-06-15 01:28:09', '2022-10-14 02:54:59', 'active'),
(10, 51, 'DF-205', '15.png', 'Ken', 'G.', 'Calang', 'ken@sample.com', 'Male', 'faculty', 'Philippine Literature, Diaspora Studies, Media Studies, Drama and Theater, Film and Television, Gend', 'Acting Department Chair', 0, '', 'Faculty', '2022-06-15 01:28:32', '2022-10-14 02:55:33', 'active'),
(11, 52, 'DF-206', '14.png', 'King Philip', 'G.', 'Britanico', 'king@sample.com', 'Male', 'faculty', 'Culture Studies, Media Studies, Film, Rhetoric and Composition', 'Department Registrar, BALITT Council Adviser', 0, '', 'Faculty', '2022-06-15 01:29:15', '2022-10-17 03:55:15', 'active'),
(12, 53, 'DF-207', '5.png', 'Mark Anthony', 'G.', 'Moyano', 'mark@sample.com', 'Male', 'faculty', 'Literary Hermeneutics, Sociology of Literature, Psychology of Literature, Literature Theory and Criticism, Postcolonial Literature, Postmodern Literature, Children And Adolescent Literature, Contemporary and Popular Literature, Philosophy of Literature, Literature of the Americas, and European Literature', 'MALL Program Coordinator', 0, '', 'Faculty Adviser', '2022-06-15 01:30:28', '2022-10-04 10:19:31', 'active'),
(13, 54, 'DF-208', '6.png', 'Princess Mara', 'E.', 'Pagador', 'mara@sample.com', 'Female', 'faculty', 'American Literature, Philippine Literature, Diaspora Studies, Literary Criticism', 'Balitt 1 Adviser', 0, '', 'Faculty', '2022-06-15 01:31:01', '2022-10-04 10:19:43', 'active'),
(14, 55, 'DH-200', '9.png', 'Mercedita', 'M.', 'Reyes', 'merce@sample.com', 'Female', 'faculty', 'Afro-Asian Literature, Philippine Literature, Psychology of Literature, Sociology of Literature, Literary and Gender Studies', 'Head, Department of English and Humanities', 0, '', 'Associate Professor', '2022-06-15 01:31:42', '2022-10-04 10:20:16', 'active'),
(15, 56, 'DF-209', '4.png', 'Sharina Carla', 'S.', 'Merculio', 'sharina@sample.com', 'Female', 'faculty', 'Metadiscourse, Pragmatics, Sociolinguistics, Language Philosopy', 'Department Parent-Teacher Coordinator', 0, '', 'Faculty', '2022-06-15 01:32:15', '2022-10-14 02:56:46', 'active'),
(16, 58, 'DF-206', '17.png', 'Rehuel Nikolai', 'B.', 'Soriano', 'niko@sample.com', 'Male', 'faculty', 'Mythology, Literature and Religion Archetypal Criticism, Comparative Mythology, Game', 'On Study Leave', 0, '', 'Faculty On Study Leave', '2022-07-19 04:19:37', '2022-10-04 10:20:35', 'active'),
(17, 59, 'DF-207', 'martinez.jpg', 'Patricia Anne', 'M.', 'Martinez', 'patricia@sample.com', 'Female', 'faculty', 'Womens Writing, Creative Writing Pedagogy, Multilingualism in Screenplays or Cinema, Writing Across Genres, Creative Nonfiction, Young Adult Literature', 'ABLL 4 Adviser', 0, '', 'Faculty', '2022-07-19 04:21:39', '2022-10-14 02:56:36', 'active'),
(18, 60, 'DF-208', 'Faculty Profile Picture Rene.png', 'Renea Lee', 'B.', 'Alcantara', 'renea@sample.com', 'Female', 'faculty', 'Literary Criticism, Cultural Studies, Gender Studies, Postcolonialism, Film', 'On Study Leave', 0, '', 'Faculty On Study Leave', '2022-07-19 04:24:44', '2022-10-14 02:55:08', 'active'),
(20, 63, 'DF-215', '12.png', 'Kamille', 'K.', 'Dukha', 'kamille.dukha@clsu2.edu.ph', 'Female', 'faculty', 'Folklore in literature, Pop culture, Representation studies, Interface of Language and Literature', 'OSA Secretary', 0, '', '', '2022-10-04 09:42:15', '2022-10-14 02:56:22', 'active'),
(21, 64, 'DF-216', '10.png', 'Christine', 'L.', 'Saturno', 'christine.saturno@clsu2.edu.ph', 'Female', 'FACULTY', 'Culture, Theater, Arts', 'BALITT1-Adviser', 0, '', '', '2022-10-04 09:43:30', '2022-10-04 10:20:26', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_logged`
--

CREATE TABLE `faculty_logged` (
  `log_id` int(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_logged` varchar(10) NOT NULL,
  `time_in` time(6) NOT NULL,
  `time_out` time(6) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gender_user`
--

CREATE TABLE `gender_user` (
  `gender_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `identity` varchar(10) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender_user`
--

INSERT INTO `gender_user` (`gender_id`, `user_id`, `identity`, `date_created`, `date_modified`, `status`) VALUES
(1, 0, 'Male', '2022-10-13 01:52:20.000000', '2022-10-13 01:52:20.000000', 'active'),
(2, 66, 'Male', '2022-10-13 01:54:29.000000', '2022-10-13 01:54:29.000000', 'active'),
(3, 39, 'Male', '2022-10-13 02:42:29.000000', '2022-10-13 03:17:09.000000', 'active'),
(4, 45, 'Female', '2022-10-13 03:07:09.000000', '2022-10-13 03:15:57.000000', 'active'),
(5, 60, 'Female', '2022-10-13 03:16:07.000000', '2022-10-13 03:16:07.000000', 'active'),
(6, 50, 'Female', '2022-10-13 03:16:16.000000', '2022-10-13 03:16:16.000000', 'active'),
(7, 52, 'Male', '2022-10-13 03:16:27.000000', '2022-10-13 03:17:00.000000', 'active'),
(8, 51, 'Male', '2022-10-13 03:16:35.000000', '2022-10-13 03:16:52.000000', 'active'),
(9, 46, 'Female', '2022-10-13 03:16:44.000000', '2022-10-13 03:16:44.000000', 'active'),
(10, 63, 'Female', '2022-10-13 03:17:17.000000', '2022-10-13 03:17:17.000000', 'active'),
(11, 43, 'Male', '2022-10-13 03:17:21.000000', '2022-10-13 03:17:21.000000', 'active'),
(12, 59, 'Female', '2022-10-13 03:17:28.000000', '2022-10-13 03:17:28.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `history_log_document`
--

CREATE TABLE `history_log_document` (
  `log_id` int(10) NOT NULL,
  `doc_id` int(100) NOT NULL,
  `doc_title` varchar(100) NOT NULL,
  `file_downloader` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `name`, `description`, `status`, `date_created`, `date_modified`) VALUES
(1, 'Lecture Material ', 'Material Lecture', 'active', '2022-06-06 11:57:57.000000', '2022-06-22 10:23:33.000000'),
(2, 'Textbooks', 'book text', 'active', '2022-06-06 11:59:21.000000', '2022-06-22 04:33:01.000000'),
(3, 'References and Readings', 'Reading and References', 'active', '2022-06-06 11:59:56.000000', '2022-06-06 11:59:56.000000'),
(4, 'Simulations', 'mulation', 'active', '2022-06-06 12:00:12.000000', '2022-06-10 12:31:46.000000'),
(5, 'Experimental Demonstrations', 'Demo', 'active', '2022-06-06 12:00:38.000000', '2022-07-29 10:57:25.000000'),
(6, 'Syllabi', 'Syllabi', 'active', '2022-06-06 12:00:51.000000', '2022-06-06 02:26:58.000000'),
(7, 'Teachers Guides', 'Teacher Proctor', 'active', '2022-06-06 02:13:40.000000', '2022-06-06 02:27:05.000000'),
(8, 'Other Materials', 'Others', 'active', '2022-06-06 02:20:17.000000', '2022-06-22 10:24:20.000000');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `img`, `name`, `description`, `status`, `date_created`, `date_modified`) VALUES
(1, 'master.jpg', 'MALL', 'Master of Arts in Language and Literature', 'active', '2022-06-17 04:28:44.000000', '2022-08-04 09:38:30.000000'),
(2, 'col.jpg', 'BALITT', 'Bachelor of Arts in Literature', 'active', '2022-06-20 04:50:36.000000', '2022-08-03 03:50:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `doc_id` int(100) NOT NULL,
  `doc_img` varchar(100) NOT NULL,
  `material_id` int(100) NOT NULL,
  `resource_type` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file_size` int(100) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `file_uploader_id` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`doc_id`, `doc_img`, `material_id`, `resource_type`, `title`, `file_size`, `file_type`, `description`, `file_uploader_id`, `date`, `time`, `date_created`, `date_modified`, `status`) VALUES
(3, '', 3, 'Language', 'GAD_Endorsement-letter-for-Student-Congress_etc__-_DSS', 342780, 'pdf', 'Gad Endorsement letter for student congress', 3, 'Jun 06, 2022', '16:50:34', '2022-06-06 04:50:34', '2022-06-06 04:50:34', 'active'),
(8, '', 3, 'Language', 'CLSU-GRADUATION-PROTOCOL', 18059, 'docx', 'Graduation Protocol Policy', 1, 'Jun 07, 2022', '09:47:06', '2022-06-07 09:47:06', '2022-06-14 03:59:58', 'active'),
(9, '', 6, 'Language', 'ESTEBAN, A._LITT 2108', 347276, 'pdf', 'Sir Esteban Syllabi', 3, 'Jun 08, 2022', '13:40:50', '2022-06-08 01:40:50', '2022-06-08 01:40:50', 'active'),
(12, '', 6, 'Literature', 'csc-form-no-48-daily-time-record-dtr', 96455, 'pdf', 'Daily time record', 1, 'Jun 14, 2022', '16:05:06', '2022-06-14 04:05:06', '2022-06-30 11:52:02', 'active'),
(15, '', 8, 'Language', 'graduate-program_-for-rqat', 165102, 'pdf', 'Graduate Program', 1, 'Jun 14, 2022', '16:10:33', '2022-06-14 04:10:33', '2022-06-14 04:10:33', 'active'),
(16, '', 1, 'Literature', 'Transcript of records_mclapurga', 1947719, 'pdf', 'Sample life', 3, 'Jun 14, 2022', '16:24:33', '2022-06-14 04:24:33', '2022-06-14 04:24:33', 'active'),
(17, '', 8, 'Language', 'CALICA_Thesis-Proposal-Defense-Schedule-Form', 242451, 'pdf', 'Thesis Proposal For me', 4, 'Jun 15, 2022', '13:50:16', '2022-06-15 01:50:16', '2022-06-15 01:50:16', 'active'),
(18, '', 6, 'Literature', 'CULMINATING-ACTIVITY_SCORES', 27515, 'docx', 'sample', 4, 'Jun 15, 2022', '14:24:08', '2022-06-15 02:24:08', '2022-06-15 02:24:08', 'active'),
(20, '', 3, 'Language', 'Venturina_ERCf10-StudentProposals', 217215, 'pdf', 'This is language type', 1, 'Oct 07, 2022', '14:04:07', '2022-10-07 02:04:07', '2022-10-07 02:04:07', 'active'),
(24, '', 1, 'Literature', 'CASS_ENGLISH-AND-HUMANITIES_REYES_MERCEDITA-_M_', 1330476, 'pdf', 'asdfasdf', 1, 'Oct 12, 2022', '15:40:54', '2022-10-12 03:40:54', '2022-11-23 08:12:22', 'active'),
(25, '', 1, 'Language', 'Thesis-Advisory-Committee-Summary-Form-with-IP-3', 123997, 'pdf', 'asdf', 1, 'Nov 17, 2022', '10:57:04', '2022-11-17 10:57:04', '2022-11-18 08:48:17', 'active'),
(29, '', 8, 'Language', '2022-IT-Caravan_Quirino-N.Vizcaya_Nov-24-25 (2)', 36995, 'xlsx', 'This is the sample', 1, 'Nov 23, 2022', '08:28:12', '2022-11-23 08:28:12', '2022-11-23 08:28:12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `resources_category`
--

CREATE TABLE `resources_category` (
  `rc_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `student_id_no` varchar(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `course_id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middle_initial` varchar(10) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `student_course` varchar(10) NOT NULL,
  `student_year` int(10) NOT NULL,
  `student_section` varchar(10) NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `student_id_no`, `img`, `course_id`, `firstname`, `middle_initial`, `lastname`, `description`, `email`, `gender`, `password`, `student_course`, `student_year`, `student_section`, `date_modified`, `date_created`, `status`) VALUES
(42, 41, '20-2442', '', 8, 'Analyn', '', 'Paraguison', 'This is the reigning suma cum loade', 'analyn@sample.com', 'Female', 'student', 'BASS', 3, '2', '0000-00-00 00:00:00', '2022-06-03 10:17:52', 'active'),
(44, 44, '20-2442', '310555419_666222058443596_6984336145863530235_n.jpg', 8, 'RM', 'L.', 'Dino', 'This student is the top 1 in his school', 'rm@sample.com', 'Male', 'student', 'BSIT', 4, '1', '2022-10-14 03:11:51', '2022-06-07 10:17:45', 'active'),
(45, 57, '14-5141', 'bg-photo2.jpg', 0, 'Rodelio', 'B', 'Domingo', 'This is my Description, I am a Software Engineer', 'rodelio@student.com', 'Male', 'student', 'BSIT', 4, '1', '0000-00-00 00:00:00', '2022-07-04 02:40:26', 'active'),
(47, 67, '20-2022', '585e4bcdcb11b227491c3396.png', 0, 'Richard', '', 'Pable', '', 'richard@student.com', 'Male', 'student', '', 0, '', '2022-11-16 04:23:07', '2022-11-16 03:00:51', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suggested_reading`
--

CREATE TABLE `suggested_reading` (
  `sr_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_modified` datetime(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggested_reading`
--

INSERT INTO `suggested_reading` (`sr_id`, `course_id`, `name`, `description`, `date_created`, `date_modified`, `status`) VALUES
(1, 8, 'Abad, Gemino H. Ed.', 'The Likhaan Anthology of  Philippine Literature in Englishfrom 1900 to the  Present. Manila: UP Press, 1999.', '2022-07-26 09:31:32.000000', '2022-07-26 03:00:05.000000', 'active'),
(2, 8, 'Clinton, Jerome W. et.al. eds.', 'The Norton Anthology of  World Masterpieces. Expanded Ed.: WW Norton &  Co., 1997.', '2022-07-26 10:11:57.000000', '2022-07-26 10:11:57.000000', 'active'),
(3, 8, 'Francia, Luis, Ed. Brown River, White Ocean:', 'An  Anthology of Twentieth-Century Philippine Literature  in English.  Rutgers University Pree, 1993.', '2022-07-26 10:12:19.000000', '2022-07-26 10:12:19.000000', 'active'),
(4, 8, 'Holt, Rheinhart and Winston Hold, Eds.', 'World  Literature. Holt McDougal, 2000.', '2022-07-26 10:12:37.000000', '2022-07-28 09:57:57.000000', 'active'),
(5, 8, 'Hornstein, Lilian H. et.al. Eds.', 'The Reader’s Companion  to World Literature, Signet Classics, 2002', '2022-07-26 10:13:01.000000', '2022-07-26 10:13:01.000000', 'active'),
(6, 8, 'Lumbera, Bienvido and Cynthia Nograles Lumbera, Eds.', 'Philippine Literature: A History and Anthology.  National Book Store, 1982.', '2022-07-26 10:13:43.000000', '2022-07-26 10:13:43.000000', 'active'),
(7, 8, 'Magill, Frank N., Ed.', 'Masterpieces of World Literature,  Collins Reference, 1991', '2022-07-26 10:18:02.000000', '2022-07-26 10:18:02.000000', 'active'),
(8, 8, 'Siemens, Ray and Schreibman, Susan. Eds.', 'A  Companion to Digital Literary Studies. WileyBlackwell. 2013.', '2022-07-26 10:18:23.000000', '2022-07-28 10:17:35.000000', 'active'),
(9, 8, 'Pugh, Tioson and Johnson, Margaret E. Eds.', 'Literary  Studies: A Practical Guide. Routledge. 2013.', '2022-07-26 10:19:50.000000', '2022-07-29 02:46:02.000000', 'active'),
(10, 8, 'Durant, Alan and Fabb, Nigel. Eds.', 'Literary Studiesin  Action (interface). Routledge: 1 edition, 1990', '2022-07-26 10:20:01.000000', '2022-07-26 10:20:01.000000', 'active'),
(11, 8, 'Levander, Caroline F. and Levine, Robert S. Eds.', 'A  Companion to American Literary Studies (Blackwell  Companions to Literature and Culture). Blackwell; 1  edition, 2015', '2022-07-26 10:20:16.000000', '2022-07-26 10:20:16.000000', 'active'),
(12, 8, 'Garber, Marjorie and Chapin Simpson, Walter. Eds.', 'A  Manifesto for Literary Studies. Walter Chapin  Simpson Center for the Humanities, 2004', '2022-07-26 10:20:31.000000', '2022-07-27 04:33:32.000000', 'active'),
(13, 8, 'Huang, Guiyou. Ed.', 'Asian American Literary Studies  (Introducing Ethnic Studies EUP). Edinburgh  University Press; 1 edition, 2005', '2022-07-26 10:20:50.000000', '2022-07-26 10:20:50.000000', 'active'),
(14, 8, 'Cornell, Paul Jay Ed.', 'Global Matters: The Transnational  Turn in Literary Studies. Cornell University Press, 1  edition, 2010', '2022-07-26 10:21:07.000000', '2022-07-26 10:29:49.000000', 'active'),
(15, 8, 'Klarer, Mario.', 'An Introduction to Literary Studies.  Routledge; 2 edition, 2004.', '2022-07-26 10:21:22.000000', '2022-07-26 10:21:22.000000', 'active'),
(16, 9, 'Bertens, H. ', 'literary theory: The besics. London:  Routledge, 1980.', '2022-07-27 01:44:45.000000', '2022-07-27 01:45:39.000000', 'active'),
(17, 9, 'Chua, J., Ed.', 'The Critical Villa. Quezon City: Ateneo de  Manila University Press, 2002.', '2022-07-27 01:45:09.000000', '2022-07-27 01:45:09.000000', 'active'),
(18, 9, 'Culler, Jonathan,', '  Literary Theory: A Very Short  Introduction. UK: Oxford University Press, 1997.', '2022-07-27 01:45:58.000000', '2022-07-27 01:47:03.000000', 'active'),
(19, 9, 'Culler, Jonathan.', 'The Literary in Theory. Stanford:  Stanford University Press, 2007.', '2022-07-27 01:46:30.000000', '2022-07-27 01:46:30.000000', 'active'),
(20, 9, 'Eagleton, T.', ' Literary Theory: An introduction. Oxford:  Basil Blackwell, 1983.', '2022-07-27 01:47:16.000000', '2022-07-27 01:47:16.000000', 'active'),
(21, 9, 'Docherty, T., Ed.', ' Postmodernism: A Reader. Hemmel  Hempstead: Harvester, 1993.', '2022-07-27 01:47:28.000000', '2022-07-27 01:47:28.000000', 'active'),
(22, 9, 'Rodelio', 'Description', '2022-07-27 04:31:50.000000', '2022-07-27 04:31:50.000000', 'active'),
(23, 8, 'Sample', 'Desc', '2022-07-28 10:17:40.000000', '2022-07-29 02:35:08.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_log`
--

CREATE TABLE `transaction_log` (
  `log_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `transaction_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `date` date DEFAULT NULL,
  `log_time` time(6) NOT NULL,
  `action` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_log`
--

INSERT INTO `transaction_log` (`log_id`, `user_id`, `transaction_name`, `gender`, `user_type`, `date`, `log_time`, `action`, `status`) VALUES
(1, 39, 'Log Out', 'Male', 'faculty', '2022-10-21', '10:35:58.000000', 'Execute', 'Successful'),
(2, 38, 'Log in', 'Male', 'admin', '2022-10-24', '01:14:53.000000', 'Execute', 'Successful'),
(3, 38, 'Log Out', 'Male', 'admin', '2022-10-24', '01:24:56.000000', 'Execute', 'Successful'),
(4, 38, 'Log in', 'Male', 'admin', '2022-10-24', '01:37:48.000000', 'Execute', 'Successful'),
(5, 41, 'Log in', 'Female', 'student', '2022-10-24', '01:45:08.000000', 'Execute', 'Successful'),
(6, 41, 'Log Out', 'Female', 'student', '2022-10-24', '01:46:19.000000', 'Execute', 'Successful'),
(7, 57, 'Log in', 'Male', 'student', '2022-10-24', '01:46:36.000000', 'Execute', 'Successful'),
(8, 57, 'Log Out', 'Male', 'student', '2022-10-24', '01:46:48.000000', 'Execute', 'Successful'),
(9, 44, 'Log in', 'Male', 'student', '2022-10-24', '01:47:09.000000', 'Execute', 'Successful'),
(10, 44, 'Log Out', 'Male', 'student', '2022-10-24', '01:47:34.000000', 'Execute', 'Successful'),
(11, 41, 'Log in', 'Female', 'student', '2022-10-24', '01:47:38.000000', 'Execute', 'Successful'),
(12, 41, 'Log Out', 'Female', 'student', '2022-10-24', '01:48:49.000000', 'Execute', 'Successful'),
(13, 57, 'Log in', 'Male', 'student', '2022-10-24', '01:49:08.000000', 'Execute', 'Successful'),
(14, 57, 'Log Out', 'Male', 'student', '2022-10-24', '01:49:15.000000', 'Execute', 'Successful'),
(15, 38, 'Log Out', 'Male', 'admin', '2022-10-24', '02:01:12.000000', 'Execute', 'Successful'),
(16, 38, 'Log in', 'Male', 'admin', '2022-10-24', '02:06:27.000000', 'Execute', 'Successful'),
(17, 38, 'Log Out', 'Male', 'admin', '2022-10-24', '02:53:51.000000', 'Execute', 'Successful'),
(18, 38, 'Log in', 'Male', 'admin', '2022-10-24', '04:10:54.000000', 'Execute', 'Successful'),
(19, 38, 'Log Out', 'Male', 'admin', '2022-10-24', '04:23:01.000000', 'Execute', 'Successful'),
(20, 38, 'Log in', 'Male', 'admin', '2022-10-24', '04:46:26.000000', 'Execute', 'Successful'),
(21, 38, 'Log Out', 'Male', 'admin', '2022-10-24', '04:46:39.000000', 'Execute', 'Successful'),
(22, 39, 'Log in', 'Male', 'faculty', '2022-10-24', '04:46:47.000000', 'Execute', 'Successful'),
(23, 39, 'Log Out', 'Male', 'faculty', '2022-10-24', '04:49:42.000000', 'Execute', 'Successful'),
(24, 38, 'Log in', 'Male', 'admin', '2022-10-24', '04:50:08.000000', 'Execute', 'Successful'),
(25, 38, 'Log Out', 'Male', 'admin', '2022-10-24', '04:50:15.000000', 'Execute', 'Successful'),
(26, 39, 'Log in', 'Male', 'faculty', '2022-10-24', '04:50:27.000000', 'Execute', 'Successful'),
(27, 39, 'Log Out', 'Male', 'faculty', '2022-10-24', '04:50:34.000000', 'Execute', 'Successful'),
(28, 38, 'Log in', 'Male', 'admin', '2022-10-24', '04:51:59.000000', 'Execute', 'Successful'),
(29, 38, 'Log Out', 'Male', 'admin', '2022-10-24', '05:05:12.000000', 'Execute', 'Successful'),
(30, 38, 'Log in', 'Male', 'admin', '2022-10-28', '11:12:27.000000', 'Execute', 'Successful'),
(31, 38, 'Log Out', 'Male', 'admin', '2022-10-28', '11:17:33.000000', 'Execute', 'Successful'),
(32, 38, 'Log in', 'Male', 'admin', '2022-10-28', '11:17:38.000000', 'Execute', 'Successful'),
(33, 38, 'Log Out', 'Male', 'admin', '2022-10-28', '11:19:50.000000', 'Execute', 'Successful'),
(34, 38, 'Log in', 'Male', 'admin', '2022-10-28', '11:19:57.000000', 'Execute', 'Successful'),
(35, 38, 'Log Out', 'Male', 'admin', '2022-10-28', '11:20:05.000000', 'Execute', 'Successful'),
(36, 38, 'Log in', 'Male', 'admin', '2022-10-28', '11:20:54.000000', 'Execute', 'Successful'),
(37, 38, 'Log Out', 'Male', 'admin', '2022-10-28', '11:23:00.000000', 'Execute', 'Successful'),
(38, 38, 'Log in', 'Male', 'admin', '2022-10-28', '11:24:39.000000', 'Execute', 'Successful'),
(39, 38, 'Log Out', 'Male', 'admin', '2022-10-28', '11:26:50.000000', 'Execute', 'Successful'),
(40, 57, 'Log in', 'Male', 'student', '2022-10-28', '11:27:57.000000', 'Execute', 'Successful'),
(41, 57, 'Log Out', 'Male', 'student', '2022-10-28', '11:36:37.000000', 'Execute', 'Successful'),
(42, 57, 'Log in', 'Male', 'student', '2022-10-28', '11:36:54.000000', 'Execute', 'Successful'),
(43, 57, 'Log Out', 'Male', 'student', '2022-10-28', '11:38:04.000000', 'Execute', 'Successful'),
(44, 38, 'Log in', 'Male', 'admin', '2022-10-28', '11:38:11.000000', 'Execute', 'Successful'),
(45, 38, 'Log Out', 'Male', 'admin', '2022-10-28', '11:38:43.000000', 'Execute', 'Successful'),
(46, 57, 'Log in', 'Male', 'student', '2022-10-28', '11:39:08.000000', 'Execute', 'Successful'),
(47, 57, 'Log Out', 'Male', 'student', '2022-10-28', '12:06:05.000000', 'Execute', 'Successful'),
(48, 38, 'Log in', 'Male', 'admin', '2022-10-28', '02:17:31.000000', 'Execute', 'Successful'),
(49, 38, 'Log Out', 'Male', 'admin', '2022-10-28', '02:18:25.000000', 'Execute', 'Successful'),
(50, 57, 'Log in', 'Male', 'student', '2022-10-28', '02:18:32.000000', 'Execute', 'Successful'),
(51, 57, 'Log Out', 'Male', 'student', '2022-10-28', '02:20:42.000000', 'Execute', 'Successful'),
(52, 57, 'Log in', 'Male', 'student', '2022-10-28', '02:22:48.000000', 'Execute', 'Successful'),
(53, 57, 'Log Out', 'Male', 'student', '2022-10-28', '02:22:58.000000', 'Execute', 'Successful'),
(54, 57, 'Log in', 'Male', 'student', '2022-10-28', '02:23:46.000000', 'Execute', 'Successful'),
(55, 57, 'Log Out', 'Male', 'student', '2022-10-28', '02:24:05.000000', 'Execute', 'Successful'),
(56, 57, 'Log in', 'Male', 'student', '2022-10-28', '02:25:09.000000', 'Execute', 'Successful'),
(57, 57, 'Log Out', 'Male', 'student', '2022-10-28', '02:25:18.000000', 'Execute', 'Successful'),
(58, 57, 'Log in', 'Male', 'student', '2022-10-28', '02:25:32.000000', 'Execute', 'Successful'),
(59, 57, 'Log Out', 'Male', 'student', '2022-10-28', '02:46:32.000000', 'Execute', 'Successful'),
(60, 38, 'Log in', 'Male', 'admin', '2022-11-03', '09:29:21.000000', 'Execute', 'Successful'),
(61, 38, 'Log Out', 'Male', 'admin', '2022-11-03', '09:29:53.000000', 'Execute', 'Successful'),
(62, 39, 'Log in', 'Male', 'faculty', '2022-11-03', '09:31:29.000000', 'Execute', 'Successful'),
(63, 39, 'Log Out', 'Male', 'faculty', '2022-11-03', '09:32:35.000000', 'Execute', 'Successful'),
(64, 38, 'Log in', 'Male', 'admin', '2022-11-04', '08:20:29.000000', 'Execute', 'Successful'),
(65, 57, 'Log in', 'Male', 'student', '2022-11-04', '08:21:11.000000', 'Execute', 'Successful'),
(66, 38, 'Log Out', 'Male', 'admin', '2022-11-04', '08:29:06.000000', 'Execute', 'Successful'),
(67, 57, 'Log Out', 'Male', 'student', '2022-11-04', '08:31:12.000000', 'Execute', 'Successful'),
(68, 57, 'Log in', 'Male', 'student', '2022-11-04', '08:44:02.000000', 'Execute', 'Successful'),
(69, 57, 'Log Out', 'Male', 'student', '2022-11-04', '08:56:09.000000', 'Execute', 'Successful'),
(70, 38, 'Log in', 'Male', 'admin', '2022-11-04', '09:04:38.000000', 'Execute', 'Successful'),
(71, 38, 'Log Out', 'Male', 'admin', '2022-11-04', '09:04:56.000000', 'Execute', 'Successful'),
(72, 57, 'Log in', 'Male', 'student', '2022-11-04', '09:05:01.000000', 'Execute', 'Successful'),
(73, 57, 'Log Out', 'Male', 'student', '2022-11-04', '09:16:33.000000', 'Execute', 'Successful'),
(74, 38, 'Log in', 'Male', 'admin', '2022-11-04', '01:59:28.000000', 'Execute', 'Successful'),
(75, 38, 'Log Out', 'Male', 'admin', '2022-11-04', '02:04:58.000000', 'Execute', 'Successful'),
(76, 38, 'Log in', 'Male', 'admin', '2022-11-14', '11:10:21.000000', 'Execute', 'Successful'),
(77, 38, 'Log Out', 'Male', 'admin', '2022-11-14', '11:10:50.000000', 'Execute', 'Successful'),
(78, 38, 'Log in', 'Male', 'admin', '2022-11-15', '01:05:14.000000', 'Execute', 'Successful'),
(79, 38, 'Log Out', 'Male', 'admin', '2022-11-15', '01:05:40.000000', 'Execute', 'Successful'),
(80, 39, 'Log in', 'Male', 'faculty', '2022-11-15', '01:05:48.000000', 'Execute', 'Successful'),
(81, 39, 'Viewing Resources', '', '', '2022-11-15', '01:05:50.000000', 'Execute', 'Successful'),
(82, 39, 'Log Out', 'Male', 'faculty', '2022-11-15', '01:16:01.000000', 'Execute', 'Successful'),
(83, 39, 'Log in', 'Male', 'faculty', '2022-11-15', '01:20:37.000000', 'Execute', 'Successful'),
(84, 39, 'Viewing Resources', '', '', '2022-11-15', '01:20:39.000000', 'Execute', 'Successful'),
(85, 39, 'Log Out', 'Male', 'faculty', '2022-11-15', '01:30:51.000000', 'Execute', 'Successful'),
(86, 39, 'Log in', 'Male', 'faculty', '2022-11-15', '01:37:12.000000', 'Execute', 'Successful'),
(87, 39, 'Viewing Resources', '', '', '2022-11-15', '01:40:30.000000', 'Execute', 'Successful'),
(88, 39, 'Viewing Resources', '', '', '2022-11-15', '01:40:35.000000', 'Execute', 'Successful'),
(89, 39, 'Log Out', 'Male', 'faculty', '2022-11-15', '01:40:40.000000', 'Execute', 'Successful'),
(90, 39, 'Log in', 'Male', 'faculty', '2022-11-15', '01:40:46.000000', 'Execute', 'Successful'),
(91, 39, 'Log Out', 'Male', 'faculty', '2022-11-15', '01:40:49.000000', 'Execute', 'Successful'),
(92, 38, 'Log in', 'Male', 'admin', '2022-11-15', '01:40:58.000000', 'Execute', 'Successful'),
(93, 38, 'Log Out', 'Male', 'admin', '2022-11-15', '01:41:11.000000', 'Execute', 'Successful'),
(94, 39, 'Log in', 'Male', 'faculty', '2022-11-15', '01:41:24.000000', 'Execute', 'Successful'),
(95, 39, 'Viewing Resources', '', '', '2022-11-15', '01:41:26.000000', 'Execute', 'Successful'),
(96, 39, 'Log Out', 'Male', 'faculty', '2022-11-15', '01:41:37.000000', 'Execute', 'Successful'),
(97, 38, 'Log in', 'Male', 'admin', '2022-11-15', '01:41:42.000000', 'Execute', 'Successful'),
(98, 38, 'Log Out', 'Male', 'admin', '2022-11-15', '02:07:28.000000', 'Execute', 'Successful'),
(99, 38, 'Log in', 'Male', 'admin', '2022-11-15', '02:55:15.000000', 'Execute', 'Successful'),
(100, 38, 'Log Out', 'Male', 'admin', '2022-11-15', '03:10:17.000000', 'Execute', 'Successful'),
(101, 38, 'Log in', 'Male', 'admin', '2022-11-15', '03:19:53.000000', 'Execute', 'Successful'),
(102, 38, 'Log Out', 'Male', 'admin', '2022-11-15', '03:30:14.000000', 'Execute', 'Successful'),
(103, 38, 'Log in', 'Male', 'admin', '2022-11-15', '03:45:03.000000', 'Execute', 'Successful'),
(104, 38, 'Log Out', 'Male', 'admin', '2022-11-15', '04:12:50.000000', 'Execute', 'Successful'),
(105, 38, 'Log in', 'Male', 'admin', '2022-11-15', '04:18:51.000000', 'Execute', 'Successful'),
(106, 38, 'Log Out', 'Male', 'admin', '2022-11-15', '04:45:19.000000', 'Execute', 'Successful'),
(107, 38, 'Log in', 'Male', 'admin', '2022-11-16', '02:14:04.000000', 'Execute', 'Successful'),
(108, 38, 'Log Out', 'Male', 'admin', '2022-11-16', '02:14:15.000000', 'Execute', 'Successful'),
(109, 39, 'Log in', 'Male', 'faculty', '2022-11-16', '02:20:41.000000', 'Execute', 'Successful'),
(110, 39, 'Log Out', 'Male', 'faculty', '2022-11-16', '02:28:07.000000', 'Execute', 'Successful'),
(111, 38, 'Log in', 'Male', 'admin', '2022-11-16', '02:28:12.000000', 'Execute', 'Successful'),
(112, 38, 'Log Out', 'Male', 'admin', '2022-11-16', '02:28:36.000000', 'Execute', 'Successful'),
(113, 39, 'Log in', 'Male', 'faculty', '2022-11-16', '02:29:14.000000', 'Execute', 'Successful'),
(114, 39, 'Log Out', 'Male', 'faculty', '2022-11-16', '02:29:29.000000', 'Execute', 'Successful'),
(115, 38, 'Log in', 'Male', 'admin', '2022-11-16', '02:33:35.000000', 'Execute', 'Successful'),
(116, 38, 'Log Out', 'Male', 'admin', '2022-11-16', '03:32:02.000000', 'Execute', 'Successful'),
(117, 38, 'Log in', 'Male', 'admin', '2022-11-16', '04:22:18.000000', 'Execute', 'Successful'),
(118, 38, 'Log Out', 'Male', 'admin', '2022-11-16', '04:22:35.000000', 'Execute', 'Successful'),
(119, 67, 'Log in', 'Male', 'student', '2022-11-16', '04:22:41.000000', 'Execute', 'Successful'),
(120, 67, 'Log Out', 'Male', 'student', '2022-11-16', '04:26:05.000000', 'Execute', 'Successful'),
(121, 67, 'Log in', 'Male', 'student', '2022-11-16', '04:27:43.000000', 'Execute', 'Successful'),
(122, 67, 'Log Out', 'Male', 'student', '2022-11-16', '04:34:28.000000', 'Execute', 'Successful'),
(123, 38, 'Log in', 'Male', 'admin', '2022-11-17', '10:00:08.000000', 'Execute', 'Successful'),
(124, 38, 'Log Out', 'Male', 'admin', '2022-11-17', '10:13:22.000000', 'Execute', 'Successful'),
(125, 39, 'Log in', 'Male', 'faculty', '2022-11-17', '10:20:44.000000', 'Execute', 'Successful'),
(126, 67, 'Log in', 'Male', 'student', '2022-11-17', '10:21:33.000000', 'Execute', 'Successful'),
(127, 39, 'Log Out', 'Male', 'faculty', '2022-11-17', '10:25:13.000000', 'Execute', 'Successful'),
(128, 67, 'Log Out', 'Male', 'student', '2022-11-17', '10:29:40.000000', 'Execute', 'Successful'),
(129, 67, 'Log in', 'Male', 'student', '2022-11-17', '10:34:14.000000', 'Execute', 'Successful'),
(130, 67, 'Log Out', 'Male', 'student', '2022-11-17', '10:36:59.000000', 'Execute', 'Successful'),
(131, 38, 'Log in', 'Male', 'admin', '2022-11-17', '10:38:50.000000', 'Execute', 'Successful'),
(132, 38, 'Log Out', 'Male', 'admin', '2022-11-17', '11:00:25.000000', 'Execute', 'Successful'),
(133, 39, 'Log in', 'Male', 'faculty', '2022-11-17', '11:00:32.000000', 'Execute', 'Successful'),
(134, 39, 'Viewing Resources', '', '', '2022-11-17', '11:00:37.000000', 'Execute', 'Successful'),
(135, 39, 'Log Out', 'Male', 'faculty', '2022-11-17', '11:10:38.000000', 'Execute', 'Successful'),
(136, 38, 'Log in', 'Male', 'admin', '2022-11-18', '08:28:41.000000', 'Execute', 'Successful'),
(137, 38, 'Log Out', 'Male', 'admin', '2022-11-18', '08:29:24.000000', 'Execute', 'Successful'),
(138, 39, 'Log in', 'Male', 'faculty', '2022-11-18', '08:29:32.000000', 'Execute', 'Successful'),
(139, 39, 'Viewing Resources', '', '', '2022-11-18', '08:30:56.000000', 'Execute', 'Successful'),
(140, 39, 'Viewing Resources', '', '', '2022-11-18', '08:31:10.000000', 'Execute', 'Successful'),
(141, 39, 'Viewing Resources', '', '', '2022-11-18', '08:32:36.000000', 'Execute', 'Successful'),
(142, 39, 'Viewing Resources', '', '', '2022-11-18', '08:33:02.000000', 'Execute', 'Successful'),
(143, 39, 'Viewing Resources', '', '', '2022-11-18', '08:34:51.000000', 'Execute', 'Successful'),
(144, 39, 'Log Out', 'Male', 'faculty', '2022-11-18', '08:45:10.000000', 'Execute', 'Successful'),
(145, 39, 'Log in', 'Male', 'faculty', '2022-11-18', '08:47:53.000000', 'Execute', 'Successful'),
(146, 39, 'Viewing Resources', '', '', '2022-11-18', '08:47:55.000000', 'Execute', 'Successful'),
(147, 39, 'Viewing Resources', '', '', '2022-11-18', '08:48:01.000000', 'Execute', 'Successful'),
(148, 39, 'Viewing Resources', '', '', '2022-11-18', '08:48:03.000000', 'Execute', 'Successful'),
(149, 39, 'Viewing Resources', '', '', '2022-11-18', '08:48:09.000000', 'Execute', 'Successful'),
(150, 39, 'Viewing Resources', '', '', '2022-11-18', '08:48:50.000000', 'Execute', 'Successful'),
(151, 39, 'Viewing Resources', '', '', '2022-11-18', '08:48:53.000000', 'Execute', 'Successful'),
(152, 39, 'Log Out', 'Male', 'faculty', '2022-11-18', '08:51:04.000000', 'Execute', 'Successful'),
(153, 38, 'Log in', 'Male', 'admin', '2022-11-18', '01:54:52.000000', 'Execute', 'Successful'),
(154, 38, 'Log Out', 'Male', 'admin', '2022-11-18', '01:58:25.000000', 'Execute', 'Successful'),
(155, 57, 'Log in', 'Male', 'student', '2022-11-18', '02:02:10.000000', 'Execute', 'Successful'),
(156, 57, 'Log Out', 'Male', 'student', '2022-11-18', '02:15:38.000000', 'Execute', 'Successful'),
(157, 67, 'Log in', 'Male', 'student', '2022-11-21', '09:57:33.000000', 'Execute', 'Successful'),
(158, 67, 'Log Out', 'Male', 'student', '2022-11-21', '10:02:00.000000', 'Execute', 'Successful'),
(159, 38, 'Log in', 'Male', 'admin', '2022-11-21', '10:15:26.000000', 'Execute', 'Successful'),
(160, 38, 'Log Out', 'Male', 'admin', '2022-11-21', '10:39:25.000000', 'Execute', 'Successful'),
(161, 39, 'Log in', 'Male', 'faculty', '2022-11-21', '10:39:32.000000', 'Execute', 'Successful'),
(162, 39, 'Viewing Resources', '', '', '2022-11-21', '10:39:35.000000', 'Execute', 'Successful'),
(163, 39, 'Viewing Resources', '', '', '2022-11-21', '11:06:26.000000', 'Execute', 'Successful'),
(164, 39, 'Log Out', 'Male', 'faculty', '2022-11-21', '11:36:47.000000', 'Execute', 'Successful'),
(165, 39, 'Log in', 'Male', 'faculty', '2022-11-21', '03:35:04.000000', 'Execute', 'Successful'),
(166, 39, 'Log Out', 'Male', 'faculty', '2022-11-21', '03:45:17.000000', 'Execute', 'Successful'),
(167, 39, 'Log in', 'Male', 'faculty', '2022-11-21', '03:46:35.000000', 'Execute', 'Successful'),
(168, 39, 'Viewing Resources', '', '', '2022-11-21', '03:53:55.000000', 'Execute', 'Successful'),
(169, 39, 'Viewing Resources', '', '', '2022-11-21', '04:20:06.000000', 'Execute', 'Successful'),
(170, 39, 'Log Out', 'Female', 'faculty', '2022-11-21', '04:27:36.000000', 'Execute', 'Successful'),
(171, 38, 'Log in', 'Male', 'admin', '2022-11-21', '04:27:47.000000', 'Execute', 'Successful'),
(172, 38, 'Log Out', 'Male', 'admin', '2022-11-21', '04:27:51.000000', 'Execute', 'Successful'),
(173, 67, 'Log in', 'Male', 'student', '2022-11-21', '04:42:13.000000', 'Execute', 'Successful'),
(174, 67, 'Log Out', 'Male', 'student', '2022-11-21', '04:42:30.000000', 'Execute', 'Successful'),
(175, 39, 'Log in', 'Female', 'faculty', '2022-11-22', '03:53:52.000000', 'Execute', 'Successful'),
(176, 39, 'Log Out', 'Female', 'faculty', '2022-11-22', '04:03:57.000000', 'Execute', 'Successful'),
(177, 67, 'Log in', 'Male', 'student', '2022-11-22', '04:41:36.000000', 'Execute', 'Successful'),
(178, 67, 'Log Out', 'Male', 'student', '2022-11-22', '04:41:44.000000', 'Execute', 'Successful'),
(179, 67, 'Log in', 'Male', 'student', '2022-11-23', '08:03:23.000000', 'Execute', 'Successful'),
(180, 67, 'Log Out', 'Male', 'student', '2022-11-23', '08:11:18.000000', 'Execute', 'Successful'),
(181, 38, 'Log in', 'Male', 'admin', '2022-11-23', '08:11:29.000000', 'Execute', 'Successful'),
(182, 38, 'Log Out', 'Male', 'admin', '2022-11-23', '08:13:24.000000', 'Execute', 'Successful'),
(183, 67, 'Log in', 'Male', 'student', '2022-11-23', '08:14:49.000000', 'Execute', 'Successful'),
(184, 67, 'Log Out', 'Male', 'student', '2022-11-23', '08:15:01.000000', 'Execute', 'Successful'),
(185, 38, 'Log in', 'Male', 'admin', '2022-11-23', '08:24:29.000000', 'Execute', 'Successful'),
(186, 38, 'Log Out', 'Male', 'admin', '2022-11-23', '02:07:23.000000', 'Execute', 'Successful'),
(187, 38, 'Log in', 'Male', 'admin', '2022-11-23', '02:52:42.000000', 'Execute', 'Successful'),
(188, 38, 'Log Out', 'Male', 'admin', '2022-11-23', '02:55:39.000000', 'Execute', 'Successful'),
(189, 67, 'Log in', 'Male', 'student', '2022-11-23', '02:57:22.000000', 'Execute', 'Successful'),
(190, 67, 'Log Out', 'Male', 'student', '2022-11-23', '02:57:41.000000', 'Execute', 'Successful'),
(191, 38, 'Log in', 'Male', 'admin', '2022-11-23', '02:57:47.000000', 'Execute', 'Successful'),
(192, 38, 'Log Out', 'Male', 'admin', '2022-11-23', '02:59:54.000000', 'Execute', 'Successful'),
(193, 67, 'Log in', 'Male', 'student', '2022-11-23', '03:04:48.000000', 'Execute', 'Successful'),
(194, 67, 'Log Out', 'Male', 'student', '2022-11-23', '03:05:05.000000', 'Execute', 'Successful'),
(195, 67, 'Log in', 'Male', 'student', '2022-11-23', '03:33:20.000000', 'Execute', 'Successful'),
(196, 67, 'Log Out', 'Male', 'student', '2022-11-23', '03:33:37.000000', 'Execute', 'Successful'),
(197, 38, 'Log in', 'Male', 'admin', '2022-11-23', '03:35:08.000000', 'Execute', 'Successful'),
(198, 38, 'Log Out', 'Male', 'admin', '2022-11-23', '03:36:38.000000', 'Execute', 'Successful'),
(199, 39, 'Log in', 'Female', 'faculty', '2022-11-23', '03:38:11.000000', 'Execute', 'Successful'),
(200, 39, 'Viewing Resources', '', '', '2022-11-23', '03:38:20.000000', 'Execute', 'Successful'),
(201, 39, 'Log Out', 'Female', 'faculty', '2022-11-23', '03:38:22.000000', 'Execute', 'Successful'),
(202, 38, 'Log in', 'Male', 'admin', '2022-11-23', '03:38:27.000000', 'Execute', 'Successful'),
(203, 38, 'Log Out', 'Male', 'admin', '2022-11-23', '03:39:14.000000', 'Execute', 'Successful'),
(204, 41, 'Log in', 'Female', 'student', '2022-11-23', '03:39:22.000000', 'Execute', 'Successful'),
(205, 41, 'Log Out', 'Female', 'student', '2022-11-23', '03:39:46.000000', 'Execute', 'Successful'),
(206, 38, 'Log in', 'Male', 'admin', '2022-11-23', '03:39:59.000000', 'Execute', 'Successful'),
(207, 38, 'Log Out', 'Male', 'admin', '2022-11-23', '03:49:59.000000', 'Execute', 'Successful'),
(208, 38, 'Log in', 'Male', 'admin', '2022-11-23', '04:11:46.000000', 'Execute', 'Successful'),
(209, 38, 'Log Out', 'Male', 'admin', '2022-11-23', '04:13:11.000000', 'Execute', 'Successful'),
(210, 38, 'Log in', 'Male', 'admin', '2022-11-24', '08:21:44.000000', 'Execute', 'Successful'),
(211, 38, 'Log Out', 'Male', 'admin', '2022-11-24', '09:07:36.000000', 'Execute', 'Successful'),
(212, 39, 'Log in', 'Female', 'faculty', '2022-11-24', '09:07:44.000000', 'Execute', 'Successful'),
(213, 39, 'Viewing Resources', '', '', '2022-11-24', '09:08:32.000000', 'Execute', 'Successful'),
(214, 39, 'Viewing Resources', '', '', '2022-11-24', '09:08:45.000000', 'Execute', 'Successful'),
(215, 39, 'Viewing Resources', '', '', '2022-11-24', '09:09:01.000000', 'Execute', 'Successful'),
(216, 39, 'Viewing Resources', '', '', '2022-11-24', '09:09:05.000000', 'Execute', 'Successful'),
(217, 39, 'Viewing Resources', '', '', '2022-11-24', '09:09:13.000000', 'Execute', 'Successful'),
(218, 39, 'Viewing Resources', '', '', '2022-11-24', '09:09:37.000000', 'Execute', 'Successful'),
(219, 39, 'Viewing Resources', '', '', '2022-11-24', '09:10:04.000000', 'Execute', 'Successful'),
(220, 39, 'Log Out', 'Female', 'faculty', '2022-11-24', '09:32:37.000000', 'Execute', 'Successful'),
(221, 39, 'Log in', 'Female', 'faculty', '2022-11-24', '01:28:38.000000', 'Execute', 'Successful'),
(222, 39, 'Log Out', 'Female', 'faculty', '2022-11-24', '01:28:58.000000', 'Execute', 'Successful'),
(223, 38, 'Log in', 'Male', 'admin', '2022-11-24', '01:29:20.000000', 'Execute', 'Successful'),
(224, 38, 'Log Out', 'Male', 'admin', '2022-11-24', '01:29:39.000000', 'Execute', 'Successful'),
(225, 57, 'Log in', 'Male', 'student', '2022-11-25', '08:25:02.000000', 'Execute', 'Successful'),
(226, 57, 'Log Out', 'Male', 'student', '2022-11-25', '08:35:57.000000', 'Execute', 'Successful'),
(227, 38, 'Log in', 'Male', 'admin', '2022-11-25', '03:08:44.000000', 'Execute', 'Successful'),
(228, 38, 'Log Out', 'Male', 'admin', '2022-11-25', '03:21:57.000000', 'Execute', 'Successful'),
(229, 38, 'Log in', 'Male', 'admin', '2022-11-25', '03:22:04.000000', 'Execute', 'Successful'),
(230, 38, 'Log Out', 'Male', 'admin', '2022-11-25', '03:38:13.000000', 'Execute', 'Successful'),
(231, 38, 'Log in', 'Male', 'admin', '2022-11-25', '03:38:43.000000', 'Execute', 'Successful'),
(232, 38, 'Log Out', 'Male', 'admin', '2022-11-25', '03:39:19.000000', 'Execute', 'Successful'),
(233, 38, 'Log in', 'Male', 'admin', '2022-11-25', '03:42:53.000000', 'Execute', 'Successful'),
(234, 38, 'Log Out', 'Male', 'admin', '2022-11-25', '04:01:33.000000', 'Execute', 'Successful'),
(235, 38, 'Log in', 'Male', 'admin', '2022-11-28', '02:57:47.000000', 'Execute', 'Successful'),
(236, 38, 'Log Out', 'Male', 'admin', '2022-11-28', '02:59:35.000000', 'Execute', 'Successful'),
(237, 67, 'Log in', 'Male', 'student', '2022-11-28', '02:59:44.000000', 'Execute', 'Successful'),
(238, 67, 'Log Out', 'Male', 'student', '2022-11-28', '03:01:23.000000', 'Execute', 'Successful'),
(239, 38, 'Log in', 'Male', 'admin', '2022-11-28', '03:01:59.000000', 'Execute', 'Successful'),
(240, 38, 'Log Out', 'Male', 'admin', '2022-11-28', '03:13:37.000000', 'Execute', 'Successful');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(225) NOT NULL,
  `img` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `img`, `firstname`, `lastname`, `email`, `password`, `type`, `status`) VALUES
(38, '', 'Rodelio B.', 'Domingo Jr.', 'rodel@sample.com', 'admin', 'admin', 'active'),
(39, '', 'Rodelio', 'Domingo Jr.', 'rodel@faculty.com', 'faculty', 'faculty', 'active'),
(40, '', 'Shaira', 'Obedoza', 'shair@sample.com', 'faculty', 'faculty', 'active'),
(41, '', 'Analyn', 'Paraguison', 'analyn@sample.com', 'student', 'student', 'active'),
(43, '', 'Allan Jay', 'Esteban', 'allan@sample.com', 'faculty', '', 'active'),
(44, '', 'RM', 'Dino', 'rm@sample.com', 'student', 'student', 'active'),
(45, '', 'Daisy', 'Casipit', 'daisy@sample.com', 'faculty', '', 'active'),
(46, '', 'Evelita', 'Carla', 'evelita@sample.com', 'faculty', 'faculty', 'active'),
(47, '', 'Gina', 'Tagasa', 'gina@sample.com', 'faculty', 'faculty', 'active'),
(48, '', 'Jenalyn', 'Pagay', 'jenalyn@sample.com', 'faculty', 'faculty', 'active'),
(49, '', 'Joan', 'Ravago', 'joan@sample.com', 'faculty', 'faculty', 'active'),
(50, '', 'Karryl Angelie', 'Abon-Amis', 'karryl@sample.com', 'faculty', '', 'active'),
(51, '', 'Ken', 'Calang', 'ken@sample.com', 'faculty', 'admin', 'active'),
(52, '', 'King Philip', 'Britanico', 'king@sample.com', 'faculty', '', 'active'),
(53, '', 'Mark Anthony', 'Moyano', 'mark@sample.com', 'faculty', 'faculty', 'active'),
(54, '', 'Princess Mara', 'Pagador', 'mara@sample.com', 'faculty', 'faculty', 'active'),
(55, '', 'Mercedita', 'Reyes', 'merce@sample.com', 'faculty', '', 'active'),
(56, '', 'Sharina Carla', 'Merculio', 'sharina@sample.com', 'faculty', 'faculty', 'active'),
(57, '', 'Rodelio', 'Domingo', 'rodelio@student.com', 'student', 'student', 'active'),
(58, '', 'Rehuel Nikolai', 'Soriano', 'niko@sample.com', 'faculty', 'faculty', 'active'),
(59, '', 'Patricia Anne', 'Martinez', 'patricia@sample.com', 'faculty', 'faculty', 'active'),
(60, '', 'Renea Lee', 'Alcantara', 'renea@sample.com', 'faculty', 'faculty', 'active'),
(61, '', 'Del', 'eter', 'deleter@delte.com', 'deleter', 'student', 'active'),
(62, '', 'Del', 'Eter', 'deelter@delete.com', 'deleter', 'faculty', 'active'),
(63, '', 'Kamille', 'Dukha', 'kamille.dukha@clsu2.edu.ph', 'faculty', 'faculty', 'active'),
(64, '', 'Christine', 'Saturno', 'christine.saturno@clsu2.edu.ph', 'FACULTY', 'faculty', 'active'),
(65, '', 'Rod', 'Dom', 'rod@gender.com', 'gender', 'faculty', 'active'),
(66, '', 'Richard', 'Pable', 'richi@faculty.com', 'gender', 'faculty', 'active'),
(67, '', 'Richard', 'Pable', 'richard@student.com', 'student', 'student', 'active'),
(68, '', 'Richard', 'Pable', 'richard@student.com', 'student', 'student', 'active'),
(69, '', 'Richard', 'Pable', 'richard@student.com', 'student', 'student', 'active'),
(70, '', 'Richard', 'Pable', 'richard@student.com', 'student', 'student', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_objectives`
--
ALTER TABLE `course_objectives`
  ADD PRIMARY KEY (`c_objective_id`);

--
-- Indexes for table `course_outcomes`
--
ALTER TABLE `course_outcomes`
  ADD PRIMARY KEY (`c_outcome_id`);

--
-- Indexes for table `course_outline`
--
ALTER TABLE `course_outline`
  ADD PRIMARY KEY (`c_outline_id`);

--
-- Indexes for table `course_type`
--
ALTER TABLE `course_type`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_photo`
--
ALTER TABLE `event_photo`
  ADD PRIMARY KEY (`ep_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `faculty_logged`
--
ALTER TABLE `faculty_logged`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `gender_user`
--
ALTER TABLE `gender_user`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `history_log_document`
--
ALTER TABLE `history_log_document`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `resources_category`
--
ALTER TABLE `resources_category`
  ADD PRIMARY KEY (`rc_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `suggested_reading`
--
ALTER TABLE `suggested_reading`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `transaction_log`
--
ALTER TABLE `transaction_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_objectives`
--
ALTER TABLE `course_objectives`
  MODIFY `c_objective_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_outcomes`
--
ALTER TABLE `course_outcomes`
  MODIFY `c_outcome_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `course_outline`
--
ALTER TABLE `course_outline`
  MODIFY `c_outline_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_type`
--
ALTER TABLE `course_type`
  MODIFY `ct_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `event_photo`
--
ALTER TABLE `event_photo`
  MODIFY `ep_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faculty_logged`
--
ALTER TABLE `faculty_logged`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender_user`
--
ALTER TABLE `gender_user`
  MODIFY `gender_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history_log_document`
--
ALTER TABLE `history_log_document`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `doc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `resources_category`
--
ALTER TABLE `resources_category`
  MODIFY `rc_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggested_reading`
--
ALTER TABLE `suggested_reading`
  MODIFY `sr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaction_log`
--
ALTER TABLE `transaction_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
