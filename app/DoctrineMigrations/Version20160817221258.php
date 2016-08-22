<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160817221258 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE nomenclature ADD CONSTRAINT fk_nomenclature_dep_idx FOREIGN KEY (departid) REFERENCES department (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX namenomenclature ON nomenclature (nomenclname)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE nomenclature ADD CONSTRAINT fk_nomenclature_dep_idx FOREIGN KEY (departid) REFERENCES department (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX namenomenclature ON nomenclature');
    }
}
