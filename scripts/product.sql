CREATE TABLE `se`.`product` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NAME` TEXT NOT NULL,
  `DESCRIPTION` TEXT NULL DEFAULT NULL,
  `TYPE` TEXT NOT NULL,
  `PRICE` DOUBLE NOT NULL,
  `IMAGE` VARCHAR(255) NOT NULL DEFAULT 'NOIMAGE',
  `STOCK` INT NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE = MyISAM;

INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES (202100, 'Body Chain', NULL,'Chains', 20, 'bodychain.jpg', 15);
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES (202101, 'Wide Chain', 'Chain wider than average, can have multiple usage','Chains', 15, 'chainwide.jpg', 10);
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES (202102, 'Red Pendant', 'Red Pendant clock shape ', 'Pendants', 18, 'clockredpen.jpg', 15)
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES(202103, 'Rainbow Crystal', 'Reflective rainbow crystal as pendant', 'Pendants', 15, 'crysrainbow.jpg', 5)
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES (202104, 'Butterfly Earrings', 'Long Butterfly shape earrings with two pearls at the end - part of spring collection','Earrings', 10, 'earine2.jpg', 5);
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES (202105, 'Gold Earrings', 'Vintage gold earrings','Earrings', 120, 'goldear.jpg', 3);
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES(202106, 'Pink Crystal', 'pink crystal pendant surrounded by circular metal rings', 'Pendants', 15, 'pinkcrys.jpeg', 10)
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES (202107, 'Red Ring', 'Silver Red Ring','Rings', 15, 'ringred.jpg', 20);
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES (202108, 'Silver Ring', 'Wide Silver Ring With Engravings','Rings', 10, 'ringsiler.jpg', 20);
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES (202109, 'Pearls Necklace', 'Big Pearls Necklace','Pearl Necklaces', 40, 'webpearl.jpg', 20);
INSERT INTO product (ID, NAME, DESCRIPTION, TYPE, PRICE, IMAGE, STOCK) VALUES (202110, 'Gold Chain', 'Long Gold Chain','Gold Necklace', 70, '18k-gold-chain-33483988_1036550_ED.jpg', 25);