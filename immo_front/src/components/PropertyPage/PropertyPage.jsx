import { useParams } from "react-router";
import { useState, useEffect } from "react";
import config from '../../../config.json'
import './PropertyPage.css'


function PropertyPage({ }) {

  // useParams() est un objet, donc on recupere toujours une paire clé-valeur
  // ex: useParams() est égal à { id:'', prop1:'', prop2:'', etc} 
  // Pour récup l'id, on peut utiliser soit {id}, avec les crochets car c'est un objet
  // soit params = useParams() puis params.id 

  
  const {id} = useParams(); // ou const params  = useParams() puis params.id
  const [property, setProperty] = useState({});

  useEffect(() => {
    const fetchProperty = async () => {
      try {
        const response = await fetch(`${config.api}/api/properties/${id}`);
        const data = await response.json();
        console.log(data);
        console.log(data.photos[0].file)
        setProperty(data);
      } catch (error) {
        console.error(error);
      }
    };
    fetchProperty();
  }, []);


  return (
    <div className="container">
      
     <div className="row gx-5">
        <div className="col-9 p-5">
  
          <h1>{property.title}</h1> 
          <div id="carouselExample" className="carousel slide">
            <div className="carousel-inner">
              {property.photos && property.photos.map((photo, i) =>{
                return <div key={photo.id} className={"carousel-item" + (i === 0 ? ' active' : '')}>
                    <img src={`${config.api}/img/${photo.file}`} className="d-block w-100" alt="..."/>
                </div>
              })}
            </div>
            <button className="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span className="carousel-control-prev-icon" aria-hidden="true"></span>
              <span className="visually-hidden">Previous</span>
            </button>
            <button className="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span className="carousel-control-next-icon" aria-hidden="true"></span>
              <span className="visually-hidden">Next</span>
            </button>
          </div>        
          <p>{property.description}</p>
        </div>
        <div className="col-3 mt-5 p-5 bg-light rounded">
          <p className="price">{property.price} €</p>
          <p>Ville : {property.city}</p>
          <p>Code postal : {property.postal_code}</p>
          <p>Type de bien : {property.property_type?.type}</p> 
          <p>Type de transaction : {property.transaction_type?.type}</p>
        </div>
      </div>
    </div>
  );
}

export default PropertyPage;
