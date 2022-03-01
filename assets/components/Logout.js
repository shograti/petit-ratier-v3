import React, {useEffect} from 'react'
import axios from 'axios';

const Logout = () => {
    useEffect(() => {
        axios
          .post("/logout")
          .then((response) => {
            console.log(response)
          })
          .catch((error) => {
            console.log(error);
          });
      },[]);
    
    return ( <></> );
}
 
export default Logout;