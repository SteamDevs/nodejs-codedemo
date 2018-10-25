let database = require('../www/config');

let users = {}

users.getInfo = (data, callback)=>{
    if(database){
        let sql = `SELECT * FROM users`
        database.query(sql, data, (err, results )=>{
            if (err) throw errr;
            callback(results)
        })
    }
}

module.exports = users