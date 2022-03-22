<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801053558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_insurance (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, insurance_objects_types_id INT NOT NULL, address VARCHAR(255) DEFAULT NULL, dwelling_limit VARCHAR(255) DEFAULT NULL, other_structures_limit VARCHAR(255) DEFAULT NULL, personal_property_limit VARCHAR(255) DEFAULT NULL, deductible VARCHAR(255) DEFAULT NULL, premium VARCHAR(255) DEFAULT NULL, total_cars VARCHAR(255) DEFAULT NULL, total_drivers VARCHAR(255) DEFAULT NULL, deductible_premium VARCHAR(255) DEFAULT NULL, fine_art VARCHAR(255) DEFAULT NULL, jewelry VARCHAR(255) DEFAULT NULL, wine VARCHAR(255) DEFAULT NULL, etc VARCHAR(255) DEFAULT NULL, each_with_rlp VARCHAR(255) DEFAULT NULL, express_limit VARCHAR(255) DEFAULT NULL, homes_listed VARCHAR(255) DEFAULT NULL, llcs VARCHAR(255) DEFAULT NULL, year VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client_insurance');
    }
}
