import { useState, useEffect, createContext } from "react";
import config from '../config.json'

export const PropertyContext = createContext();

export default function PropertyContextProvider({children}) {
    
    const [properties, setProperties] = useState([]);
    const [user, setUser] = useState(null);
    const [users, setUsers] = useState([]);
 

    useEffect(() => {
        const fetchData = async () => {
          try {
            const response = await fetch(`${config.api}/api/properties`);
            const data = await response.json();
            const propertyList = data["hydra:member"];
            setProperties(propertyList);
          } catch (error) {
            console.error(error);
          }
        };
        fetchData();
      }, []);


    return(

    <PropertyContext.Provider value={{properties, setProperties, users, setUsers, user, setUser}}>
        {children}
    </PropertyContext.Provider>
)

}







