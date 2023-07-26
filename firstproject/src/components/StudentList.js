import React, { useEffect, useState } from 'react';
import axios from 'axios';
import './StudentListStyle.css';
import { Link, useNavigate } from 'react-router-dom';

const StudentList = () => {

  const [searchTerm, setSearchTerm] = useState('');
  const [students, setStudents] = useState([]);

  useEffect(() => {
   // setStudents(response.data);
    fetchStudents();
  }, []);

  const fetchStudents = async () => {
    try {
      const response = await axios.get('http://localhost:8000/students');
      setStudents(response.data);
    } catch (error) {
      console.log(error);
    }
  };

  const handleStudentNameChange = (e) => {
    const searchTerm = e.target.value;
    setSearchTerm(searchTerm);
  };

//   const handleStudentLastNameChange = (e) => {
//     const searchTerm = e.target.value;
//     setSearchTerm(searchTerm);
//  };


  const handleFormSubmit = (e) => {
    e.preventDefault();
    setSearchTerm('');
  };

//   const handleDeleteClick = (studentId) => {
//     const data = { id: studentId };

//     fetch('http://localhost:8000/deletestudents', {
//       method: 'DELETE',
//       headers: {
//         'Content-Type': 'application/json',
//       },
//       body: JSON.stringify(data),
//     })
//       .then((response) => {
//         if (response.ok) {
//           return response.json();
//         } else {
//           throw new Error('Failed to delete student record');
//         }
//       })
//       .then((data) => {
//         console.log('Student record deleted successfully', data);
//         setStudents(data);
//       })
//       .catch((error) => {
//         console.error('Error:', error);
//       });
//   };

const handleDeleteClick = (studentId) => {
    const data = { id: studentId };
  
    axios
      .delete('http://localhost:8000/deletestudents', {
        headers: {
          'Content-Type': 'application/json',
        },
        data: data,
      })
      .then((response) => {
        console.log('Student record deleted successfully', response.data);
        fetchStudents(); // Fetch the updated list of students
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  };

  const filteredStudents = students.filter((student) => {
    const fullName = `${student.firstName} ${student.lastName}`.toLowerCase();
    const searchTermLower = searchTerm.toLowerCase();
    return fullName.includes(searchTermLower);
  });


  return (
    <div className="editpage">
      <h2>Search student information</h2>
      <Link to="/create">
        <button className="studentbutton">Create Student</button>
      </Link>
      <form onSubmit={handleFormSubmit}>
        <div className="getdetails">
          <label>Student Name:</label>
          <input
            type="text"
            placeholder="Search by student name"
            onChange={handleStudentNameChange}
          />
        </div>
        <div>
          <table className="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              {filteredStudents.map((student) => (
                <tr key={student._id}>
                  <td>
                    <div className="name-container">
                      <span className="name-firstname">{student.firstName}</span>
                      <span className="name-space"> </span>
                      <span className="name-lastname">{student.lastName}</span>
                    </div>
                  </td>
                  <td>
                    <div className="addressline1">{student.addressLine1}</div>
                    <div className="addressline2">{student.addressLine2}</div>
                    <div className="city">{student.city}</div>
                    <div className="zip">{student.zip}</div>
                    <div className="state">{student.state}</div>
                  </td>
                  <td>
                    {new Date(student.dateOfBirth).toLocaleDateString('en-US')}
                    {/* {student.dateOfBirth} */}
                  </td>
                  <td>{student.gender}</td>
                  <td>
                    <Link to={`/update/${student._id}`}>
                      <button className="editButton">Edit</button>
                    </Link>
                    <br />
                    <button
                      className="deleteButton"
                      onClick={() => handleDeleteClick(student._id)}>Delete
                    </button>
                  </td>
                </tr>
              ))}
              {filteredStudents.length === 0 && (
                <tr>
                  <td colSpan="5">No students available</td>
                </tr>
              )}
            </tbody>
          </table>
        </div>
      </form>
    </div>
  );
  
};



export default StudentList;
