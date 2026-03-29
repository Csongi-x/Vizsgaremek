import axios from 'axios'

export const http = axios.create({
    baseUrl: 'http://127.0.0.1:8000' // backend végpontja
})