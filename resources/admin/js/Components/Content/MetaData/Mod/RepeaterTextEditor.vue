<template>
  <div>
    <div>
      <draggable
        class="card-deck mb-3"
        handle=".card-header"
        v-model="value.repeat"
        @start="drag = true"
        @end="drag = false"
      >
        <template v-for="block in blocks">
          <ModuleWrapper
            :key="block.id"
            class="movable meta-modules"
            :deleteModule="deleteModule(block)"
          >
            <Editor
              :locales="locales"
              :value="block"
              :post="post"
              @input="changeBlock(block, $event)"
            >
            </Editor>
          </ModuleWrapper>
        </template>
      </draggable>
    </div>
    <div class="text-right">
      <b-button size="sm" @click="addNewBlock">
        Добавить колонку
      </b-button>
    </div>
    <hr />
    Цвет секции
    <ColorSelection
      :colors="colors"
      :value="getValue('box-color') || ''"
      @input="$emit('input', { ...value, 'box-color': $event })"
    ></ColorSelection>
  </div>
</template>

<script>
const colors = ["#984c8a", "#9baacb", "#503a87", "#212529"];
import { merge } from "lodash";
import { uid } from "./../../../../Helpers/Sting";
import Editor from "./Parts/Editor";
import ModuleWrapper from "./../../../Common/ModuleWrapper";
import ColorSelection from "../../../Common/ColorSelection";
import draggable from "vuedraggable";
export default {
  components: { Editor, ColorSelection, draggable, ModuleWrapper },
  props: {
    value: Object,
    settings: Object,
    locales: Object,
    post: Object
  },
  data() {
    return {
      colors
    };
  },
  methods: {
    addNewBlock() {
      // this.value.push({ id: uid() });
      if (this.value.repeat === undefined) {
        this.$emit("input", { ...this.value, repeat: [{ id: uid() }] });
      } else {
        this.value.repeat.push({ id: uid() });
      }
    },
    changeBlock(block, data) {
      this.value.repeat.map(item => {
        if (item === block) {
          item = Object.assign({}, item, merge(item, data));
        }
        return item;
      });
      this.$emit("input", this.value);
    },
    deleteModule(block) {
      return () => {
        this.$bvModal
          .msgBoxConfirm("Удалить модуль?")
          .then(value => {
            if (value)
              this.value.repeat.splice(this.value.repeat.indexOf(block), 1);
          })
          .catch(err => {
            // An error occurred
          });
      };
    },
    getValue(name) {
      return this.value && this.value[name] !== undefined
        ? this.value[name]
        : null;
    }
  },
  computed: {
    blocks() {
      if (!this.value.repeat) {
        this.addNewBlock();
      }
      return this.value.repeat;
    }
  }
};
</script>

<style></style>
