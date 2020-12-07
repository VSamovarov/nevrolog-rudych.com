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
          <div
            class="card mb-3"
            :key="block.id"
            :style="{ maxWidth: '30%', width: '30%' }"
          >
            <div class="card-header"><b-icon icon="arrows-move"></b-icon></div>
            <div class="card-body">
              <InfoBlock :module="block" :locales="locales"></InfoBlock>
            </div>
          </div>
        </template>
      </draggable>
    </div>
    <button type="button" @click="addNewBlock">
      Добавить блок
    </button>
  </div>
</template>

<script>
import draggable from "vuedraggable";
import { uid } from "./../../../../Helpers/Sting";
import InfoBlock from "./InfoBlock";
const titleModuleDefaul = "";
export default {
  components: {
    draggable,
    InfoBlock
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
  computed: {
    draggableList: {
      get() {
        const name = "info-bloks";
        return this.getValue(name);
      },
      set(value) {
        const name = "info-bloks";
        this.module._value[name] = Object.assign(
          [],
          this.getValue(name),
          value
        );
      }
    },
    blocks: function() {
      const name = "info-bloks";
      return this.getValue(name);
    }
  },
  methods: {
    //?! Мутируем пропсы
    addNewBlock() {
      const name = "info-bloks";

      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      if (this.module._value[name] === undefined) {
        this.$set(this.module._value, name, []);
      }
      this.module._value[name].push({
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

    //?! Мутируем пропсы
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
      const module = this.module || { _value: {} };
      module._value = {
        ...((this.module && this.module._value) || {}),
        [name]: value
      };
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style></style>
