<?php

/**
 * used to signal when the user being retrieved does not exist in database
 */
class NoSuchUserException extends Exception {
    public function __construct($message) {
        parent::__construct($message);
    }
}

/**
 * used to signal when there are no reservations for a user
 */
class NoSuchReservationForUser extends Exception {
    public function __construct($message) {
        parent::__construct($message);
    }
}

/**
 * used to signal that a room being retrieved does not exist in the database
 */
class NoSuchRoomException extends Exception {
    public function __construct($message) {
        parent::__construct($message);
    }
}

/**
 * used when we are out of rooms of a certain type
 */
class NoVacancyException extends Exception {
    public function __construct($message) {
        parent::__construct($message);
    }
}