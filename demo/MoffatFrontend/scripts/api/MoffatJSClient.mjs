
export class MoffatJSClient {

    constructor() {
        this.baseUrl = "http://localhost:8081/api"
        this.baseHeaders = {
            "Accept": "application/json",
            "Content-Type": "application/json"
        }
    }

    async getAllRooms() {
        let response = {}
        try {
            response = await fetch(`${this.baseUrl}/rooms`, {
                method: 'GET',
                headers: this.baseHeaders
            })
            response = response.json()
        } catch (error) {
            console.error(error)
        }
        return response
    }

    async getAllReservations() {
        let response = {}
        try {
            response = await fetch(`${this.baseUrl}/reservations`, {
                method: 'GET',
                headers: this.baseHeaders
            })
            response = response.json()
        } catch (error) {
            console.error(error)
        }
        return response
    }
}