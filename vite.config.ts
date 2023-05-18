import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({
    plugins: [
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        laravel({
            input: [
                'resources/css/main.css',
                'resources/ts/main.ts',
            ],
            refresh: true,
        }),
    ],
});
