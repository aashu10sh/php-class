CREATE TABLE todos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200),
    created DATE,
    completed BOOLEAN DEFAULT 0
);


INSERT INTO todos(name, created,completed) VALUES("Do Work!",'2004-02-12',1);
