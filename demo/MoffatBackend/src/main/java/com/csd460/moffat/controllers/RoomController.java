package com.csd460.moffat.controllers;

import com.csd460.moffat.model.room.Room;
import com.csd460.moffat.service.RoomService;
import org.springframework.web.bind.annotation.*;

import java.util.List;

/**
 * The RoomController layer here is used to take in HTTP requests (GET POST PUT PATCH etc)
 * for room resources and expects JSON payloads and returns JSON payloads. We can add request
 * and input validation here and throw 4XX and 2XX response codes where needed
 */

@RestController
@RequestMapping("/api/")
public class RoomController {

    private final RoomService service;

    public RoomController(RoomService service) {
        this.service = service;
    }

    @CrossOrigin
    @GetMapping(path = "/rooms")
    @ResponseBody
    public List<Room> getRooms() {
        return this.service.getAllRooms();
    }
}
