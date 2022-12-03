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

insert into user
values (null, 'user2 name', 'male', '0914221133', 'user2', '123456', 'user2', 'dev');

insert into user
values (null, 'user3 name', 'male', '0914221133', 'user3', '123456', 'user3', 'dev');

create table task(
	id int auto_increment,
    title varchar(50),
    description varchar(100),
    staff_id int,
    start_date date,
    deadline date,
    status varchar(10),
    dep varchar(5),
    primary key (id),
    foreign key (staff_id) references user(id)
);

insert into task
values (1, 'this is a test title', 'this is also a test description', 2, '2022-11-30', '2022-11-5', 'pending', 'dev');

insert into task
values (null, 'this is a test title 2', 'this is also a test description 2', 3, '2022-11-30', '2022-11-5', 'pending', 'dev');

insert into task
values (null, 'this is a test title 3', 'this is also a test description 3', 3, '2022-11-30', '2022-11-5', 'pending', 'dev');




