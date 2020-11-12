<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201112231908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_magazine (id INT AUTO_INCREMENT NOT NULL, arcitele_id_id INT NOT NULL, magazine_id_id INT NOT NULL, UNIQUE INDEX UNIQ_6264DB8F9DB62CC5 (arcitele_id_id), UNIQUE INDEX UNIQ_6264DB8FBD93691C (magazine_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE magazine (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rating INT NOT NULL, prining_capacity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_article (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, article_id_id INT NOT NULL, UNIQUE INDEX UNIQ_5A37106C9D86650F (user_id_id), UNIQUE INDEX UNIQ_5A37106C8F3EC46 (article_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_magazine ADD CONSTRAINT FK_6264DB8F9DB62CC5 FOREIGN KEY (arcitele_id_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article_magazine ADD CONSTRAINT FK_6264DB8FBD93691C FOREIGN KEY (magazine_id_id) REFERENCES magazine (id)');
        $this->addSql('ALTER TABLE user_article ADD CONSTRAINT FK_5A37106C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_article ADD CONSTRAINT FK_5A37106C8F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_magazine DROP FOREIGN KEY FK_6264DB8FBD93691C');
        $this->addSql('DROP TABLE article_magazine');
        $this->addSql('DROP TABLE magazine');
        $this->addSql('DROP TABLE user_article');
    }
}
