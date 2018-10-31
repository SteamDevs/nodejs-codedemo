const database = require('../www/config')

let rol = {}

rol.getDataRol = (data, callback)=>{
    if(database){
        let sql = `SELECT * FROM rol`
        database.query(sql, data, (err, results)=>{
            if (err) throw err;
            callback(results)
        })
    }
}


rol.insertRol = (data, callback)=>{
    if(database){
        let values = [ data.tipo, data.id_users ]
        let sql = `INSERT INTO rol(tipo, id_users) VALUES(?, ?)`
        database.query( sql, values, (err, results)=>{
            if (err) throw err;
            callback(results)
        })
    }
}

module.exports = rol