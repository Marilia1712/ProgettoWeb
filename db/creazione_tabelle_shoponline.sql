drop schema shoponline;
create schema shoponline;
use shoponline;

CREATE TABLE `venditori` (
  `Email` varchar(45) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`Email`)
);

CREATE TABLE `clienti` (
  `Email` varchar(45) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`Email`)
);

CREATE TABLE `transazioni` (
  `CodID` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `Circuito` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CodID`)
);

CREATE TABLE `prodotti` (
  `CodID` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Immagine` blob NOT NULL,
  `Prezzo` double NOT NULL,
  `Colore` varchar(45) DEFAULT NULL,
  `Composizione` varchar(250) DEFAULT NULL,
  `Strumenti` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`CodID`)
  );

CREATE TABLE `ordini` (
  `CodID` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `Pagato` tinyint(4) NOT NULL,
  `Importo` double NOT NULL DEFAULT 0,
  `CodIDTransazione` int(11),
  `EmailCliente` varchar(45) NOT NULL,
  PRIMARY KEY (`CodID`),
  CONSTRAINT `EmailCliente` FOREIGN KEY (`EmailCliente`) REFERENCES `clienti` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CodIDTransazione` FOREIGN KEY (`CodIDTransazione`) REFERENCES `transazioni` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `offerte` (
  `CodID` int(11) NOT NULL,
  `Scadenza` datetime NOT NULL,
  `Inizio` datetime NOT NULL,
  `PercSconto` double NOT NULL,
  `CodIDProdotto` int(11) NOT NULL,
  PRIMARY KEY (`CodID`),
  CONSTRAINT `CodIDProdotto` FOREIGN KEY (`CodIDProdotto`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `avvisi` (
  `CodID` int(11) NOT NULL,
  `Titolo` varchar(45) NOT NULL,
  `Contenuto` varchar(250) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  PRIMARY KEY (`CodID`)
);

CREATE TABLE `inboxclienti` (
  `Email` varchar(45) NOT NULL,
  `CodID` int(11) NOT NULL,
  PRIMARY KEY (`Email`,`CodID`),
  CONSTRAINT `CodID` FOREIGN KEY (`CodID`) REFERENCES `avvisi` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Email` FOREIGN KEY (`Email`) REFERENCES `clienti` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `prodottiordinati` (
  `CodIDProdotto` int(11) NOT NULL,
  `CodIDOrdine` int(11) NOT NULL,
  `Quantita` int(11) NOT NULL,
  PRIMARY KEY (`CodIDProdotto`,`CodIDOrdine`),
  CONSTRAINT `CodIDOrdine` FOREIGN KEY (`CodIDOrdine`) REFERENCES `ordini` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CodIDProdottox` FOREIGN KEY (`CodIDProdotto`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `prodotticorrelati` (
  `Prodotto1` int(11) NOT NULL,
  `Prodotto2` int(11) NOT NULL,
  PRIMARY KEY (`Prodotto1`,`Prodotto2`),
  CONSTRAINT `Prodotto1` FOREIGN KEY (`Prodotto1`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Prodotto2` FOREIGN KEY (`Prodotto2`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `categorieprodotti` (
  `Nome` varchar(45) NOT NULL,
  `Immagine` blob NOT NULL,
  PRIMARY KEY (`Nome`)
);

CREATE TABLE `appartenenzacategoria` (
  `CodID` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`CodID`,`Nome`),
  CONSTRAINT `CodIDProd` FOREIGN KEY (`CodID`) REFERENCES `prodotti` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Nome` FOREIGN KEY (`Nome`) REFERENCES `categorieprodotti` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `wishlists` (
  `Numero` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Descrizione` varchar(250) NOT NULL DEFAULT '...',
  `Email` varchar(45) NOT NULL,
  PRIMARY KEY (`Numero`),
  CONSTRAINT `Emailx` FOREIGN KEY (`Email`) REFERENCES `clienti` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `applicazioniofferte` (
  `CodIDOfferte` int(11) NOT NULL,
  `CodIDOrdini` int(11) NOT NULL,
  PRIMARY KEY (`CodIDOfferte`,`CodIDOrdini`),
  CONSTRAINT `CodIDOfferte` FOREIGN KEY (`CodIDOfferte`) REFERENCES `offerte` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CodIDOrdini` FOREIGN KEY (`CodIDOrdini`) REFERENCES `ordini` (`CodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

SELECT table_name
FROM information_schema.tables
WHERE table_type='BASE TABLE'
      AND table_schema = 'shoponline';