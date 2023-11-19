<?php

class User {
    private $user_id;
    private $username;
    private $password_hash;
    private $first_name;
    private $last_name;
    private $phone_number;

    // the user id is an optional parameter so that we can use this constructor for
    // reading from the database as well as building a user object from form data
    public function __construct($username, $password_hash, $first_name, $last_name, $phone_number, $user_id = -1) {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->password_hash = $password_hash;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
    }

    public function get_user_id() {
        return $this->user_id;
    }

    public function set_user_id($user_id) {
        $this->user_id = $user_id;
    }

    public function get_username() {
        return $this->username;
    }

    public function set_username($username) {
        $this->username = $username;
    }

    public function get_password_hash() {
        return $this->password_hash;
    }

    public function set_password_hash($password_hash) {
        $this->password_hash = $password_hash;
    }

    public function get_first_name() {
        return $this->first_name;
    }

    public function set_first_name($first_name) {
        $this->first_name = $first_name;
    }

    public function get_last_name() {
        return $this->last_name;
    }

    public function set_last_name($last_name) {
        $this->last_name = $last_name;
    }

    public function get_phone_number() {
        return $this->phone_number;
    }

    public function set_phone_number($phone_number) {
        $this->phone_number = $phone_number;
    }
}

?>
