<template>
  <div>
    <div class="row" :class="{ 'flex-row-reverse': getValue('reverse') }">
      <div class="col-md-4">
        <p class="text-black-50 small">Картинка</p>
        <ImageInput
          :locales="locales"
          :post="post"
          :value="getValue('image') || {}"
          @input="$emit('input', { ...value, image: $event })"
        ></ImageInput>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6">
            <p class="text-black-50 small">Цена</p>
            <b-form-group>
              <b-form-input
                type="number"
                :value="getValue('price') || null"
                @input="$emit('input', { ...value, price: $event })"
              ></b-form-input>
            </b-form-group>
          </div>
          <div class="col-md-6">
            <p class="text-black-50 small">Длительность</p>
            <b-form-group>
              <b-form-input
                type="number"
                :value="getValue('time') || null"
                @input="$emit('input', { ...value, time: $event })"
              ></b-form-input>
            </b-form-group>
          </div>
        </div>
        <b-tabs small>
          <b-tab
            class="py-2"
            v-for="(langData, lang) in locales"
            :key="lang"
            :title="lang"
          >
            <p class="text-black-50 small">Заглавие</p>
            <b-form-group>
              <b-form-input
                trim
                :value="getValueMultilang('title', lang)"
                @input="setValueMultilang('title', lang, $event)"
              ></b-form-input>
            </b-form-group>

            <p class="text-black-50 small">Текст</p>
            <b-form-group>
              <CkEditor
                :value="getValueMultilang('text', lang)"
                :post_id="post.id"
                @input="setValueMultilang('text', lang, $event)"
              ></CkEditor>
            </b-form-group>
          </b-tab>
        </b-tabs>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col-md-12">
        <p class="text-black-50 small">Настройки</p>
        <div class="d-flex flex-wrap align-items-center justify-content-around">
          <b-form-checkbox
            :checked="getValue('reverse') || false"
            @input="$emit('input', { ...value, reverse: $event })"
          >
            Картинка справа
          </b-form-checkbox>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const colors = ["#984c8a", "#9baacb", "#503a87", "#212529", "#fbe7f8"];
import ColorSelection from "../../../Common/ColorSelection";
import ImageInput from "./Parts/ImageInput";
import CkEditor from "./../../../Common/CkEditor/CkEditorClassic";
export default {
  components: {
    ColorSelection,
    ImageInput,
    CkEditor
  },
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
    getValue(name) {
      return this.value && this.value[name] !== undefined
        ? this.value[name]
        : null;
    },
    getValueMultilang(name, lang) {
      let input = this.value[name] || {};
      return input[lang] || null;
    },
    setValueMultilang(name, lang, value) {
      this.$emit("input", {
        ...this.value,
        [name]: { ...this.value[name], [lang]: value }
      });
    }
  }
};
</script>

<style scoped></style>
