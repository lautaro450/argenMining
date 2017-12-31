<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171230125614 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE app_users ADD wallet_eth VARCHAR(124) NOT NULL, ADD wallet_etc VARCHAR(124) NOT NULL, ADD wallet_pasl VARCHAR(124) NOT NULL, ADD wallet_zcash VARCHAR(124) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_contract CHANGE username_id username_id INT NOT NULL');
        $this->addSql('ALTER TABLE app_contract ADD CONSTRAINT FK_E10F48F4ED766068 FOREIGN KEY (username_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX IDX_E10F48F4ED766068 ON app_contract (username_id)');
        $this->addSql('ALTER TABLE app_users DROP wallet_eth, DROP wallet_etc, DROP wallet_pasl, DROP wallet_zcash');
    }
}
