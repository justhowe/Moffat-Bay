package com.csd460.moffat.room;

public class Room {
    private long id;
    private String bedType;
    private int numberOfBeds;
    private int maxGuests;
    private double price;

    public Room(long id, String bedType, int numberOfBeds, int maxGuests, double price) {
        this.id = id;
        this.bedType = bedType;
        this.numberOfBeds = numberOfBeds;
        this.maxGuests = maxGuests;
        this.price = price;
    }
    public Room(String bedType, int numberOfBeds, int maxGuests, double price) {
        this.bedType = bedType;
        this.numberOfBeds = numberOfBeds;
        this.maxGuests = maxGuests;
        this.price = price;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getBedType() {
        return bedType;
    }

    public void setBedType(String bedType) {
        this.bedType = bedType;
    }

    public int getNumberOfBeds() {
        return numberOfBeds;
    }

    public void setNumberOfBeds(int numberOfBeds) {
        this.numberOfBeds = numberOfBeds;
    }

    public int getMaxGuests() {
        return maxGuests;
    }

    public void setMaxGuests(int maxGuests) {
        this.maxGuests = maxGuests;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    @Override
    public String toString() {
        return "Room [id=" + id + ", bedType=" + bedType + ", numberOfBeds=" + numberOfBeds + ", maxGuests=" + maxGuests
                + ", price=" + price + "]";
    }
}

