CREATE TABLE {$dbName}.administrator
(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	username VARCHAR(33),
	email VARCHAR(61),
	password VARCHAR(41),
	name VARCHAR(128),
	profile_pic VARCHAR(61),
	description VARCHAR(256),
	last_login DATETIME,

	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;


CREATE TABLE {$dbName}.lookup_username
(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	username VARCHAR(33),
	admin_id INT(10) UNSIGNED NOT NULL,
	is_active VARCHAR(2),

	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE INDEX {$dbName}_lookup_username_username_index ON {$dbName}.lookup_username (username(32));
CREATE INDEX {$dbName}_lookup_username_is_active_index ON {$dbName}.lookup_username (is_active(1));


GRANT ALL ON {$dbName}.* TO '{$uname}'@'%' IDENTIFIED BY '{$passwd}';
