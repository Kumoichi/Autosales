CREATE DATABASE IF NOT EXISTS autosales;
USE autosales;
create table listtype(
    id int auto_increment not null,
    recordtype varchar(3),
    listname varchar(50),
    attempt int default 0,
    primary key (id)
);

create table listinfo(
    id int auto_increment not null,
    listtypeid int not null,
    legal_number varchar(13),
    company_name varchar(50),
    prefecture_name varchar(10),
    city_name varchar(50),
    postal_code varchar(7),
    address_1 varchar(100),
    tel varchar(15),
    fax  varchar(15),
    employee int,
    capital int,
    joujou varchar(10),
    sales int,
    leader_name varchar(30),
    url varchar(50),
    large_category_name varchar(50),
    middle_category_name varchar(50),
    small_category_name varchar(50),
    tiny_category_name varchar(50),
    primary key (id)
);

create table listerror(
    id int auto_increment not null,
    listtypeid int,
    error int,
    primary key (id)
);

create table mailtype(
    id int auto_increment not null,
    targetid int,
    contentid int,
    templateid int,
    recordtype varchar(3),
    dt date,
    sendtime time(0),
    primary key (id)
);

create table mailreaction(
    id int auto_increment not null,
    mailtypeid int not null,
    email varchar(100),
    subject varchar(100),
    reaction int,
    company varchar(100),
    attempt int default 0,
    primary key (id)
);

create table reactionerror(
    id int auto_increment not null,
    reactionid int,
    error int,
    errortime datetime(0),
    primary key (id)
);