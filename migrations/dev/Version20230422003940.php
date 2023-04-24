<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422003940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Generate `password` and `roles` fields into `users` table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            <<<SQL
                ALTER TABLE `user_db`.`user` ADD COLUMN `password` VARCHAR(255) NOT NULL;
            SQL
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql(
            <<<SQL
                ALTER TABLE `user_db`.`user` DROP COLUMN `password`;
            SQL
        );
    }
}
