import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';
import { BrowserRouter } from "react-router-dom";
import{Auth0Provider} from '@auth0/auth0-react';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
 <Auth0Provider 
 domain="dev-y7tck8wullmrcvhl.us.auth0.com"
 clientId="MTJ1NRlPyYnB5jOxBss1XuelJITm9EIO"
 authorizationParams={{
   redirect_uri: window.location.origin}} >
   <BrowserRouter>
      
      <App />
    
    
</BrowserRouter>
 </Auth0Provider>
);