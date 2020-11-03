<template>
  <AdminLayout class="edit-post">
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
    <b-container fluid class="my-5">
      <MainContentModule
        v-if="main.translations"
        :translations="main.translations"
        :locales="locales"
      ></MainContentModule>
    </b-container>

    <b-container fluid class="my-5">
      <SeoMetaDataModule
        v-if="main.translations"
        :translations="main.translations"
        :locales="locales"
      ></SeoMetaDataModule>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import MainContentModule from "./../../Components/Modules/MainContentModule";
import SeoMetaDataModule from "./../../Components/Modules/SeoMetaDataModule";
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
  components: { AdminLayout, SeoMetaDataModule, MainContentModule },
  props: ["main", "locales"],
  data() {
    return {
      // main: this.$page.
      modulesData: []
    };
  }
};
</script>

<style></style>
