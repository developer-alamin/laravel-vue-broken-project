import './bootstrap';
import '../css/app.css';
import "../css/nprogress.css";
import AdminLayout from "@/Layouts/Admin/Layout.vue";
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import NProgress from 'nprogress'
import { router } from '@inertiajs/vue3'
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .component("AdminLayout",AdminLayout)
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
router.on('start', () => NProgress.start())
router.on('finish', () => NProgress.done())