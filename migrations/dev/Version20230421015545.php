<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230421015545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_user_id ON customer');
        $this->addSql('ALTER TABLE customer ADD password VARCHAR(255) NOT NULL, DROP phone, DROP user_id, CHANGE id id VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE customer RENAME INDEX u_customer_email TO UNIQ_81398E09E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer ADD phone VARCHAR(20) NOT NULL, ADD user_id CHAR(36) NOT NULL, DROP password, CHANGE id id CHAR(36) NOT NULL, CHANGE email email VARCHAR(100) DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_user_id ON customer (user_id)');
        $this->addSql('ALTER TABLE customer RENAME INDEX uniq_81398e09e7927c74 TO U_customer_email');
    }
}
