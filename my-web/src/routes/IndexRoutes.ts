import { createRouter, createWebHistory } from "vue-router";
import LayoutDefault from "../layouts/LayoutDefault.vue";

const routes = [
  {
    path: "/",
    component: LayoutDefault,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
