import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  server: {
    host: '0.0.0.0',
    strictPort: false,
    allowedHosts: ['5173-if7dfmkw16okzfg1m7ie4.e2b.app', '.e2b.app'],
  },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
