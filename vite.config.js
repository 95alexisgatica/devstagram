import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    server: {
        host: true,         // permite acceso desde el host (tu navegador)
        port: 5173,
        strictPort: true,   // asegura que use ese puerto
        watch: {
            usePolling: true // recomendado en Docker/Linux
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
