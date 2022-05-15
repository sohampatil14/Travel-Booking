create database travel_booking;

create table signup (
    serial_no int,
    name varchar(50),
    email varchar(50),
    username varchar(50),
    password varchar(50),
    phone numeric,
    address varchar(255),
    time_date timestamp
);

create table location_details (
    serial_no int primary key,
    location_name varchar(50),
    location_img_link varchar(50),
    days_ int,
    nights_ int,
    hotel_name varchar(25),
    hotel_img_link varchar(50),
    time_date timestamp
);

create table mode_of_transport_available (
    serial_no int,
    location_name varchar(50),
    location_serial_no int references add_new(serial_no),
    mode_of_transport varchar(15),
    price bigint,
    time_date timestamp    
);


create table booking_details (
    booking_serial_no int primary key,
    from_ date,
    to_ date,
    no_adults int,
    no_children int,
    destination varchar(25),
    mode_of_transport varchar(15),
    time_date timestamp
);

create table services_choosen (
    serial_no int references booking_details(booking_serial_no),
    username varchar(50),
    booking_serial_no int,
    services_choosen varchar(25),
    time_date timestamp
);

