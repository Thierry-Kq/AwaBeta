<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210820195546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, time_slot LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking_ressource (booking_id INT NOT NULL, ressource_id INT NOT NULL, INDEX IDX_AD8E473301C60 (booking_id), INDEX IDX_AD8E47FC6CD52A (ressource_id), PRIMARY KEY(booking_id, ressource_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking_ressource ADD CONSTRAINT FK_AD8E473301C60 FOREIGN KEY (booking_id) REFERENCES booking (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking_ressource ADD CONSTRAINT FK_AD8E47FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking_ressource DROP FOREIGN KEY FK_AD8E473301C60');
        $this->addSql('ALTER TABLE booking_ressource DROP FOREIGN KEY FK_AD8E47FC6CD52A');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE booking_ressource');
        $this->addSql('DROP TABLE ressource');
    }
}
