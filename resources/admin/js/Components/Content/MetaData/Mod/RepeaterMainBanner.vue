<template>
  <div>
    <div>
      <draggable
        class="mb-3"
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
            <Banner
              :value="block"
              :locales="locales"
              :post="post"
              @input="changeBlock(block, $event)"
            ></Banner>
          </ModuleWrapper>
        </template>
      </draggable>
    </div>
    <div class="text-right">
      <b-button size="sm" @click="addNewBlock">
        Добавить блок
      </b-button>
    </div>
  </div>
</template>

<script>
import { merge } from "lodash";
import { uid } from "./../../../../Helpers/Sting";
import Banner from "./Parts/Banner";
import ModuleWrapper from "./../../../Common/ModuleWrapper";
import draggable from "vuedraggable";
export default {
  components: { Banner, draggable, ModuleWrapper },
  props: {
    value: Object,
    settings: Object,
    locales: Object,
    post: Object
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
