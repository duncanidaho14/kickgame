<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416143557 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaires CHANGE jeuxvideo_id jeuxvideo_id INT DEFAULT NULL, CHANGE note note DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE images CHANGE jeuxvideo_id jeuxvideo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jeuxvideos CHANGE plateforme_id plateforme_id INT DEFAULT NULL, CHANGE prix prix DOUBLE PRECISION DEFAULT NULL, CHANGE note note DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE registrations CHANGE event_id event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE videos CHANGE jeuxvideo_id jeuxvideo_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaires CHANGE jeuxvideo_id jeuxvideo_id INT DEFAULT NULL, CHANGE note note DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE images CHANGE jeuxvideo_id jeuxvideo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jeuxvideos CHANGE plateforme_id plateforme_id INT DEFAULT NULL, CHANGE prix prix DOUBLE PRECISION DEFAULT \'NULL\', CHANGE note note DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE registrations CHANGE event_id event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE videos CHANGE jeuxvideo_id jeuxvideo_id INT DEFAULT NULL');
    }
}
