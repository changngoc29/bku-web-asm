create database web_assignment;

use web_assignment;

create table user (
	id int auto_increment,
    fullname varchar(30),
    gender varchar (6),
    phone varchar(10),
    username varchar(30) unique,
    password varchar(30),
    role varchar(10),
    dep varchar(5),
    primary key (id)
);

insert into user
values (1, 'Steven Gilbert', 'male', '0914221133', 'director', '123456', 'director', '');

insert into user
values (null, 'Adan Mcgee', 'male', '0914221133', 'manager1', '123456', 'manager', 'dev');

insert into user
values (null, 'Nelson Mcguire', 'male', '0914221133', 'user0', '123456', 'employee', 'dev');

insert into user
values (null, 'Gwendolyn Clarke', 'male', '0914221133', 'user1', '123456', 'employee', 'dev');

insert into user
values (null, 'Tucker Beard', 'male', '0914221133', 'user2', '123456', 'employee', 'dev');

insert into user
values (null, 'Garrett Mcconnell', 'male', '0914221133', 'manager2', '123456', 'manager', 'hr');

insert into user
values (null, 'Janae Davis', 'male', '0914221133', 'user4', '123456', 'employee', 'hr');

insert into user
values (null, 'Gina Dunlap', 'male', '0914221133', 'user5', '123456', 'employee', 'hr');

insert into user
values (null, 'Tamara Weeks', 'male', '0914221133', 'user6', '123456', 'employee', 'hr');

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
values (1, 'Web Ecommerce Mockup', 'This is the test for description, the more information will show here ...', 3, '2022-11-30', '2022-11-5', 'pending', 'dev');

insert into task
values (null, 'CMS Report November', 'This is the test for description 2, the more information will show here ...', 4, '2022-11-30', '2022-11-5', 'pending', 'dev');

insert into task
values (null, 'Weather App', 'This is the test for description 3, the more information will show here ...', 5, '2022-11-30', '2022-11-5', 'pending', 'dev');

insert into task
values (null, 'Finanace Report November', 'This is the test for description 4, the more information will show here ...', 7, curdate(), '2022-12-9', 'pending', 'hr');

create table files(
	id int auto_increment,
    name varchar(100),
    task_id int,
    primary key (id),
    foreign key (task_id) references task(id) on delete cascade
);

create table submit_task (
	id int auto_increment,
    description varchar(100),
    task_id int,
    primary key (id),
    foreign key (task_id) references task(id) on delete cascade
);

create table submit_file(
	id int auto_increment,
    name varchar(100),
    task_id int,
    primary key (id),
    foreign key (task_id) references task(id) on delete cascade
);
select * from user;
select * from task;
select * from submit_task;
delete from submit_task where id=2;
select * from submit_file;
select * from files;
	
