import React, { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import axios from 'axios';
import './createstyle.css';
import { Link } from 'react-router-dom';

const Update = () => {
  const { id } = useParams();
  const navigate = useNavigate();

  const [firstName, setFirstName] = useState('');
  const [lastName, setLastName] = useState('');
  const [dob, setDob] = useState('');
  const [gender, setGender] = useState('');
  const [addressLine1, setAddressLine1] = useState('');
  const [addressLine2, setAddressLine2] = useState('');
  const [city, setCity] = useState('');
  const [state,setState]= useState('');
  const [zip, setZip] = useState('');

  useEffect(() => {
    getStudentDetails(id);
  }, [id]);


 const getStudentDetails = async (studentId) => {
  try {
    const response = await axios.get(`http://localhost:8000/onestudents/${studentId}`);
    const student = response.data;

    setFirstName(student.firstName || '');
    setLastName(student.lastName || '');
    setAddressLine1(student.addressLine1 || '');
    setAddressLine2(student.addressLine2 || '');
    setGender(student.gender || '');
    setCity(student.city || '');
    setState(student.state || '');
    setZip(student.zip || '');
    // setDob(student.dateofBirth || '');

    const dbDate = student.dateOfBirth;
    const formattedDate = new Date(dbDate).toLocaleDateString('en-US');
    setDob(formattedDate || '');
     } catch (error) {
        console.error('Error:', error);
      }

};
  

const handleFirstNameChange = (e) => {
  setFirstName(e.target.value);
};

const handleLastNameChange = (e) => {
  setLastName(e.target.value);
};


const handleAddressLine1Change = (e) => {
  setAddressLine1(e.target.value);
};

const handleAddressLine2Change = (e) => {
  setAddressLine2(e.target.value);
};

const handleCityChange = (e) => {
  setCity(e.target.value);
};

const handleStateChange = (e) => {
  setState(e.target.value);
};

const handleZipChange = (e) => {
  setZip(e.target.value);
};

const handleGenderChange = (e) => {
  setGender(e.target.value);
};

const handleDobChange = (e) => {
  setDob(e.target.value);
};

// const handleDobChange = (e) => {
//   const inputDate = e.target.value;
//   const [month, day, year] = inputDate.split('-') ? '-' : '/';
//   const formattedDate = `${year}-${month}-${day}`;
//   setDob(formattedDate);
// };

  

  const handleSubmit = (e) => {
    e.preventDefault();

    const formData = {
      firstName: firstName,
      lastName: lastName,
      addressLine1: addressLine1,
      addressLine2: addressLine2,
      city: city,
      zip: zip,
      state: state,
      dateOfBirth: dob,
      gender: gender,
    };

    axios
      .put(`http://localhost:8000/editstudents/${id}`, formData, {
        headers: {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*',
        },
      })
      .then(() => {
        console.log('Student details updated successfully!');
        navigate('/');
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  };

  return (
    <div className="createpage">

        <div className="container">
          <Link to="/"><button className="detailsbutton">View Student Details</button></Link>

          <h2>Register</h2>
          <form onSubmit={handleSubmit}>
            <div>
              <label>First Name:</label>
              <input type="text" placeholder="First Name" value={firstName} onChange={handleFirstNameChange}
              minLength={3} maxLength={25} />
            </div>
            <div>
              <label>Last Name:</label>
              <input type="text" placeholder="Last Name" value={lastName} onChange={handleLastNameChange}
              minLength={3} maxLength={35} />
            </div>
            <div>
              <label>Address Line 1:</label>
              <input type="text" placeholder="Address Line 1" value={addressLine1} onChange={handleAddressLine1Change}
              maxLength={60} />
            </div>
            <div>
              <label>Address Line 2:</label>
              <input type="text" placeholder="Address Line 2" value={addressLine2} onChange={handleAddressLine2Change}
              maxLength={60} />
            </div>
            <div>
            <label>City:</label>
            <input
              type="text"
              placeholder="City"
              value={city}
              onChange={handleCityChange}
              maxLength={60}
            />
            </div>
            <div>
            <label>Zip:</label>
            <input
              type="text"
              placeholder="Zip"
              value={zip}
              onChange={handleZipChange}
              pattern="^\d{5}(-\d{4})?$"
            />
            </div>
            <div>
            <label>State:</label>
            <select value={state} onChange={handleStateChange}>
              <option value="">Select State</option>
              {/* Add options for all 50 states */}
              <option value="">Select state</option>
    <option value="AL">Alabama</option>
    <option value="AK">Alaska</option>
    <option value="AS">American Samoa</option>
    <option value="AZ">Arizona</option>
    <option value="AR">Arkansas</option>
    <option value="UM-81">Baker Island</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DE">Delaware</option>
    <option value="DC">District of Columbia</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="GU">Guam</option>
    <option value="HI">Hawaii</option>
    <option value="UM-84">Howland Island</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
    <option value="IA">Iowa</option>
    <option value="UM-86">Jarvis Island</option>
    <option value="UM-67">Johnston Atoll</option>
    <option value="KS">Kansas</option>
    <option value="KY">Kentucky</option>
    <option value="UM-89">Kingman Reef</option>
    <option value="LA">Louisiana</option>
    <option value="ME">Maine</option>
    <option value="MD">Maryland</option>
    <option value="MA">Massachusetts</option>
    <option value="MI">Michigan</option>
    <option value="UM-71">Midway Atoll</option>
    <option value="MN">Minnesota</option>
    <option value="MS">Mississippi</option>
    <option value="MO">Missouri</option>
    <option value="MT">Montana</option>
    <option value="UM-76">Navassa Island</option>
    <option value="NE">Nebraska</option>
    <option value="NV">Nevada</option>
    <option value="NH">New Hampshire</option>
    <option value="NJ">New Jersey</option>
    <option value="NM">New Mexico</option>
    <option value="NY">New York</option>
    <option value="NC">North Carolina</option>
    <option value="ND">North Dakota</option>
    <option value="MP">Northern Mariana Islands</option>
    <option value="OH">Ohio</option>
    <option value="OK">Oklahoma</option>
    <option value="OR">Oregon</option>
    <option value="UM-95">Palmyra Atoll</option>
    <option value="PA">Pennsylvania</option>
    <option value="PR">Puerto Rico</option>
    <option value="RI">Rhode Island</option>
    <option value="SC">South Carolina</option>
    <option value="SD">South Dakota</option>
    <option value="TN">Tennessee</option>
    <option value="TX">Texas</option>
    <option value="UM">United States Minor Outlying Islands</option>
    <option value="VI">United States Virgin Islands</option>
    <option value="UT">Utah</option>
    <option value="VT">Vermont</option>
    <option value="VA">Virginia</option>
    <option value="UM-79">Wake Island</option>
    <option value="WA">Washington</option>
    <option value="WV">West Virginia</option>
    <option value="WI">Wisconsin</option>
    <option value="WY">Wyoming</option>
            </select>
            </div>
           
            <div>
              <label>DOB:</label>
              <input
                  /*type="text"
                  placeholder="mm/dd/yyyy"
                  pattern="(0[1-9]|1[0-2])/(0[1-9]|[12][0-9]|3[01])/(\d{4})"
                  value={dob ? new Date(dob).toLocaleDateString('en-US') : ''}
                  onChange={handleDobChange}*/
                  type="text" placeholder="mm/dd/yyyy" value={dob} onChange={handleDobChange}
              />
              </div>
              
              <div>
               <label>Gender:</label>
               <select value={gender} onChange={handleGenderChange}>
               <option value="">Select Gender</option>
               <option value="female">Female</option>
               <option value="male">Male</option>
               <option value="unknown">Unknown</option>
               </select>
               </div>

            <button className="registration" type="submit">Update Information</button>
          </form>
        </div>
    </div>

  );

};

export default Update;
