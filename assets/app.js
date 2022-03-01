import React from 'react'
import ReactDOM from 'react-dom'
import HomePage from './components/HomePage'
import { BrowserRouter,Routes, Route } from 'react-router-dom'
import CreateOffer from './components/CreateOffer'
import Register from './components/Register'
import Login from './components/Login'
import Logout from './components/Logout'
 class App extends React.Component {
  render() {
    return (
      
      <BrowserRouter>
      <Routes>
      
        <Route path="accueil" element={<HomePage/>}/>
        <Route path="poster-une-annonce" element={<CreateOffer/>}/>
        <Route path="inscription" element={<Register/>}/>
        <Route path="connexion"  element={<Login/>}/>
        <Route path="deconnexion"  element={<Logout/>}/>

      </Routes>
      </BrowserRouter>
      
      
    )
  }
}

ReactDOM.render(<App/>, document.getElementById('root'));