INSERT INTO authors (name, picture, date_of_birth, date_of_death, biography)
VALUES ('George Orwell', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1903-06-25', '1950-01-21',
        'George Orwell was an English novelist, essayist, journalist, and critic. He is best known for his novels "Animal Farm" and "1984".'),
       ('Jane Austen', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1775-12-16', '1817-07-18',
        'Jane Austen was an English novelist known for her six major novels including "Pride and Prejudice" and "Emma".'),
       ('Mark Twain', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1835-11-30', '1910-04-21',
        'Mark Twain was an American writer, humorist, and social critic, best known for "The Adventures of Tom Sawyer" and "Adventures of Huckleberry Finn".'),
       ('Harper Lee', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1926-04-28', '2016-02-19',
        'Harper Lee was an American novelist, best known for her Pulitzer Prize-winning book "To Kill a Mockingbird".'),
       ('Charles Dickens', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1812-02-07', '1870-06-09',
        'Charles Dickens was an English writer and social critic, famous for novels such as "A Tale of Two Cities" and "Great Expectations".'),
       ('J.K. Rowling', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1965-07-31', NULL,
        'J.K. Rowling is a British author, best known for writing the "Harry Potter" series of fantasy novels.'),
       ('Ernest Hemingway', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1899-07-21', '1961-07-02',
        'Ernest Hemingway was an American novelist and short story writer, known for "The Old Man and the Sea" and "A Farewell to Arms".'),
       ('F. Scott Fitzgerald', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1896-09-24', '1940-12-21',
        'F. Scott Fitzgerald was an American novelist and short story writer, best known for "The Great Gatsby".'),
       ('Leo Tolstoy', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1828-09-09', '1910-11-20',
        'Leo Tolstoy was a Russian writer, best known for his novels "War and Peace" and "Anna Karenina".'),
       ('Virginia Woolf', 'https://fakeimg.pl/1920x1080/?text=person%20image', '1882-01-25', '1941-03-28',
        'Virginia Woolf was an English writer, known for her modernist works such as "Mrs. Dalloway" and "To the Lighthouse".');

INSERT INTO genres (name)
VALUES ('Fiction'),
       ('Non-Fiction'),
       ('Mystery'),
       ('Fantasy'),
       ('Science Fiction'),
       ('Biography'),
       ('Historical Fiction'),
       ('Romance'),
       ('Horror'),
       ('Thriller');

INSERT INTO books (title, author_id, picture, summary, page_count, original_language, genre_id, published_by,
                   published_at)
VALUES ('1984', 1, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'A dystopian novel about a totalitarian regime and surveillance.', 328, 'English', 5, 'Secker & Warburg',
        '1949-06-08'),
       ('Pride and Prejudice', 2, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'A romantic novel that critiques the class system in early 19th-century England.', 279, 'English', 8,
        'T. Egerton', '1813-01-28'),
       ('The Adventures of Tom Sawyer', 3, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'The story of a young boy’s adventures along the Mississippi River.', 224, 'English', 3,
        'American Publishing Company', '1876-06-01'),
       ('To Kill a Mockingbird', 4, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'A novel on racial inequality and moral growth in the American South.', 281, 'English', 8,
        'J.B. Lippincott & Co.', '1960-07-11'),
       ('A Tale of Two Cities', 5, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'A historical novel set during the French Revolution.', 341, 'English', 7, 'Chapman & Hall', '1859-04-30'),
       ('Harry Potter and the Sorcerers Stone', 6, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'A young boy discovers he is a wizard and attends a magical school.', 309, 'English', 4, 'Bloomsbury',
        '1997-06-26'),
       ('The Old Man and the Sea', 7, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'The struggle between an old fisherman and a giant marlin.', 127, 'English', 5, 'Charles Scribners Sons',
        '1952-09-01'),
       ('The Great Gatsby', 8, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'A story about the American dream, love, and tragedy in the Jazz Age.', 180, 'English', 8,
        'Charles Scribners Sons', '1925-04-10'),
       ('War and Peace', 9, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'A historical novel set during the Napoleonic Wars, blending history and fiction.', 1225, 'Russian', 7,
        'The Russian Messenger', '1869-03-01'),
       ('Mrs. Dalloway', 10, 'https://fakeimg.pl/1920x1080/?text=book%20image',
        'A modernist novel that follows a day in the life of Clarissa Dalloway.', 194, 'English', 8, 'Hogarth Press',
        '1925-05-14');

INSERT INTO members (first_name, last_name, email, password, is_admin, date_of_birth, address)
VALUES ('John', 'Doe', 'john.doe@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', false, '1990-02-15', '123 Main St, Springfield, IL 62701'),
       ('Jane', 'Smith', 'jane.smith@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', false, '1985-11-22', '456 Elm St, New York, NY 10001'),
       ('Alice', 'Johnson', 'alice.johnson@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', false, '1992-07-30', '789 Oak St, Los Angeles, CA 90001'),
       ('Bob', 'Brown', 'bob.brown@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', false, '1988-05-14', '101 Pine St, Chicago, IL 60601'),
       ('Charlie', 'Davis', 'charlie.davis@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', false, '1994-01-11', '202 Maple St, Miami, FL 33101'),
       ('Emily', 'Miller', 'emily.miller@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', false, '1996-09-05', '303 Birch St, Seattle, WA 98101'),
       ('David', 'Wilson', 'david.wilson@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', false, '1980-12-23', '404 Cedar St, Boston, MA 02101'),
       ('Sophia', 'Moore', 'sophia.moore@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', true, '1993-03-18', '505 Redwood St, San Francisco, CA 94101'),
       ('Michael', 'Taylor', 'michael.taylor@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', true, '1991-10-28', '606 Willow St, Austin, TX 73301'),
       ('Olivia', 'Anderson', 'olivia.anderson@example.com', '$2y$12$T2OCL4lu6qiR3i33qHc7AO5rLHXVpi0sNH2pvrkxrnAq1RWbPpa/.', true, '1989-06-13', '707 Cherry St, Dallas, TX 75201');

INSERT INTO rentals (book_id, member_id, rented_at, duration_of_rent, returned_at, operator_id)
VALUES (1, 2, '2024-11-01', 14, null, 1),
       (2, 3, '2024-11-03', 7, null, 2),
       (3, 4, '2024-11-05', 30, null, 3),
       (4, 5, '2024-11-06', 21, null, 4),
       (5, 6, '2024-11-07', 10, null, 5),
       (6, 7, '2024-11-09', 14, null, 6),
       (7, 8, '2024-11-10', 28, null, 7),
       (8, 9, '2024-11-12', 7, null, 8),
       (9, 10, '2024-11-13', 14, null, 9),
       (10, 1, '2024-11-14', 21, null, 10);

INSERT INTO waiting_lists (member_id, book_id, position)
VALUES
    -- Waiting for '1984' (book_id: 1) - rented on 2024-11-01 until 2024-11-15
    (3, 1, 1 ),
    (4, 1, 2 ),

    -- Waiting for 'Harry Potter' (book_id: 6) - rented on 2024-11-09 until 2024-11-23
    (1, 6, 1 ),
    (2, 6, 2 ),
    (3, 6, 3 ),

    -- Waiting for 'War and Peace' (book_id: 9) - rented on 2024-11-13 until 2024-11-27
    (5, 9, 1 ),

    -- Example of completed wait for 'Tom Sawyer' (book_id: 3) - rented on 2024-11-05
    (8, 3, 1 ),

    -- Example of cancelled wait for 'Tale of Two Cities' (book_id: 5) - rented on 2024-11-07
    (9, 5, 1 );
