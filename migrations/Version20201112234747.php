<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201112234747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, previous_state_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A393D2FB1A3324C5 (previous_state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state_group (id INT AUTO_INCREMENT NOT NULL, state_id INT NOT NULL, states VARCHAR(255) NOT NULL, INDEX IDX_1F53C0C95D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state_state_group (id INT AUTO_INCREMENT NOT NULL, state_group_id_id INT NOT NULL, state_id_id INT NOT NULL, UNIQUE INDEX UNIQ_D477E494E44C916D (state_group_id_id), UNIQUE INDEX UNIQ_D477E494DD71A5B (state_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE state ADD CONSTRAINT FK_A393D2FB1A3324C5 FOREIGN KEY (previous_state_id) REFERENCES state_group (id)');
        $this->addSql('ALTER TABLE state_group ADD CONSTRAINT FK_1F53C0C95D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE state_state_group ADD CONSTRAINT FK_D477E494E44C916D FOREIGN KEY (state_group_id_id) REFERENCES state_group (id)');
        $this->addSql('ALTER TABLE state_state_group ADD CONSTRAINT FK_D477E494DD71A5B FOREIGN KEY (state_id_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE question ADD state_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EDD71A5B FOREIGN KEY (state_id_id) REFERENCES state (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6F7494EDD71A5B ON question (state_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EDD71A5B');
        $this->addSql('ALTER TABLE state_group DROP FOREIGN KEY FK_1F53C0C95D83CC1');
        $this->addSql('ALTER TABLE state_state_group DROP FOREIGN KEY FK_D477E494DD71A5B');
        $this->addSql('ALTER TABLE state DROP FOREIGN KEY FK_A393D2FB1A3324C5');
        $this->addSql('ALTER TABLE state_state_group DROP FOREIGN KEY FK_D477E494E44C916D');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE state_group');
        $this->addSql('DROP TABLE state_state_group');
        $this->addSql('DROP INDEX UNIQ_B6F7494EDD71A5B ON question');
        $this->addSql('ALTER TABLE question DROP state_id_id');
    }
}
