<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180112202916 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_users CHANGE wallet_eth wallet_eth VARCHAR(124) DEFAULT NULL, CHANGE wallet_etc wallet_etc VARCHAR(124) DEFAULT NULL, CHANGE wallet_pasl wallet_pasl VARCHAR(124) DEFAULT NULL, CHANGE wallet_zcash wallet_zcash VARCHAR(124) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_users CHANGE wallet_eth wallet_eth VARCHAR(124) NOT NULL COLLATE utf8_unicode_ci, CHANGE wallet_etc wallet_etc VARCHAR(124) NOT NULL COLLATE utf8_unicode_ci, CHANGE wallet_pasl wallet_pasl VARCHAR(124) NOT NULL COLLATE utf8_unicode_ci, CHANGE wallet_zcash wallet_zcash VARCHAR(124) NOT NULL COLLATE utf8_unicode_ci');
    }
}
