/**
 * Author:  victoriapenas
 * Created: 23 nov. 2021
 */

CREATE DATABASE agenda;

CREATE TABLE contactos (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(50) NOT NULL,
  phone varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;