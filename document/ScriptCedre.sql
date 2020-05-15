#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: serveur_BDD
#------------------------------------------------------------

CREATE TABLE serveur_BDD(
        serv_id         Int  Auto_increment  NOT NULL ,
        serv_commentaire Text (65000) NOT NULL ,
        serv_nomDNS      Varchar (50) NOT NULL 
	,CONSTRAINT serveur_BDD_PK PRIMARY KEY (serv_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: application
#------------------------------------------------------------

CREATE TABLE application(
        app_id         Int  Auto_increment  NOT NULL ,
        app_sigle       Varchar (50) NOT NULL ,
        app_description Text (65000) NOT NULL 
	,CONSTRAINT application_PK PRIMARY KEY (app_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: requete
#------------------------------------------------------------

CREATE TABLE requete(
        req_id              Int  Auto_increment  NOT NULL ,
        req_titre            Varchar (50) NOT NULL ,
        req_description      Text (65000) DEFAULT NULL ,
        req_commande         Text (65000) NOT NULL ,
        req_param1           Varchar (50) DEFAULT NULL ,
        req_param2           Varchar (50) DEFAULT NULL ,
        req_param3           Varchar (50) DEFAULT NULL ,
        req_param4           Varchar (50) DEFAULT NULL ,
        req_param5           Varchar (50) DEFAULT NULL ,
        req_nombreExec       Int NOT NULL ,
        req_dateDerniereExec Date DEFAULT NULL ,
        req_dateDerniereMaj  Date DEFAULT NULL ,
        app_id              Int NOT NULL
	,CONSTRAINT requete_PK PRIMARY KEY (req_id)

	,CONSTRAINT requete_application_FK FOREIGN KEY (app_id) REFERENCES application(app_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type_BDD
#------------------------------------------------------------

CREATE TABLE type_BDD(
        tbdd_id           Int  Auto_increment  NOT NULL ,
        tbdd_libelle       Varchar (50) NOT NULL ,
        tbdd_modeleRequete Varchar (50) NOT NULL
	,CONSTRAINT type_BDD_PK PRIMARY KEY (tbdd_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: structure
#------------------------------------------------------------

CREATE TABLE structure(
        stru_id     Int  Auto_increment  NOT NULL ,
        stru_libelle Varchar (50) NOT NULL
	,CONSTRAINT structure_PK PRIMARY KEY (stru_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        uti_id           Int  Auto_increment  NOT NULL ,
        uti_login         Varchar (50) NOT NULL ,
        uti_estAdmin      BOOLEAN DEFAULT 0 ,
        uti_estSuperAdmin BOOLEAN DEFAULT 0 ,
        stru_id          Int NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (uti_id)

	,CONSTRAINT utilisateur_structure_FK FOREIGN KEY (stru_id) REFERENCES structure(stru_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: base
#------------------------------------------------------------

CREATE TABLE base(
        base_id     Int  Auto_increment  NOT NULL ,
        base_libelle Varchar (50) NOT NULL ,
        base_userBDD  Varchar (50) NOT NULL ,
        base_nomBDD   Varchar (50) NOT NULL ,
        base_port        Varchar (50) NOT NULL ,
        base_mdp        Varchar (50) NOT NULL ,
        app_id      Int NOT NULL ,
        tbdd_id     Int NOT NULL ,
        serv_id     Int NOT NULL
	,CONSTRAINT base_PK PRIMARY KEY (base_id)

	,CONSTRAINT base_application_FK FOREIGN KEY (app_id) REFERENCES application(app_id)
	,CONSTRAINT base_type_BDD0_FK FOREIGN KEY (tbdd_id) REFERENCES type_BDD(tbdd_id),
        CONSTRAINT base_serveur_BDD_FK FOREIGN KEY (serv_id) REFERENCES serveur_BDD(serv_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: droit
#------------------------------------------------------------

CREATE TABLE droit(
        base_id           Int NOT NULL ,
        stru_id           Int NOT NULL ,
        tperm_execution    BOOLEAN DEFAULT 0 ,
        tperm_modification BOOLEAN DEFAULT 0
	,CONSTRAINT droit_PK PRIMARY KEY (base_id,stru_id)

	,CONSTRAINT droit_base_FK FOREIGN KEY (base_id) REFERENCES base(base_id)
	,CONSTRAINT droit_structure0_FK FOREIGN KEY (stru_id) REFERENCES structure(stru_id)
)ENGINE=InnoDB;

