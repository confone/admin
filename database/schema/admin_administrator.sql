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


CREATE TABLE {$dbName}.username_lookup
(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	username VARCHAR(33),
	admin_id INT(10) UNSIGNED NOT NULL,
	is_active VARCHAR(2),

	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE INDEX {$dbName}_username_lookup_username_index ON {$dbName}.username_lookup (username(32));
CREATE INDEX {$dbName}_username_lookup_is_active_index ON {$dbName}.username_lookup (is_active(1));


GRANT ALL ON {$dbName}.* TO '{$uname}'@'%' IDENTIFIED BY '{$passwd}';
