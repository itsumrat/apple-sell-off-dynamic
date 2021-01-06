require('./bootstrap');
window.Vue = require('vue');
axios.defaults.headers.common = {
  "X-Requested-With": "XMLHttpRequest",
  // "X-CSRF-TOKEN": window.csrf_token,
  Authorization: "Bearer " + window.localStorage.getItem("eShop.token"),
  "Access-Control-Allow-Origin": "*",
};
import Vue from 'vue';
import VueRouter from 'vue-router';
import store from "./state/store";
import config from "./constant/config";
import { routes } from "./router/frontend";
import VueLocalStorage from 'vue-localstorage';
import Vuex from 'vuex';
import Toasted from "vue-toasted";
import Vuelidate from 'vuelidate';
import moment from 'moment';
import $ from 'jquery';
import ProductZoomer from 'vue-product-zoomer';
Vue.use(ProductZoomer);
import VueCarousel from 'vue-carousel';

Vue.component('lingallery', Lingallery);
import Lingallery from 'lingallery';
Vue.use(VueCarousel);
window.$ = window.jQuery = $;
Vue.prototype.$ = $;

Vue.use(VueLocalStorage);
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(Vuelidate);
Vue.use(Toasted, {
  duration: 5000,
  size: "20",
  position: "bottom-center",
  action: {
    text: "X",
    onClick: (e, toastObject) => {
      toastObject.goAway(0);
    },
  },
});
Vue.component('layouts', require('./components/Layouts.vue').default);

axios.defaults.baseURL = config.API_BASE_URL;
const router = new VueRouter({
  mode: "history",
  routes: routes,
});

const app = new Vue({
    el: '#app',
    router: router,
    store
});


router.beforeEach((to, from, next) => {
  if (to.matched.some(route => route.meta.requiresAuth)) {
    if (localStorage.getItem("eShop.token") != null) {
      next();
    } else {
      next({ path: '/sign-in' });
    }
  }
  next();
});


// router.beforeEach((to, from, next) => {
//   if (to.matched.some((record) => record.meta.requiresAuth)) {
//     if (localStorage.getItem("eShop.token") == null) {
//       next({
//         path: "/sign-in",
//         params: { nextUrl: to.fullPath },
//       });
//     } else {
//       let user = JSON.parse(localStorage.getItem("eShop.user"));
//       if (to.matched.some((record) => record.meta.is_customer)) {
//         if (user.user_type == 'Customer') {
//           next();
//         }
//       }
//       next();
//     }
//   } else {
//     next();
//   }
// });


// router.beforeEach((to, from, next) => {
//   if (to.matched.some((record) => record.meta.requiresAuth)) {
//       if (to.fullPath !== '/sign-in') {
//         if (localStorage.getItem("eShop.token") == null) {
//           next('/sign-in');
//         }
//       }
//       if (to.fullPath === '/sign-in') {
//         let user = JSON.parse(localStorage.getItem("eShop.user"));
//         if (to.matched.some((record) => record.meta.is_customer)) {
//           if (user.user_type == 'Customer') {
//             next();
//           }
//         }
//       }
//       next();
//   }else{
//     next();
//   }
// });
