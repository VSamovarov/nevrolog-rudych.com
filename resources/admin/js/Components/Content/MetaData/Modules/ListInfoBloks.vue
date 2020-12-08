<template>
  <div>
    <div>
      <draggable
        class="card-deck mb-3"
        handle=".card-header"
        v-model="draggableList"
        @start="drag = true"
        @end="drag = false"
      >
        <template v-for="block in blocks">
          <ModuleWrapper
            :key="block.id"
            class="movable meta-modules"
            :style="{ maxWidth: '30%', width: '30%' }"
            :deleteModule="deleteModule(block)"
          >
            <InfoBlock
              :module="block"
              :locales="locales"
              :settings="showSettings"
            ></InfoBlock>
          </ModuleWrapper>
        </template>
      </draggable>
    </div>

    <button type="button" @click="addNewBlock">
      Добавить блок
    </button>
    <hr />
    <div class="row">
      <div class="col-md-12">
        <p class="text-black-50 small">Настройки</p>
        <div class="d-flex flex-wrap align-items-center justify-content-around">
          <b-form-checkbox
            :checked="showSettings.showIcone"
            @input="changeModule('show-icone', $event)"
          >
            Иконка
          </b-form-checkbox>

          <b-form-checkbox
            :checked="showSettings.showTitle"
            @input="changeModule('show-title', $event)"
          >
            Заглавие
          </b-form-checkbox>

          <b-form-checkbox
            :checked="showSettings.showText"
            @input="changeModule('show-text', $event)"
          >
            Текст
          </b-form-checkbox>
          <b-form-checkbox
            :checked="showSettings.showUrl"
            @input="changeModule('show-url', $event)"
          >
            Ссылка
          </b-form-checkbox>

          <div>
            Цвет секции
            <ColorSelection
              :colors="colors"
              :value="getValue('box-color') === false"
              @input="changeModule('box-color', $event)"
            ></ColorSelection>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const colors = ["#984c8a", "#9baacb", "#503a87", "#212529"];

import draggable from "vuedraggable";
import { uid } from "./../../../../Helpers/Sting";
import InfoBlock from "./InfoBlock";
import ColorSelection from "../../../Common/ColorSelection";
import ModuleWrapper from "./../../../Common/ModuleWrapper";
const nameModule = "info-bloks";
const titleModuleDefaul = "";
export default {
  components: {
    draggable,
    InfoBlock,
    ColorSelection,
    ModuleWrapper
  },
  props: {
    module: Object,
    locales: Object,
    post: Object,
    title: {
      type: String,
      default: titleModuleDefaul
    }
  },
  data() {
    return {
      colors
    };
  },
  computed: {
    draggableList: {
      get() {
        return this.getValue(nameModule);
      },
      set(value) {
        this.module._value[nameModule] = Object.assign(
          [],
          this.getValue(nameModule),
          value
        );
      }
    },
    showSettings() {
      return {
        showIcone: this.getValue("show-icone") !== false,
        showTitle: this.getValue("show-title") !== false,
        showText: this.getValue("show-text") !== false,
        showUrl: this.getValue("show-url") !== false
      };
    },
    blocks: function() {
      return this.getValue(nameModule);
    }
  },
  methods: {
    getCheckValueSetting(name) {
      return this.getValue(name) === null || this.getValue(name) ? true : false;
    },
    deleteModule(module) {
      return () => {
        this.$bvModal
          .msgBoxConfirm("Удалить модуль?")
          .then(value => {
            if (value)
              this.module._value[nameModule].splice(
                this.module._value[nameModule].indexOf(module),
                1
              );
          })
          .catch(err => {
            // An error occurred
          });
      };
    },
    addNewBlock() {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      if (this.module._value[nameModule] === undefined) {
        this.$set(this.module._value, nameModule, []);
      }
      this.module._value[nameModule].push({
        id: uid(),
        _name: "InfoBlok"
      });
    },
    /**
     * Общая часть
     */
    getValue(name) {
      const value =
        (this.module && this.module._value && this.module._value[name]) || null;
      return value;
    },

    getModule(name) {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      if (this.module._value[name] === undefined) {
        this.$set(this.module._value, name, {});
      }
      return this.module._value[name];
    },

    changeModule(name, value) {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      this.$set(this.module._value, name, value);
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style></style>
