USE php_project;

INSERT INTO users (username, password)
VALUES (
    'admin',
    'password'
);

-- Seed includes sample Daft Punk tracks for demo purposes
INSERT INTO tracks (user_id, title, artist, album, release_year, notes)
VALUES
    (1, 'Around the World', 'Daft Punk', 'Homework', 1997, 'A repetitive classic with an unforgettable groove.'),
    (1, 'One More Time', 'Daft Punk', 'Discovery', 2000, 'Signature dance anthem.'),
    (1, 'Harder, Better, Faster, Stronger', 'Daft Punk', 'Discovery', 2001, 'Electronic powerhouse with robotic vocals.'),
    (1, 'Get Lucky', 'Daft Punk ft. Pharrell Williams', 'Random Access Memories', 2013, 'Funky collaboration and chart hit.');
