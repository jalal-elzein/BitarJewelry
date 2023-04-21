CREATE TABLE `cart` (`id` INT NOT NULL AUTO_INCREMENT, `customer_id` INT NOT NULL, `products` JSON, `price` INT, PRIMARY KEY (`id`)) ENGINE = MyISAM;

CREATE TABLE `product` (`id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `description` TEXT NULL , `price` FLOAT NOT NULL , `stock` INT NOT NULL , `image` TEXT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

CREATE TABLE `customer` (`id` INT NOT NULL AUTO_INCREMENT , `email` TEXT NOT NULL , `username` TEXT NOT NULL , `password` TEXT NOT NULL , `shipping_info` LONGTEXT NULL , `billing_info` JSON NULL , `cart_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

CREATE TABLE `admin` (`id` INT NOT NULL AUTO_INCREMENT , `username` TEXT NOT NULL , `email` TEXT NOT NULL , `password` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;