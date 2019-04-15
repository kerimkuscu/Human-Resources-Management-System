import Vue from 'vue'
import routes from './routes'
import Router from 'vue-router'

Vue.use(Router);

const router = new Router({
    mode: 'history',
    routes
});

Vue.router = router;

export default router;