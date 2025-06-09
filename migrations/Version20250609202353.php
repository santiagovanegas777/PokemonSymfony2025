<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250609202353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE debilidad (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE pokemon_debilidad (pokemon_id INT NOT NULL, debilidad_id INT NOT NULL, INDEX IDX_1EBD3D3F2FE71C3E (pokemon_id), INDEX IDX_1EBD3D3FD7C99BD5 (debilidad_id), PRIMARY KEY(pokemon_id, debilidad_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon_debilidad ADD CONSTRAINT FK_1EBD3D3F2FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon_debilidad ADD CONSTRAINT FK_1EBD3D3FD7C99BD5 FOREIGN KEY (debilidad_id) REFERENCES debilidad (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon_debilidad DROP FOREIGN KEY FK_1EBD3D3F2FE71C3E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon_debilidad DROP FOREIGN KEY FK_1EBD3D3FD7C99BD5
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE debilidad
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE pokemon_debilidad
        SQL);
    }
}
