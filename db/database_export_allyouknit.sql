CREATE DATABASE  IF NOT EXISTS `allyouknit` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `allyouknit`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: allyouknit
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aggiuntawishlist`
--

LOCK TABLES `aggiuntawishlist` WRITE;
/*!40000 ALTER TABLE `aggiuntawishlist` DISABLE KEYS */;
INSERT INTO `aggiuntawishlist` VALUES (36,10),(46,10),(58,10),(60,13);
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
  CONSTRAINT `CodIDProd` FOREIGN KEY (`CodID`) REFERENCES `prodotti` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Nome` FOREIGN KEY (`Nome`) REFERENCES `categorieprodotti` (`Nome`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avvisi`
--

LOCK TABLES `avvisi` WRITE;
/*!40000 ALTER TABLE `avvisi` DISABLE KEYS */;
INSERT INTO `avvisi` VALUES (1,'Benvenuto su AllYouKnit!','Il più caloroso benvenuto su AllYouKnit da parte di tutto lo staff. Ci auguriamo che troverai tutta l\'ispirazione e i materiali che cerchi! Ricordati di dare un\'occhiata alla tua casella di posta per non perderti aggiornamenti a te utili. '),(2,'Ordine confermato!','Il tuo ordine è stato confermato. Ora non resta che aspettare! Nel frattempo, perchè non dai un\'occhiata alle nostre offerte? Troverai ogni giorno nuovi prodotti in sconto!'),(3,'Il tuo ordine è in consegna!','L\'ordine sarà consegnato in giornata'),(4,'Carrello in sospeso','A nessuno piacciono le attese troppo lunghe... perchè non completi il tuo ordine? La tua prossima creazione preferita è alla portata di un click!'),(5,'Nuovi metodi di pagamento','Fare acquisti non è mai stato così facile! Da oggi sarà possibile effettuare transazioni anche con Satispay e con Klarna, che offre un servizio di rateizzazione priva di interessi. Che aspetti?'),(6,'Filati, attrezzi, accessori...','Il mondo della maglieria non si limita ai gomitoli: esplora tutte le nostre categorie e lasciati ispirare da articoli di ogni genere!'),(7,'Nuovo prodotto in offerta.','Ci sono delle novità nella sezione offerte... perchè non dai un\'occhiata?'),(11,'Buon natale!!!','Nuove offerte natalizie pensate esclusivamente per il nostro pubblico fidato'),(25,'Modifica di un prodotto del catalogo','Salve cari clienti! Vi scriviamo per comunicarVi che un prodotto del nostro catalogo, Barnes Wafer Gr 50, \r\n                è stato modificato ed è pronto per essere acquistato. Venite a dare un occhiata, Vi aspettiamo!'),(26,'Modifica di un prodotto del catalogo','Salve cari clienti! Vi scriviamo per comunicarVi che un prodotto del nostro catalogo, Alma Arizona Gr 100, \r\n                è stato modificato ed è pronto per essere acquistato. Venite a dare un occhiata, Vi aspettiamo!'),(27,'Modifica di un prodotto del catalogo','Salve cari clienti! Vi scriviamo per comunicarVi che un prodotto del nostro catalogo, Spille da balia 32mm, \r\n                è stato modificato ed è pronto per essere acquistato. Venite a dare un occhiata, Vi aspettiamo!');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorieprodotti`
--

LOCK TABLES `categorieprodotti` WRITE;
/*!40000 ALTER TABLE `categorieprodotti` DISABLE KEYS */;
INSERT INTO `categorieprodotti` VALUES ('Applicazioni','applicazioni.png','Paillettes, perline, decorazioni in metallo e tutto ciò che ti può servire per la tua prossima creazione.'),('Attrezzi','attrezzi.png','Ferri e uncinetti per le tue creazioni di maglia e uncinetto.'),('Bijoux','bijoux.png','Filati, cristalli e gioielli per decorare le tue creazioni.'),('Editoria','editoria.png','Libri, pdf scaricabili e gift card. Non si finisce mai di imparare!'),('Filati','filati.png','Sfoglia il catalogo e lasciati ispirare dai nostri filati per borse e per ricamo.'),('Tutto borse','tuttoborse.png','Manici, fodere e tutto il necessario per realizzare la tua nuova borsa preferita.');
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
  `Verificato` tinyint(4) NOT NULL DEFAULT 0,
  `Registrazione` datetime NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` VALUES ('mariliamerendi@gmail.com','Marilia','Merendi','Tina2022',1,'2025-01-20 00:00:00'),('mauricapuano@gmail.com','Maurizio','Capuano','Kira2003',1,'2025-01-20 00:00:00');
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
  `Letta` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Email`,`CodID`,`Data`,`Ora`),
  KEY `CodID` (`CodID`),
  CONSTRAINT `CodID` FOREIGN KEY (`CodID`) REFERENCES `avvisi` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Email` FOREIGN KEY (`Email`) REFERENCES `clienti` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inboxclienti`
--

LOCK TABLES `inboxclienti` WRITE;
/*!40000 ALTER TABLE `inboxclienti` DISABLE KEYS */;
INSERT INTO `inboxclienti` VALUES ('mariliamerendi@gmail.com',1,'2025-01-10','00:00:00',0),('mariliamerendi@gmail.com',4,'2025-01-15','00:00:00',0),('mariliamerendi@gmail.com',11,'2025-01-24','05:55:11',0),('mariliamerendi@gmail.com',25,'2025-01-26','19:07:08',0),('mariliamerendi@gmail.com',26,'2025-01-26','19:07:45',0),('mariliamerendi@gmail.com',27,'2025-01-26','19:08:27',0),('mauricapuano@gmail.com',1,'2025-01-10','00:00:00',1),('mauricapuano@gmail.com',2,'2025-01-12','00:00:00',1),('mauricapuano@gmail.com',2,'2025-01-25','18:49:23',0),('mauricapuano@gmail.com',7,'2025-01-15','00:00:00',1),('mauricapuano@gmail.com',11,'2025-01-24','05:55:11',1),('mauricapuano@gmail.com',25,'2025-01-26','19:07:16',0),('mauricapuano@gmail.com',26,'2025-01-26','19:07:49',0),('mauricapuano@gmail.com',27,'2025-01-26','19:08:34',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `Data` date DEFAULT NULL,
  `Ora` time DEFAULT NULL,
  `Pagato` tinyint(4) NOT NULL DEFAULT 0,
  `Importo` double NOT NULL DEFAULT 0,
  `EmailCliente` varchar(45) NOT NULL,
  `Stato` enum('Ricevuto','Lavorazione','Spedito','Consegna','Consegnato') DEFAULT NULL,
  PRIMARY KEY (`CodID`),
  KEY `EmailCliente` (`EmailCliente`),
  CONSTRAINT `EmailCliente` FOREIGN KEY (`EmailCliente`) REFERENCES `clienti` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordini`
--

LOCK TABLES `ordini` WRITE;
/*!40000 ALTER TABLE `ordini` DISABLE KEYS */;
INSERT INTO `ordini` VALUES (1,'2025-01-23','10:50:19',1,16.15,'mauricapuano@gmail.com','Consegnato'),(2,NULL,NULL,0,0,'mariliamerendi@gmail.com',NULL),(27,'2025-01-25','19:16:18',1,3.32,'mauricapuano@gmail.com','Ricevuto'),(28,'2025-01-25','19:16:49',1,18.9,'mauricapuano@gmail.com','Ricevuto'),(29,'2025-01-25','19:16:59',1,2,'mauricapuano@gmail.com','Ricevuto'),(30,NULL,NULL,0,0,'mauricapuano@gmail.com',NULL);
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
  `Giacenza` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`CodID`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti`
--

LOCK TABLES `prodotti` WRITE;
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
INSERT INTO `prodotti` VALUES (1,'Alma Alabama Gr 100','alabama.jpg',6.9,'Blu','70% cotone 20% viscosa 10% lino','Ferri 5-6 Uncinetto 4-5',8),(2,'Alma Arizona Gr 100','arizona.jpg',6.9,'Giallo/Arancione','70% cotone 20% viscosa 10% lino','Ferri 5-6 Uncinetto 4-5',9),(3,'Alma Vermont Gr 100','vermont.jpg',6.9,'Verde','70% cotone 20% viscosa 10% lino','Ferri 5-6 Uncinetto 4-5',9),(4,'Aretha Slim Beige Grammi 150','aretha-beige.jpg',7.5,'Beige','100% poliammide','Ferri 6-8 Uncinetto 3-5',8),(5,'Aretha Slim Bianco Grammi 150','aretha-bianco.jpg',7.5,'Bianco','100% poliammide','Ferri 6-8 Uncinetto 3-5',9),(6,'Aretha Slim Cammello Grammi 150','aretha-cammello.jpg',7.5,'Marrone','100% poliammide','Ferri 6-8 Uncinetto 3-5',5),(7,'Aretha Slim Cielo Grammi 150','aretha-cielo.jpg',7.5,'Azzurro','100% poliammide','Ferri 6-8 Uncinetto 3-5',9),(8,'Barnes Violet Gr 50','barnes-violet.jpg',2.9,'Viola','30% lana 70% acrilico','Ferri 6-8 Uncinetto 5-7',9),(9,'Barnes Turquoise Gr 50','barnes-turquoise.jpg',2.9,'Blu/Marrone','30% lana 70% acrilico','Ferri 6-8 Uncinetto 5-7',8),(10,'Barnes Wafer Gr 50','barnes-wafer.jpg',2.9,'Rosso/Ocra','30% lana 70% acrilico','Ferri 6-8 Uncinetto 5-7',9),(11,'AllenChic Nero Gr 100','allen-nero.jpg',6.9,'Nero','40% acrilico 60% poliestere','Ferri 7-8 Uncinetto 6-7',9),(12,'AllenChic Rosso Gr 100','allen-rosso.jpg',6.9,'Rosso','40% acrilico 60% poliestere','Ferri 7-8 Uncinetto 6-7',9),(13,'Borsa Juta 42x33 Natural','borsa-juta.jpg',6.8,'Beige','100% juta',NULL,67),(14,'Borsa di paglia Grande','borsa-pagliaL.jpg',18.9,'Beige',NULL,NULL,9),(15,'Borsa di paglia Media','borsa-pagliaM.jpg',16.9,'Beige',NULL,NULL,9),(16,'Borsa di paglia Piccola','borsa-pagliaS.jpg',12.9,'Beige',NULL,NULL,9),(17,'Fodera in lycra Bianco','lycra-bianco.jpg',4.9,'Bianco','90% poliammide 10% elasthan',NULL,9),(18,'Fodera in lycra Carne','lycra-carne.jpg',4.9,'Carne','90% poliammide 10% elasthan',NULL,9),(19,'Anelli ovali Oro 25mm','ovali-oroS.jpg',2.7,'Oro',NULL,NULL,9),(20,'Anelli ovali Oro 40mm','ovali-oroL.jpg',4.6,'Oro',NULL,NULL,8),(21,'Anelli rettangolari Argento 25mm','rettang-argentoS.jpg',1.7,'Argento',NULL,NULL,7),(22,'Anelli rettangolari Argento 30mm','rettang-argentoL.jpg',1.9,'Argento',NULL,NULL,9),(23,'Anelli semicircolari aperti Oro 25mm','semicirc-oroS.jpg',4.4,'Oro',NULL,NULL,8),(24,'Anelli semicircolari aperti Oro 40mm','semicirc-oroL.jpg',4.5,'Oro',NULL,NULL,9),(25,'Fondo Borsa 27x12 ecopelle Giallo','borsa-eco-giallo.jpg',3.8,'Giallo','100% ecopelle',NULL,7),(26,'Fondo Borsa 27x12 ecopelle Magenta','borsa-eco-magenta.jpg',3.8,'Magenta','100% ecopelle',NULL,9),(27,'Fondo Borsa 27x12 ecopelle Marrone','borsa-eco-marrone.jpg',3.8,'Marrone','100% ecopelle',NULL,9),(28,'Manici Bamboo ad arco con asta in metallo','manici-bamboo.jpg',8.9,'Marrone',NULL,NULL,10),(29,'Manici Circle Giallo','manici-circle.jpg',8,'Giallo',NULL,NULL,9),(30,'Manici Dior Avorio','manici-avorio.jpg',6.9,'Bianco',NULL,NULL,9),(31,'Fibbia a scatto Rossa','fibbia-scatto-rossa.jpg',3.9,'Rosso','100% nylon',NULL,8),(32,'Fibbia a scatto Verde','fibbia-scatto-verde.jpg',3.9,'Verde','100% nylon',NULL,30),(33,'Fibbia nylon fb114 Nero','fibbia-nylon.jpg',3.4,'Nero','100% nylon',NULL,9),(34,'Paillettes Classic Lilla-g716','paillettes-lilla.jpg',2,'Viola',NULL,NULL,21),(35,'Paillettes Classic Oro-h813','paillettes-oro.jpg',2,'Oro',NULL,NULL,9),(36,'Paillettes Classic Smeraldo-h804','paillettes-smeraldo.jpg',2,'Verde',NULL,NULL,9),(37,'Bottone Akoya 40 Arancio 1pz','akoya-arancio.jpg',1.5,'Giallo',NULL,NULL,9),(38,'Bottone Akoya 40 Corallo 1pz','akoya-corallo.jpg',1.5,'Rosso',NULL,NULL,9),(39,'Bottone Akoya 24 Nero 1pz','akoya-nero.jpg',0.4,'Nero',NULL,NULL,9),(40,'Feltro 70x50 cm Giallo','feltro-giallo.jpg',4.3,'Giallo',NULL,NULL,9),(41,'Feltro 70x50 cm Viola','feltro-viola.jpg',4.3,'Viola',NULL,NULL,32),(42,'Spille da balia 51mm','spille-baliaL.jpg',1.5,NULL,'100% acciaio',NULL,9),(43,'Spille da balia 32mm','spille-baliaS.jpg',1.5,NULL,'100% acciaio',NULL,9),(44,'Spilla stella pearl 1pz','spilla-stella.jpg',3.5,NULL,'100% acciaio',NULL,8),(45,'Spilla gufo 1pz','spilla-gufo.jpg',2.9,'Bronzo','10% acciaio 90% pet',NULL,21),(46,'Anelli aperti 5mm Oro 4gr','anelli-oro.jpg',1.5,'Oro','100% nichel',NULL,31),(47,'Anelli aperti 5mm Argento 4gr','anelli-argento.jpg',1.5,'Argento','100% nichel',NULL,12),(48,'Apple Leaf Verde','apple-leaf.jpg',0.8,'Verde',NULL,NULL,32),(49,'Sagea Verde','sagea.jpg',0.7,'Verde',NULL,NULL,37),(50,'Shelly Bianco Oro','shelly.jpg',0.6,'Bianco/Oro',NULL,NULL,9),(51,'Set 9 Uncinetto Monet','uncinetto-monet.jpg',17.9,'Multicolor',NULL,NULL,9),(52,'Set 8 Uncinetto Woody','uncinetto-woody.jpg',24.9,'Marrone',NULL,NULL,9),(53,'Set uncinetti assortiti Soft Touch 7-12','uncinetti-softtouch.jpg',18.9,'Multicolor',NULL,NULL,9),(54,'Ferri da maglia Basic 40 n 13','ferri-maglia13.jpg',4.9,'Grigio',NULL,NULL,9),(55,'Ferri da maglia Basic 40 n 20','ferri-maglia20.jpg',7.2,'Grigio',NULL,NULL,9),(56,'Cassetta Legno Wood','cassetta-wood.jpg',24.2,'Marrone',NULL,NULL,9),(57,'Borsa All in one Dandelion ','borsa-allinone.jpg',58.9,'Blu',NULL,NULL,9),(58,'Libro 100 Fiori a Maglia','100fiori-maglia.jpg',23.8,NULL,NULL,NULL,79),(59,'Libro 75 motivi di pizzo all’uncinetto','75motivi-pizzo.jpg',18.9,NULL,NULL,NULL,10),(60,'Libro Guida tecniche di sartoria','tecniche-sartoria.jpg',22.8,NULL,NULL,NULL,9),(61,'Libro Uncinetto tunisino moderno','uncinetto-tunisino.jpg',32.4,NULL,NULL,NULL,2),(62,'Libro Complementi d’arredo a Uncinetto','complementi-arredo.jpg',18.9,NULL,NULL,NULL,8);
/*!40000 ALTER TABLE `prodotti` ENABLE KEYS */;
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
  CONSTRAINT `CodIDOrdine` FOREIGN KEY (`CodIDOrdine`) REFERENCES `ordini` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `CodIDProdottox` FOREIGN KEY (`CodIDProdotto`) REFERENCES `prodotti` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodottiordinati`
--

LOCK TABLES `prodottiordinati` WRITE;
/*!40000 ALTER TABLE `prodottiordinati` DISABLE KEYS */;
INSERT INTO `prodottiordinati` VALUES (14,28,1),(22,1,10),(32,27,1),(35,29,1),(43,30,6);
/*!40000 ALTER TABLE `prodottiordinati` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venditori`
--

LOCK TABLES `venditori` WRITE;
/*!40000 ALTER TABLE `venditori` DISABLE KEYS */;
INSERT INTO `venditori` VALUES ('annalisafranco@gmail.com','Annalisa','Franco','Database2024');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (8,'Materiale per copertina a fiori','Forse dovrei cambiare colore dei gomitoli?','mariliamerendi@gmail.com'),(9,'Idee regalo','Compleanno di Martina: 25 febbraio. Compleanno di Marco: 12 marzo.','mariliamerendi@gmail.com'),(10,'Kira','Materiali che si abbinano bene alla casa e adatti ai gatti','mauricapuano@gmail.com'),(13,'Idee regalo matrimonio','Auguri a tutte le donne!','mauricapuano@gmail.com');
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

-- Dump completed on 2025-01-26 20:15:26
