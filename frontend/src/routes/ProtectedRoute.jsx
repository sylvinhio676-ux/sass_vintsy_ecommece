import { Navigate, Outlet } from "react-router-dom";
import { useAuth } from "../auth/AuthContext";

export default function Register() {
    const { user, loading} = useAuth();

    if (loading) {
        return <div>Loading...</div>; // or a spinner component
    }

    if (!user) {
        return <Navigate to="/login" replace />;
    }

    return <Outlet />;
}