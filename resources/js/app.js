import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './App.vue'
import Beranda from './components/Beranda.vue'
import Admin from './components/Admin.vue'
import Daftar from './components/Daftar.vue'
import Kontak from './components/Kontak.vue'
import Login from './components/Login.vue'
import Makanan from './components/Makanan.vue'
import Minuman from './components/Minuman.vue'
import Tentang from './components/Tentang.vue'
import Transaksi from './components/Transaksi.vue'
import MyProfile from './components/MyProfile.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'beranda',
            component: Beranda
        },
        {
            path: '/profile',
            name: 'profile',
            component: MyProfile,
            meta: {
                requiresAuth: true,
                is_user: true
            }
        },
        {
            path: '/admin',
            name: 'admin',
            component: Admin,
            meta: {
                requiresAuth: true,
                is_admin: true
            }
        },
        {
            path: '/admin/:page',
            name: 'admin-pages',
            component: Admin,
            meta: {
                requiresAuth: true,
                is_admin: true
            }
        },
        {
            path: '/daftar',
            name: 'daftar',
            component: Daftar
        },
        {
            path: '/kontak',
            name: 'kontak',
            component: Kontak
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/makanan',
            name: 'makanan',
            component: Makanan
        },
        {
            path: '/minuman',
            name: 'minuman',
            component: Minuman
        },
        {
            path: '/tentang',
            name: 'tentang',
            component: Tentang
        },
        {
            path: '/transaksi',
            name: 'transaksi',
            component: Transaksi,
            meta: {
                requiresAuth: true,
                is_user: true
            }
        }
    ]
})

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);
 
Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);
 
Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('jajanpasar.jwt') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath }
            })
        } else {
            let user = JSON.parse(localStorage.getItem('jajanpasar.user'))
            if (to.matched.some(record => record.meta.is_admin)) {
                if (user.is_admin == 1) {
                    next()
                }
                else {
                    next({ name: 'profile' })
                }
            }
            else if (to.matched.some(record => record.meta.is_user)) {
                if (user.is_admin == 0) {
                    next()
                }
                else {
                    next({ name: 'admin' })
                }
            }
            next()
        }
    } else {
        next()
    }
})

import http from './http';
http.setToken(localStorage.getItem('jajanpasar.jwt'));

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});