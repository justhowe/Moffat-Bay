CREATE DATABASE IF NOT EXISTS moffat_db;
USE moffat_db;

CREATE TABLE IF NOT EXISTS users
(
    user_id       BIGINT AUTO_INCREMENT PRIMARY KEY,
    username      VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    first_name    VARCHAR(255) NOT NULL,
    last_name     VARCHAR(255) NOT NULL,
    phone_number  BIGINT       NOT NULL
);

CREATE TABLE IF NOT EXISTS rooms
(
    room_id        BIGINT AUTO_INCREMENT PRIMARY KEY,
    bed_type       VARCHAR(255),
    number_of_beds INTEGER,
    max_guests     INTEGER,
    price          DOUBLE
);

-- these rows represent rooms in hotel so its good to insert in init.sql
SET @d2_room_price = 120.75;
SET @q1_room_price = 131.25;
SET @q2_room_price = 141.75;
SET @k1_room_price = 157.50;
INSERT INTO rooms (bed_type, number_of_beds, max_guests, price)
VALUES ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Double', 2, 4, @d2_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 1, 2, @q1_room_price),
       ('Queen', 2, 2, @q2_room_price),
       ('Queen', 2, 2, @q2_room_price),
       ('Queen', 2, 2, @q2_room_price),
       ('Queen', 2, 2, @q2_room_price),
       ('Queen', 2, 2, @q2_room_price),
       ('Queen', 2, 2, @q2_room_price),
       ('Queen', 2, 2, @q2_room_price),
       ('Queen', 2, 2, @q2_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price),
       ('King', 1, 2, @k1_room_price);

CREATE TABLE IF NOT EXISTS reservations
(
    reservation_id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_id        BIGINT    NOT NULL,
    room_id        BIGINT    NOT NULL,
    check_in_date  TIMESTAMP NOT NULL,
    check_out_date TIMESTAMP NOT NULL
);

ALTER TABLE reservations
    ADD CONSTRAINT fk_user_id
        FOREIGN KEY (user_id) REFERENCES users (user_id);

ALTER TABLE reservations
    ADD CONSTRAINT fk_room_id
        FOREIGN KEY (room_id) REFERENCES rooms (room_id);


-- stored procedures
-- I think this variable is needed not sure
SET sql_mode = 'STRICT_TRANS_TABLES';

-- gets all joined reservations call with CALL GetAllReservationsWithDetails();
DELIMITER $$

CREATE PROCEDURE GetAllReservationsWithDetails()
BEGIN
    SELECT *
    FROM reservations
             INNER JOIN rooms r ON reservations.room_id = r.room_id
             INNER JOIN users u ON reservations.user_id = u.user_id;
END $$
DELIMITER ;

-- Gets all joined reservations that are active based on database time
-- call with CALL GetActiveReservationsWithDetails();
DELIMITER $$
CREATE PROCEDURE GetActiveReservationsWithDetails()
BEGIN
    SELECT *
    FROM reservations res
             INNER JOIN rooms r ON res.room_id = r.room_id
             INNER JOIN users u ON res.user_id = u.user_id
    WHERE res.check_in_date <= NOW()
      AND res.check_out_date >= NOW();
END $$
DELIMITER ;

-- Get rooms that are not used in another reservation for the desired duration
-- call with two TIMESTAMP args like CALL GetAvailableRooms('2023-10-25 00:00:00', '2023-10-30 00:00:00');
-- CALL GetAvailableRooms('2023-10-20 00:00:00', '2023-10-30 00:00:00');
DELIMITER $$
CREATE PROCEDURE GetAvailableRooms(
    IN checkin_date TIMESTAMP,
    IN checkout_date TIMESTAMP
)
BEGIN
    WITH available_rooms AS (
        SELECT r.room_id,
               r.bed_type,
               r.number_of_beds,
               r.max_guests,
               r.price,
               CASE
                   WHEN res.room_id IS NOT NULL THEN 0
                   ELSE 1
                   END AS availability
        FROM rooms r
                 LEFT JOIN reservations res ON r.room_id = res.room_id
            AND (checkin_date <= res.check_out_date AND checkout_date >= res.check_in_date)
    )
    SELECT room_id, bed_type, number_of_beds, max_guests, price
    FROM available_rooms
    WHERE availability = 1;
END $$
DELIMITER ;


-- output to logging
SHOW PROCEDURE STATUS WHERE Db = 'moffat_db';

-- sample data for testing
INSERT INTO users (username, password_hash, first_name, last_name, phone_number)
VALUES ('bryson@localhost.com', '$2a$12$e4XOZ/eHfrDEJ7p6OyAt5u0Ct0NTo1qJbCOGGlLRuGZCw43cBGnjm', 'bryson', 'moffat',
        5551234567);

-- sample data for testing
INSERT INTO reservations (user_id, room_id, check_in_date, check_out_date)
VALUES (1, 1, '2023-10-21 14:30:45', '2023-10-22 14:30:45');

-- sample data for testing
INSERT INTO reservations (user_id, room_id, check_in_date, check_out_date)
VALUES (1, 60, '2023-10-21 14:30:45', '2023-10-31 14:30:45');