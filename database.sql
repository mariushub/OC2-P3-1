CREATE DATABASE IF NOT EXISTS carnet_adresses
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE carnet_adresses;

CREATE TABLE contact (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO contact (name, email, phone) VALUES
    ('Gandalf le gris', 'gandalf@istari.com', '01013021'),
    ('Buffy Summer', 'buffy@sunnydale.com', '01091901'),
    ('Hermione Granger', 'hermione@magie.com', '19091979');
