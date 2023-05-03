<template>
    <div id="index">
        <Header :usuario="usuario" />
        <Main :usuario="usuario" />
    </div>
</template>

<script>
import Header from './components/Header.vue'
import Main from './components/Main.vue'
import axios from "axios";

export default {
    name: 'index',
    components: {
        Header,
        Main
    },
    data() {
        return {
            usuario: null
        };
    },
    mounted() {
        this.verificaUsu();
    },
    methods: {
        verificaUsu() {
            axios.get('/userd', { contenido: this.nuevoComentario, publicacion_id: this.cual_publi })
                .then((res) => {
                    if (!res.data.error)
                        this.usuario = res.data
                });
        }
    },
}
</script>
