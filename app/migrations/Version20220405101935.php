<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405101935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE insurance_objects_types_fields DROP FOREIGN KEY FK_6472BE06286DA936');
        $this->addSql('DROP INDEX UNIQ_6472BE06286DA936 ON insurance_objects_types_fields');
        $this->addSql('ALTER TABLE insurance_objects_types_fields DROP insurance_type_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE insurance_objects_types_fields ADD insurance_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE insurance_objects_types_fields ADD CONSTRAINT FK_6472BE06286DA936 FOREIGN KEY (insurance_type_id) REFERENCES insurance_objects_types (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6472BE06286DA936 ON insurance_objects_types_fields (insurance_type_id)');
    }
}
