-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Lukuvinkki(
    id SERIAL PRIMARY KEY,
    otsikko varchar(50) NOT NULL,
    tekija varchar(50) NOT NULL,
    isbn varchar(50),
    url varchar(50),
    tyyppi varchar(20) NOT NULL,
    kuvaus varchar(300),
    julkaistu varchar(20) NOT NULL,
    sarja varchar(50)
);

CREATE TABLE Kayttaja(
    id SERIAL PRIMARY KEY,
    tunnus varchar(50) NOT NULL,
    salasana varchar (50) NOT NULL
);

CREATE TABLE KayttajaLukuvinkki(
    kayttaja_id INTEGER REFERENCES Kayttaja(id),
    lukuvinkki_id INTEGER REFERENCES Lukuvinkki(id)
);

CREATE TABLE Tag(
    id SERIAL PRIMARY KEY,
    nimi varchar(30) NOT NULL
);

CREATE TABLE LukuvinkkiTag(
    lukuvinkki_id INTEGER REFERENCES Lukuvinkki(id),
    tag_id INTEGER REFERENCES Tag(id)
);


CREATE TABLE Status(
    kayttaja_id INTEGER REFERENCES Kayttaja(id),
    lukuvinkki_id INTEGER REFERENCES Lukuvinkki(id),
    status boolean NOT NULL
);