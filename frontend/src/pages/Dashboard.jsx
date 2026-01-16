import { useAuth } from "../auth/AuthContext";


export default function Dashboard() {
    const { user, handleLogout } = useAuth();
  return (
    <div>
        <h2>Dashboard</h2>
        <p>Welcome, {user?.name}!</p>
        <button onClick={handleLogout}>Logout</button>
    </div>
  )
}
