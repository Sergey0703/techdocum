<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160818182810 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE transfer ADD CONSTRAINT fk_transfer_nomencl_tr FOREIGN KEY (nomenclid) REFERENCES nomenclature (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transfer ADD CONSTRAINT fk_transfer_depart_tr FOREIGN KEY (departid) REFERENCES department (id) ON UPDATE CASCADE ON DELETE CASCADE');


    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX fk_transfer_depart_tr ON transfer');
        $this->addSql('DROP INDEX fk_transfer_nomencl_tr ON transfer');
    }
}
