const express = require('express')
const app = express()

let model_rol = require('../model/rol')

app.get('/',  async (req, res)=>{
    try {
        let rl = await model_rol.getDataRol( (err, rolDB)=>{
            if(err) res.send({message: 'eror de base de datos'})
            res.send({message: ' consulta exitosa', results: rolDB })
        })
    } catch (err) {
        console.log(err);
    }
})

app.post('/', async (req, res)=>{
    try {
        let rl = await model_rol.insertRol(req.body, (newRol)=>{
            res.status(200).json({
                ok: true,
                message: 'Consulta exitosa',
                results: newRol
            })
        })
    } catch (err) {
        console.log(err)
    }
})

module.exports = app