const express = require('express')
const app = express()

let model_rol = require('../model/rol')

app.get('/',  (req, res)=>{

    model_rol.getDataRol( (err, rolDB)=>{
        if(err){
            res.send({ message: 'Hubo un error', errors: err })
        }

        res.send({ message: 'Consutla exitosa', resultados: rolDB }).status(200)
    })
})

app.post('/', (req, res)=>{

    model_rol.insertRol( req.body, (newRol)=>{
        res.status(200).json({
            ok: true,
            message: 'Peticion Exitosa',
            results: newRol
        })
    })
})

module.exports = app