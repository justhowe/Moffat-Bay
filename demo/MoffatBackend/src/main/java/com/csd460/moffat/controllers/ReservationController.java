package com.csd460.moffat.controllers;

import com.csd460.moffat.model.reservation.Reservation;

import com.csd460.moffat.service.ReservationService;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api")
public class ReservationController {

    private final ReservationService service;

    public ReservationController(ReservationService service) {
        this.service = new ReservationService();
    }

    @CrossOrigin
    @GetMapping(path = "/reservations")
    @ResponseBody
    public List<Reservation> getReservations() { return this.service.getAllReservations(); }
}
