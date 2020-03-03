import Vue from 'vue'
import App from './App.vue'
import router from './router'

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import '@mdi/font/css/materialdesignicons.css'
Vue.use(Vuetify)

Vue.config.productionTip = false

new Vue({
  vuetify: new Vuetify(),
  router,
  render: h => h(App),
}).$mount('#app')