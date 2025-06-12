import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/auth.js','resources/js/bootstrap.js', 'resources/css/ViewPeta.css', 'resources/css/ManageGround.css','resources/css/RestoreData.css', 'resources/css/Admin.css'],
            refresh: true,
        }),
    ],
});
