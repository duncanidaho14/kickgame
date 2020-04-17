<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416101539 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, jeuxvideo_id INT DEFAULT NULL, commentaire LONGTEXT NOT NULL, date_com DATETIME NOT NULL, note DOUBLE PRECISION DEFAULT NULL, INDEX IDX_D9BEC0C48FCB884A (jeuxvideo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, starts_at DATETIME NOT NULL, image VARCHAR(255) NOT NULL, capacity INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, jeuxvideo_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A8FCB884A (jeuxvideo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeuxvideos (id INT AUTO_INCREMENT NOT NULL, plateforme_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION DEFAULT NULL, note DOUBLE PRECISION DEFAULT NULL, date_sortie DATETIME NOT NULL, INDEX IDX_90E4FC0D391E226B (plateforme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeuxvideo_categorie (jeuxvideo_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_AF1E477F8FCB884A (jeuxvideo_id), INDEX IDX_AF1E477FBCF5E72D (categorie_id), PRIMARY KEY(jeuxvideo_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeuxvideo_event (jeuxvideo_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_A04A50228FCB884A (jeuxvideo_id), INDEX IDX_A04A502271F7E88B (event_id), PRIMARY KEY(jeuxvideo_id, event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateformes (id INT AUTO_INCREMENT NOT NULL, console VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registrations (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_53DE51E771F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videos (id INT AUTO_INCREMENT NOT NULL, jeuxvideo_id INT DEFAULT NULL, video VARCHAR(255) NOT NULL, INDEX IDX_29AA64328FCB884A (jeuxvideo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C48FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideos (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A8FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideos (id)');
        $this->addSql('ALTER TABLE jeuxvideos ADD CONSTRAINT FK_90E4FC0D391E226B FOREIGN KEY (plateforme_id) REFERENCES plateformes (id)');
        $this->addSql('ALTER TABLE jeuxvideo_categorie ADD CONSTRAINT FK_AF1E477F8FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeuxvideo_categorie ADD CONSTRAINT FK_AF1E477FBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeuxvideo_event ADD CONSTRAINT FK_A04A50228FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeuxvideo_event ADD CONSTRAINT FK_A04A502271F7E88B FOREIGN KEY (event_id) REFERENCES events (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E771F7E88B FOREIGN KEY (event_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE videos ADD CONSTRAINT FK_29AA64328FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideos (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jeuxvideo_categorie DROP FOREIGN KEY FK_AF1E477FBCF5E72D');
        $this->addSql('ALTER TABLE jeuxvideo_event DROP FOREIGN KEY FK_A04A502271F7E88B');
        $this->addSql('ALTER TABLE registrations DROP FOREIGN KEY FK_53DE51E771F7E88B');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C48FCB884A');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A8FCB884A');
        $this->addSql('ALTER TABLE jeuxvideo_categorie DROP FOREIGN KEY FK_AF1E477F8FCB884A');
        $this->addSql('ALTER TABLE jeuxvideo_event DROP FOREIGN KEY FK_A04A50228FCB884A');
        $this->addSql('ALTER TABLE videos DROP FOREIGN KEY FK_29AA64328FCB884A');
        $this->addSql('ALTER TABLE jeuxvideos DROP FOREIGN KEY FK_90E4FC0D391E226B');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE jeuxvideos');
        $this->addSql('DROP TABLE jeuxvideo_categorie');
        $this->addSql('DROP TABLE jeuxvideo_event');
        $this->addSql('DROP TABLE plateformes');
        $this->addSql('DROP TABLE registrations');
        $this->addSql('DROP TABLE videos');
    }
}
