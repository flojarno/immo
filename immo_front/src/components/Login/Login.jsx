import React, { useState, useEffect, useContext } from "react";
import { PropertyContext } from '../../PropertyContext';
import { useNavigate } from "react-router-dom";
import { Link } from "react-router-dom";
import config from '../../../config.json'

function Login() {


    const { users, setUsers, setUser } = useContext(PropertyContext)
    // const [users, setUsers] = useState([]); //remplacé par le contexte ci dessus
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [loggedInUser, setLoggedInUser] = useState(null);
    const navigate = useNavigate();

    useEffect(() => {
        const fetchUsers = async () => {
            try {
                const response = await fetch(`${config.api}/api/users`);
                const data = await response.json();
                const userList = data["hydra:member"];
                setUsers(userList);
            } catch (error) {
                console.error(error);
            }
        };
        fetchUsers();
    }, []);

    const handleLogin = (event) => {
        event.preventDefault();
        const matchingUser = users.find((user) => user.email === email && user.password === password);
        if (matchingUser) {
            setLoggedInUser(matchingUser);
            setEmail("");
            setPassword("");
            setUser(matchingUser)
            navigate("/profil")
        } else {
            navigate("/inscription");
        }
    };

    const handleLogout = () => {
        setLoggedInUser(null);
    };

    return (
        <div className="container w-50 p-5">
            {loggedInUser ? (
                <div>
                    <h3>Bienvenue, {loggedInUser.email}!</h3>
                    <button className="btn btn-primary" onClick={handleLogout}>Logout</button>
                </div>
            ) : (
                <div>
                    <h1>Entrez vos logins</h1>
                    <form onSubmit={handleLogin}>
                        <div className="container">
                            <div className="mb-3">
                                <label className="form-label" htmlFor="email">
                                    <b>Email</b>
                                </label>
                                <input
                                    className="form-control"
                                    type="email"
                                    placeholder="Enter email"
                                    name="email"
                                    required
                                    value={email}
                                    onChange={(event) => setEmail(event.target.value)}
                                />
                            </div>
                            <div className="mb-3">
                                <label className="form-label" htmlFor="password">
                                    <b>Mot de passe</b>
                                </label>
                                <input
                                    className="form-control"
                                    type="password"
                                    placeholder="Enter Password"
                                    name="password"
                                    required
                                    value={password}
                                    onChange={(event) => setPassword(event.target.value)}
                                />
                            </div>
                            <button className="btn btn-primary" type="submit">
                                Connexion
                            </button>
                        </div>
                        <div className="m-3">
                            <small>Pas encore de compte ?  
                                <Link to="/inscription"> S'inscrire</Link>
                            </small>
                        </div>
                    </form>
                </div>
            )}
        </div>
    );
}

export default Login;