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
            Картинка справа (внизу)
          </b-form-checkbox>

          <b-form-checkbox
            :checked="getValue('big-image') || false"
            @input="$emit('input', { ...value, 'big-image': $event })"
          >
            Большая картинка
          </b-form-checkbox>

          <div>
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
const colors = ["#984c8a", "#9baacb", "#503a87", "#212529", "#fbe7f8"];
import Editor from "./Parts/Editor";
import ColorSelection from "../../../Common/ColorSelection";
import ImageInput from "./Parts/ImageInput";
export default {
  components: {
    Editor,
    ColorSelection,
    ImageInput
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
