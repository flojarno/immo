
import { Link } from "react-router-dom";

function Header() {

    return (
        <div className="Header">
            <nav className="navbar navbar-expand-lg bg-dark">
                <div className="container-fluid">
                    <a className="navbar-brand text-white" href="#">IMMO</a>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarScroll">
                        <ul className="navbar-nav  my-2 my-lg-0 navbar-nav-scroll">
                            <li className="nav-item">
                                <Link to="/" className="nav-link active text-white" aria-current="page">Home</Link>
                            </li>
                        </ul>
                        <ul className="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                            <li className="nav-item">
                                <Link to="/connexion" className="nav-link active text-white" aria-current="page">Login</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    )
}

export default Header;