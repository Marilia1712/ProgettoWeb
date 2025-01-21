CREATE DATABASE  IF NOT EXISTS `allyouknit` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `allyouknit`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: allyouknit
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aggiuntawishlist`
--

DROP TABLE IF EXISTS `aggiuntawishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aggiuntawishlist` (
  `CodIDProdotto` int(11) NOT NULL,
  `CodIDWishlist` int(11) NOT NULL,
  PRIMARY KEY (`CodIDProdotto`,`CodIDWishlist`),
  KEY `CodIDWish` (`CodIDWishlist`),
  CONSTRAINT `CodIDProduct` FOREIGN KEY (`CodIDProdotto`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CodIDWish` FOREIGN KEY (`CodIDWishlist`) REFERENCES `wishlists` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aggiuntawishlist`
--

LOCK TABLES `aggiuntawishlist` WRITE;
/*!40000 ALTER TABLE `aggiuntawishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `aggiuntawishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appartenenzacategoria`
--

DROP TABLE IF EXISTS `appartenenzacategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appartenenzacategoria` (
  `CodID` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`CodID`,`Nome`),
  KEY `Nome` (`Nome`),
  CONSTRAINT `CodIDProd` FOREIGN KEY (`CodID`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Nome` FOREIGN KEY (`Nome`) REFERENCES `categorieprodotti` (`Nome`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appartenenzacategoria`
--

LOCK TABLES `appartenenzacategoria` WRITE;
/*!40000 ALTER TABLE `appartenenzacategoria` DISABLE KEYS */;
INSERT INTO `appartenenzacategoria` VALUES (1,'Filati'),(2,'Filati'),(3,'Filati'),(4,'Filati'),(5,'Filati'),(6,'Filati'),(7,'Filati'),(8,'Filati'),(9,'Filati'),(10,'Filati'),(11,'Filati'),(12,'Filati'),(13,'Tutto borse'),(14,'Tutto borse'),(15,'Tutto borse'),(16,'Tutto borse'),(17,'Tutto borse'),(18,'Tutto borse'),(19,'Tutto borse'),(20,'Tutto borse'),(21,'Tutto borse'),(22,'Tutto borse'),(23,'Tutto borse'),(24,'Tutto borse'),(25,'Tutto borse'),(26,'Tutto borse'),(27,'Tutto borse'),(28,'Tutto borse'),(29,'Tutto borse'),(30,'Tutto borse'),(31,'Tutto borse'),(32,'Tutto borse'),(33,'Tutto borse'),(34,'Applicazioni'),(35,'Applicazioni'),(36,'Applicazioni'),(37,'Applicazioni'),(38,'Applicazioni'),(39,'Applicazioni'),(40,'Applicazioni'),(41,'Applicazioni'),(42,'Applicazioni'),(42,'Attrezzi'),(43,'Applicazioni'),(43,'Attrezzi'),(44,'Applicazioni'),(45,'Applicazioni'),(46,'Bijoux'),(47,'Bijoux'),(48,'Bijoux'),(49,'Bijoux'),(50,'Bijoux'),(51,'Attrezzi'),(52,'Attrezzi'),(53,'Attrezzi'),(54,'Attrezzi'),(55,'Attrezzi'),(56,'Attrezzi'),(57,'Attrezzi'),(58,'Editoria'),(59,'Editoria'),(60,'Editoria'),(61,'Editoria'),(62,'Editoria');
/*!40000 ALTER TABLE `appartenenzacategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicazioniofferte`
--

DROP TABLE IF EXISTS `applicazioniofferte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicazioniofferte` (
  `CodIDOfferte` int(11) NOT NULL,
  `CodIDOrdini` int(11) NOT NULL,
  PRIMARY KEY (`CodIDOfferte`,`CodIDOrdini`),
  KEY `CodIDOrdini` (`CodIDOrdini`),
  CONSTRAINT `CodIDOfferte` FOREIGN KEY (`CodIDOfferte`) REFERENCES `offerte` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CodIDOrdini` FOREIGN KEY (`CodIDOrdini`) REFERENCES `ordini` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicazioniofferte`
--

LOCK TABLES `applicazioniofferte` WRITE;
/*!40000 ALTER TABLE `applicazioniofferte` DISABLE KEYS */;
/*!40000 ALTER TABLE `applicazioniofferte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avvisi`
--

DROP TABLE IF EXISTS `avvisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avvisi` (
  `CodID` int(11) NOT NULL AUTO_INCREMENT,
  `Titolo` varchar(45) NOT NULL,
  `Contenuto` varchar(250) NOT NULL,
  PRIMARY KEY (`CodID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avvisi`
--

LOCK TABLES `avvisi` WRITE;
/*!40000 ALTER TABLE `avvisi` DISABLE KEYS */;
INSERT INTO `avvisi` VALUES (1,'Benvenuto su AllYouKnit!','Il più caloroso benvenuto su AllYouKnit da parte di tutto lo staff. Ci auguriamo che troverai tutta l\'ispirazione e i materiali che cerchi! Ricordati di dare un\'occhiata alla tua casella di posta per non perderti aggiornamenti a te utili. '),(2,'Ordine confermato!','Il tuo ordine è stato confermato. Ora non resta che aspettare! Nel frattempo, perchè non dai un\'occhiata alle nostre offerte? Troverai ogni giorno nuovi prodotti in sconto!'),(3,'Nuovo prodotto in offerta.','Ci sono delle novità nella sezione offerte... perchè non dai un\'occhiata?'),(4,'Carrello in sospeso','A nessuno piacciono le attese troppo lunghe... perchè non completi il tuo ordine? La tua prossima creazione preferita è alla portata di un click!'),(5,'Nuovi metodi di pagamento','Fare acquisti non è mai stato così facile! Da oggi sarà possibile effettuare transazioni anche con Satispay e con Klarna, che offre un servizio di rateizzazione priva di interessi. Che aspetti?'),(6,'Filati, attrezzi, accessori...','Il mondo della maglieria non si limita ai gomitoli: esplora tutte le nostre categorie e lasciati ispirare da articoli di ogni genere!'),(7,'Nuovo ordine ricevuto','Controlla l\'elenco degli ordini per ulteriori dettagli.');
/*!40000 ALTER TABLE `avvisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorieprodotti`
--

DROP TABLE IF EXISTS `categorieprodotti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorieprodotti` (
  `Nome` varchar(45) NOT NULL,
  `Immagine` varchar(45) NOT NULL,
  `Descrizione` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorieprodotti`
--

LOCK TABLES `categorieprodotti` WRITE;
/*!40000 ALTER TABLE `categorieprodotti` DISABLE KEYS */;
INSERT INTO `categorieprodotti` VALUES ('Applicazioni','applicazioni.jpg','Paillettes, perline, decorazioni in metallo e tutto ciò che ti può servire per la tua prossima creazione.'),('Attrezzi','attrezzi.webp','Ferri e uncinetti per le tue creazioni di maglia e uncinetto.'),('Bijoux','bijoux.png','Filati, cristalli e gioielli per decorare le tue creazioni.'),('Editoria','editoria.jpg','Libri, pdf scaricabili e gift card. Non si finisce mai di imparare!'),('Filati','filati.png','Sfoglia il catalogo e lasciati ispirare dai nostri filati per borse e per ricamo.'),('Tutto borse','tuttoborse.jpg','Manici, fodere e tutto il necessario per realizzare la tua nuova borsa preferita.');
/*!40000 ALTER TABLE `categorieprodotti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clienti` (
  `Email` varchar(45) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` VALUES ('mariliamerendi@gmail.com','Marilia','Merendi','Tina2022'),('mauricapuano@gmail.com','Maurizio','Capuano','Kira2003');
/*!40000 ALTER TABLE `clienti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inboxclienti`
--

DROP TABLE IF EXISTS `inboxclienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inboxclienti` (
  `Email` varchar(45) NOT NULL,
  `CodID` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  PRIMARY KEY (`Email`,`CodID`),
  KEY `CodID` (`CodID`),
  CONSTRAINT `CodID` FOREIGN KEY (`CodID`) REFERENCES `avvisi` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Email` FOREIGN KEY (`Email`) REFERENCES `clienti` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inboxclienti`
--

LOCK TABLES `inboxclienti` WRITE;
/*!40000 ALTER TABLE `inboxclienti` DISABLE KEYS */;
/*!40000 ALTER TABLE `inboxclienti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offerte`
--

DROP TABLE IF EXISTS `offerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offerte` (
  `CodID` int(11) NOT NULL AUTO_INCREMENT,
  `Scadenza` datetime NOT NULL,
  `Inizio` datetime NOT NULL,
  `PercSconto` double NOT NULL,
  `CodIDProdotto` int(11) NOT NULL,
  PRIMARY KEY (`CodID`),
  KEY `CodIDProdotto` (`CodIDProdotto`),
  CONSTRAINT `CodIDProdotto` FOREIGN KEY (`CodIDProdotto`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offerte`
--

LOCK TABLES `offerte` WRITE;
/*!40000 ALTER TABLE `offerte` DISABLE KEYS */;
INSERT INTO `offerte` VALUES (1,'2025-01-31 00:00:00','2025-01-11 00:00:00',20,5),(2,'2025-01-29 00:00:00','2025-01-05 00:00:00',15,22),(3,'2025-02-23 00:00:00','2025-01-05 00:00:00',15,32),(4,'2025-02-23 00:00:00','2025-01-11 00:00:00',25,60);
/*!40000 ALTER TABLE `offerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordini`
--

DROP TABLE IF EXISTS `ordini`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordini` (
  `CodID` int(11) NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `Pagato` tinyint(4) NOT NULL,
  `Importo` double NOT NULL DEFAULT 0,
  `CodIDTransazione` int(11) DEFAULT NULL,
  `EmailCliente` varchar(45) NOT NULL,
  PRIMARY KEY (`CodID`),
  KEY `EmailCliente` (`EmailCliente`),
  KEY `CodIDTransazione` (`CodIDTransazione`),
  CONSTRAINT `CodIDTransazione` FOREIGN KEY (`CodIDTransazione`) REFERENCES `transazioni` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `EmailCliente` FOREIGN KEY (`EmailCliente`) REFERENCES `clienti` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordini`
--

LOCK TABLES `ordini` WRITE;
/*!40000 ALTER TABLE `ordini` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordini` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodotti` (
  `CodID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Immagine` varchar(45) NOT NULL,
  `Prezzo` double NOT NULL,
  `Colore` varchar(45) DEFAULT NULL,
  `Composizione` varchar(250) DEFAULT NULL,
  `Strumenti` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`CodID`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti`
--

LOCK TABLES `prodotti` WRITE;
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
INSERT INTO `prodotti` VALUES (1,'Alma Alabama Gr 100','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',6.9,'Blu','70% cotone 20% viscosa 10% lino','Ferri 5-6 Uncinetto 4-5'),(2,'Alma Arizona Gr 100','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',6.9,'Giallo/Arancione','70% cotone 20% viscosa 10% lino','Ferri 5-6 Uncinetto 4-5'),(3,'Alma Vermont Gr 100','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',6.9,'Verde','70% cotone 20% viscosa 10% lino','Ferri 5-6 Uncinetto 4-5'),(4,'Aretha Slim Beige Grammi 150','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',7.5,'Beige','100% poliammide','Ferri 6-8 Uncinetto 3-5'),(5,'Aretha Slim Bianco Grammi 150','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',7.5,'Bianco','100% poliammide','Ferri 6-8 Uncinetto 3-5'),(6,'Aretha Slim Cammello Grammi 150','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',7.5,'Marrone','100% poliammide','Ferri 6-8 Uncinetto 3-5'),(7,'Aretha Slim Cielo Grammi 150','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',7.5,'Azzurro','100% poliammide','Ferri 6-8 Uncinetto 3-5'),(8,'Barnes Violet Gr 50','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',2.9,'Viola','30% lana 70% acrilico','Ferri 6-8 Uncinetto 5-7'),(9,'Barnes Turquoise Gr 50','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',2.9,'Blu/Marrone','30% lana 70% acrilico','Ferri 6-8 Uncinetto 5-7'),(10,'Barnes Wafer Gr 50','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',2.9,'Rosso/Ocra','30% lana 70% acrilico','Ferri 6-8 Uncinetto 5-7'),(11,'AllenChic Nero Gr 100','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',6.9,'Nero','40% acrilico 60% poliestere','Ferri 7-8 Uncinetto 6-7'),(12,'AllenChic Rosso Gr 100','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',6.9,'Rosso','40% acrilico 60% poliestere','Ferri 7-8 Uncinetto 6-7'),(13,'Borsa Juta 42x33 Natural','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',6.8,'Beige','100% juta',NULL),(14,'Borsa di paglia Grande','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',18.9,'Beige',NULL,NULL),(15,'Borsa di paglia Media','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',16.9,'Beige',NULL,NULL),(16,'Borsa di paglia Piccola','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',12.9,'Beige',NULL,NULL),(17,'Fodera in lycra Bianco','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',4.9,'Bianco','90% poliammide 10% elasthan',NULL),(18,'Fodera in lycra Carne','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',4.9,'Carne','90% poliammide 10% elasthan',NULL),(19,'Anelli ovali Oro 25mm','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',2.7,'Oro',NULL,NULL),(20,'Anelli ovali Oro 40mm','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',4.6,'Oro',NULL,NULL),(21,'Anelli rettangolari Argento 25mm','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',1.7,'Argento',NULL,NULL),(22,'Anelli rettangolari Argento 30mm','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',1.9,'Argento',NULL,NULL),(23,'Anelli semicircolari aperti Oro 25mm','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',4.4,'Oro',NULL,NULL),(24,'Anelli semicircolari aperti Oro 40mm','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',4.5,'Oro',NULL,NULL),(25,'Fondo Borsa 27x12 ecopelle Giallo','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',3.8,'Giallo','100% ecopelle',NULL),(26,'Fondo Borsa 27x12 ecopelle Magenta','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',3.8,'Magenta','100% ecopelle',NULL),(27,'Fondo Borsa 27x12 ecopelle Marrone','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',3.8,'Marrone','100% ecopelle',NULL),(28,'Manici Bamboo ad arco con asta in metallo','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',8.9,'Marrone',NULL,NULL),(29,'Manici Circle Giallo','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',8,'Giallo',NULL,NULL),(30,'Manici Dior Avorio','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',6.9,'Bianco',NULL,NULL),(31,'Fibbia a scatto Rossa','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',3.9,'Rosso','100% nylon',NULL),(32,'Fibbia a scatto Verde','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',3.9,'Verde','100% nylon',NULL),(33,'Fibbia nylon fb114 Nero','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',3.4,'Nero','100% nylon',NULL),(34,'Paillettes Classic Lilla-g716','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',2,'Viola',NULL,NULL),(35,'Paillettes Classic Oro-h813','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',2,'Oro',NULL,NULL),(36,'Paillettes Classic Smeraldo-h804','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',2,'Verde',NULL,NULL),(37,'Bottone Akoya 40 Arancio 1pz','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',1.5,'Giallo',NULL,NULL),(38,'Bottone Akoya 40 Corallo 1pz','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',1.5,'Rosso',NULL,NULL),(39,'Bottone Akoya 24 Nero 1pz','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',0.4,'Nero',NULL,NULL),(40,'Feltro 70x50 cm Giallo','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',4.3,'Giallo',NULL,NULL),(41,'Feltro 70x50 cm Viola','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',4.3,'Viola',NULL,NULL),(42,'Spille da balia 51mm','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',1.5,NULL,'100% acciaio',NULL),(43,'Spille da balia 32mm','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',1.5,NULL,'100% acciaio',NULL),(44,'Spilla stella pearl 1pz','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',3.5,NULL,'100% acciaio',NULL),(45,'Spilla gufo 1pz','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',2.9,'Bronzo','10% acciaio 90% pet',NULL),(46,'Anelli aperti 5mm Oro 4gr','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',1.5,'Oro','100% nichel',NULL),(47,'Anelli aperti 5mm Argento 4gr','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',1.5,'Argento','100% nichel',NULL),(48,'Apple Leaf Verde','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',0.8,'Verde',NULL,NULL),(49,'Sagea Verde','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',0.7,'Verde',NULL,NULL),(50,'Shelly Bianco Oro','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',0.6,'Bianco/Oro',NULL,NULL),(51,'Set 9 Uncinetto Monet','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',17.9,'Multicolor',NULL,NULL),(52,'Set 8 Uncinetto Woody','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',24.9,'Marrone',NULL,NULL),(53,'Set uncinetti assortiti Soft Touch 7-12','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',18.9,'Multicolor',NULL,NULL),(54,'Ferri da maglia Basic 40 n 13','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',4.9,'Grigio',NULL,NULL),(55,'Ferri da maglia Basic 40 n 20','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',7.2,'Grigio',NULL,NULL),(56,'Cassetta Legno Wood','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',24.2,'Marrone',NULL,NULL),(57,'Borsa All in one Dandelion ','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',58.9,'Blu',NULL,NULL),(58,'Libro 100 Fiori a Maglia','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',23.8,NULL,NULL,NULL),(59,'Libro 75 motivi di pizzo all’uncinetto','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',18.9,NULL,NULL,NULL),(60,'Libro Guida tecniche di sartoria','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',22.8,NULL,NULL,NULL),(61,'Libro Uncinetto tunisino moderno','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',32.4,NULL,NULL,NULL),(62,'Libro Complementi d’arredo a Uncinetto','????\0JFIF\0\0`\0`\0\0??\0;CREATOR: gd-jpeg v1.0',18.9,NULL,NULL,NULL);
/*!40000 ALTER TABLE `prodotti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodotticorrelati`
--

DROP TABLE IF EXISTS `prodotticorrelati`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodotticorrelati` (
  `Prodotto1` int(11) NOT NULL,
  `Prodotto2` int(11) NOT NULL,
  PRIMARY KEY (`Prodotto1`,`Prodotto2`),
  KEY `Prodotto2` (`Prodotto2`),
  CONSTRAINT `Prodotto1` FOREIGN KEY (`Prodotto1`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Prodotto2` FOREIGN KEY (`Prodotto2`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotticorrelati`
--

LOCK TABLES `prodotticorrelati` WRITE;
/*!40000 ALTER TABLE `prodotticorrelati` DISABLE KEYS */;
/*!40000 ALTER TABLE `prodotticorrelati` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodottiordinati`
--

DROP TABLE IF EXISTS `prodottiordinati`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodottiordinati` (
  `CodIDProdotto` int(11) NOT NULL,
  `CodIDOrdine` int(11) NOT NULL,
  `Quantita` int(11) NOT NULL,
  PRIMARY KEY (`CodIDProdotto`,`CodIDOrdine`),
  KEY `CodIDOrdine` (`CodIDOrdine`),
  CONSTRAINT `CodIDOrdine` FOREIGN KEY (`CodIDOrdine`) REFERENCES `ordini` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CodIDProdottox` FOREIGN KEY (`CodIDProdotto`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodottiordinati`
--

LOCK TABLES `prodottiordinati` WRITE;
/*!40000 ALTER TABLE `prodottiordinati` DISABLE KEYS */;
/*!40000 ALTER TABLE `prodottiordinati` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transazioni`
--

DROP TABLE IF EXISTS `transazioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transazioni` (
  `CodID` int(11) NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `Circuito` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transazioni`
--

LOCK TABLES `transazioni` WRITE;
/*!40000 ALTER TABLE `transazioni` DISABLE KEYS */;
/*!40000 ALTER TABLE `transazioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venditori`
--

DROP TABLE IF EXISTS `venditori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venditori` (
  `Email` varchar(45) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venditori`
--

LOCK TABLES `venditori` WRITE;
/*!40000 ALTER TABLE `venditori` DISABLE KEYS */;
INSERT INTO `venditori` VALUES ('mariliamerendi@gmail.com','Marilia','Merendi','Tina2022'),('mauricapuano@gmail.com','Maurizio','Capuano','Kira2003');
/*!40000 ALTER TABLE `venditori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `CodID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Descrizione` varchar(250) NOT NULL DEFAULT '...',
  `Email` varchar(45) NOT NULL,
  PRIMARY KEY (`CodID`),
  KEY `Emailx` (`Email`),
  CONSTRAINT `Emailx` FOREIGN KEY (`Email`) REFERENCES `clienti` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (8,'Materiale per copertina a fiori','Forse dovrei cambiare colore dei gomitoli?','mariliamerendi@gmail.com'),(9,'Idee regalo','Compleanno di Martina: 25 febbraio. Compleanno di Marco: 12 marzo.','mariliamerendi@gmail.com'),(10,'Kira','Materiali che si abbinano bene alla casa e adatti ai gatti.mauricapuano@gmail.com','mauricapuano@gmail.com');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-21 22:54:42
