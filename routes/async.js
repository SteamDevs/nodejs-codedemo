const express = require('express')
const app = express()
const asyncModel = require('../model/async')

app.get('/', async(req, res)=>{
    try {
        let rl = await asyncModel.getAll( (err, asyncDB)=>{
            if(err) res.send({message: 'eror de base de datos'})
            res.send({message: ' consulta exitosa', results: asyncDB })
        })
    } catch (err) {
        console.log(err)
    }
})


module.exports = app;