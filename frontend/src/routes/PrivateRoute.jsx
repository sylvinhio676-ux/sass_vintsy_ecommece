import {Navigate} from 'react-router-dom';
import {useAuth} from '../auth/AuthContext';

export const PrivateRoute = ({children}) => {
    const {user, loading} = useAuth();

    if (loading) {
        return <div>Loading...</div>; // or a spinner component
    }

    if (!user) {
        return <Navigate to="/login" replace />;
    }

    return children;
};