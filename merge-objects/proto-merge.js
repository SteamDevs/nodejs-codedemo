var inventario = [
    {
        nombre: 'manzanas', cantidad: 2, id_cat : 7
    },
    {
        nombre: 'bananas', cantidad: 0, id_cat : 4
    },
    {
        nombre: 'cerezas', cantidad: 5, id_cat : 3
    }
];

var categorias = [
    {
        nombre_categoria: 'frutas normales'        
    },
    {
        nombre_categoria : 'furtas +1'
    }
]


var users = [
    {
        id_user: 1,
        name: "foo",
        last_name: "bar",
        id_rol : {
            id_rol: 1,
            rol_name: 'admin'
        }
    },
    {
        id_user: 2,
        name: "foo2",
        last_name: "bar2",
        id_rol : {
            id_rol: 2,
            rol_name: 'reporter'
        }
    }
]



console.log(JSON.stringify(users))







/*inventario.forEach( (key, val )=>{

    console.log(`position ${ JSON.stringify(key.id_cat)} y el valor es ${val} `)
    inventario.push( categorias.id_cat )
    console.log(inventario)

})*/
