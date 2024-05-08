drop table poblacion;
drop table usuarios;
drop table conectar;
drop table provincias;
drop table disponibilidad;

create table PROVINCIAS(
	codProvincia int(2) not null,
	provincia varchar(22) primary key
);
create table POBLACION(
	codPostal int(5) primary key,
	pueblo varchar(20) not null,
	provincia varchar(22) references PROVINCIAS(provincia)
);
create table USUARIOS(
	idusuario int(5) unique,
	dni varchar(9) primary key,
	usuario varchar(15) unique,
	password varchar(15) not null,
	email varchar(30) not null,
	nombre varchar(20) not null,
	apellidos varchar(30) not null,
	nacimiento date,
	direccion varchar(40),
	telefono int(9) not null,
	precio varchar(10),
	experiencia varchar(15),
	edad varchar(7),
	descripcion varchar(255),
	codPostal int(5) references POBLACION(codPostal),
	provincia varchar(20),
	pueblo varchar(20) references POBLACION(pueblo),
	foto varchar(150) unique,
	tipoUsuario varchar(10) not null,
	superUsu boolean not null,
	activo boolean not null
);
create table DISPONIBILIDAD(
	id_disp int(5) primary key,
	dni_usuario varchar(9) references USUARIOS(dni),
	lunes_viernes boolean not null,
	vie_sab_dom boolean not null,
	toda_semana boolean not null,
	manianas boolean not null,
	tardes boolean not null,
	noches boolean not null
);
create table CONECTAR(
	idTrabajo int(5) primary key,
	dni1 varchar(10) references USUARIOS(dni),
	dni2 varchar(10) references USUARIOS(dni),
	dia date,
	hora time,
	tiempoTotal time
);



insert into PROVINCIAS(codProvincia, provincia)
values('02','Albacete' );
insert into PROVINCIAS(codProvincia, provincia)
values('03','Alicante/Alacant' );
insert into PROVINCIAS(codProvincia, provincia)
values('04','Almería' );
insert into PROVINCIAS(codProvincia, provincia)
values('01','Araba/Álava' );
insert into PROVINCIAS(codProvincia, provincia)
values('33','Asturias' );
insert into PROVINCIAS(codProvincia, provincia)
values('05','Ávila' );
insert into PROVINCIAS(codProvincia, provincia)
values('06','Badajoz' );
insert into PROVINCIAS(codProvincia, provincia)
values('07','Balears, Illes' );
insert into PROVINCIAS(codProvincia, provincia)
values('08','Barcelona' );
insert into PROVINCIAS(codProvincia, provincia)
values('48','Bizkaia' );
insert into PROVINCIAS(codProvincia, provincia)
values('09','Burgos' );
insert into PROVINCIAS(codProvincia, provincia)
values('10','Cáceres' );
insert into PROVINCIAS(codProvincia, provincia)
values('11','Cádiz' );
insert into PROVINCIAS(codProvincia, provincia)
values('39','Cantabria' );
insert into PROVINCIAS(codProvincia, provincia)
values('12','Castellón/Castelló' );
insert into PROVINCIAS(codProvincia, provincia)
values('13','Ciudad Real' );
insert into PROVINCIAS(codProvincia, provincia)
values('14','Córdoba' );
insert into PROVINCIAS(codProvincia, provincia)
values('15 ','	Coruña, A' );
insert into PROVINCIAS(codProvincia, provincia)
values('16','Cuenca' );
insert into PROVINCIAS(codProvincia, provincia)
values('20','Gipuzkoa' );
insert into PROVINCIAS(codProvincia, provincia)
values('17','Girona' );
insert into PROVINCIAS(codProvincia, provincia)
values('18','Granada' );
insert into PROVINCIAS(codProvincia, provincia)
values('19','Guadalajara' );
insert into PROVINCIAS(codProvincia, provincia)
values('21','Huelva' );
insert into PROVINCIAS(codProvincia, provincia)
values('22','Huesca' );
insert into PROVINCIAS(codProvincia, provincia)
values('23','Jaén' );
insert into PROVINCIAS(codProvincia, provincia)
values('24','León' );
insert into PROVINCIAS(codProvincia, provincia)
values('25','Lleida' );
insert into PROVINCIAS(codProvincia, provincia)
values('27','Lugo' );
insert into PROVINCIAS(codProvincia, provincia)
values('28','Madrid' );
insert into PROVINCIAS(codProvincia, provincia)
values('29','Málaga' );
insert into PROVINCIAS(codProvincia, provincia)
values('30','Murcia' );
insert into PROVINCIAS(codProvincia, provincia)
values('31','Navarra' );
insert into PROVINCIAS(codProvincia, provincia)
values('32','Ourense' );
insert into PROVINCIAS(codProvincia, provincia)
values('34','Palencia' );
insert into PROVINCIAS(codProvincia, provincia)
values('35','Palmas, Las' );
insert into PROVINCIAS(codProvincia, provincia)
values('36','Pontevedra' );
insert into PROVINCIAS(codProvincia, provincia)
values('26','Rioja, La' );
insert into PROVINCIAS(codProvincia, provincia)
values('37','Salamanca' );
insert into PROVINCIAS(codProvincia, provincia)
values('38','Santa Cruz de Tenerife' );
insert into PROVINCIAS(codProvincia, provincia)
values('40','Segovia' );
insert into PROVINCIAS(codProvincia, provincia)
values('41','Sevilla' );
insert into PROVINCIAS(codProvincia, provincia)
values('42','Soria' );
insert into PROVINCIAS(codProvincia, provincia)
values('43','Tarragona' );
insert into PROVINCIAS(codProvincia, provincia)
values('44','Teruel' );
insert into PROVINCIAS(codProvincia, provincia)
values('45','Toledo' );
insert into PROVINCIAS(codProvincia, provincia)
values('46','Valencia' );
insert into PROVINCIAS(codProvincia, provincia)
values('47','Valladolid' );
insert into PROVINCIAS(codProvincia, provincia)
values('49','Zamora' );
insert into PROVINCIAS(codProvincia, provincia)
values('50','Zaragoza' );
insert into PROVINCIAS(codProvincia, provincia)
values('51','Ceuta' );
insert into PROVINCIAS(codProvincia, provincia)
values('52','Melilla' );



insert into POBLACION(codPostal, pueblo, provincia)
values('46680', 'Algemesi', 'Valencia');
insert into POBLACION(codPostal, pueblo, provincia)
values('46600', 'Alzira', 'Valencia');
insert into POBLACION(codPostal, pueblo, provincia)
values('46610', 'Guadasuar', 'Valencia');



insert into USUARIOS(idusuario, dni, usuario, foto, precio, experiencia, edad, descripcion, codPostal, provincia, pueblo, password, email, nombre, apellidos, nacimiento, direccion, telefono, tipoUsuario, superUsu, activo)
values('1', '73099854N', 'oleg', 'oleg.jpg', '10-15 €/hr', 'ninguna', '22 años', 'Soy una persona joven que desea trabajar y cuidar de la gente que se necesita', '46680', 'Valencia', 'Algemesi', 'olegario', 'oleg.tortajada@gmail.com', 'Oleg', 'Tortajada Amorós','1990-01-03','c/ dels Figueres 30-3-9', '669241551', 'cuidadores', true, true);
insert into USUARIOS(idusuario, dni, usuario, foto, precio, experiencia, edad, descripcion, codPostal, provincia, pueblo, password, email, nombre, apellidos, nacimiento, direccion, telefono, tipoUsuario, superUsu, activo)
values('2', '11111111N', 'melen', 'melen.jpg', '10-15 €/hr', 'ninguna', '22 años', 'Soy una persona joven que desea trabajar y cuidar de la gente que se necesita', '46680', 'Valencia', 'Algemesi', 'melen', 'oleg.tortajada@gmail.com', 'Melen', 'Olaso','1990-01-03','c/ dels Figueres 30-3-9', '669241551', 'cuidadores', true, true);
insert into USUARIOS(idusuario, dni, usuario, foto, precio, experiencia, edad, descripcion, codPostal, provincia, pueblo, password, email, nombre, apellidos, nacimiento, direccion, telefono, tipoUsuario, superUsu, activo)
values('3', '22222222N', 'rafa', 'rafa.jpg', '10-15 €/hr', 'ninguna', '22 años', 'Soy una persona joven que desea trabajar y cuidar de la gente que se necesita', '46680', 'Valencia', 'Algemesi', 'rafa', 'oleg.tortajada@gmail.com', 'Rafa', 'Gomez','1990-01-03','c/ dels Figueres 30-3-9', '669241551', 'cuidadores', true, true);
insert into USUARIOS(idusuario, dni, usuario, foto, precio, experiencia, edad, descripcion, codPostal, provincia, pueblo, password, email, nombre, apellidos, nacimiento, direccion, telefono, tipoUsuario, superUsu, activo)
values('4', '73099854O', 'oleg2', 'oleg2.jpg', '10-15 €/hr', 'ninguna', '22 años', 'Soy una persona joven que desea trabajar y cuidar de la gente que se necesita', '46680', 'Valencia', 'Algemesi', 'olegario2', 'oleg.tortajada@gmail.com', 'Oleg', 'Tortajada Amorós','1990-01-03','c/ dels Figueres 30-3-9', '669241551', 'ninios', false, true);
insert into USUARIOS(idusuario, dni, usuario, foto, precio, experiencia, edad, descripcion, codPostal, provincia, pueblo, password, email, nombre, apellidos, nacimiento, direccion, telefono, tipoUsuario, superUsu, activo)
values('5', '11111111A', 'angel', 'angel.jpg', '10-15 €/hr', 'ninguna', '22 años', 'Soy una persona joven que desea trabajar y cuidar de la gente que se necesita', '46680', 'Valencia', 'Algemesi', 'angel', 'angel.tortajada@gmail.com', 'Angel', 'Medina','1990-03-05-','c/ dels Figueres 30-3-9', '669241551', 'ninios', true, true);
insert into USUARIOS(idusuario, dni, usuario, foto, precio, experiencia, edad, descripcion, codPostal, provincia, pueblo, password, email, nombre, apellidos, nacimiento, direccion, telefono, tipoUsuario, superUsu, activo)
values('6', '22222222A', 'gato', 'gato.jpg', '10-15 €/hr', 'ninguna', '22 años', 'Soy una persona joven que desea trabajar y cuidar de la gente que se necesita', '46680', 'Valencia', 'Algemesi', 'gato', 'gato.tortajada@gmail.com', 'Gato', 'Tortajada Amorós','1990-01-03','c/ dels Figueres 30-3-9', '669241551', 'ninios', true, true);
insert into USUARIOS(idusuario, dni, usuario, foto, precio, experiencia, edad, descripcion, codPostal, provincia, pueblo, password, email, nombre, apellidos, nacimiento, direccion, telefono, tipoUsuario, superUsu, activo)
values('7', '73099854P', 'oleg3', 'oleg3.jpg', '10-15 €/hr', 'ninguna', '22 años', 'Soy una persona joven que desea trabajar y cuidar de la gente que se necesita', '46680', 'Valencia', 'Algemesi', 'olegario3', 'oleg.tortajada@gmail.com', 'Oleg', 'Tortajada Amorós','1990-01-03','c/ dels Figueres 30-3-9', '669241551', 'ancianos', false, true);
insert into USUARIOS(idusuario, dni, usuario, foto, precio, experiencia, edad, descripcion, codPostal, provincia, pueblo, password, email, nombre, apellidos, nacimiento, direccion, telefono, tipoUsuario, superUsu, activo)
values('8', '11111111C', 'jaime', 'jaime.jpg', '10-15 €/hr', 'ninguna', '22 años', 'Soy una persona joven que desea trabajar y cuidar de la gente que se necesita', '46680', 'Valencia', 'Algemesi', 'jaime', 'jaime.tortajada@gmail.com', 'Jaime', 'Tortajada Amorós','1990-01-03','c/ dels Figueres 30-3-9', '669241551', 'ancianos', true, true);
insert into USUARIOS(idusuario, dni, usuario, foto, precio, experiencia, edad, descripcion, codPostal, provincia, pueblo, password, email, nombre, apellidos, nacimiento, direccion, telefono, tipoUsuario, superUsu, activo)
values('9', '22222222C', 'maria', 'maria.jpg', '10-15 €/hr', 'ninguna', '22 años', 'Soy una persona joven que desea trabajar y cuidar de la gente que se necesita', '46680', 'Valencia', 'Algemesi', 'maria', 'maria.tortajada@gmail.com', 'maria', 'Amorós','1990-01-03','c/ dels Figueres 30-3-9', '669241551', 'ancianos', true, true);



insert into DISPONIBILIDAD(id_disp, dni_usuario,lunes_viernes,vie_sab_dom, toda_semana, manianas, tardes, noches)
values('1', '73099854N', true, false, true, true, false, false);
insert into DISPONIBILIDAD(id_disp, dni_usuario,lunes_viernes,vie_sab_dom, toda_semana, manianas, tardes, noches)
values('2', '11111111N', false, true, true, true, true, false);
insert into DISPONIBILIDAD(id_disp, dni_usuario,lunes_viernes,vie_sab_dom, toda_semana, manianas, tardes, noches)
values('3', '22222222N', false, false, false, true, true, false);
insert into DISPONIBILIDAD(id_disp, dni_usuario,lunes_viernes,vie_sab_dom, toda_semana, manianas, tardes, noches)
values('4', '73099854O', true, false, true, true, false, false);
insert into DISPONIBILIDAD(id_disp, dni_usuario,lunes_viernes,vie_sab_dom, toda_semana, manianas, tardes, noches)
values('5', '11111111A', false, true, true, true, true, false);
insert into DISPONIBILIDAD(id_disp, dni_usuario,lunes_viernes,vie_sab_dom, toda_semana, manianas, tardes, noches)
values('6', '22222222A', false, false, false, true, true, false);
insert into DISPONIBILIDAD(id_disp, dni_usuario,lunes_viernes,vie_sab_dom, toda_semana, manianas, tardes, noches)
values('7', '73099854P', true, false, true, true, false, false);
insert into DISPONIBILIDAD(id_disp, dni_usuario,lunes_viernes,vie_sab_dom, toda_semana, manianas, tardes, noches)
values('8', '11111111C', false, true, true, true, true, false);
insert into DISPONIBILIDAD(id_disp, dni_usuario,lunes_viernes,vie_sab_dom, toda_semana, manianas, tardes, noches)
values('9', '22222222C', false, false, false, true, true, false);


insert into CONECTAR(idTrabajo, dni1, dni2, dia, hora, tiempoTotal)
values('1','73099854N','11111111A','1990/03/01','23:00:00','05:00:00');
insert into CONECTAR(idTrabajo, dni1, dni2, dia, hora, tiempoTotal)
values('2','73099854N','11111111C','1990/03/02','22:00:00','03:00:00');
insert into CONECTAR(idTrabajo, dni1, dni2, dia, hora, tiempoTotal)
values('3','73099854N','22222222C','1990/03/02','17:00:00','03:00:00');

