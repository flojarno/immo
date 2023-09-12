import './App.css';
import Header from './components/Header';
import Home from './components/Home/Home';
import Login from './components/Login/Login';
import Register from './components/Login/Register';
import UserProfile from './components/UserProfile/UserProfile';
import {Routes, Route} from 'react-router-dom';
import PropertyPage from './components/PropertyPage/PropertyPage';

function App() {
 
  return (
    <div className="App">
      <Header/>
      <Routes>
        <Route path="/" element={ <Home />}> </Route>
        <Route path="/bien/:id" element={ <PropertyPage /> }></Route>
        <Route path="/connexion" element={ <Login />}> </Route>
        <Route path="/profil" element={ <UserProfile />}> </Route>
        <Route path="/inscription" element={ <Register />}> </Route>
      </Routes>      
    </div>
  )
}

export default App
