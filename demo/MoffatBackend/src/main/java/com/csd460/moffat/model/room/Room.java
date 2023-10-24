package com.csd460.moffat.model.room;

public class Room {
    public long roomId;
    public String bedType;
    public int numberOfBeds;
    public int maxGuests;
    public double price;

    public Room(long roomId, String bedType, int numberOfBeds, int maxGuests, double price) {
        this.roomId = roomId;
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
        return roomId;
    }

    public void setId(long roomId) {
        this.roomId = roomId;
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
        return "Room roomId=" +roomId + ", bedType=" + bedType + ", numberOfBeds=" + numberOfBeds + ", maxGuests=" + maxGuests
                + ", price=" + price + "]";
    }
}

