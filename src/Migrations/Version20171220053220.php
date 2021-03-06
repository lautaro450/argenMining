<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171220053220 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_C2502824E7927C74 ON app_users');
        $this->addSql('ALTER TABLE app_users CHANGE email username VARCHAR(60) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824F85E0677 ON app_users (username)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_C2502824F85E0677 ON app_users');
        $this->addSql('ALTER TABLE app_users CHANGE username email VARCHAR(60) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824E7927C74 ON app_users (email)');
    }
}
