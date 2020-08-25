-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: simarund
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `durasi` smallint(6) DEFAULT NULL,
  `lokasi` varchar(10) DEFAULT NULL,
  `jenis_liputan` enum('inisiatif','advetorial') DEFAULT NULL,
  `id_kameramen` tinyint(4) DEFAULT NULL,
  `id_reporter` tinyint(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_kategori` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_b_i` FOREIGN KEY (`id`) REFERENCES `item` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (9,150,'Bima','inisiatif',3,1,'2018-06-28',6),(12,150,'Surabaya','inisiatif',1,1,'2018-07-15',1),(17,150,'Bima','inisiatif',1,1,'2018-10-27',5),(18,150,'asd','inisiatif',1,1,'2018-10-27',1),(19,150,'asdas','inisiatif',1,1,'2018-10-27',1),(20,150,'Mataram','inisiatif',7,7,'2018-04-14',1),(21,150,'Mataram','inisiatif',2,2,'2018-04-14',1),(22,150,'Mataram','inisiatif',8,8,'2018-04-14',1),(23,150,'Mataram','inisiatif',9,10,'2018-04-14',1),(24,150,'Mataram','inisiatif',9,10,'2018-04-14',1),(25,150,'Mataram','inisiatif',9,10,'2018-04-14',1),(26,150,'Mataram','inisiatif',12,11,'2018-04-14',1),(27,150,'Mataram','inisiatif',12,11,'2018-04-14',1),(28,150,'Mataram','inisiatif',13,3,'2018-04-14',1),(29,150,'Mataram','inisiatif',13,3,'2018-04-14',1),(32,150,'Lotim','inisiatif',9,10,'2018-04-14',1),(33,150,'Lotim','inisiatif',9,10,'2018-04-14',1),(34,150,'Mataram','inisiatif',12,11,'2018-04-14',1),(40,150,'Mataram','inisiatif',13,3,'2018-04-14',6),(41,150,'Mataram','inisiatif',9,10,'2018-04-14',6),(42,150,'Mataram','inisiatif',9,10,'2018-04-14',6),(43,150,'Mataram','inisiatif',13,3,'2018-04-14',6),(44,150,'Mataram','inisiatif',13,3,'2018-04-14',6),(45,150,'Mataram','inisiatif',13,3,'2018-04-14',6),(46,150,'Mataram','inisiatif',13,3,'2018-04-14',6),(54,150,'Mataram','inisiatif',10,20,'2018-12-15',1);
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita_daerah`
--

DROP TABLE IF EXISTS `berita_daerah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berita_daerah` (
  `id` int(11) NOT NULL,
  `durasi` smallint(6) DEFAULT NULL,
  `id_dubber` tinyint(4) DEFAULT NULL,
  `id_penterjemah` tinyint(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_kategori` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_bd_i` FOREIGN KEY (`id`) REFERENCES `item` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita_daerah`
--

LOCK TABLES `berita_daerah` WRITE;
/*!40000 ALTER TABLE `berita_daerah` DISABLE KEYS */;
INSERT INTO `berita_daerah` VALUES (6,110,1,1,'2018-06-28',2),(47,150,20,19,'2018-04-23',2),(48,150,20,19,'2018-04-23',2),(49,150,20,19,'2018-04-23',2),(50,150,20,19,'2018-04-23',2),(51,150,20,19,'2018-04-23',2),(52,150,20,19,'2018-04-23',2),(53,150,20,19,'2018-04-23',2);
/*!40000 ALTER TABLE `berita_daerah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `id_pengguna` tinyint(4) DEFAULT '4',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (6,'asdasdas',4),(8,'Iklan',4),(9,'Tes',4),(12,'Berita 3',4),(17,'Aaa',4),(18,'1',4),(19,'2',4),(20,'Momentum Isra\' Mi\'raj, Tingkatkan Sholat Lima Waktu',5),(21,'Peringatan Isra\' Mi\'raj di BTN Lingkar Manunggal Bajur',5),(22,'30 Persen Sekolah Dasar dalam Kondisi Rusak',4),(23,'KPU Ingatkan Paslon Tepat Waktu Laporkan Dana Kampanye',4),(24,'KPU Tunggu Surat Resmi Pengunduran Diri Cagub dan Cawagub',4),(25,'Sosialisasi Pilkada dan Bimtek Terus Dilakukan KPU NTB',4),(26,'PTSL Dapat Menjadi Momentum Membangun Masyarakat Desa',4),(27,'PTSL Untuk Sertifikasi Tanah yang Cepat dan Merata',4),(28,'Dinas Peternakan NTB Targetkan PAD 1,005 Miliar',4),(29,'Dinas Perhubungan Membuka Pendaftaran Bagi Taxi Online',4),(32,'Literasi Keuangan di NTB 21 Persen',4),(33,'Komitmen Dukung Pariwisata Bertaraf Internasional',4),(34,'Menciptakan Ruang Ramah Perempuan dan Anak',4),(35,'Tune Warta NTB',4),(36,'Penyiar Opening',4),(37,'Cuplikan Topik Utama',4),(38,'NTB Memilih',4),(39,'Olahraga Sepekan',4),(40,'Kejuaraan Futsal antar SMP dan SMA Se Pulau Lombok',4),(41,'Anggota Himpunan Wasit NTB Harapkan ada In House',4),(42,'Atlet Tembak NTB Waspadai Jawa Timur jadi Saingan Berat',4),(43,'Perbakin NTB Targetkan Juara di Kejurnas Surabaya',4),(44,'Pertandingan Olahraga Special Olympics Indonesia NTB',4),(45,'Prestasi yang Diraih Atlit Disabilitas Intelektual NTB',4),(46,'Olahraga Booce Baru Dikembangkan di NTB',4),(47,'BPPOM Site Oat Daik Kosmetik Ilegal',4),(48,'Jamu Tradisional Bertahen 79 Taun',4),(49,'Kaum Bajang Harus Peduli Perlindungan Tipaq',4),(50,'Relawan Sahabat Kanaq Tulung Urus Kekerasan',4),(51,'Pemda Tendengin Fokus Tipaq Infrastruktur',4),(52,'Sengigi Masih Beduwe Potensi Tipaq Pare Investor',4),(53,'Kesugihan Alam Leq Gumi Paer',4),(54,'Berita 5',4);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_siaran`
--

DROP TABLE IF EXISTS `item_siaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_siaran` (
  `id_siaran` smallint(6) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `urutan` tinyint(4) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_item` (`id_item`),
  KEY `fk_siaran` (`id_siaran`),
  CONSTRAINT `fk_item` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_siaran` FOREIGN KEY (`id_siaran`) REFERENCES `siaran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_siaran`
--

LOCK TABLES `item_siaran` WRITE;
/*!40000 ALTER TABLE `item_siaran` DISABLE KEYS */;
INSERT INTO `item_siaran` VALUES (13,12,5,1),(13,9,4,3),(12,9,2,14),(11,12,3,16),(10,12,4,22),(10,9,5,24),(13,8,6,31),(13,8,3,32),(10,8,3,45),(16,12,1,46),(16,9,3,48),(16,8,5,50),(16,8,6,51),(17,12,1,52),(17,9,3,54),(17,8,5,56),(20,9,1,57),(20,12,2,58),(20,8,3,62),(20,8,7,63),(22,12,4,71),(22,8,2,78),(11,8,1,79),(11,8,4,80),(11,8,5,81),(37,6,2,82),(39,17,1,83),(37,8,1,84),(37,8,3,85),(32,12,1,86),(32,18,5,90),(32,19,9,91),(32,8,2,92),(32,8,4,93),(32,8,6,94),(32,8,8,95),(32,8,10,96),(32,8,12,97),(32,8,13,98),(32,8,14,99),(32,8,15,100),(32,8,16,101),(32,8,17,102),(49,17,1,103),(58,20,2,104),(58,21,3,105),(58,22,4,106),(58,23,6,107),(58,24,7,108),(58,25,8,109),(58,26,11,110),(58,27,12,111),(58,28,13,112),(58,29,14,113),(58,32,15,114),(58,33,18,115),(58,34,19,116),(58,37,1,119),(58,38,5,120),(58,38,9,121),(58,8,10,122),(58,8,16,123),(58,39,17,124),(59,35,1,125),(59,36,2,126),(59,40,3,127),(59,41,4,128),(59,42,5,129),(59,43,6,130),(59,44,7,131),(59,8,8,132),(59,45,9,133),(59,46,10,134),(64,36,1,135),(64,47,2,136),(64,48,3,137),(64,49,4,138),(64,50,5,139),(64,51,6,140),(64,8,7,141),(64,53,8,142),(64,52,9,143),(62,54,1,144);
/*!40000 ALTER TABLE `item_siaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal` (
  `id_kategori` tinyint(4) DEFAULT NULL,
  `hari` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES (1,1),(1,3),(1,4),(1,5),(1,6),(1,7),(3,3),(4,4),(5,5),(5,6),(6,7),(7,1),(2,2),(1,2);
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `siaran_lokal` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Utama',0),(2,'Warta Sasak',1),(3,'Rungan Samawa',1),(4,'Haba Mbojo',1),(5,'Info Pertanian',0),(6,'Olahraga Sepekan',0),(7,'Lintas Nusantara',0);
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(35) DEFAULT NULL,
  `alias` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (2,'Mukodariah','pegawai','Kodar'),(3,'Zulkarnain','pegawai','ZUL'),(4,'Antonius Tue','EIC','Antonius'),(5,'Arya Setiawan','CDE','Aryasetia'),(6,'Ir. I Gede Mustito, M.Si','Kepala Seksi Berita','PAKGEDE'),(7,'Asep','Pegawai','ASEP'),(8,'Nanang','Pegawai','NANANG'),(9,'Ribut Ambika','Pegawai','AMBI'),(10,'Ikhsan S. B.','Pegawai','IKSAN'),(11,'Azizam','Pegawai','AZI'),(12,'Fakhrurrozi','Pegawai','OZI'),(13,'Nuraini','Pegawai','NURAI'),(14,'Darmawan','Pegawai','DARMA'),(15,'M. Guntur','Pegawai','GUNTUR'),(16,'Deki Januar','Pegawai','DEKI'),(17,'M. Ponde','Pegawai','PONDE'),(18,'Widya CS','Pegawai','Widya'),(19,'Ismail','Pegawai','ISMAIL'),(20,'Fatia','Pegawai','FATIA'),(21,'Alif','Pegawai','ALIF');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengguna` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` enum('admin','redaktur','pegawai') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` VALUES (1,'alif','099a147c0c6bcd34009896b2cc88633c','redaktur'),(2,'alif1011','c56d0e9a7ccec67b4ea131655038d604','redaktur'),(4,'admin','21232f297a57a5a743894a0e4a801fc3','admin'),(5,'zul123','6911ce0b67e45660207aa3fdf9f412c2','pegawai'),(6,'alif1','81dc9bdb52d04dc20036dbd8313ed055','pegawai');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas_siaran`
--

DROP TABLE IF EXISTS `petugas_siaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `petugas_siaran` (
  `id_pegawai` tinyint(4) DEFAULT NULL,
  `id_siaran` smallint(6) DEFAULT NULL,
  `bagian` enum('redaktur_1','redaktur_2','redaktur_3','petugas_efp','unit_manager','editor','pengarah_acara','penyiar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas_siaran`
--

LOCK TABLES `petugas_siaran` WRITE;
/*!40000 ALTER TABLE `petugas_siaran` DISABLE KEYS */;
INSERT INTO `petugas_siaran` VALUES (2,11,''),(2,10,''),(3,11,'penyiar'),(3,25,'redaktur_1'),(3,25,'redaktur_2'),(3,25,'redaktur_3'),(2,25,'petugas_efp'),(3,25,'penyiar'),(3,25,'unit_manager'),(1,25,'editor'),(1,25,'pengarah_acara'),(2,11,'petugas_efp'),(1,22,'petugas_efp'),(2,22,'editor'),(2,22,'redaktur_1'),(3,22,'redaktur_2'),(1,22,'redaktur_3'),(3,22,'unit_manager'),(2,22,'pengarah_acara'),(3,22,'penyiar'),(1,37,'redaktur_1'),(2,37,'redaktur_2'),(3,37,'redaktur_3'),(1,37,'petugas_efp'),(2,37,'unit_manager'),(3,37,'editor'),(2,37,'pengarah_acara'),(3,37,'penyiar'),(1,32,'redaktur_1'),(2,32,'redaktur_2'),(3,32,'redaktur_3'),(4,32,'petugas_efp'),(2,32,'unit_manager'),(5,32,'editor'),(1,32,'pengarah_acara'),(2,32,'penyiar'),(11,58,'redaktur_1'),(10,58,'redaktur_2'),(9,58,'redaktur_3'),(14,58,'petugas_efp'),(15,58,'unit_manager'),(16,58,'editor'),(2,58,'pengarah_acara'),(17,58,'penyiar'),(11,59,'redaktur_1'),(10,59,'redaktur_2'),(9,59,'redaktur_3'),(14,59,'petugas_efp'),(15,59,'unit_manager'),(16,59,'editor'),(2,59,'pengarah_acara'),(18,59,'penyiar'),(11,64,'redaktur_1'),(10,64,'redaktur_2'),(9,64,'redaktur_3'),(14,64,'petugas_efp'),(15,64,'unit_manager'),(16,64,'editor'),(2,64,'pengarah_acara'),(18,64,'penyiar');
/*!40000 ALTER TABLE `petugas_siaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaran`
--

DROP TABLE IF EXISTS `siaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siaran` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_kategori` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaran`
--

LOCK TABLES `siaran` WRITE;
/*!40000 ALTER TABLE `siaran` DISABLE KEYS */;
INSERT INTO `siaran` VALUES (1,'2018-06-06',4),(2,'2018-06-20',4),(3,'2018-06-20',4),(4,'2018-06-06',4),(5,'2018-06-06',4),(6,'2018-06-27',4),(7,'2018-06-27',4),(8,'2018-06-27',4),(9,'2018-06-19',1),(10,'2018-07-18',1),(11,'2018-07-15',1),(12,'2018-07-16',1),(13,'2018-07-17',1),(14,'2018-07-18',4),(15,'2018-07-21',1),(16,'2018-07-20',1),(17,'2018-07-23',1),(18,'2018-07-19',1),(19,'2018-09-23',1),(20,'2018-09-24',1),(21,'2018-10-11',1),(22,'2018-10-15',1),(23,'2018-10-08',1),(24,'2018-10-01',1),(25,'2018-10-16',1),(26,'2018-10-14',1),(27,'2018-10-17',1),(28,'2018-10-07',1),(29,'2018-06-15',1),(30,'2018-06-06',1),(31,'2018-10-21',1),(32,'2018-10-27',1),(33,'2018-10-15',1),(34,'2018-10-15',1),(35,'2018-10-27',1),(36,'2018-10-28',1),(37,'2018-10-29',2),(38,'2018-10-30',3),(39,'2018-11-01',5),(40,'2018-10-27',6),(41,'2018-11-02',5),(42,'2018-10-16',3),(43,'2018-11-27',3),(44,'2018-10-23',1),(45,'2018-11-29',5),(46,'2018-10-29',1),(47,'2018-11-11',1),(48,'2018-11-11',7),(49,'2018-11-15',5),(50,'2018-11-03',1),(51,'2018-10-17',4),(52,'2018-10-21',7),(53,'2018-10-22',2),(54,'2018-10-15',2),(55,'2018-10-08',2),(56,'2018-12-13',1),(57,'2018-12-13',5),(58,'2018-04-14',1),(59,'2018-04-14',6),(60,'2018-12-14',1),(61,'2018-12-14',5),(62,'2018-12-15',1),(63,'2018-12-15',6),(64,'2018-04-23',2),(65,'2018-05-23',4),(66,'2018-12-20',5),(67,'2020-04-01',1),(68,'2020-04-16',1),(69,'2020-04-01',4),(70,'2020-04-13',2),(71,'2020-04-16',5),(72,'2020-08-25',1),(73,'2020-08-25',3);
/*!40000 ALTER TABLE `siaran` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-25 16:04:29
