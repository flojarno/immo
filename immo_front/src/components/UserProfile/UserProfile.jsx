import { useContext } from "react";
import { PropertyContext } from '../../PropertyContext';


function UserProfile(){


const { user, properties } = useContext(PropertyContext)


return (

    <div>
        {/* ici on verifie si user existe, car sinon il attend pas d'avoir recup les données 
        pour charger le html, et génère une erreur.  */}
        {user ? 
        <div className="container m-5">
            <h1>Bienvenue {user.first_name} !</h1>
           
            <p>Voici la liste de vos biens</p>
                       
            {user.properties.map((property, index)=> {
                  
                  return <p key={index}>{property}</p>;
                })
            }           

        </div> : null
        }
    
</div>
    
)
}

export default UserProfile;