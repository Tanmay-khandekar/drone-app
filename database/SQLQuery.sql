CREATE TABLE `languages` ( `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE `bids` ADD `status` VARCHAR(255) NOT NULL DEFAULT 'pending' AFTER `price`;

CREATE TABLE `drone-app`.`payments` ( `id` INT NOT NULL AUTO_INCREMENT , `payment_id` INT NOT NULL , `customer_id` INT NOT NULL , `pilot_id` INT NOT NULL , `amount` INT NOT NULL , `created_at` TIMESTAMP NULL , `updated_at` TIMESTAMP NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;