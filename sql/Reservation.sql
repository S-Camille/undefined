-- Suppression de la table RESERVATION si elle existe
-- et creation

DROP TABLE IF EXISTS RESERVATION;
CREATE TABLE RESERVATION (
  id_res int(11) AUTO_INCREMENT NOT NULL,
  debut DATE,
  fin DATE,
  id_utili int(11),
  etat BOOLEAN,
  creation DATE,
  modification DATE,
  PRIMARY KEY (id_res)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

ALTER TABLE RESERVATION ADD CONSTRAINT `reserv_idUtil_1` FOREIGN KEY (`id_utili`) REFERENCES `user` (`id`);