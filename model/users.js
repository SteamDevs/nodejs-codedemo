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
        
        let values = [ data.nombre, data.apellido ]
        let sql = `INSERT INTO users(nombre, apellido) VALUES (?,?)`
        
        database.query(sql, values, (err, results)=>{
            if(err) throw err
            callback(results)
        })
        console.log(data)
    }
}

users.deleteUsers = (id, callback)=>{
    if(database){
        let sql = `DELETE FROM users WHERE id_users = ?`
        database.query(sql, id, (err, result)=>{
            if(err) throw err;
            callback(result)
        })
    }
}

users.updateUsers = (data, callback )=>{
    if(database){

        console.log(data);

        let values = [ data.nombre, data.apellido, data.id ]
        let sql = `UPDATE users SET nombre= ? , apellido= ? WHERE id_users = ?`
        database.query(sql, values,(err, results)=>{
            if(err) throw err;
            callback(results)
        })
    }
}

users.mergeTables = (data, callback)=>{
    if(database){

        /*let sqlx = `SELECT rol.id_rol, rol.tipo, rol.id_users
            FROM rol
                INNER JOIN users ON rol.id_users = users.id_users`
        
        let options = {sql: sqlx, nestTables: true}

        database.query(options, data, (err, results, fields)=>{
            if(err) throw err
            callback(results)
        })*/
        
       let user = {
           id_users : 1,
           nombre : "pablo",
           apellido: "hackobo"
       }
       
       let rol = {
           id_rol : 1 ,
           tipo: "admin",
           id_users: 1
       }

       for (let key in row) {
            if (key in user) user[key] = row[key];
            if (key in rol) rol[key] = row[key];
            console.log(row)
        }

     


    }
}


module.exports = users