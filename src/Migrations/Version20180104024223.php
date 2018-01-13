<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180104024223 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_transaction (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, state INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_contract DROP FOREIGN KEY FK_userContract');
        $this->addSql('DROP INDEX username_id ON app_contract');
        $this->addSql('ALTER TABLE app_contract CHANGE username_id username_id VARCHAR(30) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE app_transaction');
        $this->addSql('ALTER TABLE app_contract CHANGE username_id username_id INT NOT NULL');
        $this->addSql('ALTER TABLE app_contract ADD CONSTRAINT FK_userContract FOREIGN KEY (username_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX username_id ON app_contract (username_id)');
    }
}
