import { Routes, Route } from "react-router-dom"
import React from "react"
import Create from "./components/create"
import StudentList from "./components/StudentList"
import Update from "./components/Update"
import { useAuth0 } from "@auth0/auth0-react";
import LoginButton from "./components/LoginButton";
import LogOutButton from "./components/LogOutButton";

function App() {
  
  const { isAuthenticated, isLoading } = useAuth0();

  if (isLoading) {
    return <div>Loading ...</div>;
  }

  return (
     <div>
       {
  isAuthenticated && (
    <div>
        <p>You are logged in!</p>
      <div className="App">
      <Routes>
        
        <Route path="create" element={ <Create/> } />
        <Route path="/" element={ <StudentList/> } />
        <Route  path="/update/:id" element={ <Update/> } />
      </Routes>
    </div>
    <LogOutButton/>
    </div>
     )
 }
 {!isAuthenticated && (
  <div>
  <p>You are not logged in</p>
    <LoginButton/>
  </div>
 )}
     </div>
  )
}

// <Route path="/" element={ <Home/> } />
//import Home from "./components/home"
export default App