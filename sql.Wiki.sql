CREATE DATABASE wiki;

CREATE TABLE roles (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(255)
);

CREATE TABLE categories(
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    categorie_name VARCHAR(255)
);

CREATE TABLE uesrs (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    passwordd VARCHAR(100) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES roles (id_role)
);



CREATE TABLE wikis(
    id_wiki INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    users_Id INT,
    FOREIGN KEY (users_Id) REFERENCES users (id_user),
    categorie_id INT,
    FOREIGN KEY (categorie_id) REFERENCES categories (id_categorie),
    status boolean not null default 0
    date_create DATE
);



CREATE TABLE tags(
    id_tag INT AUTO_INCREMENT PRIMARY KEY,
    tag_name VARCHAR(255)
);

CREATE TABLE wikis_tags(
    tag_id INT,
    FOREIGN KEY (tag_id) REFERENCES tags(id_tag),
    wiki_id INT,
    FOREIGN KEY (wiki_id) REFERENCES wikis(id_wiki)
);
