import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

// Vue
import {createApp} from 'vue'

import menuComponent from './components/menu.vue'

import router from './router';

const app = createApp({});


app.component(
    "menu-component",menuComponent
);




window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

app.use(router).mount("#app")
// Vue end