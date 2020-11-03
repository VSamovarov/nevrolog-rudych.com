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
    <b-container fluid class="my-2">
      <ModuleWrapper title="Основной контент">
        <MainContentModule
          v-if="main.translations"
          :translations="main.translations"
          :locales="locales"
          @updateDataModules="updateDataModules"
        ></MainContentModule>
      </ModuleWrapper>
    </b-container>
    <b-container fluid class="my-2">
      <ModuleWrapper title="SEO">
        <SeoMetaDataModule
          v-if="main.translations"
          :translations="main.translations"
          :locales="locales"
          @updateDataModules="updateDataModules"
        ></SeoMetaDataModule>
      </ModuleWrapper>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import MainContentModule from "./../../Components/Modules/MainContentModule";
import SeoMetaDataModule from "./../../Components/Modules/SeoMetaDataModule";
import ModuleWrapper from "./../../Components/Common/ModuleWrapper";
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
  components: { AdminLayout, SeoMetaDataModule, MainContentModule, ModuleWrapper },
  props: ["main", "locales"],
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
