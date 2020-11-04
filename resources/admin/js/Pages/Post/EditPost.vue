<template>
  <AdminLayout class="edit-post">
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
              <b-col md="2" class="d-flex align-items-center justify-content-end">
                <inertia-link
                  :href="$route('admin.post.index', { type: main.type })"
                  class="btn btn-secondary"
                >
                  Вернутся к списку
                </inertia-link>
              </b-col>
            </b-row>
          </b-container>
            <MainContentModule
              v-if="main.translations"
              :translations="main.translations"
              :locales="locales"
              @updateDataModules="updateDataModules"
            ></MainContentModule>
            <SeoMetaModule
              v-if="main.translations"
              :translations="main.translations"
              :locales="locales"
              @updateDataModules="updateDataModules"
            ></SeoMetaModule>
        </b-col>
        <b-col md="3">
          <DateModule :date="main.created_at" @updateDataModules="updateDataModules"></DateModule>
          <PostStatusModule :statuses="statuses" :status="main.status" @updateDataModules="updateDataModules"></PostStatusModule>
          <ThumbnailModule></ThumbnailModule>
        </b-col>
      </b-row>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import MainContentModule from "./../../Components/Modules/MainContentModule";
import SeoMetaModule from "./../../Components/Modules/SeoMetaModule";
import DateModule from "./../../Components/Modules/DateModule";
import PostStatusModule from "./../../Components/Modules/PostStatusModule";
import ThumbnailModule from "./../../Components/Modules/ThumbnailModule";
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
  components: { AdminLayout, SeoMetaModule, MainContentModule, DateModule, PostStatusModule, ThumbnailModule},
  props: ["main", "locales", "statuses"],
  data() {
    return {
      modulesData: {}
    };
  },
  methods: {
    updateDataModules(fileds) {
      this.modulesData[fileds.key] = fileds.data;
    }
  },
};
</script>

<style></style>
