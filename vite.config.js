import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
// import { terser } from "rollup-plugin-terser";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        // terser({
        //     compress: {
        //         drop_console: true,  // Menghapus semua console log
        //     },
        // }),
    ],
});
