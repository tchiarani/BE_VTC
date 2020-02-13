<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200212103241 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'oracle', 'Migration can only be executed safely on \'oracle\'.');

        $this->addSql('CREATE SEQUENCE chauffeur_id_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE client_id_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE employe_id_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE paiement_id_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE revision_id_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE transactions_id_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE vehicule_id_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE TABLE chauffeur (id NUMBER(10) NOT NULL, permis_id VARCHAR2(10) NOT NULL, id_emp_id NUMBER(10) NOT NULL, chauffeur_actif NUMBER(1) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5CA777B83594A24E ON chauffeur (permis_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5CA777B85C5185E5 ON chauffeur (id_emp_id)');
        $this->addSql('CREATE TABLE client (id NUMBER(10) NOT NULL, nomClient VARCHAR2(255) NOT NULL, prenomClient VARCHAR2(255) NOT NULL, portable VARCHAR2(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE employe (id NUMBER(10) NOT NULL, nom_role_id VARCHAR2(10) NOT NULL, nom_emp VARCHAR2(10) NOT NULL, prenom_emp VARCHAR2(30) NOT NULL, login_emp VARCHAR2(100) NOT NULL, password_emp VARCHAR2(100) NOT NULL, tel_emp VARCHAR2(20) NOT NULL, temp_travail_emp NUMBER(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F804D3B9238C2964 ON employe (nom_role_id)');
        $this->addSql('CREATE TABLE inclus (permis_id VARCHAR2(10) NOT NULL, permis_inclus_id VARCHAR2(10) NOT NULL, PRIMARY KEY(permis_id, permis_inclus_id))');
        $this->addSql('CREATE INDEX IDX_4B21F1813594A24E ON inclus (permis_id)');
        $this->addSql('CREATE INDEX IDX_4B21F181BBEF1182 ON inclus (permis_inclus_id)');
        $this->addSql('CREATE TABLE paiement (id NUMBER(10) NOT NULL, id_client_id NUMBER(10) NOT NULL, type_cb VARCHAR2(10) NOT NULL, date_cb DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E99DED506 ON paiement (id_client_id)');
        $this->addSql('CREATE TABLE permis (id VARCHAR2(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE revision (id NUMBER(10) NOT NULL, immat_id VARCHAR2(10) NOT NULL, date_rev DATE NOT NULL, avis VARCHAR2(100) NOT NULL, nb_km_rev NUMBER(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6D6315CC2D82204C ON revision (immat_id)');
        $this->addSql('CREATE TABLE roles (id VARCHAR2(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE transactions (id NUMBER(10) NOT NULL, id_client_id NUMBER(10) NOT NULL, immat_id VARCHAR2(10) NOT NULL, id_chauffeur_id NUMBER(10) NOT NULL, nb_kilometres NUMBER(10) NOT NULL, nb_passager NUMBER(10) NOT NULL, adresse_dep VARCHAR2(50) NOT NULL, adresse_arr VARCHAR2(50) NOT NULL, heure_dep DATE NOT NULL, heure_arr DATE NOT NULL, etat_transac NUMBER(1) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EAA81A4C99DED506 ON transactions (id_client_id)');
        $this->addSql('CREATE INDEX IDX_EAA81A4C2D82204C ON transactions (immat_id)');
        $this->addSql('CREATE INDEX IDX_EAA81A4CA601C6CC ON transactions (id_chauffeur_id)');
        $this->addSql('CREATE TABLE vehicule (id VARCHAR2(10) NOT NULL, permis_necessaire_id VARCHAR2(10) NOT NULL, kilometrage NUMBER(10) NOT NULL, etat_vehicule NUMBER(1) NOT NULL, nb_place NUMBER(10) NOT NULL, nb_km_construc NUMBER(10) NOT NULL, km_reserve NUMBER(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_292FFF1DFF4FBAE4 ON vehicule (permis_necessaire_id)');
        $this->addSql('ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B83594A24E FOREIGN KEY (permis_id) REFERENCES permis (id)');
        $this->addSql('ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B85C5185E5 FOREIGN KEY (id_emp_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B9238C2964 FOREIGN KEY (nom_role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE inclus ADD CONSTRAINT FK_4B21F1813594A24E FOREIGN KEY (permis_id) REFERENCES permis (id)');
        $this->addSql('ALTER TABLE inclus ADD CONSTRAINT FK_4B21F181BBEF1182 FOREIGN KEY (permis_inclus_id) REFERENCES permis (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE revision ADD CONSTRAINT FK_6D6315CC2D82204C FOREIGN KEY (immat_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C2D82204C FOREIGN KEY (immat_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4CA601C6CC FOREIGN KEY (id_chauffeur_id) REFERENCES chauffeur (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DFF4FBAE4 FOREIGN KEY (permis_necessaire_id) REFERENCES permis (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'oracle', 'Migration can only be executed safely on \'oracle\'.');

        $this->addSql('ALTER TABLE transactions DROP CONSTRAINT FK_EAA81A4CA601C6CC');
        $this->addSql('ALTER TABLE paiement DROP CONSTRAINT FK_B1DC7A1E99DED506');
        $this->addSql('ALTER TABLE transactions DROP CONSTRAINT FK_EAA81A4C99DED506');
        $this->addSql('ALTER TABLE chauffeur DROP CONSTRAINT FK_5CA777B85C5185E5');
        $this->addSql('ALTER TABLE chauffeur DROP CONSTRAINT FK_5CA777B83594A24E');
        $this->addSql('ALTER TABLE inclus DROP CONSTRAINT FK_4B21F1813594A24E');
        $this->addSql('ALTER TABLE inclus DROP CONSTRAINT FK_4B21F181BBEF1182');
        $this->addSql('ALTER TABLE vehicule DROP CONSTRAINT FK_292FFF1DFF4FBAE4');
        $this->addSql('ALTER TABLE employe DROP CONSTRAINT FK_F804D3B9238C2964');
        $this->addSql('ALTER TABLE revision DROP CONSTRAINT FK_6D6315CC2D82204C');
        $this->addSql('ALTER TABLE transactions DROP CONSTRAINT FK_EAA81A4C2D82204C');
        $this->addSql('DROP SEQUENCE chauffeur_id_seq');
        $this->addSql('DROP SEQUENCE client_id_seq');
        $this->addSql('DROP SEQUENCE employe_id_seq');
        $this->addSql('DROP SEQUENCE paiement_id_seq');
        $this->addSql('DROP SEQUENCE revision_id_seq');
        $this->addSql('DROP SEQUENCE transactions_id_seq');
        $this->addSql('DROP SEQUENCE vehicule_id_seq');
        $this->addSql('DROP TABLE chauffeur');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE inclus');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE permis');
        $this->addSql('DROP TABLE revision');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE transactions');
        $this->addSql('DROP TABLE vehicule');
    }
}
