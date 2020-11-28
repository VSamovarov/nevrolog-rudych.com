<template>
  <AdminLayout class="edit-post" :alerts="alerts">
    <b-overlay variant="white" blur="0" :show="overlay" rounded="sm">
      <b-container fluid class="my-5">
        <b-row>
          <b-col md="9">
            <b-container fluid class="my-5">
              <b-row>
                <b-col
                  md="10"
                  class="d-flex align-items-center justify-content-between"
                >
                  <h1>{{ $page.pageTitle }}</h1>
                </b-col>
                <b-col
                  md="2"
                  class="d-flex align-items-center justify-content-end"
                >
                  <inertia-link
                    :href="$route('admin.post.index', { type: main.type })"
                    class="btn btn-secondary"
                  >
                    Вернутся к списку
                  </inertia-link>
                </b-col>
              </b-row>
            </b-container>
            <b-container fluid class="my-5">
              <MainContentModule
                v-if="main.translations"
                :translations="main.translations"
                :locales="locales"
                :post_id="post_id"
                @updateDataModules="updateDataModules"
              ></MainContentModule>
            </b-container>
            <hr />
            <b-container fluid class="my-5">
              <MetaData
                :modules="modulesMetaData"
                :locales="locales"
                @updateMetaDataModules="updateMetaDataModules"
                @addNewMetaModule="addNewMetaModule"
                @draggableMetaModules="draggableMetaModules"
              ></MetaData>
            </b-container>
            <hr />
            <b-container fluid class="my-5">
              <SeoMetaModule
                v-if="main.translations"
                :translations="main.translations"
                :locales="locales"
                @updateDataModules="updateDataModules"
              ></SeoMetaModule>
            </b-container>
          </b-col>
          <b-col md="3">
            <div class="sticky p-3 text-center bg-white">
              <b-button @click="saveData">Сохранить изменения</b-button>
            </div>
            <DateModule
              :date="main.created_at"
              @updateDataModules="updateDataModules"
            ></DateModule>
            <PostStatusModule
              :statuses="statuses"
              :status="main.status"
              @updateDataModules="updateDataModules"
            ></PostStatusModule>
            <ThumbnailModule
              :src="main.thumbnail"
              @updateDataModules="updateDataModules"
              @updateAlerts="updateAlerts"
            ></ThumbnailModule>
          </b-col>
        </b-row>
      </b-container>
    </b-overlay>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import MainContentModule from "./../../Components/Modules/MainContentModule";
import SeoMetaModule from "./../../Components/Modules/SeoMetaModule";
import DateModule from "./../../Components/Modules/DateModule";
import PostStatusModule from "./../../Components/Modules/PostStatusModule";
import ThumbnailModule from "./../../Components/Modules/ThumbnailModule";
import MetaData from "./../../Components/Content/MetaData/MetaData";

import { merge } from "lodash";

const mainSeoModuleValues = {
  title: "",
  content: "",
  excerpt: ""
};
const mainContenModuleValues = {
  metatitle: "",
  metadescription: "",
  metakeys: "",
  slug: ""
};
export default {
  components: {
    AdminLayout,
    SeoMetaModule,
    MainContentModule,
    DateModule,
    PostStatusModule,
    ThumbnailModule,
    MetaData
  },
  props: ["main", "locales", "statuses"],
  data() {
    return {
      modulesData: {},
      modulesMetaData: [],
      overlay: false,
      post_id: this.main.id,
      post_type: this.main.type,
      alerts: {}
    };
  },
  methods: {
    updateDataModules(fileds) {
      this.modulesData[fileds.key] = fileds.data;
    },
    draggableMetaModules(modules) {
      this.modulesMetaData = Object.assign([], this.modulesMetaData, modules);
    },
    updateMetaDataModules(module) {
      this.modulesMetaData.map(item => {
        if (item.id === module.id) {
          item.data = Object.assign(
            {},
            item.data,
            merge(item.data, module.data)
          );
        }
        return item;
      });
    },
    addNewMetaModule(module) {
      module.data = {};
      this.modulesMetaData.push(Object.assign({}, module));
    },
    updateAlerts(alert) {
      if (alert.data === null) {
        this.$delete(this.alerts, alert.key);
      } else {
        this.alerts = Object.assign({}, this.alerts, alert);
      }
    },
    saveData() {
      this.overlay = true;
      try {
        this.$inertia.put(this.$route("admin.post.update", this.post_id), {
          type: this.post_type,
          ...this.modulesData,
          metadata: modulesMetaData
        });
      } catch (e) {
        console.log(e);
      } finally {
        this.overlay = false;
      }
    }
  }
};
</script>

<style>
.sticky {
  position: sticky;
  top: 0;
  z-index: 100;
}
</style>
