<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171224044255 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_E10F48F4F85E0677 ON app_contract');
        $this->addSql('ALTER TABLE app_contract ADD username_id INT NOT NULL, DROP username');
        $this->addSql('ALTER TABLE app_contract ADD CONSTRAINT FK_E10F48F4ED766068 FOREIGN KEY (username_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX IDX_E10F48F4ED766068 ON app_contract (username_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_contract DROP FOREIGN KEY FK_E10F48F4ED766068');
        $this->addSql('DROP INDEX IDX_E10F48F4ED766068 ON app_contract');
        $this->addSql('ALTER TABLE app_contract ADD username VARCHAR(60) NOT NULL COLLATE utf8_unicode_ci, DROP username_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E10F48F4F85E0677 ON app_contract (username)');
    }
}
