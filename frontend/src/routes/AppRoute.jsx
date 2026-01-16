import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

import { AuthProvider } from "../auth/AuthContext";
import { PrivateRoute } from "./PrivateRoute";
import GuestRoute from "./GuestRoute";
import LandingRoute from "./LandingRoute";

import Login from "../pages/Login";
import Register from "../pages/Register";
import Dashboard from "../pages/Dashboard";
import Landing from "../pages/Landing";

export default function AppRoute() {
    return (
        <AuthProvider>
            <Router>
                <Routes>
                    {/* Landing publique */}
                    <Route element={<LandingRoute />}>
                        <Route path="/" element={<Landing/>} />
                    </Route>

                    {/* Routes pour les invités (non authentifiés) */}
                    <Route element={<GuestRoute />}>
                        <Route path="/login" element={<Login />} />
                        <Route path="/register" element={<Register />} />
                    </Route>

                    {/* Routes privées (authentifiées) */}
                    <Route 
                        path="/dashboard" 
                        element={
                            <PrivateRoute>
                                <Dashboard />
                            </PrivateRoute>
                        } 
                    />

                    {/* fallback */}
                    <Route path="*" element={<div>404 Not Found</div>} />
                </Routes>
            </Router>
        </AuthProvider>
    );
}