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
