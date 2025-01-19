-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: shoponline
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
  CONSTRAINT `Nome` FOREIGN KEY (`Nome`) REFERENCES `categorieprodotti` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appartenenzacategoria`
--

LOCK TABLES `appartenenzacategoria` WRITE;
/*!40000 ALTER TABLE `appartenenzacategoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `appartenenzacategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicazioneofferte`
--

DROP TABLE IF EXISTS `applicazioneofferte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicazioneofferte` (
  `CodIDOfferte` int(11) NOT NULL,
  `CodIDOrdini` int(11) NOT NULL,
  PRIMARY KEY (`CodIDOfferte`,`CodIDOrdini`),
  KEY `CodIDOrdini` (`CodIDOrdini`),
  CONSTRAINT `CodIDOfferte` FOREIGN KEY (`CodIDOfferte`) REFERENCES `offerte` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CodIDOrdini` FOREIGN KEY (`CodIDOrdini`) REFERENCES `ordini` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicazioneofferte`
--

LOCK TABLES `applicazioneofferte` WRITE;
/*!40000 ALTER TABLE `applicazioneofferte` DISABLE KEYS */;
/*!40000 ALTER TABLE `applicazioneofferte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avvisi`
--

DROP TABLE IF EXISTS `avvisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avvisi` (
  `CodID` int(11) NOT NULL,
  `Titolo` varchar(45) NOT NULL,
  `Contenuto` varchar(250) NOT NULL,
  PRIMARY KEY (`CodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avvisi`
--

LOCK TABLES `avvisi` WRITE;
/*!40000 ALTER TABLE `avvisi` DISABLE KEYS */;
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
  `Immagine` blob NOT NULL,
  PRIMARY KEY (`Nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorieprodotti`
--

LOCK TABLES `categorieprodotti` WRITE;
/*!40000 ALTER TABLE `categorieprodotti` DISABLE KEYS */;
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
  `CodID` int(11) NOT NULL,
  `Scadenza` datetime NOT NULL,
  `Inizio` datetime NOT NULL,
  `PercSconto` double NOT NULL,
  `CodIDProdotto` int(11) NOT NULL,
  PRIMARY KEY (`CodID`),
  KEY `CodIDProdotto` (`CodIDProdotto`),
  CONSTRAINT `CodIDProdotto` FOREIGN KEY (`CodIDProdotto`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offerte`
--

LOCK TABLES `offerte` WRITE;
/*!40000 ALTER TABLE `offerte` DISABLE KEYS */;
/*!40000 ALTER TABLE `offerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordini`
--

DROP TABLE IF EXISTS `ordini`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordini` (
  `CodID` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `Pagato` tinyint(4) NOT NULL,
  `Importo` double NOT NULL DEFAULT 0,
  `CodIDTransazione` int(11) NOT NULL,
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
  `CodID` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Immagine` blob NOT NULL,
  `Prezzo` double NOT NULL,
  `Colore` varchar(45) DEFAULT NULL,
  `Composizione` varchar(250) DEFAULT NULL,
  `Strumenti` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`CodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti`
--

LOCK TABLES `prodotti` WRITE;
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
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
  `CodID` int(11) NOT NULL,
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
/*!40000 ALTER TABLE `venditori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `Numero` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Descrizione` varchar(250) NOT NULL DEFAULT '...',
  `Email` varchar(45) NOT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Emailx` (`Email`),
  CONSTRAINT `Emailx` FOREIGN KEY (`Email`) REFERENCES `clienti` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-19 23:02:20
