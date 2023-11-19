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
 * used when we are out of rooms of a certain type
 */
class NoVacancyException extends Exception {
    public function __construct($message) {
        parent::__construct($message);
    }
}