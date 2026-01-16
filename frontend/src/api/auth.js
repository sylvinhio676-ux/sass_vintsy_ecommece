import http from "./http";

export async function register(credential) {
    const {data} =  await http.post('/auth/register', credential);
    return data;
}

export async function login(credential) {
    const {data} =  await http.post('/auth/login', credential);
    return data;
}

export async function getProfile() {
    const {data} =  await http.get('/auth/me');
    return data;
}

export async function logout() {
    const {data} =  await http.post('/auth/logout');
    return data;
}