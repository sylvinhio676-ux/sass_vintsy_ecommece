import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { useAuth } from "../auth/AuthContext";


export default function Register() {
    const handleRegister = useAuth();
    const navigate = useNavigate();

    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [passwordConfirm, setPasswordConfirm] = useState("");
    const [error, setError] = useState(null);

    async function onSubmit(e) {
        e.preventDefault();
        setError(null);
        if (password !== passwordConfirm) {
            setError("Passwords do not match");
            return;
        }
        try {
            await handleRegister({ name, email, password });
            navigate("/dashboard");
        } catch (err) {
            setError("Registration failed");
        }
    }

  return (
    <div>
        <h2>Register</h2>
        <form onSubmit={onSubmit}>
            {error && <div style={{ color: 'red' }}>{error}</div>}
            <div>
                <label>Name:</label>
                <input 
                    type="text" 
                    value={name} 
                    onChange={(e) => setName(e.target.value)} 
                    required 
                />
            </div>
            <div>
                <label>Email:</label>
                <input 
                    type="email" 
                    value={email} 
                    onChange={(e) => setEmail(e.target.value)} 
                    required 
                />
            </div>
            <div>
                <label>Password:</label>
                <input 
                    type="password" 
                    value={password} 
                    onChange={(e) => setPassword(e.target.value)} 
                    required 
                />
            </div>
            <div>
                <label>Confirm Password:</label>
                <input 
                    type="password" 
                    value={passwordConfirm} 
                    onChange={(e) => setPasswordConfirm(e.target.value)} 
                    required 
                />
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
  )
}
