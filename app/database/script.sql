 CREATE DATABASE wiki;

 CREATE TABLE role (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_role VARCHAR(255)
 );

 CREATE TABLE user (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255),
    prénom VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    profil VARCHAR(255),
    role_id INT,
    Foreign Key (role_id) REFERENCES role(id) ON DELETE CASCADE ON UPDATE CASCADE
 );

 CREATE TABLE categorie (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_categorie VARCHAR(255)
 );

 CREATE TABLE wiki (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titre VARCHAR(255),
    description VARCHAR(255),
    contenu VARCHAR(255),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    image VARCHAR(255),
    archiver BOOLEAN,
    categorie_id INT,
    user_id INT,
    Foreign Key (categorie_id) REFERENCES categorie(id) ON DELETE CASCADE ON UPDATE CASCADE,
    Foreign Key (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
 );
 CREATE TABLE tag (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_tag VARCHAR(255)
 );
 CREATE TABLE tag_wiki (
    tag_id INT,
    wiki_id INT,
    Foreign Key (tag_id) REFERENCES tag(id) ON DELETE CASCADE ON UPDATE CASCADE,
    Foreign Key (wiki_id) REFERENCES wiki(id) ON DELETE CASCADE ON UPDATE CASCADE
 );
