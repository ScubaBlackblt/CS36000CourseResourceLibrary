//Connect function
function connect(){
    var mysql = require('mysql');
    return mysql.createConnection({
        host: "localhost",
        user: "sqluser",
        password: "password",
        database: "courseresourcelibrary"
    });
}

function addUser(username, userPassword, classID, typeOfAccount)
{
    //Connect
    var con = connect();
    
    //Insert Info
    con.query("INSERT INTO user (username, userPassword, classID, typeOfAccount) VALUES (?);",
                [username, userPassword, classID, typeOfAccount]),
                function (err, result, fields) {

                };
}

function addRequest(userID, classID)
{
    //Connect
    var con = connect();

    //Insert Info
    con.query("INSERT INTO joinrequesttable (userID, classID) VALUES (?);", 
                [userID, classID]),
                function(err, result, fields) {

                };
}

function addJoined(userID, classID)
{
    //Connect
    var con = connect();

    //Insert Info
    con.query("INSERT INTO studentsjoined (userID, classID) VALUES (?);", 
                [userID, classID]),
                function(err, result, fields) {

                };
}