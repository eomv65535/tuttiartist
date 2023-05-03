<template>
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <MainLeftSidebar :usuario="usuario" />
                        </div>
                        <div class="col-lg-9 col-md-8 no-pd">
                            <MainWsSec :usuario="usuario" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import MainLeftSidebar from './MainLeftSidebar.vue'
import MainWsSec from './MainWsSec.vue'


export default {
    name: 'Main',
    components: {
        MainLeftSidebar,
        MainWsSec
    },
    props: {
        usuario: null
    }

}
</script>
