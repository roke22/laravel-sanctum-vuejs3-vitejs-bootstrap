import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'
import { createPinia } from 'pinia';
import {router} from './plugins/routes'

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import {faEnvelope, faCheck, faLock, faArrowRightFromBracket} from '@fortawesome/free-solid-svg-icons'
// import {far} from '@fortawesome/free-regular-svg-icons'
// import {fab} from '@fortawesome/free-brands-svg-icons'

/* add icons to the library */
library.add(faEnvelope, faCheck, faLock, faArrowRightFromBracket)

createApp(App)
.use(router)
.use(createPinia())
.component('font-awesome-icon', FontAwesomeIcon)
.mount('#app')
