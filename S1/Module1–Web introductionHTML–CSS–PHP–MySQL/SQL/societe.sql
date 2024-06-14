create table fournisseur(
    idFour INT(11) PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    Tel VARCHAR(14)
);
CREATE TABLE client(
    idClient INT(11) PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    date_naiss DATE,
    email VARCHAR(30)
);
CREATE TABLE Commande(
    idCMD INT PRIMARY KEY,
    dateCMD VARCHAR(45),
    idClient VARCHAR(45),
    client_idClient int,
    FOREIGN KEY (client_idClient) REFERENCES client(idClient)
);
CREATE TABLE produit(
    idProduit int(11) PRIMARY KEY,
    Designation VARCHAR(50) NOT NULL,
    prix DECIMAL(10,0),
    QteStock Decimal(10,0),
    email VARCHAR(30),
    idFour int,
    FOREIGN KEY (idFour) REFERENCES fournisseur(idFour)
);
CREATE TABLE LigneCMD(
    idLigneCMD int PRIMARY KEY,
    Qte int,
    idProduit int,
    idCMD int,
    FOREIGN KEY (idProduit) REFERENCES produit(idProduit),
    FOREIGN KEY (idCMD) REFERENCES Commande(idCMD)
);