<template>
    <div class="main-left-sidebar no-margin">
        <div class="user-data full-width" v-if="usuario">
            <div class="user-profile">
                <div class="username-dt">
                    <div class="usr-pic">
                        <img :src="usuario.ruta_img" alt="">
                    </div>
                </div>
                <div class="user-specs">
                    <h3>{{usuario.name}}</h3>
                    <span>Orchesta director at Self Employed</span>
                </div>
            </div>
            <div class="user_pro_status" style="text-align: center;">
                <ul class="flw-status">
                    <li style="margin-right: 10px!important;">
                        <h4>Following</h4>
                        <b>34</b>
                    </li>
                    <li style="margin-right: 10px!important;">
                        <h4>Followers</h4>
                        <b>155</b>
                    </li>

                </ul><br />
            </div>
            <p style="margin: 20px auto;">
                <a style="color: #333;font-weight: 600;" :href="`/${usuario.slug}`" title="">View Profile</a>
            </p>
        </div>
        <div class="user-data full-width" v-else>
            <div class="user-profile">
                <div class="user-specs" style="padding-top: 30px;">
                    <h3>Welcome!</h3>
                    <span>Enjoy Tutti artist</span>
                    <p style="padding-top: 30px;"><a href="/login" title="" style="color: #333;font-weight: 600;">Login /
                            Register</a></p>
                </div>
            </div>
        </div>
        <div class="suggestions full-width">
            <div class="sd-title">
                <h3>Suggestions</h3>

            </div>
            <div class="suggestions-list">
                <div class="suggestion-usd">
                    <img src="images/resources/s1.png" alt="">
                    <div class="sgt-text">
                        <h4>Jessica William</h4>
                        <span>Orchesta director</span>
                    </div>
                    <span><i class="la la-plus"></i></span>
                </div>

                <div class="view-more">
                    <a href="#" title="">View More</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MainLeftSidebar',
    props: {
        usuario: Object
    }
}
</script>
