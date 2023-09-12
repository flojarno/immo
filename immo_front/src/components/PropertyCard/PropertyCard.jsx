import React from 'react';
import config from '../../../config.json';
import { Link } from 'react-router-dom';


function PropertyCard({ property }) {

    return (
    <div key={property.id} className="card">
      <img src={`${config.api}/img/${property.photos[0]?.file}`} className="card-img-top" height="200px" alt="..."/>
      <div className="card-body">
        <div className="d-flex justify-content-between">
          <h5 className="card-title">{property.title}</h5>
          <p className="card-text">{property.price} €</p>
        </div>
        <div className="d-flex justify-content-between">
          <p>{property.property_type.type} en {property.transaction_type.type}</p>
          <p>{property.city}</p>
        </div>
        <p><small>{property.summary} </small></p>
        <div className="d-flex justify-content-end">
        <Link to={`/bien/${property.id}`} className="btn btn-primary" property={property}>Voir détails</Link>
        </div>
      </div>
    </div>
  );
}

export default PropertyCard;
