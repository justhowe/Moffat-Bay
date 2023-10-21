package com.csd460.moffat.service;
import com.csd460.moffat.dao.MoffatDAO;
import com.csd460.moffat.room.Room;
import org.springframework.stereotype.Service;

import java.util.*;

/**
 * The Service layer here would be used to inject business logic when needed
 * to do things like check that a reservation is using a room that can hold
 * the specified number of guests or check that reservations are made in the
 * intended time frame
 */

@Service
public class MoffatService {

    private final MoffatDAO dao;

    public MoffatService(){
        this.dao = new MoffatDAO();
    }

    public List<Room> getAllRooms(){
        return this.dao.getAllRooms();
    }
}
