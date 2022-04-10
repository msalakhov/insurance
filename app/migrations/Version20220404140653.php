<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404140653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_insurance ADD insurance_objects_types_id INT NOT NULL');
        $this->addSql('ALTER TABLE client_insurance ADD CONSTRAINT FK_8F2E7F436A193B0B FOREIGN KEY (insurance_objects_types_id) REFERENCES insurance_objects_types (id)');
        $this->addSql('CREATE INDEX IDX_8F2E7F436A193B0B ON client_insurance (insurance_objects_types_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_insurance DROP FOREIGN KEY FK_8F2E7F436A193B0B');
        $this->addSql('DROP INDEX IDX_8F2E7F436A193B0B ON client_insurance');
        $this->addSql('ALTER TABLE client_insurance DROP insurance_objects_types_id');
    }
}
