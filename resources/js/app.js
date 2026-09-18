import '../css/app.css';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createSSRApp, h } from 'vue';
import MainLayout from '@/Pages/frontend/layouts/main.vue';
import { ZiggyVue } from 'ziggy-js';

createInertiaApp({
    resolve: async (name) => {
        const page = await resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
        page.default.layout ??= MainLayout; // Apply main layout by default
        return page;
    },
    setup({ el, App, props, plugin }) {
        const ziggy = props.initialPage?.props?.ziggy;
        const app = createSSRApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, ziggy ? {
                ...ziggy,
                location:
                    typeof window === 'undefined'
                        ? new URL(ziggy.location)
                        : undefined,
            } : undefined);

        if (el) {
            app.mount(el);
        }
        return app;
    },
});