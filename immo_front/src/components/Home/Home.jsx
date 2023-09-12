import { useState, useEffect, useContext } from "react";
import './Home.css';
import PropertyCard from '../PropertyCard/PropertyCard';
import { PropertyContext } from '../../PropertyContext'

function Home(){


  const { properties } = useContext(PropertyContext)

  const [transactionFilter, setTransactionFilter] = useState("Toutes les transactions");
  const [propertyFilter, setPropertyFilter] = useState("Tous les biens")

  const handleTransactionFilterChange = (event) => {
    setTransactionFilter(event.target.value);
  }

  const handlePropertyFilterChange = (event) => {
    setPropertyFilter(event.target.value)
  }
  
  return(
      <div className="Home container">
          <h1 className="text-center py-5">IMMO 3.0</h1> 
          <div className="row bg-light p-4">
            <div className="col-3">
              <select className="form-select" aria-label="Default select example" onChange={handleTransactionFilterChange} value={transactionFilter}>
                  <option value="Toutes les transactions">Toutes les transactions</option>
                  <option value="Location">Location</option>
                  <option value="Vente">Vente</option>
              </select>
            </div>
            <div className="col-3">
              <select className="form-select" aria-label="Default select example" onChange={handlePropertyFilterChange} value={propertyFilter}>
                  <option value="Tous les biens">Tous les biens</option>
                  <option value="Appartement">Appartement</option>
                  <option value="Maison">Maison</option>
                  <option value="Villa">Villa</option>
              </select>
            </div>            
          </div>
          <div className="list my-5">
              {properties.filter(property => {
                  if (transactionFilter === "Toutes les transactions" && propertyFilter === "Tous les biens") {
                  return true;
                  } else if (transactionFilter !== "Toutes les transactions" && propertyFilter === "Tous les biens") {
                  return transactionFilter === property.transaction_type.type;
                  } else if (transactionFilter === "Toutes les transactions" && propertyFilter !== "Tous les biens") {
                  return propertyFilter === property.property_type.type;
                  } else {
                  return propertyFilter === property.property_type.type && transactionFilter === property.transaction_type.type;
                  }
                }).map(property => {
                  return <PropertyCard key={property.id} property={property} />;
              })}
          </div>
      </div>
    )
}


export default Home;


