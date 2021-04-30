<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429085348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, filiere_id INT NOT NULL, formateur_referent_id INT NOT NULL, intitule VARCHAR(255) NOT NULL, taille_promo INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, begin_at DATETIME NOT NULL, end_at DATETIME NOT NULL, INDEX IDX_404021BF180AA129 (filiere_id), INDEX IDX_404021BFB5D40EDC (formateur_referent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFB5D40EDC FOREIGN KEY (formateur_referent_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF180AA129');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE formation');
    }
}
