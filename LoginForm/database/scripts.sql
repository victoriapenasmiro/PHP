/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  victoriapenas
 * Created: 19 nov. 2021
 */

CREATE DATABASE php_login_system;

CREATE TABLE login (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(32) NOT NULL,
  pw varchar(32) NOT NULL
);

INSERT INTO login (id, username, pw) VALUES
(1, 'vicky', 'vicky123');
