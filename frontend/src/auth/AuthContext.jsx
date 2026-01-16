import {createContext, useContext, useState, useEffect} from 'react';
import * as AuthAPI from '../api/auth';

const AuthContext = createContext(null);

export const AuthProvider = ({children}) => {
    const [user, setUser] = useState(null);
    const [loading, setLoading] = useState(true);

    async function bootstrap() {
        const token = localStorage.getItem('auth_token');
        if (token) {
            try {
                const userData = await AuthAPI.getProfile();
                setUser(userData);
            } catch (error) {
                console.error('Failed to fetch user:', error);
                localStorage.removeItem('auth_token');
            }
        }
        setLoading(false);
    }

    useEffect(() => {
        bootstrap();
    }, []);

    async function login (credentials) {
        const {access_token: token} = await AuthAPI.login(credentials);
        localStorage.setItem('auth_token', token);
        const userData = await AuthAPI.getProfile();
        setUser(userData);
    }

    async function register (credentials){
        const {access_token: token} = await AuthAPI.register(credentials);
        localStorage.setItem('auth_token', token);
        const userData = await AuthAPI.getProfile();
        setUser(userData);
    };

    async function logout() {
        await AuthAPI.logout();
        localStorage.removeItem('auth_token');
        setUser(null);
    }
    
    return (
        <AuthContext.Provider value={{user, loading, login, register, logout}}>
            {children}
        </AuthContext.Provider>
    );
};

export function useAuth() {
    return useContext(AuthContext);
}
