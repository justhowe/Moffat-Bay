package com.csd460.moffat.dao;

import com.csd460.moffat.model.reservation.Reservation;
import com.csd460.moffat.model.room.Room;
import com.csd460.moffat.model.user.User;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

/**
 * The "DAO" data access object is the layer that interacts with the Database
 * Management Service to read or write records to the database
 */

public class ReservationsDAO {
    private final String jdbcUrl;
    private final String username;
    private final String password;

    public ReservationsDAO() {
        this.jdbcUrl = "jdbc:mysql://moffat-database:3306/moffat_db";
        this.username = "moffat_user";
        this.password = "moffat_password";
    }

    public List<Reservation> getAllReservations(){
        List<Reservation> reservationList = new ArrayList<>();

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection connection = DriverManager.getConnection(this.jdbcUrl, this.username, this.password);

            String sqlQuery = "CALL GetAllReservationsWithDetails"; // call stored procedure
            PreparedStatement preparedStatement = connection.prepareStatement(sqlQuery);
            ResultSet resultSet = preparedStatement.executeQuery();

            while (resultSet.next()) {
                Reservation res = new Reservation(
                        resultSet.getLong("reservation_id"),
                        new User(
                                resultSet.getLong("user_id"),
                                resultSet.getString("username"),
                                resultSet.getString("password_hash"),
                                resultSet.getString("first_name"),
                                resultSet.getString("last_name"),
                                resultSet.getLong("phone_number")
                        ),
                        new Room(
                                resultSet.getLong("room_id"),
                                resultSet.getString("bed_type"),
                                resultSet.getInt("number_of_beds"),
                                resultSet.getInt("max_guests"),
                                resultSet.getDouble("price")
                        ),
                        resultSet.getTimestamp("check_in_date"),
                        resultSet.getTimestamp("check_out_date")
                );
                reservationList.add(res);
            }

            resultSet.close();
            preparedStatement.close();
            connection.close();

        } catch (ClassNotFoundException |  SQLException e) {
            e.printStackTrace();
        }
        return reservationList;
    }


}
