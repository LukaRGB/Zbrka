-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 06:41 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `local_events`
--

CREATE TABLE `local_events` (
  `Title` varchar(128) COLLATE utf8mb4_croatian_ci NOT NULL,
  `ImagePath` varchar(1024) COLLATE utf8mb4_croatian_ci NOT NULL,
  `Date` date NOT NULL,
  `Location` varchar(128) COLLATE utf8mb4_croatian_ci NOT NULL,
  `MainText` varchar(2048) COLLATE utf8mb4_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `local_events`
--

INSERT INTO `local_events` (`Title`, `ImagePath`, `Date`, `Location`, `MainText`) VALUES
('Festival Nauke', '/images/festival_nauke.jpg', '2019-12-06', 'Beogradski sajam, Beograd', 'Festival nauke, najveća manifestacija u oblasti promocije nauke i obrazovanja, održaće se na Beogradskom sajmu u halama 3, 3a i 5, od 5. do 8. decembra 2019. godine.\r\n\r\nTema ovogodišnjeg 13. festivala je \"Razotkrivanje\", pošto ga posvećujemo upravo razotkrivanju zabluda i mitova uz pomoć nauke i naučnih dostignuća.\r\n\r\n\r\n\r\n\r\nNa festivalu će učestvovati više od 60 naučnih i obrazovnih institucija, udruženja ali pojedinaca iz Srbije i iz inostranstva.\r\n\r\nPonosimo se time da smo za prethodnih 13 godina inspirisali škole, fakultete i naučne institucije u Srbiji da učestvuju u svakom sledećem festivalu sa uvek novim, drugačijim i još sjajnijim postavkama. I ne samo to! Po ugledu na naš projekat nastalo je više od 20 školskih festivala nauke širom Srbije. '),
('Exit Festival', '/images/exit.jpg', '2020-07-09', 'Petrovaradinska tvrđava, Novi Sad', 'EXIT je višestruko nagrađivani internacionalni letnji muzički festival. Održava se svake godine u Novom Sadu u Srbiji, na Petrovaradinskoj tvrđavi, koju mnogi smatraju za jednu od najboljih festivalskih lokacija na svetu, i na njemu nastupa preko 1000 izvođača na više od 40 bina i festivalskih zona.\r\n\r\n\r\n\r\n  \r\n\r\n\r\nPored titule „Najbolji evropski festival” osvojene na Evropskim festivalskim nagradama 2013. i 2017. godine, EXIT je 2007. godine proglašen za najbolji evropski festival na Britanskim festivalskim nagradama. EXIT je proglašen i za Najbolji evropski festival za 2016. godinu od strane vodećeg evropskog turističkog priznanja “European Best Destinations“, koje se dodeljuje u saradnji sa sa Evropskom komisijom, dok je Savet za regionalnu saradnju 2017. odabrao EXIT festival za Šampiona regionalne saradnje u Jugoistočnoj Evropi.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
