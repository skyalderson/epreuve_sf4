<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200123102721 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE joueurs ADD COLUMN position_x INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE joueurs ADD COLUMN position_y INTEGER DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__joueurs AS SELECT id, nom, email, score, carte_id FROM joueurs');
        $this->addSql('DROP TABLE joueurs');
        $this->addSql('CREATE TABLE joueurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, score INTEGER NOT NULL, carte_id INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO joueurs (id, nom, email, score, carte_id) SELECT id, nom, email, score, carte_id FROM __temp__joueurs');
        $this->addSql('DROP TABLE __temp__joueurs');
    }
}
