<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="content">
          <p>Hola este es un componente solo de lista</p>
          <table class="table">
            <thead>
              <td>NombresP</td>
              <td>Descripcion</td>
              <td>cantidad</td>
               <td>precio</td>
            </thead>
            <tbody>
              <tr v-for="seleccion in productos" :key="seleccion.idproducto">
                <td>{{ seleccion.nombrepro }}</td>
                <td>{{ seleccion.descripcion }}</td>
                <td>{{ seleccion.cantidad }}</td>
                <td>{{ seleccion.precio }}</td>
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
      productos: [],
    };
  },
  methods: {
    listar() {
      let me = this;
      let url = "/producto-vue/lista";
      axios
        .get(url)
        .then(function (response) {
          //creamos un array y guardamos el contenido
          console.log(response.data);
          me.productos = response.data;
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },
  },
  mounted() {
    this.listar();
    console.log("Component mounted." + this.productos);
  },
};
</script>