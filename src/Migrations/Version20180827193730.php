<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180827193730 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE inscriptions ADD checked TINYINT(1) NOT NULL, ADD adult TINYINT(1) NOT NULL, DROP registered, CHANGE phone_number phone_number VARCHAR(10) NOT NULL, CHANGE grades grades TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE inscriptions ADD registered VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP checked, DROP adult, CHANGE phone_number phone_number INT NOT NULL, CHANGE grades grades VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
