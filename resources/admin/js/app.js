require("./bootstrap");

import Vue from "vue";

import CKEditor from "@ckeditor/ckeditor5-vue";

Vue.use(CKEditor);

Vue.prototype.$route = (...args) => route(...args).url(); //Ziggy

import { InertiaApp } from "@inertiajs/inertia-vue";
import { InertiaForm } from "laravel-jetstream";
import PortalVue from "portal-vue";

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

import { InertiaProgress } from "@inertiajs/progress";

InertiaProgress.init();

/** */
import "bootstrap-vue/dist/bootstrap-vue-icons.min.css";

import {
  NavbarPlugin,
  BootstrapVueIcons,
  ButtonPlugin,
  ButtonGroupPlugin,
  PaginationPlugin,
  FormTextareaPlugin,
  LayoutPlugin,
  TablePlugin,
  FormCheckboxPlugin,
  FormSelectPlugin,
  FormInputPlugin,
  FormFilePlugin,
  FormGroupPlugin,
  FormRadioPlugin,
  ModalPlugin,
  SkeletonPlugin,
  AlertPlugin,
  OverlayPlugin,
  TabsPlugin,
  CollapsePlugin,
  SpinnerPlugin
} from "bootstrap-vue";

Vue.use(FormInputPlugin);
Vue.use(NavbarPlugin);
Vue.use(BootstrapVueIcons);
Vue.use(ButtonPlugin);
Vue.use(ButtonGroupPlugin);
Vue.use(PaginationPlugin);
Vue.use(LayoutPlugin);
Vue.use(TablePlugin);
Vue.use(FormCheckboxPlugin);
Vue.use(FormSelectPlugin);
Vue.use(FormFilePlugin);
Vue.use(FormGroupPlugin);
Vue.use(FormTextareaPlugin);
Vue.use(FormRadioPlugin);
Vue.use(ModalPlugin);
Vue.use(SkeletonPlugin);
Vue.use(AlertPlugin);
Vue.use(OverlayPlugin);
Vue.use(TabsPlugin);
Vue.use(CollapsePlugin);
Vue.use(SpinnerPlugin);

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
