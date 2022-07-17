import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    resolve: {
        alias: {
            // 'ziggy': '/vendor/tightenco/ziggy/src/js',
            // 'ziggy-vue': '/vendor/tightenco/ziggy/src/js/vue',
            'ziggy': '/app/Domain/tightenco/ziggy/src/js',
            'ziggy-vue': '/app/Domain/tightenco/ziggy/src/js/vue',
        },
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});

