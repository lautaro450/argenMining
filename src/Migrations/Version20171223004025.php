<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171223004025 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_contract (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(60) NOT NULL, currency VARCHAR(30) NOT NULL, hashrate DOUBLE PRECISION NOT NULL, state INT NOT NULL, UNIQUE INDEX UNIQ_E10F48F4F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_users ADD firstName VARCHAR(40) NOT NULL, ADD lastName VARCHAR(40) NOT NULL, ADD address VARCHAR(80) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE app_contract');
        $this->addSql('ALTER TABLE app_users DROP firstName, DROP lastName, DROP address');
    }
}
