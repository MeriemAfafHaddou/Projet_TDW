CREATE TABLE utilisateur(
   id_user int(11) NOT NULL AUTO_INCREMENT,
   nom_user VARCHAR(50) NOT NULL,
   prenom_user VARCHAR(50) NOT NULL,
   sexe ENUM('homme','femme'),
   email VARCHAR(50),
   mdp VARCHAR(50),
   PRIMARY KEY(id_user)
);

CREATE TABLE Infos_nutritionnelles(
   id_infos int(11) NOT NULL AUTO_INCREMENT,
   energie INT,
   proteines DECIMAL(15,2),
   glucides DECIMAL(15,2),
   lipides DECIMAL(15,2),
   eau DECIMAL(15,2),
   fibres DECIMAL(15,2),
   minereaux VARCHAR(50),
   vitamines DECIMAL(15,2),
   PRIMARY KEY(id_infos)
);

CREATE TABLE Categorie(
   id_categ int(11) NOT NULL AUTO_INCREMENT,
   nom_categ VARCHAR(50),
   nb_cadres INT,
   nb_cadres_vis INT,
   lien_categ VARCHAR(50),
   PRIMARY KEY(id_categ)
);

CREATE TABLE menu(
   id_menu int(11) NOT NULL AUTO_INCREMENT,
   titre_menu VARCHAR(50),
   PRIMARY KEY(id_menu)
);

CREATE TABLE etape(
   id_etape int(11) NOT NULL AUTO_INCREMENT,
   titre_etape VARCHAR(50),
   ordre_etape INT,
   instruction TEXT,
   PRIMARY KEY(id_etape)
);

CREATE TABLE saison(
   id_saison int(11) NOT NULL AUTO_INCREMENT,
   nom_saison VARCHAR(50),
   PRIMARY KEY(id_saison)
);

CREATE TABLE Fete(
   id_fete int(11) NOT NULL AUTO_INCREMENT,
   nom_fete VARCHAR(50),
   PRIMARY KEY(id_fete)
);

CREATE TABLE Recette(
   id_categ int(11) NOT NULL AUTO_INCREMENT,
   id_recette int(11) NOT NULL AUTO_INCREMENT,
   nom_recette VARCHAR(50),
   tmp_prep TIME,
   tmp_repos TIME,
   tmp_cuisson TIME,
   img_recette VARCHAR(100),
   difficulte INT,
   nb_calories INT,
   lien_video VARCHAR(50),
   PRIMARY KEY(id_categ, id_recette),
   FOREIGN KEY(id_categ) REFERENCES Categorie(id_categ)
);

CREATE TABLE Ingredient(
   id_infos int(11) NOT NULL AUTO_INCREMENT,
   id_ingred int(11) NOT NULL AUTO_INCREMENT,
   nom_ingred VARCHAR(50),
   healthy TINYINT,
   PRIMARY KEY(id_infos, id_ingred),
   UNIQUE(id_infos),
   FOREIGN KEY(id_infos) REFERENCES Infos_nutritionnelles(id_infos)
);

CREATE TABLE cadre(
   id_categ int(11) NOT NULL AUTO_INCREMENT,
   id_recette int(11) NOT NULL AUTO_INCREMENT,
   id_cadre int(11) NOT NULL AUTO_INCREMENT,
   titre_cadre VARCHAR(50),
   img_cadre VARCHAR(50),
   video_cadre VARCHAR(50),
   desc_cadre VARCHAR(50),
   PRIMARY KEY(id_categ, id_recette, id_cadre),
   FOREIGN KEY(id_categ, id_recette) REFERENCES Recette(id_categ, id_recette)
);

CREATE TABLE necessiter(
   id_categ INT,
   id_recette INT,
   id_infos INT,
   id_ingred INT,
   quantite DECIMAL(15,2),
   unite_mesure VARCHAR(50),
   PRIMARY KEY(id_categ, id_recette, id_infos, id_ingred),
   FOREIGN KEY(id_categ, id_recette) REFERENCES Recette(id_categ, id_recette),
   FOREIGN KEY(id_infos, id_ingred) REFERENCES Ingredient(id_infos, id_ingred)
);

CREATE TABLE suivre(
   id_categ INT,
   id_recette INT,
   id_etape INT,
   PRIMARY KEY(id_categ, id_recette, id_etape),
   FOREIGN KEY(id_categ, id_recette) REFERENCES Recette(id_categ, id_recette),
   FOREIGN KEY(id_etape) REFERENCES etape(id_etape)
);

CREATE TABLE concerner(
   id_categ INT,
   id_recette INT,
   id_fete INT,
   PRIMARY KEY(id_categ, id_recette, id_fete),
   FOREIGN KEY(id_categ, id_recette) REFERENCES Recette(id_categ, id_recette),
   FOREIGN KEY(id_fete) REFERENCES Fete(id_fete)
);

CREATE TABLE Appartenir(
   id_infos INT,
   id_ingred INT,
   id_saison CHAR(50),
   PRIMARY KEY(id_infos, id_ingred, id_saison),
   FOREIGN KEY(id_infos, id_ingred) REFERENCES Ingredient(id_infos, id_ingred),
   FOREIGN KEY(id_saison) REFERENCES saison(id_saison)
);
