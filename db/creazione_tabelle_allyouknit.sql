drop schema IF EXISTS shoponline;
drop schema IF EXISTS allyouknit;
create schema allyouknit;
use allyouknit;

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
  `Verificato` int(11) NOT NULL DEFAULT 0,
  `Registrazione` datetime NOT NULL,
  PRIMARY KEY (`Email`)
);

CREATE TABLE `prodotti` (
  `CodID` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Immagine` varchar(45) NOT NULL,
  `Prezzo` double NOT NULL,
  `Colore` varchar(45) DEFAULT NULL,
  `Composizione` varchar(250) DEFAULT NULL,
  `Strumenti` varchar(250) DEFAULT NULL,
  `Giacenza` int(11) DEFAULT 0,
  PRIMARY KEY (`CodID`)
  );

CREATE TABLE `ordini` (
  `CodID` int(11) NOT NULL,
  `Data` date,
  `Ora` time,
  `Pagato` tinyint(4) NOT NULL,
  `Importo` double NOT NULL DEFAULT 0,
  `EmailCliente` varchar(45) NOT NULL,
  PRIMARY KEY (`CodID`),
  CONSTRAINT `EmailCliente` FOREIGN KEY (`EmailCliente`) REFERENCES `clienti` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `CodIDTransazione` FOREIGN KEY (`CodIDTransazione`) REFERENCES `transazioni` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `offerte` (
  `CodID` int(11) NOT NULL,
  `Scadenza` datetime NOT NULL,
  `Inizio` datetime NOT NULL,
  `PercSconto` double NOT NULL,
  `CodIDProdotto` int(11) NOT NULL,
  PRIMARY KEY (`CodID`),
  CONSTRAINT `CodIDProdotto` FOREIGN KEY (`CodIDProdotto`) REFERENCES `prodotti` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `avvisi` (
  `CodID` int(11) NOT NULL,
  `Titolo` varchar(45) NOT NULL,
  `Contenuto` varchar(250) NOT NULL,
  PRIMARY KEY (`CodID`)
);

CREATE TABLE `inboxclienti` (
  `Email` varchar(45) NOT NULL,
  `CodID` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `Letta` date NOT NULL DEFAULT 0,
  PRIMARY KEY (`Email`,`CodID`),
  CONSTRAINT `CodID` FOREIGN KEY (`CodID`) REFERENCES `avvisi` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Email` FOREIGN KEY (`Email`) REFERENCES `clienti` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `prodottiordinati` (
  `CodIDProdotto` int(11) NOT NULL,
  `CodIDOrdine` int(11) NOT NULL,
  `Quantita` int(11) NOT NULL,
  PRIMARY KEY (`CodIDProdotto`,`CodIDOrdine`),
  CONSTRAINT `CodIDOrdine` FOREIGN KEY (`CodIDOrdine`) REFERENCES `ordini` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `CodIDProdottox` FOREIGN KEY (`CodIDProdotto`) REFERENCES `prodotti` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `prodotticorrelati` (
  `Prodotto1` int(11) NOT NULL,
  `Prodotto2` int(11) NOT NULL,
  PRIMARY KEY (`Prodotto1`,`Prodotto2`),
  CONSTRAINT `Prodotto1` FOREIGN KEY (`Prodotto1`) REFERENCES `prodotti` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Prodotto2` FOREIGN KEY (`Prodotto2`) REFERENCES `prodotti` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `categorieprodotti` (
  `Nome` varchar(45) NOT NULL,
  `Immagine` varchar(45) NOT NULL,
  PRIMARY KEY (`Nome`)
);

CREATE TABLE `appartenenzacategoria` (
  `CodID` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`CodID`,`Nome`),
  CONSTRAINT `CodIDProd` FOREIGN KEY (`CodID`) REFERENCES `prodotti` (`CodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Nome` FOREIGN KEY (`Nome`) REFERENCES `categorieprodotti` (`Nome`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `wishlists` (
  `Numero` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Descrizione` varchar(250) NOT NULL DEFAULT '...',
  `Email` varchar(45) NOT NULL,
  PRIMARY KEY (`Numero`),
  CONSTRAINT `Emailx` FOREIGN KEY (`Email`) REFERENCES `clienti` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE
);

SELECT table_name
FROM information_schema.tables
WHERE table_type='BASE TABLE'
      AND table_schema = 'allyouknit';