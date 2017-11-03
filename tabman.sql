-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2017 at 03:39 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabman`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `category`) VALUES
(3, 'Charging Ports'),
(1, 'Cracked Screen'),
(5, 'Mem holder'),
(6, 'NFC not sensing'),
(4, 'Not charging');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `SchId` int(11) NOT NULL,
  `School` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`SchId`, `School`) VALUES
(1, 'mbarakachembe primary');

-- --------------------------------------------------------

--
-- Table structure for table `replaced`
--

CREATE TABLE `replaced` (
  `repId` int(11) NOT NULL,
  `school` varchar(50) NOT NULL,
  `imei1` int(50) NOT NULL,
  `sqcode` int(11) NOT NULL,
  `rtype` varchar(50) NOT NULL,
  `sam` tinyint(1) NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replaced`
--

INSERT INTO `replaced` (`repId`, `school`, `imei1`, `sqcode`, `rtype`, `sam`, `rdate`) VALUES
(1, 'Kumpa Holy Mothers Primary', 2147483647, 987, '1', 0, '2017-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `returned`
--

CREATE TABLE `returned` (
  `tabId` int(11) NOT NULL,
  `serialNo` int(60) NOT NULL,
  `squidcode` varchar(5) NOT NULL,
  `school` varchar(60) NOT NULL,
  `county` varchar(50) NOT NULL,
  `rdate` date NOT NULL,
  `tissue` varchar(60) NOT NULL,
  `sam` varchar(5) NOT NULL,
  `replaced` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returned`
--

INSERT INTO `returned` (`tabId`, `serialNo`, `squidcode`, `school`, `county`, `rdate`, `tissue`, `sam`, `replaced`) VALUES
(35, 4522256, '98665', 'Kibwezi Township', 'Kajiado', '2017-08-25', 'Mem holder', '1', 0),
(36, 12345678, 'test ', 'Airport Primary', 'Kajiado', '2017-09-05', 'Cracked Screen', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schId` varchar(50) NOT NULL,
  `schvin` int(11) NOT NULL,
  `school` varchar(60) NOT NULL,
  `county` varchar(60) NOT NULL,
  `subcounty` varchar(60) NOT NULL,
  `intervention` varchar(60) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schId`, `schvin`, `school`, `county`, `subcounty`, `intervention`, `category`) VALUES
('sc001', 41101, 'ACK Charamei Primary', 'Uasin Gishu', 'Eldoret West', 'C', 'evaluation'),
('sc002', 41102, 'ACK Wote Township', 'Makueni', 'Makueni', 'A', 'non-evaluation'),
('sc003', 41103, 'Adu Primary', 'Kilifi', 'Magarini', 'A', 'evaluation'),
('sc005', 41105, 'AIC Kimurgoi Primary', 'Uasin Gishu', 'Eldoret west', 'B', 'evaluation'),
('sc006', 41106, 'AIC Mois Bridge Primary', 'Uasin Gishu', 'Eldoret west', 'A', 'evaluation'),
('sc007', 41107, 'AIC Mukuyuni Primary', 'Makueni', 'Makueni', 'B', 'evaluation'),
('sc008', 41108, 'AIC Namanga', 'Kajiado', 'Kajiado Central', 'A', 'evaluation'),
('sc009', 41109, 'AIC Nunguni Primary', 'Makueni', 'Kilungu', 'B', 'non-evaluation'),
('sc010', 41110, 'AIC Sinendet Primary', 'Uasin Gishu', 'Eldoret west', 'A', 'evaluation'),
('sc011', 41111, 'Ainabtich Primary', 'Uasin Gishu', 'Eldoret East', 'A', 'non-evaluation'),
('sc012', 41112, 'Airport Primary', 'Kilifi', 'Malindi', 'C', 'non-evaluation'),
('sc013', 41113, 'AlC Tiret Primary', 'Uasin Gishu', 'Eldoret West', 'A', 'non-evaluation'),
('sc015', 41115, 'Arap Moi Primary', 'Kajiado', 'Kajiado North', 'C', 'non-evaluation'),
('sc016', 41116, 'Arnesens Primary', 'Uasin Gishu', 'Eldoret East', 'C', 'non-evaluation'),
('sc017', 41117, 'Arthiriver Prison Primary', 'Kajiado', 'Isinya', 'B', 'non-evaluation'),
('sc018', 41118, 'Baharini Primary', 'Uasin Gishu', 'Eldoret East', 'C', 'non-evaluation'),
('sc019', 41119, 'Bahati Primary', 'Kilifi', 'Malindi', 'C', 'evaluation'),
('sc020', 41120, 'Bale Primary', 'Kilifi', 'Ganze', 'A', 'evaluation'),
('sc021', 41121, 'Bamba Primary', 'Kilifi', 'Ganze', 'B', 'non-evaluation'),
('sc022', 41122, 'Bandari Primary', 'Kilifi', 'Ganze', 'A', 'non-evaluation'),
('sc023', 41123, 'Barsombe Primary', 'Uasin Gishu', 'Eldoret west', 'C', 'evaluation'),
('sc024', 41124, 'Benyoka Primary', 'Kilifi', 'Rabai', 'B', 'evaluation'),
('sc025', 41125, 'Boarder Farm Primary', 'Uasin Gishu', 'Eldoret East', 'C', 'non-evaluation'),
('sc028', 41128, 'Bomani Primary', 'Kilifi', 'Magarini', 'B', 'evaluation'),
('sc029', 41129, 'Bwayi Primary', 'Uasin Gishu', 'Eldoret west', 'C', 'evaluation'),
('sc030', 41130, 'Central Primary', 'Uasin Gishu', 'Eldoret East', 'B', 'evaluation'),
('sc031', 41131, 'Chalani Primary', 'Kilifi', 'Kaloleni', 'B', 'evaluation'),
('sc033', 41133, 'Chepkoilel Central Primary', 'Uasin Gishu', 'Eldoret East', 'A', 'non-evaluation'),
('sc034', 41134, 'Chepkosom Primary', 'Uasin Gishu', 'Eldoret East', 'C', 'non-evaluation'),
('sc035', 41135, 'Chepkurmum Primary', 'Uasin Gishu', 'Eldoret East', 'B', 'evaluation'),
('sc036', 41136, 'Cheplaskei Primary', 'Uasin Gishu', 'Eldoret East', 'C', 'evaluation'),
('sc037', 41137, 'Chepterit Primary', 'Uasin Gishu', 'Eldoret west', 'B', 'evaluation'),
('sc038', 41138, 'CRS Primary', 'Kilifi', 'Malindi', 'C', 'evaluation'),
('sc039', 41139, 'Dabaso Primary', 'Kilifi', 'Malaindi', 'C', 'evaluation'),
('sc042', 41142, 'Dry\'s farm Primary', 'Uasin Gishu', 'Eldoret East', 'B', 'non-evaluation'),
('sc044', 41144, 'Dwa Primary', 'Makueni', 'Kibwezi', 'A', 'non-evaluation'),
('sc045', 41145, 'Dzikunze Primary', 'Kilifi', 'Ganze', 'C', 'non-evaluation'),
('sc046', 41146, 'Elangata Wuas Primary', 'Kajiado', 'Kajiado Central', 'C', 'evaluation'),
('sc047', 41147, 'Elgon Estate Primary', 'Uasin Gishu', 'Eldoret west', 'A', 'evaluation'),
('sc049', 41149, 'Embul-bul Primary', 'Kajiado', 'Kajiado North', 'B', 'non-evaluation'),
('sc050', 41150, 'Emdin Primary', 'Uasin Gishu', 'Eldoret west', 'B', 'evaluation'),
('sc051', 41151, 'Enkaroni Primary school', 'Kajiado', 'Kajiado Central', 'B', 'evaluation'),
('sc052', 41152, 'Enoomatasiani Primary', 'Kajiado', 'Kajiado North', 'C', 'evaluation'),
('sc054', 41154, 'Ewuaso Onkidongi', 'Kajiado', 'Kajiado North', 'A', 'non-evaluation'),
('sc055', 41155, 'Fundisa Primary', 'Kilifi', 'Magarini', 'B', 'evaluation'),
('sc056', 41156, 'G.K Prison Primary', 'Uasin Gishu', 'Eldoret East', 'A', 'non-evaluation'),
('sc057', 41157, 'Ganda Primary', 'Kilifi', 'Malindi', 'C', 'non-evaluation'),
('sc059', 41159, 'Ganze Primary', 'Kilifi', 'Ganze', 'C', 'non-evaluation'),
('sc060', 41160, 'Garashi Primary', 'Kilifi', 'Magarini', 'B', 'evaluation'),
('sc061', 41161, 'Gede Primary', 'Kilifi', 'Malindi', 'A', 'evaluation'),
('sc063', 41163, 'Ilbissil Boarding', 'Kajiado', 'Kajiado Central', 'B', 'non-evaluation'),
('sc064', 41164, 'Ilula Intergrated Primary', 'Uasin Gishu', 'Eldoret East', 'A', 'non-evaluation'),
('sc066', 41166, 'Isinya Mixed Boarding Primary', 'Kajiado', 'Isinya', 'A', 'evaluation'),
('sc067', 41167, 'Jila Primary', 'Kilifi', 'Ganze', 'B', 'evaluation'),
('sc068', 41168, 'Jilore Primary', 'Kilifi', 'Malindi', 'B', 'non-evaluation'),
('sc069', 41169, 'Jimba/Gede Primary', 'Kilifi', 'Malindi', 'B', 'evaluation'),
('sc071', 41171, 'Kachororoni Primary', 'Kilifi', 'Ganze', 'B', 'evaluation'),
('sc072', 41172, 'Kadzuhoni Primary', 'Kilifi', 'Magarini', 'C', 'non-evaluation'),
('sc073', 41173, 'Kaembeni Primary', 'Kilifi', 'Magarini', 'C', 'evaluation'),
('sc075', 41175, 'Kajiwe Primary', 'Kilifi', 'Rabai', 'B', 'evaluation'),
('sc076', 41176, 'Kakoneni Primary', 'Kilifi', 'Malindi', 'A', 'evaluation'),
('sc077', 41177, 'Kakuyuni Primary', 'Kilifi', 'Malindi', 'B', 'non-evaluation'),
('sc078', 41178, 'Kalamba Primary', 'Makueni', 'Nzaui', 'B', 'evaluation'),
('sc080', 41180, 'Kalulini Primary', 'Makueni', 'Kibwezi', 'A', 'non-evaluation'),
('sc081', 41181, 'Kamagut Primary', 'Uasin Gishu', 'Eldoret West', 'B', 'evaluation'),
('sc082', 41182, 'Kambi Ya Waya Primary', 'Kilifi', 'Magarini', 'C', 'non-evaluation'),
('sc083', 41183, 'Kamulalani Primary', 'Makueni', 'Kibwezi', 'C', 'non-evaluation'),
('sc084', 41184, 'Kangamboni Primary', 'Kilifi', 'Ganze', 'B', 'non-evaluation'),
('sc085', 41185, 'Kapkong Primary', 'Uasin Gishu', 'Eldoret West', 'A', 'non-evaluation'),
('sc086', 41186, 'Kapkures Primary', 'Uasin Gishu', 'Eldoret west', 'B', 'non-evaluation'),
('sc089', 41189, 'Kaptebengwet Primary', 'Uasin Gishu', 'Eldoret West', 'A', 'non-evaluation'),
('sc090', 41190, 'Karima Primary', 'Kilifi', 'Malindi', 'B', 'non-evaluation'),
('sc091', 41191, 'Kasidi Primary', 'Kilifi', 'Rabai', 'B', 'evaluation'),
('sc092', 41192, 'Katendewa Primary', 'Kilifi', 'Ganze', 'A', 'non-evaluation'),
('sc096', 41196, 'Kavuko Primary', 'Makueni', 'Mukaa', 'A', 'non-evaluation'),
('sc097', 41197, 'Kawala Primary', 'Makueni', 'Nzaui', 'C', 'non-evaluation'),
('sc098', 41198, 'Kemeliet Primary', 'Uasin Gishu', 'Eldoret East', 'B', 'non-evaluation'),
('sc099', 41199, 'Kenya Marble Quarry', 'Kajiado', 'Kajiado Central', 'C', 'non-evaluation'),
('sc100', 41200, 'Kerotet Primary', 'Uasin Gishu', 'Eldoret west', 'C', 'evaluation'),
('sc101', 41201, 'Kiambani Primary', 'Makueni', 'Makindu', 'A', 'evaluation'),
('sc103', 41203, 'Kibaokiche Primary', 'Kilifi', 'Kaloleni', 'C', 'evaluation'),
('sc104', 41204, 'Kibiko primary', 'Kajiado', 'Kajiado North', 'A', 'evaluation'),
('sc105', 41205, 'Kibokoni Primary', 'Kilifi', 'Malindi', 'B', 'non-evaluation'),
('sc106', 41206, 'Kibwezi Township', 'Makueni', 'Kibwezi', 'A', 'non-evaluation'),
('sc107', 41207, 'Kidemu Primary', 'Kilifi', 'Ganze', 'B', 'non-evaluation'),
('sc108', 41208, 'Kijiwetanga Primary', 'Kilifi', 'Malindi', 'C', 'non-evaluation'),
('sc109', 41209, 'Kiliku Primary', 'Makueni', 'Nzaui', 'C', 'evaluation'),
('sc110', 41210, 'Kiongwani Primary', 'Makueni', 'Mukaa', 'C', 'non-evaluation'),
('sc112', 41212, 'Kipsomba Primary', 'Uasin Gishu', 'Eldoret West', 'B', 'evaluation'),
('sc113', 41213, 'Kirumbi Primary', 'Kilifi', 'Kaloleni', 'A', 'non-evaluation'),
('sc114', 41214, 'Kiserian Primary', 'Kajiado', 'Kajiado North', 'C', 'non-evaluation'),
('sc118', 41218, 'Kizurini Primary', 'Kilifi', 'Kaloleni', 'C', 'evaluation'),
('sc120', 41220, 'Kumpa Holy Mothers Primary', 'Kajiado', 'Kajiado Central', 'A', 'evaluation'),
('sc121', 41221, 'Kwakiketi Primary', 'Makueni', 'Mukaa', 'C', 'evaluation'),
('sc123', 41223, 'Kwaupanga Primary', 'Kilifi', 'Malindi', 'B', 'evaluation'),
('sc124', 41224, 'Kyale Primary', 'Makueni', 'Kilungu', 'A', 'evaluation'),
('sc128', 41228, 'Leleit Day and Boarding Primary', 'Uasin Gishu', 'Eldoret East', 'C', 'evaluation'),
('sc129', 41229, 'Limnyomoi Primary', 'Uasin Gishu', 'Eldoret west', 'B', 'non-evaluation'),
('sc131', 41231, 'Mabarakachembe Primary', 'Kilifi', 'Malindi', 'C', 'evaluation'),
('sc133', 41233, 'Magadi Primary', 'Kajiado', 'Kajiado North', 'A', 'evaluation'),
('sc136', 41236, 'Majilango Baya Primary', 'Kilifi', 'Malindi', 'C', 'non-evaluation'),
('sc137', 41237, 'Makindu A Primary', 'Makueni', 'Makindu', 'C', 'non-evaluation'),
('sc139', 41239, 'Makunga Primary', 'Uasin Gishu', 'Eldoret west', 'C', 'non-evaluation'),
('sc140', 41240, 'Malindi Central Primary', 'Kilifi', 'Malindi', 'C', 'non-evaluation'),
('sc141', 41241, 'Malindi HGM Primary', 'Kilifi', 'Malindi', 'C', 'evaluation'),
('sc142', 41242, 'Malivani AIC Boarding Primary', 'Makueni', 'Makiueni', 'C', 'non-evaluation'),
('sc143', 41243, 'Malomani Primary', 'Kilifi', 'Ganze', 'B', 'non-evaluation'),
('sc145', 41245, 'Maparasha Primary', 'Kajiado', 'Kajiado Central', 'A', 'evaluation'),
('sc146', 41246, 'Mapimo Primary', 'Kilifi', 'Maagrini', 'B', 'non-evaluation'),
('sc147', 41247, 'Marafa Primary', 'Kilifi', 'Magarini', 'A', 'evaluation'),
('sc148', 41248, 'Marere Primary', 'Kilifi', 'Ganze', 'B', 'evaluation'),
('sc149', 41249, 'Marereni Primary', 'Kilifi', 'Magarini', 'C', 'non-evaluation'),
('sc150', 41250, 'Mariakani Primary', 'Kilifi', 'Kaloleni', 'C', 'non-evaluation'),
('sc151', 41251, 'Marikebuni Primary', 'Kilifi', 'Magarini', 'A', 'evaluation'),
('sc153', 41253, 'Maryango Primary', 'Kilifi', 'Ganze', 'C', 'evaluation'),
('sc156', 41256, 'Maviaume Primary', 'Makueni', 'Nzaui', 'B', 'evaluation'),
('sc157', 41257, 'Mavindu Primary', 'Makueni', 'Mbooni West', 'C', 'evaluation'),
('sc158', 41258, 'Mayowe Primary', 'Kilifi', 'Ganze', 'A', 'non-evaluation'),
('sc159', 41259, 'Mbeletu Primary', 'Makueni', 'Nzaui', 'A', 'evaluation'),
('sc160', 41260, 'Mbooni County Primary', 'Makueni', 'Mbooni West', 'A', 'non-evaluation'),
('sc162', 41262, 'Meto Primary', 'Kajiado', 'Kajiado Central', 'C', 'non-evaluation'),
('sc163', 41263, 'Mida Primary', 'Kilifi', 'Malindi', 'B', 'evaluation'),
('sc164', 41264, 'Mijomboni Primary', 'Kilifi', 'Malindi', 'C', 'evaluation'),
('sc166', 41266, 'Mitsemerini Primary', 'Kilifi', 'Ganze', 'A', 'non-evaluation'),
('sc168', 41268, 'MMangani Primary', 'Kilifi', 'Malindi', 'A', 'evaluation'),
('sc169', 41269, 'Moi (U) Chepkoilel Primary', 'Uasin Gishu', 'Eldoret East', 'C', 'non-evaluation'),
('sc171', 41271, 'Moiben Upper Primary', 'Uasin Gishu', 'Eldoret East', 'A', 'evaluation'),
('sc173', 41273, 'Mrima Wa Ndege Primary', 'Kilifi', 'Ganze', 'A', 'non-evaluation'),
('sc174', 41274, 'Mtito Andei Primary', 'Makueni', 'Kibwezi', 'A', 'evaluation'),
('sc175', 41275, 'Mtsara Wa Tsatsu', 'Kilifi', 'Ganze', 'B', 'non-evaluation'),
('sc176', 41276, 'Mukaa Primary', 'Makueni', 'Mukaa', 'A', 'evaluation'),
('sc179', 41279, 'Mulala Primary', 'Makueni', 'Nzaui', 'B', 'non-evaluation'),
('sc180', 41280, 'Mulumini Primary', 'Makueni', 'Mukaa', 'C', 'evaluation'),
('sc182', 41282, 'Munyaka Primary', 'Uasin Gishu', 'Eldoret East', 'B', 'non-evaluation'),
('sc183', 41283, 'Murgor Hills Primary', 'Uasin Gishu', 'Eldoret West', 'C', 'evaluation'),
('sc185', 41285, 'Musao Primary', 'Makueni', 'Mbooni West', 'B', 'non-evaluation'),
('sc187', 41287, 'Muthingini Primary', 'Makueni', 'Kibwezi', 'B', 'non-evaluation'),
('sc188', 41288, 'Mutulani Primary', 'Makueni', 'Makueni', 'A', 'evaluation'),
('sc189', 41289, 'Mutweamboo Primary', 'Makueni', 'Mukaa', 'B', 'evaluation'),
('sc190', 41290, 'Mwandaza Primary', 'Kilifi', 'Kaloleni', 'C', 'evaluation'),
('sc191', 41291, 'Mwandodo Primary', 'Kilifi', 'Rabai', 'C', 'evaluation'),
('sc192', 41292, 'Mwangutwa Primary', 'Kilifi', 'Rabai', 'A', 'non-evaluation'),
('sc193', 41293, 'Mwarandinda Primary', 'Kilifi', 'Ganze', 'B', 'non-evaluation'),
('sc194', 41294, 'Mwareni Primary', 'Kilifi', 'Kaloleni', 'C', 'evaluation'),
('sc196', 41296, 'Nabiswa Primary', 'Uasin Gishu', 'Eldoret west', 'B', 'evaluation'),
('sc197', 41297, 'Naiberi Primary', 'Uasin Gishu', 'Eldoret East', 'B', 'evaluation'),
('sc198', 41298, 'Nakeel Primary', 'Kajiado', 'Kajiado North.', 'B', 'evaluation'),
('sc199', 41299, 'Namanga Township Primary', 'Kajiado', 'Kajiado Central', 'A', 'non-evaluation'),
('sc200', 41300, 'Naromoru Primary', 'Kajiado', 'Kajiado North', 'B', 'non-evaluation'),
('sc201', 41301, 'Ndabaranach Primary', 'Uasin Gishu', 'Eldoret west', 'C', 'evaluation'),
('sc203', 41303, 'Nduundune AIC Primary', 'Makueni', 'Nzaui', 'B', 'evaluation'),
('sc204', 41304, 'Ngoisa Primary', 'Uasin Gishu', 'Eldoret East', 'C', 'non-evaluation'),
('sc205', 41305, 'Ngomeni Primary', 'Kilifi', 'Magarini', 'A', 'non-evaluation'),
('sc207', 41307, 'Ngoto AIC Primary', 'Makueni', 'Nzaui', 'B', 'non-evaluation'),
('sc208', 41308, 'Ngukuni Primary', 'Makueni', 'Makindu', 'A', 'non-evaluation'),
('sc210', 41310, 'Nkaimurunya Primary', 'Kajiado', 'Kajiado North', 'B', 'non-evaluation'),
('sc211', 41311, 'Nyari Primary', 'Kilifi', 'Ganze', 'B', 'non-evaluation'),
('sc212', 41312, 'Nziu Primary', 'Makueni', 'Makueni', 'A', 'non-evaluation'),
('sc214', 41314, 'Olekasasi Primary', 'Kajiado', 'Kajiado North.', 'B', 'non-evaluation'),
('sc216', 41316, 'Oloolua Primary', 'Kajiado', 'Kajiado North', 'B', 'evaluation'),
('sc217', 41317, 'Oloosurutia primary', 'Kajiado', 'Kajiado North', 'C', 'evaluation'),
('sc218', 41318, 'Olteiyani Primary', 'Kajiado', 'Kajiado North', 'A', 'evaluation'),
('sc219', 41319, 'Ongata Rongai Primary', 'Kajiado', 'Kajido North', 'B', 'non-evaluation'),
('sc220', 41320, 'Petanguo Primary', 'Kilifi', 'Ganze', 'B', 'non-evaluation'),
('sc221', 41321, 'Ramada Primary', 'Kilifi', 'Magarini', 'C', 'non-evaluation'),
('sc222', 41322, 'RCEA Cheplelaibei Primary', 'Uasin Gishu', 'Eldoret west', 'C', 'non-evaluation'),
('sc223', 41323, 'Ribe Primary', 'Kilifi', 'Rabai', 'A', 'non-evaluation'),
('sc224', 41324, 'Sabaki Primary', 'Kilifi', 'Malindi', 'A', 'non-evaluation'),
('sc225', 41325, 'Sambut Primary', 'Uasin Gishu', 'Eldoret West', 'C', 'evaluation'),
('sc226', 41326, 'Saramek Primary', 'Uasin Gishu', 'Eldoret west', 'A', 'evaluation'),
('sc227', 41327, 'SDA Segero Primary', 'Uasin Gishu', 'Eldoret west', 'C', 'non-evaluation'),
('sc229', 41329, 'Shangia Primary', 'Kilifi', 'Kaloleni', 'A', 'evaluation'),
('sc230', 41330, 'Sigowet Primary', 'Uasin Gishu', 'Eldoret West', 'B', 'evaluation'),
('sc231', 41331, 'Sir Alibin Salim Primary', 'Kilifi', 'Malindi', 'B', 'evaluation'),
('sc232', 41332, 'Sokoke Primary', 'Kilifi', 'Ganze', 'A', 'evaluation'),
('sc233', 41333, 'Sosiyo Primary', 'Uasin Gishu', 'Eldoret East', 'B', 'non-evaluation'),
('sc234', 41334, 'Sosoni Primary', 'Kilifi', 'Magarini', 'A', 'non-evaluation'),
('sc235', 41335, 'Soy Primary', 'Uasin Gishu', 'Eldoret west', 'A', 'non-evaluation'),
('sc236', 41336, 'St Columbans Primary', 'Uasin Gishu', 'Eldoret West', 'A', 'evaluation'),
('sc238', 41338, 'St. Andrews Primary', 'Kilifi', 'Malindi', 'A', 'non-evaluation'),
('sc239', 41339, 'St. Michaels Primary', 'Kilifi', 'Koleleni', 'C', 'non-evaluation'),
('sc240', 41340, 'St. Peters Kapkechui', 'Uasin Gishu', 'Eldoret West', 'A', 'evaluation'),
('sc241', 41341, 'Sultan Hamud AIC Primary', 'Makueni', 'Mukaa', 'B', 'evaluation'),
('sc242', 41342, 'Takaye Primary', 'Kilifi', 'Malindi', 'C', 'evaluation'),
('sc246', 41346, 'Torochmoi Primary', 'Uasin Gishu', 'Eldoret East', 'C', 'non-evaluation'),
('sc247', 41347, 'Tsagwa Primary', 'Kilifi', 'Kaloleni', 'A', 'evaluation'),
('sc250', 41350, 'Unoa Primary', 'Makueni', 'Makueni', 'A', 'evaluation'),
('sc251', 41351, 'Upweoni Primary', 'Kilifi', 'Malindi', 'B', 'non-evaluation'),
('sc252', 41352, 'Utithini Primary', 'Makueni', 'Kathonzweni', 'C', 'evaluation'),
('sc253', 41353, 'Vishakani Primary', 'Kilifi', 'Kaloleni', 'A', 'evaluation'),
('sc254', 41354, 'Vitale HGM Primary', 'Makueni', 'Kathonzweni', 'A', 'non-evaluation'),
('sc255', 41355, 'Vitengeni Primary', 'Kilifi', 'Ganze', 'C', 'non-evaluation'),
('sc257', 41357, 'Waunifor Primary', 'Uasin Gishu', 'Eldoret East', 'A', 'non-evaluation'),
('sc260', 41360, 'Ziwa Primary', 'Uasin Gishu', 'Eldoret west', 'C', 'evaluation'),
('sc301', 41361, 'Hill School Eldoret Primary', 'Uasin Gishu', 'Kesses', 'C', 'non-evaluation'),
('sc302', 41362, 'Koiluget Primary', 'Uasin Gishu', 'Kesses', 'C', 'non-evaluation'),
('sc303', 41363, 'Koisagat Primary', 'Uasin Gishu', 'Kesses', 'C', 'non-evaluation'),
('sc304', 41364, 'Moi University Primary', 'Uasin Gishu', 'Kesses', 'C', 'non-evaluation'),
('sc305', 41365, 'Ndungulu Primary', 'Uasin Gishu', 'Kesses', 'C', 'non-evaluation'),
('sc306', 41366, 'Sahanajad special school', 'Kilifi', 'Mutwapa', 'C', 'non-evaluation'),
('sc307', 41367, 'Seiyo Primary', 'Uasin Gishu', 'Kesses', 'C', 'non-evaluation'),
('sc308', 41368, 'St. Georges? Primary', 'Uasin Gishu', 'Kapseret', 'A', 'non-evaluation'),
('sc309', 41369, 'AIC Samoei Model Primary', 'Uasin Gishu', 'Eldoret', 'C', 'non-evaluation'),
('sc310', 41370, 'Terige Primary', 'Uasin Gishu', 'Lessos', 'C', 'non-evaluation'),
('sc311', 41371, 'Kaprobu Primary', 'Uasin Gishu', 'Eldoret', 'C', 'non-evaluation'),
('SchoolID', 0, 'School', 'County', 'Sub_County', 'Group', 'Category');

-- --------------------------------------------------------

--
-- Table structure for table `tabletallocation`
--

CREATE TABLE `tabletallocation` (
  `id` int(11) NOT NULL,
  `serialNo` bigint(100) NOT NULL COMMENT 'serial Number of the tablet',
  `squidCode` varchar(50) NOT NULL,
  `school` varchar(60) NOT NULL,
  `county` varchar(50) NOT NULL,
  `sam` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabletallocation`
--

INSERT INTO `tabletallocation` (`id`, `serialNo`, `squidCode`, `school`, `county`, `sam`) VALUES
(45, 56555655, 'test 2', 'Kasidi Primary', 'Kilifi', 1),
(21, 353225043326887, '0711', 'Sosiyo Primary', 'Uasin Gishu', 0),
(8, 356497053120042, '0177', 'Bahati Primary', 'Kilifi', 1),
(36, 356497053120448, '0231', 'Munyaka Primary', 'Uasin Gishu', 1),
(38, 356497053120562, '0947', 'Kidemu Primary', 'Kilifi', 1),
(20, 356497053120828, '0119', 'Kamagut Primary', 'Uasin Gishu', 1),
(40, 356497053121669, '0062', 'Seiyo Primary', 'Uasin Gishu', 0),
(23, 356497053121883, '0242', 'Ongata Rongai Primary', 'Kajiado', 1),
(30, 356497053121966, '0444', 'Magadi Primary', 'Kajiado', 0),
(12, 356497053122766, '0554', 'Kibokoni Primary', 'Kilifi', 1),
(44, 356497053123186, '0157', 'Isinya Mixed Boarding Primary', 'Kajiado', 1),
(25, 356497053124101, '0250', 'Nakeel Primary', 'Kajiado', 1),
(18, 356497053124341, '0330', 'Mulala Primary', 'Makueni', 0),
(35, 356497053124580, '0283', 'Limnyomoi Primary', 'Uasin Gishu', 1),
(19, 356497053124903, '0183', 'Muthingini Primary', 'Makueni', 0),
(13, 356497053124960, '0115', 'Shangia Primary', 'Kilifi', 1),
(11, 356497053125009, '0116', 'Kajiwe Primary', 'Kilifi', 1),
(28, 356497053125827, '0139', 'Mwareni Primary', 'Kilifi', 0),
(43, 356497053126841, '0460', 'Enkaroni Primary school', 'Kajiado', 1),
(7, 356497053127161, '0419', 'Upweoni Primary', 'Kilifi', 1),
(29, 356497053127948, '0470', 'Dzikunze Primary', 'Kilifi', 1),
(26, 356497053127963, '0073', 'Kumpa Holy Mothers Primary', 'Kajiado', 0),
(27, 356497053129001, '0319', 'Chepkurmum Primary', 'Uasin Gishu', 0),
(41, 356497053133888, '0569', 'Ngukuni Primary', 'Makueni', 0),
(15, 356497053133920, '0584', 'Kibaokiche Primary', 'Kilifi', 0),
(17, 356497053134183, '0125', 'Maryango Primary', 'Kilifi', 0),
(33, 356497053134829, '0712', 'Karima Primary', 'Kilifi', 1),
(37, 356497053135024, '0289', 'Mwandaza Primary', 'Kilifi', 1),
(32, 356497053135941, '0260', 'G.K Prison Primary', 'Uasin Gishu', 0),
(31, 356497053136543, '0597', 'Kachororoni Primary', 'Kilifi', 0),
(16, 356497053137442, '0528', 'MMangani Primary', 'Kilifi', 0),
(22, 356497053137921, '0422', 'Ewuaso Onkidongi', 'Kajiado', 1),
(9, 356497053138127, '0478', 'Mabarakachembe Primary', 'Kilifi', 0),
(42, 356497053138242, '0881', 'Kibwezi Township', 'Makueni', 1),
(39, 356497053138705, '0617', 'Ngukuni Primary', 'Makueni', 0),
(14, 356497053139489, '0920', 'Maryango Primary', 'Kilifi', 1),
(24, 356497053139588, '0525', 'Enoomatasiani Primary', 'Kajiado', 1),
(34, 356497053139760, '0713', 'Chepkosom Primary', 'Uasin Gishu', 1),
(10, 356497053139927, '0622', 'Mapimo Primary', 'Kilifi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`SchId`);

--
-- Indexes for table `replaced`
--
ALTER TABLE `replaced`
  ADD PRIMARY KEY (`repId`);

--
-- Indexes for table `returned`
--
ALTER TABLE `returned`
  ADD PRIMARY KEY (`tabId`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schId`);

--
-- Indexes for table `tabletallocation`
--
ALTER TABLE `tabletallocation`
  ADD PRIMARY KEY (`serialNo`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `SchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `replaced`
--
ALTER TABLE `replaced`
  MODIFY `repId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `returned`
--
ALTER TABLE `returned`
  MODIFY `tabId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tabletallocation`
--
ALTER TABLE `tabletallocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
