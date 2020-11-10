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
            <div class="sticky text-center bg-white p-3">
              <b-button @click="saveData">Сохранить изменения</b-button>
              <inertia-link
                    :href="$route('admin.post.index', { type: main.type })"
                    class="btn btn-secondary"
                  >
                    Вернутся к списку
              </inertia-link>
            </div>
            <DateModule :date="main.created_at" @updateDataModules="updateDataModules"></DateModule>
            <PostStatusModule :statuses="statuses" :status="main.status" @updateDataModules="updateDataModules"></PostStatusModule>
            <ThumbnailModule
              src="https://motik.com.ua/images/cache/100x110/categories_images/ks_10314_1j.jpg"
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
      modulesData: {},
      overlay: false,
      post_id: this.main.id,
      post_type: this.main.type,
      alerts: {},
    };
  },
  methods: {
    updateDataModules(fileds) {
      this.modulesData[fileds.key] = fileds.data;
    },
    updateAlerts(alert) {
      if(alert.data === null) {
        this.$delete(this.alerts, alert.key)
      } else {
        this.$set(this.alerts, alert.key, {...alert.data})
      }
    },
    saveData () {
      this.overlay = true;
      console.log(this.modulesData);
      try {
        // await axios.post(this.$route('admin.post.update', modulesData));
        this.$inertia.put(this.$route('admin.post.update',this.post_id),{type: this.post_type, ...this.modulesData});
      } catch {

      } finally {
        this.overlay = false;
      }
    }
  },
};
</script>

<style>
.sticky {
  position: sticky;
  top: 0;
  z-index: 100
}
</style>
