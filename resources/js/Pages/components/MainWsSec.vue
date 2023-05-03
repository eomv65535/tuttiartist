<template>
    <div class="main-ws-sec">
        <div class="posts-section">
            <div class="post-bar" v-for="publicacion in publicaciones" :key="publicacion.id">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img :src="publicacion.users.foto" alt="">
                        <div class="usy-name">
                            <h3>{{ publicacion.users.name }}</h3>
                            <span><img src="images/clock.png" alt="">{{ createdDate(publicacion.created_at) }}</span>
                        </div>
                    </div>
                </div>
                <div class="epi-sec">
                    <ul class="bk-links">
                        <li>&nbsp;</li>
                    </ul>
                </div>
                <div class="job_descp">
                    {{ publicacion.contenido }}
                    <p>&nbsp;</p>
                </div>
                <div class="job-status-bar">
                    <a href="#"><i class="fas fa-heart"></i>Likes 50</a>
                </div>
                <div class="comment-section" v-if="usuario">
                    <div class="sd-title">
                        <h3>Comments</h3>
                    </div>
                    <p>&nbsp;</p>
                    <div class="comment-sec">
                        <ul>
                            <li v-for="comentario in publicacion.comentarios" :key="comentario.id">
                                <div class="comment-list">
                                    <div class="bg-img">
                                        <img :src="comentario.users.foto" alt="">
                                    </div>
                                    <div class="comment">
                                        <h3>{{ comentario.users.name }}</h3>
                                        <span><img src="images/clock.png" alt=""> {{ createdDate(comentario.created_at)
                                        }}</span>
                                        {{ comentario.contenido }}
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="post-comment" v-if="usuario">
                        <div class="cm_img">
                            <img :src="usuario.foto" alt="">
                        </div>
                        <div class="comment_box">
                            <form>
                                <input v-model="nuevoComentario" type="text" placeholder="Post a comment">
                                <button @click="guardarComentario">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import axios from "axios";
import moment from "moment";

export default {
    name: 'MainLeftSidebar',
    props: {
        usuario: null
    },
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
    computed: {

    },
    methods: {
        createdDate(created_at) {
            return moment(created_at).fromNow()
        },
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
            axios.post('/comentarios', { contenido: this.nuevoComentario, publicacion_id: this.cual_publi })
                .then((response) => {
                    const index = this.publicaciones.findIndex(publicacion => publicacion.id === this.cual_publi);
                    if (index > -1) {
                        this.publicaciones[index].comentarios = response.data.datos
                    }
                    this.mostrarFormularioComentario = false; // Ocultar formulario de comentario después de guardar
                    this.nuevoComentario = ''; // Limpiar el campo de nuevo comentario

                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
}
</script>
