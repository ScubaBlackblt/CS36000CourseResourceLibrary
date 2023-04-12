var mysql = require('mysql');

async function getUser(username)
{
    return new Promise(data =>
        con.query("SELECT * FROM user WHERE username = ?", [username] ,
         function(err, result, fields) {
            data(result[0]);
        }));
        console.log("test");
}


async function getClassesJoined(classID, userID)
{
    return new Promise(data =>
            con.query("SELECT * FROM studentsjoined WHERE classID = ?, userID = ?", [classID, userID] ,
            function(err, result, fields) {
                data(result);
            }));
}

async function getJoinRequest(classID)
{
    return new Promise(data =>
            con.query("SELECT * FROM joinrequesttable WHERE classID = ?", [classID] ,
            function(err, result, fields) {
                data(result);
            }));
}

async function loadRequests(classID)
{
    //Connect to database
    //Change to local values for database
    con = mysql.createConnection({
        host: "localhost",
        user: "sqluser",
        password: "password",
        database: "courseResourceLibrary"
    });

    //Check to see if connected
    con.connect(function(err) {
    if (err) callback(err, null);
    console.log("Connected!");
    });

    //Get join request data
    var joinRequests = await getJoinRequest(classID);

    //End connection
    con.end();
}


async function login(username, password)
{
    //Connect to database
    //Change to local values for database
    con = mysql.createConnection({
        host: "localhost",
        user: "sqluser",
        password: "password",
        database: "courseResourceLibrary"
    });

    //Check to see if connected
  con.connect(function(err) {
    if (err) callback(err, null);
    console.log("Connected!");
  });


  //Get User
  var user = await getUser(username);

  //**********Check password***********
  

  //Get Students Joined
  var classesJoined = await getClassesJoined(classID);

  //End connection
  con.end();
}

login(username, password);
loadRequests(classID);

