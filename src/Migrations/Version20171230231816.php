<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171230231816 extends AbstractMigration
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

        $this->addSql('CREATE TABLE app_contract_bak (id INT AUTO_INCREMENT NOT NULL, currency VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, hashrate DOUBLE PRECISION NOT NULL, state INT NOT NULL, username_id2 INT NOT NULL, INDEX IDX_E10F48F4ED76601 (username_id2), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_contract ADD username_id2 INT NOT NULL, ADD username VARCHAR(200) NOT NULL COLLATE utf8_unicode_ci, CHANGE username_id username_id INT NOT NULL');
        $this->addSql('CREATE INDEX UNIQ_E10F48F4F85E0677 ON app_contract (username_id2)');
        $this->addSql('CREATE INDEX FK_E10F48F4ED766068 ON app_contract (username_id)');
        $this->addSql('ALTER TABLE app_users DROP wallet_eth, DROP wallet_etc, DROP wallet_pasl, DROP wallet_zcash');
    }
}
