const db = require('../www/config')

let asyD = {
    getAll: async (data) => {
        if(db){
            let sql = `SELECT * FROM async`
            const GET_ROL = await db.query(sql, data, (err, results)=>{
                if(err) throw err;
                let data = GET_ROL.val()
                return data
            })
        }
    },

    insertData: async(data, newAsy)=>{
        if(db){
            let values = [ data.tema, data.descripcion]
            let sql = `INSERT INTO async(tema, descripcion) VALUES(?, ?)`          
            let asy = await db.query(sql, values, (err, result)=>{
                if(err) throw err;
                return newAsy(result) 
            })
        }
    },

    deleteData: async(id, deleteAsy)=>{
        if(db){
            let sql = `DELETE FROM async WHERE id_async = ?`
            let asy = await db.query(sql, id, (err, results)=>{
                if(err) throw err;
                deleteAsy(results)
            })
        }
    },

    updateData: async(data, updateAsy)=>{
        if(db){
            let values = [ data.tema, data.descripcion, data.id ]
            let sql = `UPDATE async SET tema = ?, descripcion = ? WHERE id_async = ?`
            let asy = await db.query(sql, values, (err, results)=>{
                if(err) throw err;
                updateAsy(results)
            })
        }
    }
}

module.exports = asyD;