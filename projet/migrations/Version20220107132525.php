<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220107132525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conseiller DROP FOREIGN KEY FK_18C69F97A76ED395');
        $this->addSql('ALTER TABLE touriste DROP FOREIGN KEY FK_8E291477A76ED395');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, saison TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX UNIQ_18C69F97A76ED395 ON conseiller');
        $this->addSql('ALTER TABLE conseiller DROP user_id');
        $this->addSql('DROP INDEX UNIQ_8E291477A76ED395 ON touriste');
        $this->addSql('ALTER TABLE touriste DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE saison');
        $this->addSql('ALTER TABLE conseiller ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE conseiller ADD CONSTRAINT FK_18C69F97A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_18C69F97A76ED395 ON conseiller (user_id)');
        $this->addSql('ALTER TABLE touriste ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE touriste ADD CONSTRAINT FK_8E291477A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8E291477A76ED395 ON touriste (user_id)');
    }
}
