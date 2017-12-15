
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- Database: `basic_php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `added_by`, `artist_id`, `date_added`) VALUES
(1, 'love', 1, 1, '2017-12-08 14:12:51'),
(2, 'flyingkite--update', 1, 3, '2017-12-08 14:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `added_by`, `date_added`) VALUES
(1, 'Julian Casablancas', 1, '2017-12-08 13:59:11'),
(3, 'Jeff Buckley', 1, '2017-12-08 14:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'nadiniiio', 'nadinio@nadnio.com', 'test', '827ccb0eea8a706c4c34a16891f84e7b');
COMMIT;
