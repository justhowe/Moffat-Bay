package com.csd460.moffat.service;

import com.csd460.moffat.dao.ReservationsDAO;
import com.csd460.moffat.model.reservation.Reservation;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ReservationService {
    private final ReservationsDAO dao;

    public ReservationService() {this.dao = new ReservationsDAO(); }

    public List<Reservation> getAllReservations() { return this.dao.getAllReservations(); }
}
