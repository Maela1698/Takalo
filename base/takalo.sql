drop database takalo;
create database takalo;
use takalo;

create table user(
    id int primary key auto_increment,
    name varchar(30),
    firstname varchar(30),
    mail varchar(30),
    mdp varchar(30),
    isAdmin boolean
)
Engine=InnoDB;

create table imagecategory(
    id int primary key auto_increment,
    path varchar(50)
)Engine=InnoDB;

create table category(
    id int primary key auto_increment,
    name varchar(30),
    idimage int,
    foreign key (idimage) references imagecategory(id)
)Engine=InnoDB;

create table object(
    id int primary key auto_increment,
    idCategory int,
    idUser int,
    name varchar(30),
    price float,
    description text,
    foreign key (idCategory) references category(id),
    foreign key (idUser) references user(id)
)Engine=InnoDB;

create table imageobject(
    idObject int,
    path varchar(50),
    foreign key (idObject) references object(id) 
)Engine=InnoDB;

create table ask(
    id int primary key auto_increment,
    idObject1 int,
    idObject2 int,
    confirm int,
    foreign key (idObject1) references object(id),
    foreign key (idObject2) references object(id)
)Engine=InnoDB;

insert into user values (null,'RABE','Kely','rabe@gmail.com','kely',false);
insert into user values (null,'RAKOTO','Be','rakoto@gmail.com','be',true);
insert into user values (null,'RASOA','Ketaka','rasoa@gmail.com','ketaka',false);

insert into imagecategory values(null,'category/clothes.png');
insert into imagecategory values(null,'category/shoes.png');
insert into imagecategory values(null,'category/media.png');
insert into imagecategory values(null,'category/book.png');

insert into category values (null,'Clothes',1);
insert into category values (null,'Shoes',2);
insert into category values (null,'Media',3);
insert into category values (null,'Book',4);

insert into object values (null,1,1,"Jean",25000,"Jean delave");
insert into object values (null,2,3,"Nike",150000,"Air Nike 2000");
insert into object values (null,3,1,"Appareil Photo",120000,"Nikon");
insert into object values (null,4,3,"Roman",30000,"Romeo et Juliette");

insert into imageobject values (1,'object/objet1.png');
insert into imageobject values (2,'object/objet2.png');
insert into imageobject values (3,'object/objet3.png');
insert into imageobject values (4,'object/objet4.png');
insert into imageobject values (1,'object/objet11.png');
insert into imageobject values (1,'object/objet12.png');

insert into ask values (null,1,4,0);
insert into ask values (null,2,3,0);


create  view proposition as  
select ob.idUser as idUser,
    ob.id as idObject,
     ob.name as object, 
     user.name as proprietaire, 
     ob.price as price,
     user.mail as mail,
     ob.description as description,
     ob.name as nameobject,
     c.name as category
from object as ob
    join category as c on c.id = ob.idCategory
    join user on ob.idUser = user.id
group by   object,proprietaire,mail,description,nameobject,category,idObject,idUser;

CREATE view detailsObject as
select ob.idUser as idUser,
    ob.id as idObject,
     user.name as proprietaire, 
     ob.price as price,
     user.mail as mail,
     ob.description as description,
     ob.name as nameobject,
     c.name as category,
     c.id as idCategory,
     i.path as pathimage
 from object as ob
    join category as c on c.id = ob.idCategory
    join user on ob.idUser = user.id
    join imageobject as i on i.idObject = ob.id
group by proprietaire,mail,description,nameobject,category,idObject,idUser,idCategory;


create  view askConfirm as  
select 
     ob1.name as object1, 
     user1.name as name1, 
     ob2.name as object2,
     user2.name as name2,
     user1.id as id1,
     user2.id as id2
from ask 
    join object as ob1 on ask.idObject1 = ob1.id
    join object as ob2 on ask.idObject2 = ob2.id
    join user as user1 on ob1.idUser = user1.id
    join user as user2 on ob2.idUser = user2.id
where ask.confirm=0
group by   object1,name1,object2,name2;


select*from user where mail like 'rabe@gmail.com' and mdp like 'kely'; 
select*from object where idUser like '3';
select*from object where idUser not like '3';
select*from object where price<=25000+25000*(50/100) and  price>=25000-25000*(50/100)  and idUser not like '1';
select*from ask where confirm = 0;

SELECT 