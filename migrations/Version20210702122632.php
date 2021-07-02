<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210702122632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4C6798DB FOREIGN KEY (account_type_id) REFERENCES account_type (id)');
        $this->addSql('CREATE INDEX IDX_7D3656A4A76ED395 ON account (user_id)');
        $this->addSql('CREATE INDEX IDX_7D3656A4C6798DB ON account (account_type_id)');
        $this->addSql('ALTER TABLE operation CHANGE account_id operation_id INT NOT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D44AC3583 FOREIGN KEY (operation_id) REFERENCES account (id)');
        $this->addSql('CREATE INDEX IDX_1981A66D44AC3583 ON operation (operation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4A76ED395');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4C6798DB');
        $this->addSql('DROP INDEX IDX_7D3656A4A76ED395 ON account');
        $this->addSql('DROP INDEX IDX_7D3656A4C6798DB ON account');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D44AC3583');
        $this->addSql('DROP INDEX IDX_1981A66D44AC3583 ON operation');
        $this->addSql('ALTER TABLE operation CHANGE operation_id account_id INT NOT NULL');
    }
}
