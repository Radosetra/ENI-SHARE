import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

// Vue
import {createApp} from 'vue';

// import menuComponent from './components/Menu.vue';
import App from './components/Menu.vue';

// import router from './routes/router.js';
// app.component(
//     "menuComponent",menuComponent
// );


window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// app.mount("#app")
// Vue end

createApp(App).mount("#app");