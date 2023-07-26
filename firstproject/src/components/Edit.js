import React, {useState} from "react";


const Edit = () => {

    const [selectedStudent, setSelectedStudent] = useState("");
    const [updatedDetails, setUpdatedDetails] = useState({
    name: '',
    address: '',
    dob: '',
});


const handleStudentSelect = (e) => {
    const studentName = e.target.value;
    setSelectedStudent(studentName);
    const student = students.find((student) => student.name === studentName);
    setUpdatedDetails({
        name: student.name,
        address: student.address,
        dob: student.dob,
    });
};

    const handleFormSubmit = (e) => {
        e.preventDefault();
        // Perform update logic using updatedDetails object
        console.log(updatedDetails);
    };

    return(
                <div className="container">
                    <h3>Edit Details</h3>
                    <form onSubmit={handleFormSubmit}>
                    <div>
                        
                        <label>Name:</label>
                        <input
                            type="text"
                            name="name"
                            value={updatedDetails.name}
                            onChange={(e) =>
                                setUpdatedDetails({ ...updatedDetails, name: e.target.value })
                            }
                        />
                    </div>
                    <div>
                        <label>Address:</label>
                        <input
                            type="text"
                            name="address"
                            value={updatedDetails.address}
                            onChange={(e) =>
                                setUpdatedDetails({ ...updatedDetails, address: e.target.value })
                            }
                        />
                    </div>
                    <div>
                        <label>Date of Birth:</label>
                        <input
                            type="date"
                            name="dob"
                            value={updatedDetails.dob}
                            onChange={(e) =>
                                setUpdatedDetails({ ...updatedDetails, dob: e.target.value })
                            }
                        />
                    </div>
                    </form>
                    
                    <button className="editdetails" type="submit">Update</button>
                </div>
    )
}

export default Edit;