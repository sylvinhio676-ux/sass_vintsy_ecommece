import { use } from "react"
import { useNavigate } from "react-router-dom";
import { useAuth } from "../auth/AuthContext";

export default function Login() {
    const handleLogin = useAuth();
    const navigate = useNavigate();

    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState(null);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError(null);
        try {
            await handleLogin({ email, password });
            navigate("/dashboard");
        } catch (err) {
            setError("Invalid email or password");
        }
    }
  return (
    <div>
        <h2>Login</h2>
        <form onSubmit={onSubmit}>
            {error && <div style={{ color: 'red' }}>{error}</div>}
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
            <button type="submit">Login</button>
        </form>
    </div>
  )
}
