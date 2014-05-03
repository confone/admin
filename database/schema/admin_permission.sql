CREATE TABLE {$dbName}.permission
(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	code VARCHAR(21) NOT NULL,
	language VARCHAR(3) NOT NULL,
	description VARCHAR(256) NOT NULL,

	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE INDEX {$dbName}_permission_code_index ON {$dbName}.permission (code(20));
CREATE INDEX {$dbName}_permission_language_index ON {$dbName}.permission (language(2));


CREATE TABLE {$dbName}.admin_permissions
(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	admin_id INT(10) UNSIGNED NOT NULL,
	code VARCHAR(21) NOT NULL,

	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE INDEX {$dbName}_permission_set_user_id_index ON {$dbName}.admin_permissions (admin_id);


CREATE TABLE {$dbName}.permission_urls
(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	code VARCHAR(21) NOT NULL,
	url VARCHAR(33) NOT NULL,

	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE INDEX {$dbName}_url_permission_url_index ON {$dbName}.url_permission (url(32));


GRANT ALL ON {$dbName}.* TO '{$uname}'@'%' IDENTIFIED BY '{$passwd}';
