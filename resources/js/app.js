<<<<<<< HEAD
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import "./Pages/Admin/Data/script.js";
import Layout from "./Pages/Admin/Layout/Layout.vue"
createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
    .component("Layout",Layout)
      .use(plugin)
      .mount(el)
  },
})
=======

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
>>>>>>> 58891ab (file has been updated)
