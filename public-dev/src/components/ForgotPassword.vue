<script setup lang="ts">
import { ref } from '@vue/reactivity';
import { apiCsrfCookie, apiForgotPassword } from '../plugins/api';
import { Notyf } from 'notyf';
import { onBeforeMount } from '@vue/runtime-core';

let email = ref("")
let isDisabled = ref(false)

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
    apiCsrfCookie()
})

function recuperar() {
    apiForgotPassword(email.value).then(function(response) {
        if (response.status == 200) {
            isDisabled.value = true
            notyf.success('Se ha enviado un correo electronico a tu cuenta. Revisa el correo');
        }
    }).catch(function(response) {
        if (response.response.status == 404) {
            notyf.error('El email no esta registrado en nuestra base de datos');
        }

        if (response.response.status == 429) {
            notyf.error('Demasiadas peticiones para este correo electronico, intentelo mas tarde');
        }
    })
}
</script>
<template>
<div>
    <main>
        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" style="background: url('/img/signin.svg');">
                    <p class="text-center">
                        <router-link to="/" class="d-flex align-items-center justify-content-center">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                            Volver al Log in
                        </router-link>
                    </p>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="signin-inner my-3 my-lg-0 bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                            <h1 class="h3">¿Has olvidado tu contraseña?</h1>
                            <p class="mb-4">¡No te preocupes! Escribe tu correo electrónico y en breve te enviamos un enlace para recuperar tu contraseña</p>
                            <div class="mb-4">
                                <label for="email">Correo Electrónico</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email" placeholder="usuario@dominio.com" v-model="email" required autofocus>
                                </div>  
                            </div>
                            <!-- End of Form -->
                            <div class="d-grid">
                                <button type="button" id="buttonRecoveryPassword" :disabled="isDisabled" v-on:click="recuperar" class="btn btn-gray-800">Recuperar Contraseña</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>    
</template>
<style lang="css" scoped>
@import '../css/volt/volt.css';
</style>