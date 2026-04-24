import axios from 'axios';

export const http = axios.create({
    baseURL: 'http://localhost:8000',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
});

// 1. KÉRÉS INTERCEPTOR (Token automatikus hozzáadása)
http.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('token');
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

// 2. VÁLASZ INTERCEPTOR (Hibafigyelés és automatikus Logout)
http.interceptors.request.use(config => {
    // KIVESSZÜK a tárolóból
    const token = localStorage.getItem('token');

    if (token) {
        // RÁRAKJUK a levélre (Request Header)
        // A "Bearer " prefix kötelező a szabvány szerint
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

export default http;