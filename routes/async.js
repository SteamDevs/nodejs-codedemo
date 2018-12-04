const express = require('express')
const app = express()
const asyncModel = require('../model/async')

app.get('/', async(req, res)=>{
    try {
        
        let asy = await asyncModel.getAll( (err, asyncDB)=>{
            if(err) res.send({message: 'eror de base de datos'})
            res.send({message: ' consulta exitosa', results: asyncDB })
        })

    } catch (err) {
        return console.log(err)
    }
})

app.post('/', async(req, res)=>{
    try {
        
        let asy = await asyncModel.insertData(req.body, (newAsync)=>{
            res.status(200).json({
                message: 'Consulta exitosa',
                results: newAsync 
            })    
        })

    } catch (err) {
        return console.log(err);
    }
})

app.delete('/:id', async(req, res)=>{
    try {
        
        let id = req.params.id

        let asy = await asyncModel.deleteData(id, (deleteData)=>{
            if(!deleteData){
                res.send({ message: 'No pasaste nada por parametro'})
            }
            
            res.status(200).json({
                ok: true,
                message: 'El resistro se elimino exitosamente',
                results: deleteData
            })
        })

    } catch (err) {
        return console.log(err)    
    }
})

app.put('/:id', async(req, res)=>{
    try {
        
        req.body.id = req.params.id

        let asy = await asyncModel.updateData(req.body, (updateData)=>{
            res.status(200).json({
                ok: true,
                message: 'Registro Actualizado',
                results: updateData
            })
        })
        
    } catch (err) {
        console.log(err)
    }
})


module.exports = app;