<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427122643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE portrait (id INT AUTO_INCREMENT NOT NULL, application VARCHAR(255) NOT NULL, video_game VARCHAR(255) NOT NULL, movie VARCHAR(255) NOT NULL, series VARCHAR(255) NOT NULL, hero VARCHAR(255) NOT NULL, book VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, language VARCHAR(255) NOT NULL, song VARCHAR(255) NOT NULL, introduction LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD portrait_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491226EBF3 FOREIGN KEY (portrait_id) REFERENCES portrait (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6491226EBF3 ON user (portrait_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491226EBF3');
        $this->addSql('DROP TABLE portrait');
        $this->addSql('DROP INDEX UNIQ_8D93D6491226EBF3 ON user');
        $this->addSql('ALTER TABLE user DROP portrait_id');
    }
}
