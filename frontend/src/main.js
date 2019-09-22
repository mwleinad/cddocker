import Vue from 'vue';
import VueRouter from 'vue-router';
import DashboardPlugin from './dashboard-plugin';
import axios from 'axios';

// Plugins
import App from './App.vue';

// router setup
import routes from './routes/routes';

// plugin setup
Vue.use(VueRouter);
Vue.use(DashboardPlugin);

const router = new VueRouter({
  routes, // short for routes: routes
  linkActiveClass: 'active'
});

//This is only for frontend loading
new Vue({
  el: '#app',
  render: h => h(App),
  router
});

//TODO loading page
/*
axios.get('/api/testa')
  .then((response) => {
    console.log(response.data);
    // configure router
    /!* eslint-disable no-new *!/
    new Vue({
      el: '#app',
      render: h => h(App),
      router
    });
  });
*/
