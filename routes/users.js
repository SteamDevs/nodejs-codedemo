const express = require('express')
let app = express();

let model_user = require('../model/users')

app.get('/', (req, res)=>{

    model_user.getInfo( (err, userDB)=>{
        if(err){
            res.status(400).json({
                ok: false,
                message: 'Error de base de datos',
                errors: err
            })            
        }
        res.send({ message: 'Consulta exitosa', results: userDB })
    })
})


module.exports = app;