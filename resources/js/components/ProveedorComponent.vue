<template>
<div>
  <div class="row">
    <div class="col">
    <label>Nombres</label>
    <input v-model="nombre" type="text" placeholder="DNI" class="form-control">
    </div>
    <div class="col">
    <label>Apellidos</label>
    <input v-model="apellido" type="text" placeholder="Apellido y Nombre" class="form-control">
    </div>
    <div class="col">
    <label>DNI</label>
    <input v-model="dni" type="text" class="form-control">
    </div>
     <div class="col-md-2">
    <label>Empresa</label>
    <input v-model="empresa" type="text" class="form-control">
    </div>
     <div class="col-md-2">
    <label>Direccion</label>
    <input v-model="empresa" type="text" class="form-control">
    </div>
    <div class="col-md-2">
    <label>Telefono</label>
    <input v-model="empresa" type="text" class="form-control">
    </div>
<div class="col-md-12">
    <br>
        <div class="container-buttons">
    <button  class="btn btn-outline-primary" @click="buscar()">Buscar</button>
                    <button v-if="update == 0" @click="saveTasks()" class="btn btn-outline-success">Añadir</button>
                    <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                    <button v-if="update != 0" @click="updateTasks()" class="btn btn-outline-warning">Actualizar</button>
                    <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                    <button v-if="update != 0" @click="clearFields()" class="btn btn-outline-danger">Atrás</button>
        </div>
</div>
            <div class="col-md-12">
                <br>
                <h2>Vendedor</h2>
                <table class="table text-center"><!--Creamos una tabla que mostrará todas las tareas-->
                        <thead>
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                 <th scope="col">DNI</th>
                                  <th scope="col">Empresa</th>
                                     <th scope="col">Direccion</th>
                                  <th scope="col">Telefono</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="task in arrayTasks" :key="task.id"> <!--Recorremos el array y cargamos nuestra tabla-->
                                 <td v-text="task.nombre"></td>
                                <td v-text="task.apellido"></td>
                                 <td v-text="task.dni"></td>
                                 <td v-text="task.empresa"></td>
                                  <td v-text="task.direccion"></td>
                                 <td v-text="task.telefono"></td>
                                <td>
                                  <button class="btn btn-outline-info btn-sm" @click="loadFieldsUpdate(task)">Modificar</button>
                                    <!--Botón que borra la tarea que seleccionemos-->
                                    <button class="btn btn-outline-danger btn-sm" @click="deleteTask(task)">Borrar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>

  </div>
</div>






</template>
<script>
    export default {
        data(){
            return{
                nombre:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                apellido:"",
                dni:"",
                empresa:"",
                direccion:"",
                telefono:"",
                
                update:0, /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado
                          ninguna tarea, pero si es diferente de 0 entonces tendrá el id de la tarea y no mostrará el boton guardar sino el modificar*/
                arrayTasks:[], //Este array contendrá las tareas de nuestra bd
            }
        },
        methods:{

 buscar(){
            const TOKEN ='ea1febefd57fdfe7131ee616d30d58cf7a9ce413422d97fb31b073ffb10df462'
            const BASEURL = 'https://apiperu.dev/api/';
            const ENDPOINT = 'dni';
            //const dniB = { dni: this.dni };
            axios.create({
            baseURL: BASEURL,
            headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer '+TOKEN

            }

            })

            .get(ENDPOINT+'/'+this.dni+'?'+TOKEN)

            .then(res => {

            //ira la modificacion de los datos
         
          this.nombre=res.data.data.nombres;
          this.apellido=res.data.data.apellido_paterno+" "+res.data.data.apellido_materno;
          this.direccion=res.data.data.direccion_completa;
          //this.txtdireccion="Ira el direccion";

         // this.txtemail="Ira el email";
            console.log(res.data.data);

            });

            //alert("Buscar:"+this.dni);

            },
            
            getTasks(){
                let me =this;
                let url = '/proveedor' //Ruta que hemos creado para que nos devuelva todas las nombre
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.arrayTasks = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            saveTasks(){
                let me =this;
                let url = '/proveedor/guardar' //Ruta que hemos creado para enviar una tarea y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                    'nombre':this.nombre,
                    'apellido':this.apellido,
                    'dni':this.dni,
                    'empresa':this.empresa,
                    'direccion':this.direccion,
                    'celular':this.celular,
                   

                }).then(function (response) {
                    me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });   

            },
            updateTasks(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
                let me = this;
                axios.put('/proveedor/actualizar',{
                    'idproveedor':this.update,
                    'nombre':this.nombre,
                    'apellido':this.apellido,
                    'dni':this.dni,
                    'empresa':this.empresa,
                    'direccion':this.direccion,
                    'celular':this.celular,
                    

                }).then(function (response) {
                   me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                   me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
                this.update = data.idproveedor
                let me =this;
                let url = '/proveedor/buscar?idproveedor='+this.update;
                axios.get(url).then(function (response) {
                    me.apellido= response.data.apellido;
                    me.dni= response.data.dni;
                    me.nombre= response.data.nombre;
                    me.empresa= response.data.empresa;
                  

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                }); 
            },
            deleteTask(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegidproveedoro
                let me =this;
                let task_id = data.idproveedor
                if (confirm('¿Seguro que deseas borrar esta tarea?')) {
                    axios.delete('/proveedor/borrar/'+task_id
                    ).then(function (response) {
                        me.getTasks();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }
            },
            clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.apellido = "";
                this.dni = "";
                this.nombre = "";
                this.empresa = "";
          

                this.update = 0;
            }
        },
        mounted() {
           this.getTasks();
        }
    }
</script>

