import '../css/app.css';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import MainLayout from '@/Pages/frontend/layouts/main.vue';
import { ZiggyVue } from 'ziggy-js';

createInertiaApp({
    resolve: async (name) => {
        const page = await resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
        page.default.layout ??= MainLayout; // Apply main layout by default
        return page;
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) }).use(plugin).use(ZiggyVue);
        if (el) {
            app.mount(el);
        }
        return app;
    },
});