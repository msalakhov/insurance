<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211003160846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_insurance ADD line_of_business VARCHAR(255) DEFAULT NULL, ADD limits VARCHAR(255) DEFAULT NULL, ADD endorsements VARCHAR(255) DEFAULT NULL, DROP min_home_liability_sub_limit, DROP min_auto_liability_sub_limit');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_insurance ADD min_home_liability_sub_limit INT DEFAULT NULL, ADD min_auto_liability_sub_limit INT DEFAULT NULL, DROP line_of_business, DROP limits, DROP endorsements');
    }
}
