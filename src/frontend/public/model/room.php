<?php

class Room {
    public $room_id;
    public $bed_type;
    public $number_of_beds;
    public $max_guests;
    public $price;

    public function __construct($room_id, $bed_type, $number_of_beds, $max_guests, $price){
        $this->room_id = $room_id;
        $this->bed_type = $bed_type;
        $this->number_of_beds = $number_of_beds;
        $this->max_guests = $max_guests;
        $this->price = $price;
    }

    public function get_room_id(){
        return $this->room_id;
    }

    public function get_bed_type(){
        return $this->bed_type;
    }

    public function get_number_of_beds(){
        return $this->number_of_beds;
    }

    public function get_max_guests(){
        return $this->max_guests;
    }

    public function get_price(){
        return $this->price;
    }
}

?>
