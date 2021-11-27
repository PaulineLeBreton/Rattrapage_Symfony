<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211127094452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ecole (id INT AUTO_INCREMENT NOT NULL, ville_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_9786AACA73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecole_etudiant (ecole_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_E48D658C77EF1B1E (ecole_id), INDEX IDX_E48D658CDDEAB1A3 (etudiant_id), PRIMARY KEY(ecole_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ecole ADD CONSTRAINT FK_9786AACA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE ecole_etudiant ADD CONSTRAINT FK_E48D658C77EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecole (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ecole_etudiant ADD CONSTRAINT FK_E48D658CDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ecole_etudiant DROP FOREIGN KEY FK_E48D658C77EF1B1E');
        $this->addSql('ALTER TABLE ecole_etudiant DROP FOREIGN KEY FK_E48D658CDDEAB1A3');
        $this->addSql('ALTER TABLE ecole DROP FOREIGN KEY FK_9786AACA73F0036');
        $this->addSql('DROP TABLE ecole');
        $this->addSql('DROP TABLE ecole_etudiant');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE ville');
    }
}
