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
            :style="{ maxWidth: '30%', width: '30%' }"
          >
            <InfoBox
              :value="block"
              :locales="locales"
              @input="changeBlock(block, $event)"
              :showicone="value['show-icone'] !== false"
              :showtext="value['show-text'] !== false"
              :showtitle="value['show-title'] !== false"
              :showlink="value['show-link'] !== false"
            ></InfoBox>
          </ModuleWrapper>
        </template>
      </draggable>
    </div>
    <div class="d-flex flex-wrap justify-content-between align-items-center">
      <div v-if="value['show-icone']">
        <a
          href="http://cms.devoffice.com/repack/packs/linearicons/"
          target="_blank"
          >Все иконки</a
        >
      </div>
      <div></div>
      <div class="text-right">
        <b-button size="sm" @click="addNewBlock">
          Добавить блок
        </b-button>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col-md-12">
        <p class="text-black-50 small">Настройки</p>
        <div class="d-flex flex-wrap align-items-center">
          <div class="mb-3 mx-3">
            Показывать
            <div class="d-flex flex-wrap justify-content-around">
              <b-form-checkbox
                class="mx-3"
                :checked="value['show-icone']"
                @input="$emit('input', { ...value, ['show-icone']: $event })"
              >
                Иконка
              </b-form-checkbox>

              <b-form-checkbox
                class="mx-3"
                :checked="value['show-title']"
                @input="$emit('input', { ...value, ['show-title']: $event })"
              >
                Заглавие
              </b-form-checkbox>

              <b-form-checkbox
                class="mx-3"
                :checked="value['show-text']"
                @input="$emit('input', { ...value, ['show-text']: $event })"
              >
                Текст
              </b-form-checkbox>
              <b-form-checkbox
                class="mx-3"
                :checked="value['show-link']"
                @input="$emit('input', { ...value, ['show-link']: $event })"
              >
                Ссылка
              </b-form-checkbox>
            </div>
          </div>
          <div class="mb-3 mx-3">
            Положение
            <b-form-checkbox
              class="mx-3"
              :checked="getValue('content-align-center') || false"
              @input="
                $emit('input', { ...value, 'content-align-center': $event })
              "
            >
              Центрировать
            </b-form-checkbox>
          </div>
          <div class="mb-3 mx-3">
            Цвет секции
            <ColorSelection
              :colors="colors"
              :value="getValue('box-color') || ''"
              @input="$emit('input', { ...value, 'box-color': $event })"
            ></ColorSelection>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const colors = ["#984c8a", "#9baacb", "#503a87", "#212529"];
import { merge } from "lodash";
import { uid } from "./../../../../Helpers/Sting";
import InfoBox from "./Parts/InfoBox";
import ModuleWrapper from "./../../../Common/ModuleWrapper";
import ColorSelection from "../../../Common/ColorSelection";
import draggable from "vuedraggable";
export default {
  components: { InfoBox, draggable, ModuleWrapper, ColorSelection },
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
