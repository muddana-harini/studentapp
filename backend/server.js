// const { MongoClient } = require("mongodb");

// const client = new MongoClient("mongodb://localhost:27017");

// client.connect((err) => {
//   if (err) {
//     console.log(err);
//     return;
//   }

//   const db = client.db("studentdb");

//   const collection = db.collection("studentinfo");

//   collection.insertOne({ name: "John Doe" });

//   client.close();
// });

const express = require("express");
const mongoose = require("mongoose");
const app = express();

mongoose.connect("mongodb://127.0.0.1:27017/studentdb", {
    useNewUrlParser: true,
    useUnifiedTopology: true
})
    .then(() => {
        console.log("Successfully connected to MongoDB");
        app.listen(3000, () => {
            console.log("Listening on port 3000");
        });
    })
    .catch((err) => {
        console.error("Error connecting to MongoDB:", err);
    });