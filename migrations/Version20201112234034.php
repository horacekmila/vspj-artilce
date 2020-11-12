<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201112234034 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, question_id_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_DADD4A25F675F31B (author_id), INDEX IDX_DADD4A254FAF8F53 (question_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, title VARCHAR(255) NOT NULL, visible_for_author TINYINT(1) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue_article (id INT AUTO_INCREMENT NOT NULL, article_id_id INT NOT NULL, issue_id_id INT NOT NULL, UNIQUE INDEX UNIQ_A7C24B878F3EC46 (article_id_id), UNIQUE INDEX UNIQ_A7C24B87EDCEF704 (issue_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue_comment_issue (id INT AUTO_INCREMENT NOT NULL, issue_comment_id INT NOT NULL, issue_id INT NOT NULL, UNIQUE INDEX UNIQ_6A5D05126E21064F (issue_comment_id), UNIQUE INDEX UNIQ_6A5D05125E7AA58C (issue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue_comments (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, content VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8836BC81F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, author_email VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, descrition LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_B6F7494EF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A254FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE issue_article ADD CONSTRAINT FK_A7C24B878F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE issue_article ADD CONSTRAINT FK_A7C24B87EDCEF704 FOREIGN KEY (issue_id_id) REFERENCES issue (id)');
        $this->addSql('ALTER TABLE issue_comment_issue ADD CONSTRAINT FK_6A5D05126E21064F FOREIGN KEY (issue_comment_id) REFERENCES issue_comments (id)');
        $this->addSql('ALTER TABLE issue_comment_issue ADD CONSTRAINT FK_6A5D05125E7AA58C FOREIGN KEY (issue_id) REFERENCES issue (id)');
        $this->addSql('ALTER TABLE issue_comments ADD CONSTRAINT FK_8836BC81F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE issue_article DROP FOREIGN KEY FK_A7C24B87EDCEF704');
        $this->addSql('ALTER TABLE issue_comment_issue DROP FOREIGN KEY FK_6A5D05125E7AA58C');
        $this->addSql('ALTER TABLE issue_comment_issue DROP FOREIGN KEY FK_6A5D05126E21064F');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A254FAF8F53');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE issue');
        $this->addSql('DROP TABLE issue_article');
        $this->addSql('DROP TABLE issue_comment_issue');
        $this->addSql('DROP TABLE issue_comments');
        $this->addSql('DROP TABLE question');
    }
}
