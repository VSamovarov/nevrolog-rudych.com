<template>
  <draggable tag="div" :list="menu" :group="{ name: 'g1' }">
    <template v-for="item in menu">
      <menu-item
        :key="item.id"
        :item="item"
        :actions="setActions(item)"
        :locales="locales"
        :locale="locale"
      >
        <menu-draggable
          :locales="locales"
          :locale="locale"
          :menu="item.menu"
          class="menu-item__sub-menu-area"
        ></menu-draggable>
      </menu-item>
    </template>
  </draggable>
</template>

<script>
import draggable from "vuedraggable";
import MenuSettings from "./../../Components/Content/Menu/MenuSettings";
import MenuItem from "./MenuItem";
//import MenuDraggable from "./MenuDraggable";
export default {
  name: "menu-draggable",
  components: {
    draggable,
    MenuItem,
    MenuSettings
  },
  props: {
    menu: {
      type: Array
    },
    locales: Object,
    locale: String
  },
  data() {
    return {
      actions: [
        { name: "Настройки", callback: this.settingsModule },
        { name: "Удалить", callback: this.deleteMenu }
      ]
    };
  },
  methods: {
    /**
     * Готовлю экшены для передачи в пропсы
     */
    setActions(item) {
      console.log(item);
      return [
        { name: "Настройки", callback: this.settingsModule(item) },
        { name: "Удалить", callback: this.deleteMenu(item) }
      ];
    },

    deleteMenu(menuItem) {
      return () => {
        this.$bvModal
          .msgBoxConfirm("Удалить меню?")
          .then(value => {
            if (value) {
              const index = this.menu.findIndex(item => item === menuItem);
              this.menu.splice(index, 1);
            }
          })
          .catch(err => {
            // An error occurred
          });
      };
    },
    settingsModule(menuItem) {
      return () => {
        const h = this.$createElement;
        const messageVNode = h("div", {}, [
          h("p", { class: "mb-3 font-weight-bold" }, "Настройки"),
          h("menu-settings", {
            props: { locales: this.locales, settings: menuItem },
            on: {
              input: value => {
                console.log(this.settings);
              }
            }
          })
        ]);
        this.$bvModal
          .msgBoxConfirm([messageVNode], {
            title: false,
            buttonSize: "sm",
            centered: true,
            size: "sm"
          })
          .then(value => {
            // this.boxOne = value;
          })
          .catch(e => {
            console.error(e);
          });
      };
    }
  }
};
</script>

<style>
.menu-item__header {
  padding: 0.5rem;
  background: #f8f9fa;
  border: 1px solid #6c757d;
}
.menu-item__sub-menu-area {
  display: block;
  border: 1px dashed #6c757d;
  padding: 1rem;
  margin-bottom: 1rem;
}
</style>
