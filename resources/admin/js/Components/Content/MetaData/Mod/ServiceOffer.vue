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
        <p class="text-black-50 small">Название</p>
        <MultilingualInput
          :locales="locales"
          :value="getValue('title') || {}"
          @input="$emit('input', { ...value, title: $event })"
        ></MultilingualInput>
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
        <p class="text-black-50 small">Текст</p>
        <Editor
          :locales="locales"
          :value="getValue('text') || {}"
          :post="post"
          @input="$emit('input', { ...value, text: $event })"
        >
        </Editor>
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
import MultilingualInput from "./Parts/MultilingualInput";
import Editor from "./Parts/Editor";
export default {
  components: {
    ColorSelection,
    ImageInput,
    MultilingualInput,
    Editor
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
    }
  }
};
</script>

<style scoped></style>
