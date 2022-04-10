<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405092109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE insurance_objects_types_fields ADD insurance_type_id INT NOT NULL, ADD type VARCHAR(50) NOT NULL, ADD label VARCHAR(100) DEFAULT NULL, ADD required TINYINT(1) NOT NULL DEFAULT 0, CHANGE field_name name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE insurance_objects_types_fields ADD CONSTRAINT FK_6472BE06286DA936 FOREIGN KEY (insurance_type_id) REFERENCES insurance_objects_types (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6472BE06286DA936 ON insurance_objects_types_fields (insurance_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE insurance_objects_types_fields DROP FOREIGN KEY FK_6472BE06286DA936');
        $this->addSql('DROP INDEX UNIQ_6472BE06286DA936 ON insurance_objects_types_fields');
        $this->addSql('ALTER TABLE insurance_objects_types_fields DROP insurance_type_id, DROP type, DROP label, DROP required, CHANGE name field_name VARCHAR(100) NOT NULL');
    }
}
