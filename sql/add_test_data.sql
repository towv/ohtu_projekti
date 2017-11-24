-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Lukuvinkki(otsikko, tekija, isbn, url, tyyppi, kuvaus, julkaistu) VALUES('Jokeri Pokeri', 'JJ', '123123123123', null, 'kirja', null, '2017');
INSERT INTO Lukuvinkki(otsikko, tekija, isbn, url, tyyppi, kuvaus, julkaistu) VALUES('Shamaanin Perusteet', 'JJ','12341234', null, 'kirja', null, '2017');
INSERT INTO Lukuvinkki(otsikko, tekija, isbn, url, tyyppi, kuvaus, julkaistu) VALUES('Maestron muistelmat', 'SL','123456789', null, 'kirja', null, '2017');
INSERT INTO Tag(nimi) VALUES ('swag');
INSERT INTO Tag(nimi) VALUES ('tägi');
INSERT INTO LukuvinkkiTag(tag_id, lukuvinkki_id) VALUES (1, 1);
INSERT INTO LukuvinkkiTag(tag_id, lukuvinkki_id) VALUES (2, 2);
INSERT INTO Kayttaja(tunnus, salasana) VALUES('topi','topitopi');
