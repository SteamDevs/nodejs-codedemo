const database = require('../www/config')

let login = {}

//Auth
login.auth = (data, callback)=>{
    if(database){
        let sql = `SELECT * FROM users WHERE nombre = ? AND apellido = ?`
        let values = [data.nombre, data.apellido ]
        database.query(sql, values, (err, results)=>{
            if(err) throw err;
            callback(null, results)
        })                              
    }
} 


module.exports = login
