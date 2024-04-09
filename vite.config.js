import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/templates.css",
                "resources/css/home.css",
                "resources/sass/main.scss",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
