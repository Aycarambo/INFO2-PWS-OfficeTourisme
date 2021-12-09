<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202082202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv ADD conseiller_id INT NOT NULL, ADD touriste_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F861AC39A0D FOREIGN KEY (conseiller_id) REFERENCES conseiller (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F865BE3F452 FOREIGN KEY (touriste_id) REFERENCES touriste (id)');
        $this->addSql('CREATE INDEX IDX_10C31F861AC39A0D ON rdv (conseiller_id)');
        $this->addSql('CREATE INDEX IDX_10C31F865BE3F452 ON rdv (touriste_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F861AC39A0D');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F865BE3F452');
        $this->addSql('DROP INDEX IDX_10C31F861AC39A0D ON rdv');
        $this->addSql('DROP INDEX IDX_10C31F865BE3F452 ON rdv');
        $this->addSql('ALTER TABLE rdv DROP conseiller_id, DROP touriste_id');
    }
}
