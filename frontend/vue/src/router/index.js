import Vue from 'vue';
import VueRouter from 'vue-router'

import SaveContact from '../pages/contact/save-contact' // 追加
import IndexContact from '../pages/contact/index-contact' // 追加


Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'contacts',
        component: IndexContact
    },
    {
        path: '/create/contact',
        name: 'create_contact',
        component: SaveContact
    },    
    {
        path: '/edit/contact/:id',
        name: 'edit_contact',
        component: SaveContact
    },
]

const router = new VueRouter({
    mode: 'history',
    routes,
})

export default router