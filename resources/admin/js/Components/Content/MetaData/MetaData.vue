<template>
  <div>
    <draggable
      handle=".card-header"
      v-model="draggableList"
      @start="drag = true"
      @end="drag = false"
      class="mb-3"
    >
      <template v-for="module in modules">
        <ModuleWrapper
          :title="module.title"
          :key="module.id"
          class="movable"
          :renameModule="renameModule(module)"
          :deleteModule="deleteModule(module)"
        >
          <ModulesLoader
            :module="module"
            :locales="locales"
            :post="post"
            @changeModule="$emit(`updateMetaDataModules`, $event)"
          >
          </ModulesLoader>
        </ModuleWrapper>
      </template>
    </draggable>
    <b-form-select
      v-if="showSelectedNewModules"
      @change="addNewModule"
      :options="newModules"
      :value="null"
    ></b-form-select>
    <button
      type="button"
      class="btn btn-link"
      v-if="!showSelectedNewModules"
      @click="showSelectedNewModules = true"
    >
      + Добавить модуль
    </button>
    <button
      type="button"
      class="btn btn-link"
      v-if="showSelectedNewModules"
      @click="showSelectedNewModules = false"
    >
      - Отменить
    </button>
  </div>
</template>

<script>
import ModulesLoader from "./../MetaData/ModulesLoader";
import draggable from "vuedraggable";
import { uid } from "./../../../Helpers/Sting";
import ModuleWrapper from "./../../Common/ModuleWrapper";
export default {
  components: { ModulesLoader, draggable, ModuleWrapper },
  props: ["modules", "locales", "post"],
  data() {
    return {
      showSelectedNewModules: false,
      newModules: [
        {
          text: "-- Выбрать модуль --",
          value: null
        },
        {
          text: "Многоязычное поле",
          value: "MultilingualInput"
        },
        {
          text: "Картинка",
          value: "ImageInput"
        },
        {
          text: "Картинка с текстом",
          value: "ImageAndTextTwoRows"
        },
        {
          text: "Текстовый редактор",
          value: "Editor"
        }
      ]
    };
  },
  computed: {
    draggableList: {
      get() {
        return this.modules;
      },
      set(value) {
        this.$emit("draggableMetaModules", value);
      }
    }
  },
  methods: {
    addNewModule(slectedValue) {
      if (!slectedValue) return;
      const { text, value } = this.newModules.find(
        item => item.value === slectedValue
      );
      this.showSelectedNewModules = false;
      this.$emit("addNewMetaModule", {
        content: {},
        type: "",
        title: text,
        name: value,
        id: uid()
      });
    },
    renameModule(module) {
      return () => {
        const h = this.$createElement;
        let newName = module.title;
        const messageVNode = h("div", {}, [
          "Новое название",
          h("b-form-input", {
            props: { value: module.title },
            on: {
              input: value => (newName = value)
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

            this.$emit(`updateMetaDataModules`, { ...module, title: newName });
          })
          .catch(err => {
            // An error occurred
          });
      };
    },
    deleteModule(module) {
      return () => {
        this.$bvModal
          .msgBoxConfirm("Удалить модуль?")
          .then(value => {
            if (value) this.$emit("removeMetaModules", module);
          })
          .catch(err => {
            // An error occurred
          });
      };
    }
  }
};
</script>

<style></style>
