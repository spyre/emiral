SELECT * FROM wp3.wp_postmeta;

SELECT      key3.post_id
	FROM        wp_postmeta key3
	INNER JOIN  wp_postmeta key1 
	            ON key1.post_id = key3.post_id
	            AND key1.meta_key = 'proglanguage' 

	WHERE       key3.meta_key = 'proglanguage'
	            AND key3.meta_value = 'scala'
	ORDER BY    key1.meta_value, key3.meta_value;
    
create table sp_test(id int primary key auto_increment, username varchar(240) not null, email varchar(240), age int);
insert into sp_test(username, email, age) values('john', 'john@gmail.com', 20), ('bill', 'bill@gmail.com', 30), ('andy','andy@yahoo.com', 30);
select * from sp_test;

select k1.username from sp_test k1 inner join sp_test k2 on k1.id = k2.id and k1.age = 30;

select k1.id, k1.username, k1.email, k1.age from sp_test k1 inner join sp_test k2 on k1.id = k2.id and k1.username = 'john' 
															inner join sp_test k3 on k3.id = k2.id and k2.email = 'bill@gmail.com';
