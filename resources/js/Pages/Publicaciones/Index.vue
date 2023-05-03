<template>
    <div>
     Listado de publicaciones
      <ul>
        <li v-for="publicacion in publicaciones" :key="publicacion.id">
          {{ publicacion.contenido }}
          <button @click="darMeGusta(publicacion.id)">Me Gusta</button>
          <button @click="agregarComentario(publicacion.id)">Agregar Comentario</button>
          <ul>
          <li v-for="comentario in publicacion.comentarios" :key="comentario.id">
            {{ comentario.contenido }}
          </li>
        </ul>
        </li>
        
      </ul>
  
      <!-- Mostrar formulario para agregar comentario -->
      <div v-if="mostrarFormularioComentario">
        <input v-model="nuevoComentario" type="text" placeholder="Nuevo Comentario">
        <button @click="guardarComentario">Guardar</button>
      </div>
    </div>
  </template>
  
  <script>
  
  import axios from "axios";

  export default {
    data() {
      return {
        publicaciones: [], // Lista de publicaciones
        mostrarFormularioComentario: false, // Indicador para mostrar/ocultar formulario de comentario
        nuevoComentario: '', // Nuevo comentario a agregar
        cual_publi: 0,
      };
    },
    mounted() {
      this.obtenerPublicaciones(); // Llamar a la función para obtener las publicaciones al cargar el componente
    },
    computed:{
      
    },
    methods: {  
      obtenerPublicaciones() {        
        axios.get('/obtenerpublicaciones')
          .then((response) => {            
            this.publicaciones = response.data;
          })
          .catch((error) => {
            console.error(error);
          });
      },    
      darMeGusta(id) {
        // Llamada a la API para dar "Me Gusta" a una publicación
        axios.post(`/publicaciones/${id}/me-gusta`)
          .then(() => {
            // Actualizar la vista o realizar acciones adicionales después de dar "Me Gusta"
            // ...
          })
          .catch((error) => {
            console.error(error);
          });
      },
      agregarComentario(id) {
        this.mostrarFormularioComentario = true;
        this.cual_publi = id
      },
      guardarComentario() {
        // Llamada a la API para guardar un nuevo comentario
        console.log(this);
        axios.post('/comentarios', { contenido: this.nuevoComentario, publicacion_id:  this.cual_publi})
          .then((response) => {           
            const index = this.publicaciones.findIndex(publicacion => publicacion.id === this.cual_publi);
            
            if (index > -1) {              
              this.publicaciones[index].comentarios=response.data.datos
            }
            this.mostrarFormularioComentario = false; // Ocultar formulario de comentario después de guardar
            this.nuevoComentario = ''; // Limpiar el campo de nuevo comentario
            
          })
          .catch((error) => {
            console.error(error);
          });
      },
    },
  };
  </script>
  