-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: betisierVerif
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.19.04.1

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
-- Table structure for table `citation`
--

DROP TABLE IF EXISTS `citation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citation` (
  `cit_num` int(11) NOT NULL AUTO_INCREMENT,
  `per_num` int(11) NOT NULL,
  `per_num_valide` int(11) DEFAULT NULL,
  `per_num_etu` int(11) NOT NULL,
  `cit_libelle` tinytext NOT NULL,
  `cit_date` date NOT NULL,
  `cit_valide` bit(1) NOT NULL DEFAULT b'0',
  `cit_date_valide` date DEFAULT NULL,
  `cit_date_depo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `citation_pk` (`cit_num`),
  KEY `est_auteur_fk` (`per_num`),
  KEY `valide_fk` (`per_num_valide`),
  KEY `depose_fk` (`per_num_etu`),
  CONSTRAINT `citation_ibfk_1` FOREIGN KEY (`per_num`) REFERENCES `personne` (`per_num`),
  CONSTRAINT `citation_ibfk_2` FOREIGN KEY (`per_num_valide`) REFERENCES `personne` (`per_num`),
  CONSTRAINT `citation_ibfk_3` FOREIGN KEY (`per_num_etu`) REFERENCES `etudiant` (`per_num`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citation`
--

LOCK TABLES `citation` WRITE;
/*!40000 ALTER TABLE `citation` DISABLE KEYS */;
INSERT INTO `citation` VALUES (1,55,1,53,'Tous les 4, vous commencez à me casser les pieds !!!','2018-10-03',_binary '',NULL,'2018-10-03 22:00:00'),(2,38,53,38,'Les notes, c\'est comme l\'eau : plus on pompe, plus ça monte','2018-10-24',_binary '\0','2018-10-25','2018-10-23 22:00:00'),(3,56,1,54,'C plus fort que toi','2018-10-19',_binary '','2018-10-20','2018-10-18 22:00:00'),(4,38,53,38,'Ce qui fait marcher l\'informatique, c\'est la fumée car lorsque la fumée sort du pc, plus rien ne fonctionne','2018-10-24',_binary '\0','2018-10-25','2018-10-25 22:00:00'),(19,55,NULL,3,'Et surtout notez bien ce que je viens d\'effacer !	\r\n							\r\n			','2018-11-04',_binary '\0',NULL,'2018-11-01 13:50:53'),(36,1,NULL,3,'Qu\'est ce qu\'il me baragouine ce loulou ? ','2018-11-04',_binary '\0',NULL,'2018-11-02 12:01:18'),(37,55,NULL,39,'Moi aussi, si j\'avais votre âge, j\'aimerais bien que se soit Aurore qui assure ce cours','2019-10-05',_binary '\0',NULL,'2019-10-05 08:29:03'),(38,55,NULL,39,'Vous voulez le --- des profs de ---','2019-10-05',_binary '\0',NULL,'2019-10-05 10:48:48');
/*!40000 ALTER TABLE `citation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departement`
--

DROP TABLE IF EXISTS `departement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departement` (
  `dep_num` int(11) NOT NULL AUTO_INCREMENT,
  `dep_nom` varchar(30) NOT NULL,
  `vil_num` int(11) NOT NULL,
  PRIMARY KEY (`dep_num`),
  KEY `vil_num` (`vil_num`),
  CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`vil_num`) REFERENCES `ville` (`vil_num`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departement`
--

LOCK TABLES `departement` WRITE;
/*!40000 ALTER TABLE `departement` DISABLE KEYS */;
INSERT INTO `departement` VALUES (1,'Informatique',7),(2,'GEA',6),(3,'GEA',7),(4,'SRC',7),(5,'HSE',5),(6,'Génie civil',16);
/*!40000 ALTER TABLE `departement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `division` (
  `div_num` int(11) NOT NULL AUTO_INCREMENT,
  `div_nom` varchar(30) NOT NULL,
  PRIMARY KEY (`div_num`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division`
--

LOCK TABLES `division` WRITE;
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` VALUES (1,'Année 1'),(2,'Année 2'),(3,'Année Spéciale'),(4,'Licence Professionnelle');
/*!40000 ALTER TABLE `division` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etudiant` (
  `per_num` int(11) NOT NULL,
  `dep_num` int(11) NOT NULL,
  `div_num` int(11) NOT NULL,
  PRIMARY KEY (`per_num`),
  KEY `dep_num` (`dep_num`),
  KEY `div_num` (`div_num`),
  CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`per_num`) REFERENCES `personne` (`per_num`),
  CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`dep_num`) REFERENCES `departement` (`dep_num`),
  CONSTRAINT `etudiant_ibfk_3` FOREIGN KEY (`div_num`) REFERENCES `division` (`div_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiant`
--

LOCK TABLES `etudiant` WRITE;
/*!40000 ALTER TABLE `etudiant` DISABLE KEYS */;
INSERT INTO `etudiant` VALUES (3,2,2),(38,6,1),(39,2,4),(53,2,1),(54,3,2),(58,1,2),(59,1,2),(64,2,1),(65,2,1);
/*!40000 ALTER TABLE `etudiant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonction` (
  `fon_num` int(11) NOT NULL AUTO_INCREMENT,
  `fon_libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`fon_num`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonction`
--

LOCK TABLES `fonction` WRITE;
/*!40000 ALTER TABLE `fonction` DISABLE KEYS */;
INSERT INTO `fonction` VALUES (1,'Directeur'),(2,'Chef de département'),(3,'Technicien'),(4,'Secrètaire'),(5,'Ingénieur'),(6,'Imprimeur'),(7,'Enseignant'),(8,'Chercheur');
/*!40000 ALTER TABLE `fonction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mot`
--

DROP TABLE IF EXISTS `mot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mot` (
  `mot_id` int(11) NOT NULL AUTO_INCREMENT,
  `mot_interdit` text NOT NULL,
  PRIMARY KEY (`mot_id`),
  FULLTEXT KEY `mot_interdit` (`mot_interdit`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mot`
--

LOCK TABLES `mot` WRITE;
/*!40000 ALTER TABLE `mot` DISABLE KEYS */;
INSERT INTO `mot` VALUES (1,'sexe'),(2,'merde'),(3,'toutou'),(4,'gestion'),(5,'mathématique'),(6,'suicide');
/*!40000 ALTER TABLE `mot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personne` (
  `per_num` int(11) NOT NULL AUTO_INCREMENT,
  `per_nom` varchar(30) NOT NULL,
  `per_prenom` varchar(30) NOT NULL,
  `per_tel` char(14) NOT NULL,
  `per_mail` varchar(30) NOT NULL,
  `per_admin` int(11) NOT NULL,
  `per_login` varchar(20) NOT NULL,
  `per_pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`per_num`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne`
--

LOCK TABLES `personne` WRITE;
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` VALUES (1,'Marley','Bob','0555555555','Bob@unilim.fr',0,'Bob','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(3,'Parbal','Gilles','0555555554','Gilles.Parbal@yahoo.fr',0,'Gilles','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(38,'Michu','Marcel','0555555555','Michu@sfr.fr',0,'Marcel','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(39,'Renard','Pierrot','0655555555','Pierrot@gmail.fr',0,'sql','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(53,'Delmas','Sophie','0789562314','Sophie@unilim.fr',0,'Soso','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(54,'Dupuy','Pascale','0554565859','pascale@free.fr',0,'Pascale','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(55,'Chastagner  ','Michel  ','0555555555','Michel.C@yahoo.fr',1,'bd  ','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(56,'Monediere ','Thierrry ','0555555552','Th.mo@orange.fr',0,'TM ','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(58,'Vivenot','Stéphane','0555555550','S.V@hotmail.fr',0,'Stef','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(59,'Afritt','Barack','0555555553','BA@hotmail.fr',0,'NM','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(63,'Hugel','Thomas','0555555554','Thomas.hugel@unilim.fr',0,'TH','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(64,'Bienlepetit','Ambroise','0555555555','Ambroise.Bienlepetit@unilim.fr',0,'Ambroise','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(65,'Goche','Elvira','0555555555','Elvira.Goche@unilim.fr',0,'Elvira','a06438628f40b128727bc1c0d1c9f529a0b78b53'),(67,'Cuite','Walter','0555555555','Walter.cuite@unilim.fr',1,'Walter','a06438628f40b128727bc1c0d1c9f529a0b78b53');
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salarie` (
  `per_num` int(11) NOT NULL,
  `sal_telprof` varchar(20) NOT NULL,
  `fon_num` int(11) NOT NULL,
  PRIMARY KEY (`per_num`),
  KEY `fon_num` (`fon_num`),
  CONSTRAINT `salarie_ibfk_1` FOREIGN KEY (`per_num`) REFERENCES `personne` (`per_num`),
  CONSTRAINT `salarie_ibfk_2` FOREIGN KEY (`fon_num`) REFERENCES `fonction` (`fon_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salarie`
--

LOCK TABLES `salarie` WRITE;
/*!40000 ALTER TABLE `salarie` DISABLE KEYS */;
INSERT INTO `salarie` VALUES (1,'0123456978',4),(55,'0654237865',7),(56,'0654237864',8),(63,'0654237860',2),(67,'0555555555',2);
/*!40000 ALTER TABLE `salarie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ville` (
  `vil_num` int(11) NOT NULL AUTO_INCREMENT,
  `vil_nom` varchar(100) NOT NULL,
  PRIMARY KEY (`vil_num`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ville`
--

LOCK TABLES `ville` WRITE;
/*!40000 ALTER TABLE `ville` DISABLE KEYS */;
INSERT INTO `ville` VALUES (5,'Tulle'),(6,'Brive'),(7,'Limoges'),(8,'Guéret'),(9,'Périgueux'),(10,'Bordeaux'),(11,'Paris'),(12,'Toulouse'),(13,'Lyon'),(14,'Poitiers'),(15,'Ambazac'),(16,'Egletons'),(17,'Orléans');
/*!40000 ALTER TABLE `ville` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vote` (
  `cit_num` int(11) NOT NULL,
  `per_num` int(11) NOT NULL,
  `vot_valeur` int(11) NOT NULL,
  PRIMARY KEY (`cit_num`,`per_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` VALUES (1,38,15),(2,39,8),(3,38,2),(4,39,12),(3,55,20),(3,3,20);
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-06 13:30:22
