<template>
    <header>
        <div class="container">
            <div class="header-data">
                <div class="logo">
                    <a href="/"><img src="images/w-logo.png" alt=""></a>
                </div>
                <nav style="width: 75%;">
                    <ul>
                        <li>
                            <a href="/" title="">
                                <span><i class="fa fa-home"></i></span>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="/" title="">
                                <span><i class="fa fa-address-book-o"></i></span>
                                Contacto
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="menu-btn">
                    <a href="#" title=""><i class="fa fa-bars"></i></a>
                </div>
                <div class="user-account" v-if="usuario">
                    <div class="user-info">
                        <img :src="usuario.ruta_img" alt="">
                        <a href="#" title="">{{ usuario.name }}</a>
                        <i class="la la-sort-down"></i>
                    </div>
                    <div class="user-account-settingss" id="users">
                        <h3>Mi cuenta</h3>
                        <ul class="us-links">
                            <li><a href="/profile" title="">My profile</a></li>
                            <li><a href="#" @click="logout" title="">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="login_register" v-else>
                    <ul>
                        <li><a href="/login" title="">Login / Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header",
    props: {
        usuario: Object
    },
methods:{
    logout: function(){
        axios.post('/logout')
        location.reload()
    }
}

}
</script>
