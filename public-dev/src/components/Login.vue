<script setup lang="ts">
import { apiCsrfCookie, apiLogin, apiUser } from '../plugins/api';
import { ref, onBeforeMount } from 'vue'
import { authUserStore } from '../store/authUser';
import { useRouter } from 'vue-router'
import { Notyf } from 'notyf';

let email = ref("")
let password = ref("")
let remember = ref(false)

const router = useRouter()
const notyf = new Notyf({
    duration: 10000,
    position: {
        x: 'right',
        y: 'bottom'
    },
    dismissible: true
});

onBeforeMount(() => {
    // Set csrf Cookie
    apiCsrfCookie().then(function (response) {
        getUser()
    })
})

function login() {
    apiLogin(email.value, password.value, remember.value)
        .then(function (response) {
            // handle success
            if (response.data.errors !== undefined) {
                response.data.errors.forEach((element: string)=> {
                    notyf.error(element);
                });
            } else {
                authUserStore().login();
                router.push('/dashboard')
            }
        })
        .catch(function (response) {
            if (response.response.data.errors !== undefined) {
                response.response.data.errors.forEach((element: string) => {
                    notyf.error(element);
                });
            }

            if (response.response.status == 419) {
                window.location.reload();
            }
        })
}

function getUser() {
    apiUser().then(function (response) {
        authUserStore().login();
        router.push('/dashboard')
    }).catch(function (response) {})
}
</script>

<template>
    <main>
        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" style="background: url('/img/signin.svg');">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Área de cliente</h1>
                            </div>
                            <div class="form-group mb-4">
                                <label for="email">Correo electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <font-awesome-icon icon="fa-solid fa-envelope" class="icon icon-xs text-gray-600"/>
                                    </span>
                                    <input type="email" class="form-control" placeholder="usuario@dominio.com"
                                        id="email" autofocus required v-model="email">
                                </div>
                            </div>
                            <!-- End of Form -->
                            <div class="form-group">
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="password">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2">
                                            <font-awesome-icon icon="fa-solid fa-lock" class="icon icon-xs text-gray-600"/>
                                        </span>
                                        <input type="password" placeholder="Contraseña" class="form-control"
                                            id="password" required v-model="password">
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <div class="d-flex justify-content-between align-items-top mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="remember" id="remember">
                                        <label class="form-check-label mb-0" for="remember">
                                            Recuérdame
                                        </label>
                                    </div>
                                    <div><a href="/forgot-password" class="small text-right">Recuperar mi contraseña</a></div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="button" class="btn btn-gray-800" v-on:click="login">Entrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<style lang="css" scoped>
@import '../css/volt/volt.css';
</style>