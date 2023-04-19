<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230418213912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create tables and its relationships';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            <<<SQL
                CREATE TABLE  `customer_db`.`customer`(
                    `id` CHAR(36) PRIMARY KEY NOT NULL,
                    `name` VARCHAR(50) NOT NULL,
                    `email` VARCHAR(100) DEFAULT NULL,
                    `phone` VARCHAR(20) NOT NULL,
                    `user_id` CHAR(36) NOT NULL,
                    INDEX  IDX_customer_name (`name`),
                    INDEX IDX_user_id (`user_id`),
                    UNIQUE U_customer_email (`email`)
                );
                CREATE TABLE `user_db`.`user` (
                    `id` CHAR(36) NOT NULL PRIMARY KEY,
                    `name` VARCHAR(100) NOT NULL,
                    `surname` VARCHAR(100) NOT NULL,
                    `city` VARCHAR(100) NOT NULL,
                    `category` ENUM('X', 'Y', 'Z') NOT NULL,
                    `age` SMALLINT NOT NULL,
                    `email` VARCHAR(100) NOT NULL,
                    `active` TINYINT(1) DEFAULT 0,
                    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    INDEX IDX_user_name (`name`),
                    INDEX IDX_user_surname (`surname`),
                    INDEX IDX_user_city (`city`),
                    UNIQUE U_user_email (`email`)
                );    
            SQL
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql(
            <<<SQL
                DROP TABLE `customer_db`.`customer`;
                DROP TABLE `user_db`.`user`;
            SQL
        );
    }
}
