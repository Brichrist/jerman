import { createRouter, createWebHistory } from 'vue-router';
import Landing from '../components/Landing.vue';
import PageNotFound from '../components/PageNotFound.vue';

const routes = [
  {
    path: '/prototype',
    name: 'Landing',
    component: Landing,
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'PageNotFound',
    component: PageNotFound,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
