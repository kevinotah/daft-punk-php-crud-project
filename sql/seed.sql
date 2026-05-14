USE php_project;

INSERT INTO users (username, password)
VALUES (
    'admin',
    'password'
);

INSERT INTO books (user_id, title, author, genre, published_year, description)
VALUES
    (1, 'The Pragmatic Programmer', 'Andrew Hunt and David Thomas', 'Programming', 1999, 'A practical book about writing better software.'),
    (1, 'Clean Code', 'Robert C. Martin', 'Programming', 2008, 'A classic reference for readable and maintainable code.'),
    (1, 'PHP Objects, Patterns, and Practice', 'Matt Zandstra', 'Web Development', 2017, 'Useful for understanding object-oriented PHP design.');
