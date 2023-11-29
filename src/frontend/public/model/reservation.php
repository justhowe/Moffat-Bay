<?php

require_once 'room.php';
require_once 'user.php';

class Reservation {
    public int $reservation_id;
    public User $user;
    public Room $room;
    public $checkin_date;
    public $checkout_date;

    /**
     * @param int $reservation_id
     * @param User $user
     * @param Room $room
     * @param $checkin_date
     * @param $checkout_date
     */
    public function __construct(int $reservation_id, User $user, Room $room, $checkin_date, $checkout_date)
    {
        $this->reservation_id = $reservation_id;
        $this->user = $user;
        $this->room = $room;
        $this->checkin_date = $checkin_date;
        $this->checkout_date = $checkout_date;
    }

    /**
     * @return int
     */
    public function getReservationId(): int
    {
        return $this->reservation_id;
    }

    /**
     * @param int $reservation_id
     */
    public function setReservationId(int $reservation_id): void
    {
        $this->reservation_id = $reservation_id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Room
     */
    public function getRoom(): Room
    {
        return $this->room;
    }

    /**
     * @param Room $room
     */
    public function setRoom(Room $room): void
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getCheckinDate()
    {
        return $this->checkin_date;
    }

    /**
     * @param mixed $checkin_date
     */
    public function setCheckinDate($checkin_date): void
    {
        $this->checkin_date = $checkin_date;
    }

    /**
     * @return mixed
     */
    public function getCheckoutDate()
    {
        return $this->checkout_date;
    }

    /**
     * @param mixed $checkout_date
     */
    public function setCheckoutDate($checkout_date): void
    {
        $this->checkout_date = $checkout_date;
    }




}