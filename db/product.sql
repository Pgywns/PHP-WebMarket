create table product (
	num int not null auto_increment,
	pd_name char(50) not null,
	pd_color char(20) not null,
	pd_type char(15) not null,
	pd_price int not null,
   	file_name char(40),
   	file_type char(40),
   	file_copied char(40),
	primary key(num)
);