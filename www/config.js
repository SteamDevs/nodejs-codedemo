const mysql = require('mysql');

let params = {
    host     : 'localhost',
    user     : 'root',
    password : '',
    database : 'kinal'
}

let conn = mysql.createConnection(params);

module.exports = conn;
