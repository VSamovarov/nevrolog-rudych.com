require("./bootstrap");

import Vue from "vue";

import { InertiaApp } from "@inertiajs/inertia-vue";
import { InertiaForm } from "laravel-jetstream";
import PortalVue from "portal-vue";

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

/** */
import "bootstrap-vue/dist/bootstrap-vue-icons.min.css";
import { NavbarPlugin, BootstrapVueIcons, ButtonPlugin } from "bootstrap-vue";
Vue.use(NavbarPlugin);
Vue.use(NavbarPlugin);
Vue.use(BootstrapVueIcons);
Vue.use(ButtonPlugin);

const app = document.getElementById("app");

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        })
}).$mount(app);
