import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'public/assets/vendor/bootstrap/css/bootstrap.min.css',
                'public/assets/vendor/bootstrap-icons/bootstrap-icons.css',
                'public/assets/vendor/boxicons/css/boxicons.min.css',
                'public/assets/vendor/quill/quill.snow.css',
                'public/assets/vendor/quill/quill.bubble.css',
                'public/assets/vendor/remixicon/remixicon.css',
                'public/assets/vendor/simple-datatables/style.css',
                'public/assets/css/style.css',

                'public/assets/vendor/apexcharts/apexcharts.min.js',
                'public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'public/assets/vendor/chart.js/chart.umd.js',
                'public/assets/vendor/echarts/echarts.min.js',
                'public/assets/vendor/quill/quill.min.js',
                'public/assets/vendor/simple-datatables/simple-datatables.js',
                'public/assets/vendor/tinymce/tinymce.min.js',
                'public/assets/vendor/php-email-form/validate.js',

                'public/assets/js/main.js'
            ],
            refresh: true,
        }),
    ],
});




