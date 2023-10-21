package com.csd460.moffat.controllers;

import com.csd460.moffat.room.Room;
import com.csd460.moffat.service.MoffatService;
import org.springframework.web.bind.annotation.*;

import java.util.List;

/**
 * The Controller layer here is used to take in HTTP requests (GET POST PUT PATCH etc)
 * for different resources like a room or reservation and expects JSON payloads and
 * returns JSON payloads. We can add request and input validation here and throw
 * 4XX and 2XX response codes where needed
 */

@RestController
@RequestMapping("/api/")
public class Controller {

    private final MoffatService service;

    public Controller(MoffatService service) {
        this.service = service;
    }

    @CrossOrigin
    @GetMapping(path = "/rooms")
    @ResponseBody
    public List<Room> getRooms() {
        return this.service.getAllRooms();
    }
}
