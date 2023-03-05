import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});

// vite.config.js

// vite.config.js

const { createVuePlugin } = require('@vitejs/plugin-vue/dist/index.mjs');


module.exports = {
  plugins: [
    createVuePlugin()
  ]
}

