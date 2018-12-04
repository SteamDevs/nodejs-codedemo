const db = require('../www/config')

let rol = {
    getAll: async (data) => {
        if(db){
            let sql = `SELECT * FROM rol`
            const GET_ROL = await db.query(sql, data, (err, results)=>{
                if(err) throw err;
                let data = GET_ROL.val()
                return data
            })
        }
    },

    insertData: async(data, newRol )=>{
        if(db){
            let values = [ data.tipo, data.id_users]
            let sql = `INSERT INTO rol(tipo, id_users) VALUES(?, ?)`          
            let rl = await db.query(sql, values, (err, result)=>{
                if(err) throw err;
                return newRol(result) 
            })
        }
    },

    deleteData: async(id)=>{
        console.log('llegaste a eliminar algun datos')
    },

    updateData: async(data)=>{
        console.log('Ibas a actualizar un dato')
    }
}

module.exports = rol;