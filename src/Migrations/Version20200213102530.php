<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200213102530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'oracle', 'Migration can only be executed safely on \'oracle\'.');

        $this->addSql('CREATE SEQUENCE chauffeur_IDCHAUFFEUR_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE client_IDCLIENT_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE employe_IDEMP_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE revision_IDREV_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE transactions_IDTRANSACTION_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE vehicule_IMMAT_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE TABLE chauffeur (permis_id VARCHAR2(10) NOT NULL, employe_id NUMBER(10) NOT NULL, IDCHAUFFEUR NUMBER(10) NOT NULL, CHAUFFEURACTIF NUMBER(1) NOT NULL, PRIMARY KEY(IDCHAUFFEUR))');
        $this->addSql('CREATE INDEX IDX_5CA777B83594A24E ON chauffeur (permis_id)');
        $this->addSql('CREATE INDEX IDX_5CA777B81B65292 ON chauffeur (employe_id)');
        $this->addSql('CREATE TABLE client (IDCLIENT NUMBER(10) NOT NULL, NOMCLIENT VARCHAR2(255) NOT NULL, PRENOMCLIENT VARCHAR2(255) NOT NULL, PORTABLE VARCHAR2(255) NOT NULL, PRIMARY KEY(IDCLIENT))');
        $this->addSql('CREATE TABLE employe (IDEMP NUMBER(10) NOT NULL, NOMEMP VARCHAR2(30) NOT NULL, PRENOMEMP VARCHAR2(30) NOT NULL, LOGINEMP VARCHAR2(100) NOT NULL, PASSWORDEMP VARCHAR2(100) NOT NULL, TELEMP VARCHAR2(20) NOT NULL, TEMPTRAVAILEMP NUMBER(10) NOT NULL, ROLES VARCHAR2(255) NOT NULL, PRIMARY KEY(IDEMP))');
        $this->addSql('CREATE TABLE inclus (permis_id VARCHAR2(10) NOT NULL, permis_inclus_id VARCHAR2(10) NOT NULL, PRIMARY KEY(permis_id, permis_inclus_id))');
        $this->addSql('CREATE INDEX IDX_4B21F1813594A24E ON inclus (permis_id)');
        $this->addSql('CREATE INDEX IDX_4B21F181BBEF1182 ON inclus (permis_inclus_id)');
        $this->addSql('CREATE TABLE paiement (id_client_id NUMBER(10) NOT NULL, IDCB NUMBER(10) NOT NULL, TYPECB VARCHAR2(10) NOT NULL, DATECB DATE NOT NULL, PRIMARY KEY(IDCB))');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E99DED506 ON paiement (id_client_id)');
        $this->addSql('CREATE TABLE permis (PERMIS VARCHAR2(10) NOT NULL, PRIMARY KEY(PERMIS))');
        $this->addSql('CREATE TABLE revision (immat_id VARCHAR2(10) NOT NULL, IDREV NUMBER(10) NOT NULL, DATEREV DATE NOT NULL, AVIS VARCHAR2(100) NOT NULL, NBKMREV NUMBER(10) NOT NULL, PRIMARY KEY(IDREV))');
        $this->addSql('CREATE INDEX IDX_6D6315CC2D82204C ON revision (immat_id)');
        $this->addSql('CREATE TABLE transactions (id_client_id NUMBER(10) NOT NULL, immat_id VARCHAR2(10) NOT NULL, id_chauffeur_id NUMBER(10) NOT NULL, IDTRANSACTION NUMBER(10) NOT NULL, NBKILOMETRES NUMBER(10) NOT NULL, NBPASSAGER NUMBER(10) NOT NULL, ADRESSEDEP VARCHAR2(50) NOT NULL, ADRESSEARR VARCHAR2(50) NOT NULL, HEUREDEP DATE NOT NULL, HEUREARR DATE NOT NULL, ETATTRANSAC NUMBER(1) NOT NULL, PRIX DOUBLE PRECISION NOT NULL, PRIMARY KEY(IDTRANSACTION))');
        $this->addSql('CREATE INDEX IDX_EAA81A4C99DED506 ON transactions (id_client_id)');
        $this->addSql('CREATE INDEX IDX_EAA81A4C2D82204C ON transactions (immat_id)');
        $this->addSql('CREATE INDEX IDX_EAA81A4CA601C6CC ON transactions (id_chauffeur_id)');
        $this->addSql('CREATE TABLE vehicule (permis_necessaire_id VARCHAR2(10) NOT NULL, IMMAT VARCHAR2(10) NOT NULL, KILOMETRAGE NUMBER(10) NOT NULL, ETATVEHICULE NUMBER(1) NOT NULL, NBPLACE NUMBER(10) NOT NULL, NBKMCONSTRUCT NUMBER(10) NOT NULL, KMRESERVE NUMBER(10) NOT NULL, PRIMARY KEY(IMMAT))');
        $this->addSql('CREATE INDEX IDX_292FFF1DFF4FBAE4 ON vehicule (permis_necessaire_id)');
        $this->addSql('ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B83594A24E FOREIGN KEY (permis_id) REFERENCES permis (PERMIS)');
        $this->addSql('ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B81B65292 FOREIGN KEY (employe_id) REFERENCES employe (IDEMP)');
        $this->addSql('ALTER TABLE inclus ADD CONSTRAINT FK_4B21F1813594A24E FOREIGN KEY (permis_id) REFERENCES permis (PERMIS)');
        $this->addSql('ALTER TABLE inclus ADD CONSTRAINT FK_4B21F181BBEF1182 FOREIGN KEY (permis_inclus_id) REFERENCES permis (PERMIS)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E99DED506 FOREIGN KEY (id_client_id) REFERENCES client (IDCLIENT)');
        $this->addSql('ALTER TABLE revision ADD CONSTRAINT FK_6D6315CC2D82204C FOREIGN KEY (immat_id) REFERENCES vehicule (IMMAT)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C99DED506 FOREIGN KEY (id_client_id) REFERENCES client (IDCLIENT)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C2D82204C FOREIGN KEY (immat_id) REFERENCES vehicule (IMMAT)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4CA601C6CC FOREIGN KEY (id_chauffeur_id) REFERENCES chauffeur (IDCHAUFFEUR)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DFF4FBAE4 FOREIGN KEY (permis_necessaire_id) REFERENCES permis (PERMIS)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'oracle', 'Migration can only be executed safely on \'oracle\'.');

        $this->addSql('ALTER TABLE transactions DROP CONSTRAINT FK_EAA81A4CA601C6CC');
        $this->addSql('ALTER TABLE paiement DROP CONSTRAINT FK_B1DC7A1E99DED506');
        $this->addSql('ALTER TABLE transactions DROP CONSTRAINT FK_EAA81A4C99DED506');
        $this->addSql('ALTER TABLE chauffeur DROP CONSTRAINT FK_5CA777B81B65292');
        $this->addSql('ALTER TABLE chauffeur DROP CONSTRAINT FK_5CA777B83594A24E');
        $this->addSql('ALTER TABLE inclus DROP CONSTRAINT FK_4B21F1813594A24E');
        $this->addSql('ALTER TABLE inclus DROP CONSTRAINT FK_4B21F181BBEF1182');
        $this->addSql('ALTER TABLE vehicule DROP CONSTRAINT FK_292FFF1DFF4FBAE4');
        $this->addSql('ALTER TABLE revision DROP CONSTRAINT FK_6D6315CC2D82204C');
        $this->addSql('ALTER TABLE transactions DROP CONSTRAINT FK_EAA81A4C2D82204C');
        $this->addSql('DROP SEQUENCE chauffeur_IDCHAUFFEUR_seq');
        $this->addSql('DROP SEQUENCE client_IDCLIENT_seq');
        $this->addSql('DROP SEQUENCE employe_IDEMP_seq');
        $this->addSql('DROP SEQUENCE revision_IDREV_seq');
        $this->addSql('DROP SEQUENCE transactions_IDTRANSACTION_seq');
        $this->addSql('DROP SEQUENCE vehicule_IMMAT_seq');
        $this->addSql('DROP TABLE chauffeur');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE inclus');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE permis');
        $this->addSql('DROP TABLE revision');
        $this->addSql('DROP TABLE transactions');
        $this->addSql('DROP TABLE vehicule');
    }
}
