<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171224050445 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_contract ADD username_id INT NOT NULL, ADD UNIQ_E10F48F4F85E0677 INT NOT NULL, DROP username');
        $this->addSql('ALTER TABLE app_contract ADD CONSTRAINT FK_E10F48F4ED766068 FOREIGN KEY (username_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX IDX_E10F48F4ED766068 ON app_contract (username_id)');
    }
}
