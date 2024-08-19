import CKEditor from '@ckeditor/ckeditor5-vue';
import '../css/app.css';
import "../css/nprogress.css";
import AdminLayout from "@/Layouts/Admin/Layout.vue";
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { router } from '@inertiajs/vue3'
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

import $ from "jquery";
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .component("AdminLayout",AdminLayout)
            .use(plugin)
            .use(ZiggyVue)
            .use(CKEditor)
            .mount(el);
    },
});

router.on('start', (event) =>{
   let list = document.querySelectorAll(".ProgressContent,.fullScreenDiv");    
    list.forEach(element => {
        element.classList.remove("d-none");
    });
});
router.on('finish', (event) => {
    let list = document.querySelectorAll(".ProgressContent,.fullScreenDiv");    
    list.forEach(element => {
        element.classList.add("d-none");
    });
});