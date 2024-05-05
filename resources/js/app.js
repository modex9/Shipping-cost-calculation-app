import './bootstrap';

import { createApp, h } from "vue";
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import App from "./App.vue";
import axios from 'axios';
import VueAxios from 'vue-axios';

InertiaProgress.init();
// createApp(App).use(VueAxios, axios).mount("#app");
createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Components/*.vue', { eager: true })
        return pages[`./Components/${name}.vue`]
    },
    title: title => `${title} - My App`,
    setup({ el, App, props, plugin }) {
      createApp({ render: () => h(App, props) })
        .use(plugin)
        .mount(el)
    },
  });
