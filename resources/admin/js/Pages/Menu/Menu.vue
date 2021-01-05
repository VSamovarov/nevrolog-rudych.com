<template>
  <AdminLayout class="menu-index">
    <b-overlay variant="white" blur="0" :show="overlay" rounded="sm">
      <b-container fluid class="my-5">
        <b-row>
          <b-col md="9">
            <h3 class="mb-5">{{ pageTitle }}</h3>
            <div v-for="mainMenu in menu" :key="mainMenu.id">
              <div class="d-flex">
                <h4>
                  {{
                    (mainMenu.title && mainMenu.title[locale]) || mainMenu.slug
                  }}
                </h4>
                <small class="ml-3">{{ mainMenu.slug }}</small>
              </div>
              <MenuDraggable
                :menu="mainMenu.menu"
                :locales="locales"
                :locale="locale"
              ></MenuDraggable>
              <p>
                <b-btn size="sm" variant="light" @click="addMenuItem(mainMenu)"
                  >Добавить пункт меню</b-btn
                >
              </p>

              <hr />
            </div>
          </b-col>
          <b-col md="3">
            <div class="sticky p-3 text-center bg-white">
              <b-button @click="saveData">Сохранить изменения</b-button>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </b-overlay>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import MenuDraggable from "./MenuDraggable";
import { uid } from "./../../Helpers/Sting";

export default {
  components: { AdminLayout, MenuDraggable },
  props: ["pageTitle", "locale", "locales", "menuTreeArray"],
  data() {
    return {
      overlay: false,
      menu: this.menuTreeArray
    };
  },
  methods: {
    addMenuItem(menuItem) {
      menuItem.menu.push({
        id: uid(),
        slug: menuItem.slug,
        title: {},
        url: {},
        menu: []
      });
    },
    saveData() {
      this.overlay = true;
      try {
        this.$inertia.post(this.$route("admin.menu"), this.menu);
      } catch (e) {
        console.error(e);
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
