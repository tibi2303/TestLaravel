import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {
            path: '/', 
            component: require('./components/UserTableComponent.vue').default
        },
        {
            name: 'ViewUser',
            path:'/view/:userId',
            component: require('./components/UserViewComponent.vue').default,
        },
        {
            path: '/login', 
            component: require('./components/UserTableComponent.vue')
        }
    ]
})


export default router