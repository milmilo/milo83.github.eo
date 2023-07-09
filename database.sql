create table anggota(
id_anggota int not null auto_increment primary key,
username varchar(30) not null,
nama varchar(50),
alamat varchar(50),
email varchar(30),
no_hp char(13),
password varchar(200)
);