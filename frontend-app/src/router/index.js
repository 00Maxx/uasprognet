import { createRouter, createWebHistory, useRouter } from "vue-router";
 
import Nasabah from "../components/Nasabah.vue";
import Tabungan from "../components/Tabungan.vue"
import JenisTransaksi from "../components/JenisTransaksi.vue"
import User from "../components/User.vue"
 
const routes = [
    { path: "/nasabah", component: Nasabah},
    { path: "/tabungan", component: Tabungan},
    { path: "/jenistransaksi", component: JenisTransaksi},
    { path: "/user", component: User},
];
 
const router = createRouter({
    history: createWebHistory(),
    routes,
});
 
// router.beforeEach((to, from, next) => {
//     const requiresAuth = to.matched.some((x) => x.meta.auth);
 
//     if (requiresAuth && !localStorage.getItem("token")) {
//         router.push({ path: '/login' })
//         return;
//     }
 
//     if (localStorage.getItem("token") && ['/login', '/register'].includes(to.path)) {
//         router.push({ path: '/' })
//         return;
//     }
 
//     next();
// });
 
export default router;