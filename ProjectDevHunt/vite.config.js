import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue({
            template: {
                compilerOptions: {
                    isCustomElement: tag => tag.startsWith('ion-')
                }
            }
        }),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'public/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css',
                'public/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css',
                'public/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css',
                'public/NiceAdmin/assets/vendor/quill/quill.snow.css',
                'public/NiceAdmin/assets/vendor/quill/quill.bubble.css',
                'public/NiceAdmin/assets/vendor/remixicon/remixicon.css',
                'public/NiceAdmin/assets/vendor/simple-datatables/style.css',
                'public/NiceAdmin/assets/css/style.css',

                'public/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js',
                'public/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'public/NiceAdmin/assets/vendor/chart.js/chart.umd.js',
                'public/NiceAdmin/assets/vendor/echarts/echarts.min.js',
                'public/NiceAdmin/assets/vendor/quill/quill.min.js',
                'public/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js',
                'public/NiceAdmin/assets/vendor/tinymce/tinymce.min.js',
                'public/NiceAdmin/assets/vendor/php-email-form/validate.js',

                'public/NiceAdmin/assets/js/main.js'
            ],
            refresh: true,
        }),
    ],
});



