CREATE TABLE users (
    id integer PRIMARY KEY AUTOINCREMENT,
    name varchar,
    email varchar,
    image_url text,
    password text
);

CREATE TABLE lists (
    id integer PRIMARY KEY AUTOINCREMENT,
    user_id integer,
    title text
);

CREATE TABLE tasks (
    id integer PRIMARY KEY AUTOINCREMENT,
    user_id integer,
    deadline date,
    list_id integer,
    title varchar,
    description varchar,
    completed INTEGER DEFAULT 0
);
