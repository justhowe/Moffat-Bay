package com.csd460.moffat.service;
import com.csd460.moffat.dao.RoomDAO;
import com.csd460.moffat.model.room.Room;
import org.springframework.stereotype.Service;

import java.util.*;

/**
 * The Service layer here would be used to inject business logic when needed
 * to do things like check that a reservation is using a room that can hold
 * the specified number of guests or check that reservations are made in the
 * intended time frame
 */

@Service
public class RoomService {

    private final RoomDAO dao;

    public RoomService(){
        this.dao = new RoomDAO();
    }

    public List<Room> getAllRooms(){
        return this.dao.getAllRooms();
    }
}
