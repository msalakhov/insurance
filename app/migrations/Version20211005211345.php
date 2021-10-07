<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005211345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attachments (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(50) NOT NULL, city VARCHAR(100) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, renewal_term DATE DEFAULT NULL, INDEX IDX_C74404559D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_insurance (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, client_id INT NOT NULL, renewal_date DATETIME DEFAULT NULL, insurance_objects_types_id INT NOT NULL, address VARCHAR(255) DEFAULT NULL, dwelling_limit VARCHAR(255) DEFAULT NULL, other_structures_limit VARCHAR(255) DEFAULT NULL, contents VARCHAR(255) DEFAULT NULL, liability VARCHAR(255) DEFAULT NULL, loss_of_use VARCHAR(255) DEFAULT NULL, aopdeductible VARCHAR(255) DEFAULT NULL, wind_deductible VARCHAR(255) DEFAULT NULL, other_notes VARCHAR(255) DEFAULT NULL, premium VARCHAR(255) DEFAULT NULL, total_drivers VARCHAR(255) DEFAULT NULL, vehicles VARCHAR(255) DEFAULT NULL, pip VARCHAR(255) DEFAULT NULL, medical_payments VARCHAR(255) DEFAULT NULL, otcdeductible VARCHAR(255) DEFAULT NULL, colldeductible VARCHAR(255) DEFAULT NULL, jewelry VARCHAR(255) DEFAULT NULL, fine_art VARCHAR(255) DEFAULT NULL, silverware VARCHAR(255) DEFAULT NULL, wine VARCHAR(255) DEFAULT NULL, other_collectable VARCHAR(255) DEFAULT NULL, misc VARCHAR(255) DEFAULT NULL, excess_limit VARCHAR(255) DEFAULT NULL, uninsured VARCHAR(255) DEFAULT NULL, motorist VARCHAR(255) DEFAULT NULL, year VARCHAR(255) DEFAULT NULL, min_home_liability_sub_limit INT DEFAULT NULL, min_auto_liability_sub_limit INT DEFAULT NULL, line_of_business VARCHAR(255) DEFAULT NULL, limits VARCHAR(255) DEFAULT NULL, endorsements VARCHAR(255) DEFAULT NULL, is_notifyed TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE insurance_attachments (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, insurance_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE insurance_objects_types (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE insurance_objects_types_fields (id INT AUTO_INCREMENT NOT NULL, insurance_object_type_id INT NOT NULL, field_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404559D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404559D86650F');
        $this->addSql('DROP TABLE attachments');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_insurance');
        $this->addSql('DROP TABLE insurance_attachments');
        $this->addSql('DROP TABLE insurance_objects_types');
        $this->addSql('DROP TABLE insurance_objects_types_fields');
        $this->addSql('DROP TABLE user');
    }
}
