create database offthestove;
use offthestove;
create table recipe (
id int auto_increment primary key,
name varchar(100),
cuisine varchar(50),
prep float,
cook float,
ready float,
ingredient varchar (1000),
direction varchar(1000),
category1 varchar(50),
category2 varchar(50),
photo varchar(500),
price int,
calories int);

create table package (
id int auto_increment primary key,
name varchar(100),
photo varchar(500),
description varchar(500),
discount int);


create table package_detail(
id int auto_increment primary key,
package_id int,
recipe_id int,
CONSTRAINT FK_package_detail1 FOREIGN KEY (package_id) REFERENCES package(id),
CONSTRAINT FK_package_detail2 FOREIGN KEY (recipe_id) REFERENCES recipe(id)
);


create table customer(
id int auto_increment primary key,
name varchar(255),
email varchar(50),
password varchar(50),
address varchar(1000),
phone int
);

create table cart(
id int auto_increment primary key,
customer_id int,
CONSTRAINT FK_cart1 FOREIGN KEY (customer_id) REFERENCES customer(id)
);

create table cart_detail(
id int auto_increment primary key,
cart_id int,
category varchar(100),
o_id int,
order_id int,
serving int,
active int,
CONSTRAINT FK_cart_detail1 FOREIGN KEY (cart_id) REFERENCES cart(id)
);

create table order_detail (
id int auto_increment primary key,
oid int,
customer_id int,
delivery_charge int,
delivered int,
CONSTRAINT FK_order1 FOREIGN KEY (customer_id) REFERENCES customer(id)
);

create table cuisine(
id int auto_increment primary key,
name varchar(100));