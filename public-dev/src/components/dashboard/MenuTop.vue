<script setup lang="ts">
import { useRouter } from "vue-router";
import { apiLogout } from "../../plugins/api";

const router = useRouter()
function logout() {
    apiLogout().then(function(response) {
        router.push('/')
    })
}
</script>
<template>
    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-3 pb-0 mt-1 mb-3">
      <div class="container-fluid px-0">
        <div class="d-flex w-100 justify-content-end" id="navbarSupportedContent">
          <button class="btn btn-gray-50" v-on:click="logout">
            <font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket"/>
            Logout
          </button>
        </div>
      </div>
    </nav>
</template>