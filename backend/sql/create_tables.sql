CREATE TABLE `test_tb`.`product` (`id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `description` TEXT NULL , `price` FLOAT NOT NULL , `stock` INT NOT NULL , `image` TEXT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

CREATE TABLE `test_tb`.`customer` (`id` INT NOT NULL AUTO_INCREMENT , `email` TEXT NOT NULL , `username` TEXT NOT NULL , `password` TEXT NOT NULL , `shipping_info` LONGTEXT NULL , `billing_info` JSON NULL , `cart_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

CREATE TABLE `test_tb`.`admin` (`id` INT NOT NULL AUTO_INCREMENT , `username` TEXT NOT NULL , `email` TEXT NOT NULL , `password` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

