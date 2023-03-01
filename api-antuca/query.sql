-- Translate query a mysql query

-- Create table product id, name, price, category, description, image, created_at, updated_at
CREATE TABLE product (
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
price FLOAT NOT NULL,
category VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
image VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
-- Create table user id, name, email, password, created_at, updated_at
CREATE TABLE user (
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
-- Create table order id, user_id, status, created_at, updated_at
CREATE TABLE orders (
id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
status VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
-- Create table order_detail id, order_id, product_id, quantity, created_at, updated_at
CREATE TABLE order_detail (
id INT NOT NULL AUTO_INCREMENT,
order_id INT NOT NULL,
product_id INT NOT NULL,
quantity INT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
-- Create table role id, name, created_at, updated_at
CREATE TABLE role (
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
-- Create table user_role id, user_id, role_id, created_at, updated_at
CREATE TABLE user_role (
id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
role_id INT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
-- Create table cart id, user_id, product_id, created_at, updated_at
CREATE TABLE cart (
id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
product_id INT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);

INSERT INTO product(name,price,category,description,image) 
    VALUES('Cachanga con jamon y queso',3.50,'c','Chachanga rellena con jamon y queso','')