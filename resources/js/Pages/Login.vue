<template>
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo" style="margin-bottom: 20px;">
                                    <img src="images/logo2.png" style="display:block;margin:auto;" alt="">
                                </div>
                                <p style="margin:20px">Tutti is a platform and social network where people and musicians can
                                    exchange knowledge</p>
                                <img src="images/musicos.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">
                                <ul class="sign-control">
                                    <li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>
                                    <li data-tab="tab-2"><a href="#" title="">Sign up</a></li>
                                </ul>
                                <div class="sign_in_sec current" id="tab-1">
                                    <h3>Sign in</h3>
                                    <form @submit.prevent="forma1.post('login.attempt')">
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" v-model="forma1.email" placeholder="Email">
                                                    <i class="la la-user"></i>
                                                </div>
                                                <div v-if="forma1.errors.email">{{ form.errors.email }}</div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" v-model="forma1.password" placeholder="Password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                                <div v-if="forma1.errors.password">{{ forma1.errors.password }}</div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" v-model="forma1.remember">
                                                        <label for="c1">
                                                            <span></span>
                                                        </label>
                                                        <small>Remember me</small>
                                                    </div>
                                                    <a href="/forgot" title="">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" :disabled="forma1.processing">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="login-resources">
                                        <h4>Login Via Social Account</h4>
                                        <ul>
                                            <li><a href="#" title="" class="fb"><i class="fa fa-facebook"></i>Login Via
                                                    Facebook</a></li>
                                            <li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login Via
                                                    Twitter</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sign_in_sec" id="tab-2">
                                    <h3>Sign up</h3>
                                    <div class="dff-tab current" id="tab-3">
                                        <form action="index2.html">
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="name" placeholder="Email">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="repeat-password"
                                                            placeholder="Repeat Password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="checky-sec st2">
                                                        <div class="fgt-sec">
                                                            <input type="checkbox" name="cc" id="c2">
                                                            <label for="c2">
                                                                <span></span>
                                                            </label>
                                                            <small>Yes, I understand and agree to the workwise Terms &
                                                                Conditions.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Get Started</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footy-sec">
                <div class="container">
                    <ul>
                        <li><a href="#" title="">Help Center</a></li>
                        <li><a href="#" title="">About</a></li>
                        <li><a href="#" title="">Privacy Policy</a></li>
                        <li><a href="#" title="">Community Guidelines</a></li>
                        <li><a href="#" title="">Cookies Policy</a></li>
                        <li><a href="#" title="">Career</a></li>
                        <li><a href="#" title="">Forum</a></li>
                        <li><a href="#" title="">Language</a></li>
                        <li><a href="#" title="">Copyright Policy</a></li>
                    </ul>
                    <p><img src="images/copy-icon.png" alt="">Copyright 2023</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    setup() {
        const forma1 = useForm({
            email: null,
            password: null,
            remember: false,
        })
        return { forma1 }
    },

}
</script>
