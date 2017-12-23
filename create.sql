create DATABASE socialnetwork;
	use socialnetwork;

	create table User(

		user_id int Auto_Increment,
		firstname  varchar(255) not null ,
		lastname  varchar(255) not null ,
		nickname  varchar(255)  ,
		password varchar(1000) not null,
		email varchar(30) unique not null,
		gender varchar(30)  not null,
		birthdate date  not null,
		image longblob not null,
		hometown varchar(100) ,
		phone1 int ,
		phone2 int ,
		marital_status varchar(20) ,
		aboutme varchar(255),
		primary key(user_id)

		);

	create Table Posts(
		post_id int Auto_Increment,
		user_id int ,
		caption varchar(2000)  not null,
		image BLOB,
		post_time timestamp,
		ispublic  boolean not null,
		poster_name varchar(255) ,

		PRIMARY key(post_id),
		foreign key (user_id) REFERENCES User(user_id)

		);

	create Table Friends (

		user_id int ,
		friend_id int ,
		relation ENUM('0','1'),

		primary key( friend_id, user_id),
		foreign key(user_id) REFERENCES User(user_id),
		foreign key(friend_id) REFERENCES User(user_id)
		);
