<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="content">
          <p>Hola este es un componente solo de lista</p>
          <table class="table">
            <thead>
              <td>DNI1</td>
              <td>Nombres</td>
              <td>Apellido</td>
              <td>Direccion</td>
               <td>Email</td>
            </thead>
            <tbody>
              <tr v-for="seleccion in clientes" :key="seleccion.idcliente">
                <td>{{ seleccion.dni }}</td>
                <td>{{ seleccion.nombre }}</td>
                <td>{{ seleccion.apellido }}</td>
                <td>{{ seleccion.direccion }}</td>
                <td>{{ seleccion.email }}</td>
              </tr>
            </tbody>
          </table>


        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      clientes: [],
    };
  },
  methods: {
    listar() {
      let me = this;
      let url = "/cliente-vue/lista";
      axios
        .get(url)
        .then(function (response) {
          //creamos un array y guardamos el contenido
          console.log(response.data);
          me.clientes = response.data;
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },
  },
  mounted() {
    this.listar();
    console.log("Component mounted." + this.clientes);
  },
};
</script>
