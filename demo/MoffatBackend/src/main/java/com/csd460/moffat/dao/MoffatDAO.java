package com.csd460.moffat.dao;

import com.csd460.moffat.room.Room;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

/**
 * The "DAO" data access object is the layer that interacts with the Database
 * Management Service to read or write records to the database
 */

public class MoffatDAO {
    private final String jdbcUrl;
    private final String username;
    private final String password;

    public MoffatDAO() {
        this.jdbcUrl = "jdbc:mysql://moffat-database:3306/moffat_db";
        this.username = "moffat_user";
        this.password = "moffat_password";
    }

    public List<Room> getAllRooms(){
        List<Room> roomList = new ArrayList<>();

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection connection = DriverManager.getConnection(this.jdbcUrl, this.username, this.password);

            String sqlQuery = "SELECT * FROM rooms";
            PreparedStatement preparedStatement = connection.prepareStatement(sqlQuery);
            ResultSet resultSet = preparedStatement.executeQuery();

            while (resultSet.next()) {
                Room room = new Room(
                    resultSet.getInt("id"),
                    resultSet.getString("bed_type"),
                    resultSet.getInt("number_of_beds"),
                    resultSet.getInt("max_guests"),
                    resultSet.getDouble("price")
                );
                roomList.add(room);
            }

            resultSet.close();
            preparedStatement.close();
            connection.close();

        } catch (ClassNotFoundException |  SQLException e) {
            e.printStackTrace();
        }

        return roomList;
    }


}
