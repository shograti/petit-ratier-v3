import React from 'react'
import ReactDOM from 'react-dom'
import HomePage from './components/HomePage'
import { BrowserRouter,Routes, Route } from 'react-router-dom'
import CreateOffer from './components/CreateOffer'
import Register from './components/Register'

 class App extends React.Component {
  render() {
    return (
      
      <BrowserRouter>
      <Routes>
      
        <Route path="/" element={<HomePage/>}/>
        <Route path="poster-une-annonce" element={<CreateOffer/>}/>
        <Route path="inscription" element={<Register/>}/>

      </Routes>
      </BrowserRouter>
      
      
    )
  }
}

ReactDOM.render(<App/>, document.getElementById('root'));