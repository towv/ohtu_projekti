-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Kirja(
	id SERIAL PRIMARY KEY,
	otsikko varchar(50) NOT NULL,
	kirjoittaja varchar(50) NOT NULL,
	isbn varchar(50) NOT NULL
);