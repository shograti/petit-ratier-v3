import React, { useState, useEffect } from "react";
import axios from "axios";

const HomePage = () => {
  const [offers, setOffers] = useState([]);

  useEffect(() => {
    axios
      .get("/api/offers/get")
      .then((response) => {
        setOffers(response.data);
      })
      .catch((error) => {
        console.log(error);
      });
  },[]);
  return offers.map((offer) => (
    <div key={offer.idOffer}>
      <h2>{offer.nameOffer}</h2>
      <img src={offer.pictureOffer} alt="" />
      <p>{offer.idUser.pseudoUser}</p>
    </div>
  ));
};

export default HomePage;
