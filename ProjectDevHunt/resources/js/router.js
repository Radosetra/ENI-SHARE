import { createRouter, createWebHistory } from 'vue-router'
import menuComponent from './components/menu.vue'
// import Home from "./components/Home.vue";
// import About from "./components/About.vue";

const routes = [
  {
    path: '/admin',
    name: 'admin',
    component: menuComponent
  }
]

const router = createRouter({
  history: createWebHistory()
})

export default router