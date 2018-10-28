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

users.getId = (id, callback )=>{
    if(database){
        let sql = `SELECT * FROM users WHERE id_users = ?`
        database.query(sql, id, (err, results)=>{
            if (err) throw errr;
            callback(null, results)
        })
    }
}

users.insertData = (data, callback )=>{
    if(database){
        let sql = `INSERT INTO users(nombre, apellido) VALUES (?,?)`
        database.query(sql, data, (err, results)=>{
            if(err) throw err
            callback(results)
        })
    }
}

users.updateData = (data, callback)=>{
    if(database){
        let values = [ data.nombre, data.apellido, data.id ]
        let sql = `UPDATE users SET nombre =?, apellido=? WHERE id_users = ?`
        database.query(sql, values, (err, results)=>{
            if(err) throw err
            callback(results)
        })
    }
}

module.exports = users