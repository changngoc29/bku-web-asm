create database web_assignment;

use web_assignment;

create table user (
	id int auto_increment,
    fullname varchar(30),
    gender varchar (6),
    phone varchar(10),
    username varchar(30),
    password varchar(30),
    role varchar(10),
    dep varchar(5),
    primary key (id)
);

insert into user
values (1, 'admin name', 'male', '0914221133', 'admin', '123456', 'admin', '');

insert into user
values (null, 'user name', 'male', '0914221133', 'user', '123456', 'user', 'dev');

select * from user
