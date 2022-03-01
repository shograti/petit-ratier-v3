import React, {useState} from "react";
import { TextField, Button} from '@mui/material';
import axios from "axios";


const Register = () => {
    const [pseudo, setPseudo] = useState('')
    const [email, setEmail] = useState('')
    const [firstName, setFirstName] = useState('')
    const [lastName, setLastName] = useState('')
    const [birthdate, setBirthdate] = useState('')
    const [profilePic, setProfilePic] = useState('')
    const [password, setPassword] = useState('')
    const [isSuccessfullyRegistered, setIsSuccessfullyRegistered] = useState()

    const [user, setUser] = useState({
        pseudo:pseudo,
        email:email,
        firstName:firstName,
        lastName:lastName,
        birthdate:birthdate,
        profilePic:profilePic,
        password:password

    })

    function createUser(user){
        event.preventDefault();
        axios.post('api/register',user)
            .then(response => {
                console.log(response)
                if (response.status === 200) {
                    setIsSuccessfullyRegistered(true);
                 } else {
                    setIsSuccessfullyRegistered(false);
                 }
                })
            .catch(error => {
                console.log(error);
            })
        
        
    
    }

    function handleSubmit(event) {
        event.preventDefault();
        setUser(user.pseudo=pseudo,
            user.email=email,
            user.firstName=firstName,
            user.lastName=lastName,
            user.birthdate=birthdate,
            user.profilePic=profilePic,
            user.password=password)

            createUser(user)
    
    }



    return ( 
         <div>
         
                <form onSubmit={handleSubmit} >
                    <TextField label='Pseudo' value={pseudo} onInput={ e=>setPseudo(e.target.value)}/>
                    <TextField label='Email' value={email} onInput={ e=>setEmail(e.target.value)}/>
                    <TextField label='Mot de passe' value={password} onInput={ e=>setPassword(e.target.value)}/>
                    <TextField label='Prénom' value={firstName} onInput={ e=>setFirstName(e.target.value)}/>
                    <TextField label='Nom' value={lastName} onInput={ e=>setLastName(e.target.value)}/>
                    <TextField label='Date de naissance' value={birthdate} type="date" onInput={ e=>setBirthdate(e.target.value)}/>
                    <TextField label='Avatar' value={profilePic} onInput={ e=>setProfilePic(e.target.value)}/>
                   
                    <Button type="submit">S'inscrire</Button>

 
                </form>

           
        </div>
    );
}
 
export default Register;