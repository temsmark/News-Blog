import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp, Head} from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
 // import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import { ZiggyVue } from "ziggy-vue";

import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";


 library.add(fas,far,fab);

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue,Ziggy)
            .component('BreezeAuthenticatedLayout', BreezeAuthenticatedLayout)
            .component('Head', Head)
            .component('fa', FontAwesomeIcon)
            .component('BreezeNavLink', BreezeNavLink)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#29d' });
