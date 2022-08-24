import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'
import '@popperjs/core'
import { createPinia } from 'pinia';
import {router} from './plugins/routes'

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import {faEnvelope, faCheck, faLock, faArrowRightFromBracket, faChartLine, faTable, faPencil} from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faEnvelope, faCheck, faLock, faArrowRightFromBracket, faChartLine, faTable, faPencil)

import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

createApp(App)
.use(router)
.use(createPinia())
.component('font-awesome-icon', FontAwesomeIcon)
.mount('#app')
