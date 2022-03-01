import React, {useState} from "react";
import { TextField, Button } from '@mui/material';
import axios from "axios";

const Login = () => {
    const [emailUser, setEmailUser] = useState('')
    const [passwordUser, setPasswordUser] = useState('')
    const [loggedIn, setLoggedIn] = useState(false)
 

    function login(){
        event.preventDefault();
        axios.post('api/login',{emailUser:emailUser,
            passwordUser:passwordUser
        })
            .then(response => {
                console.log(response)
                setLoggedIn(true)
                })
            .catch(error => {
                console.log(error);
            })    
    }

  return (
    <div>
        <form onSubmit={login} action="">
      <TextField
        label="Email"
        value={emailUser}
        onInput={(e) => setEmailUser(e.target.value)}
      />
      <TextField
        label="Mot de passe"
        value={passwordUser}
        onInput={(e) => setPasswordUser(e.target.value)}
      />
      <Button type="submit">Se connecter</Button>
      </form>


    </div>
    
    
  );
};

export default Login;
