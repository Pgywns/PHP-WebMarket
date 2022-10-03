create table cart (
	num int not null,
	id char(15) not null,
	pd_name char(50) not null,
	pd_color char(20) not null,
	pd_type char(15) not null,
	pd_price int not null,
   	file_name char(40),
	primary key(num)
);