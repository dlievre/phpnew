USE `db_dlievre`;
CREATE TABLE ft_table (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  login varchar(8) COLLATE latin1_general_ci NOT NULL DEFAULT "toto",
  groupe enum("staff","student","other") COLLATE latin1_general_ci NOT NULL,
  date_de_creation date NOT NULL
);