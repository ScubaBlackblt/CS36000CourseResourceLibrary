var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "sqluser",
  password: "password",
  database: "courseresourcelibrary"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});