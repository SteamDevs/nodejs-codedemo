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

app.post('/', async(req, res)=>{
    try {
        let rl = await asyncModel.insertData(req.body, (newAsync)=>{
            res.status(200).json({
                message: 'Consulta exitosa',
                results: newAsync 
            })    
        })            
    } catch (err) {
        return console.log(err);
    }
})


module.exports = app;