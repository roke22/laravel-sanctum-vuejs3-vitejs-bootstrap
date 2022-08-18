import { defineStore } from 'pinia'

export const authUserStore = defineStore({  
    id: 'authUserStore',
    state: () => (
      { autenticated: false }
    ),
    getters: {
      isAutenticated: (state) => state.autenticated
    },
    actions: {
      login() {
        this.autenticated = true;
      },
      logout() {
        this.autenticated = false;
      }
    }
})