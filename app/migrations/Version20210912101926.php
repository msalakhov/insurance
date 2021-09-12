<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210912101926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_insurance (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(255) NOT NULL,
            client_id INT NOT NULL,
            renewal_date DATETIME NOT NULL,
            insurance_objects_types_id INT NOT NULL,
            address VARCHAR(255) DEFAULT NULL,
            dwelling_limit VARCHAR(255) DEFAULT NULL,
            other_structures_limit VARCHAR(255) DEFAULT NULL,
            contents VARCHAR(255) DEFAULT NULL, liability VARCHAR(255) DEFAULT NULL, loss_of_use VARCHAR(255) DEFAULT NULL, aopdeductible VARCHAR(255) DEFAULT NULL, wind_deductible VARCHAR(255) DEFAULT NULL, other_notes VARCHAR(255) DEFAULT NULL, premium VARCHAR(255) DEFAULT NULL, total_drivers VARCHAR(255) DEFAULT NULL, vehicles VARCHAR(255) DEFAULT NULL, pip VARCHAR(255) DEFAULT NULL, medical_payments VARCHAR(255) DEFAULT NULL, otcdeductible VARCHAR(255) DEFAULT NULL, colldeductible VARCHAR(255) DEFAULT NULL, jewelry VARCHAR(255) DEFAULT NULL, fine_art VARCHAR(255) DEFAULT NULL, silverware VARCHAR(255) DEFAULT NULL, wine VARCHAR(255) DEFAULT NULL, other_collectable VARCHAR(255) DEFAULT NULL, misc VARCHAR(255) DEFAULT NULL, excess_limit VARCHAR(255) DEFAULT NULL, uninsured VARCHAR(255) DEFAULT NULL, motorist VARCHAR(255) DEFAULT NULL, year VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client_insurance');
    }
}
