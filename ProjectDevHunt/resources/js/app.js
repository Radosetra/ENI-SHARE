import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

// Vue
import {createApp} from 'vue'

import App from './App.vue'

createApp(App).mount("#app")
// Vue end


window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
