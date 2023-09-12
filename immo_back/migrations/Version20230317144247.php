<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317144247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, property_id INT NOT NULL, file VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_14B78418549213EC (property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, property_type_id INT NOT NULL, transaction_type_id INT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, summary VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, price NUMERIC(20, 2) NOT NULL, address VARCHAR(255) NOT NULL, additional_address VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(20) NOT NULL, city VARCHAR(50) NOT NULL, place VARCHAR(255) DEFAULT NULL, latitude VARCHAR(255) DEFAULT NULL, longitude VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, views INT DEFAULT NULL, INDEX IDX_8BF21CDE9C81C6EB (property_type_id), INDEX IDX_8BF21CDEB3E6B071 (transaction_type_id), INDEX IDX_8BF21CDEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transcation_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, title VARCHAR(10) DEFAULT NULL, last_name VARCHAR(80) NOT NULL, first_name VARCHAR(80) NOT NULL, address VARCHAR(255) NOT NULL, additional_address VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(10) NOT NULL, city VARCHAR(80) NOT NULL, landline_phone VARCHAR(20) DEFAULT NULL, mobile_phone VARCHAR(20) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE9C81C6EB FOREIGN KEY (property_type_id) REFERENCES property_type (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEB3E6B071 FOREIGN KEY (transaction_type_id) REFERENCES transcation_type (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418549213EC');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE9C81C6EB');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEB3E6B071');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEA76ED395');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE property_type');
        $this->addSql('DROP TABLE transcation_type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
