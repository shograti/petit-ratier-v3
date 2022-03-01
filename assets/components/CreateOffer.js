import React, { useState, useEffect } from "react";
import { TextField, Button, Stack, Autocomplete } from "@mui/material";
import axios from "axios";

const CreateOffer = () => {
  const [name, setName] = useState("");
  const [picture, setPicture] = useState("");
  const [description, setDescription] = useState("");
  const [quantity, setQuantity] = useState("");
  const [startOffer, setStartOffer] = useState("");
  const [endOffer, setEndOffer] = useState("");
  const [initialPrice, setInitialPrice] = useState("");
  const [soldedPrice, setSoldedPrice] = useState("");
  const [category, setCategory] = useState(null);
  const [shop, setShop] = useState(null);
  const [shops, setShops] = useState([]);
  const [categories, setCategories] = useState([]);

  const [shopNameForAutocomplete, setShopNameForAutocomplete] = useState('');

  const [offer, setOffer] = useState({
    name: name,
    picture: picture,
    quantity: quantity,
    description: description,
    startOffer: startOffer,
    endOffer: endOffer,
    initialPrice: initialPrice,
    soldedPrice: soldedPrice,
    category: category,
    shop: shop,
  });

  useEffect(() => {
    axios
    .get(`/api/shops/get`)
    .then((response) => {
      setShops(response.data);
    })
    .catch((error) => {
      console.log(error);
    });
  }, []);


  useEffect(() => {
    axios
      .get("/api/categories/get")
      .then((response) => {
        setCategories(response.data);
      })
      .catch((error) => {
        console.log(error);
      });
  }, []);

  function createOffer(offer) {
    event.preventDefault();
    axios
      .post("api/offers/set", offer)
      .then((response) => {
        console.log(response);
      })
      .catch((error) => {
        console.log(error);
      });
  }

  function handleSubmit(event) {
    event.preventDefault();
    setOffer(
      (offer.name = name),
      (offer.picture = picture),
      (offer.description = description),
      (offer.startOffer = startOffer),
      (offer.endOffer = endOffer),
      (offer.initialPrice = initialPrice),
      (offer.soldedPrice = soldedPrice),
      (offer.category = category),
      (offer.shop = shop),
      (offer.quantity = quantity)
    );

    createOffer(offer);
  }

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <TextField
          label="Titre de l'offre"
          value={name}
          onInput={(e) => setName(e.target.value)}
        />
        <TextField
          label="Description"
          value={description}
          onInput={(e) => setDescription(e.target.value)}
        />
        <TextField
          label="Url de l'image"
          value={picture}
          onInput={(e) => setPicture(e.target.value)}
        />
        <TextField
          label="Date de début de l'offre"
          value={startOffer}
          type="date"
          onInput={(e) => setStartOffer(e.target.value)}
        />
        <TextField
          label="Date de début de l'offre"
          value={endOffer}
          type="date"
          onInput={(e) => setEndOffer(e.target.value)}
        />
        <TextField
          label="Quantité"
          value={quantity}
          onInput={(e) => setQuantity(e.target.value)}
        />
        <TextField
          label="Prix initial"
          value={initialPrice}
          onInput={(e) => setInitialPrice(e.target.value)}
        />
        <TextField
          label="Prix soldé"
          value={soldedPrice}
          onInput={(e) => setSoldedPrice(e.target.value)}
        />

        <Autocomplete
          id="categories"
          options={categories}
          renderInput={(params) => (
            <TextField {...params} label="Catégorie" variant="outlined" />
          )}
          getOptionLabel={(option) => option.type}
          value={category}
          onChange={(_event, category) => {
            setCategory(category);
          }}
          
        />

        
        <Autocomplete
          id="shops"
          options={shops}
          renderInput={(params) => (
            <TextField {...params} label="Magasin" variant="outlined" />
          )}
          
          getOptionLabel={(option) => option.name + " - " + option.comNom}
          value={shop}
          onChange={(_event, shop) => {
            setShop(shop);
          }}/>

        

        <Button type="submit">Poster une annonce</Button>
      </form>
    </div>
  );
};

export default CreateOffer;
