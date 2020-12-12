<template>
  <div>
    <p class="text-black-50 small">Текст</p>
    <Editor
      :locales="locales"
      :value="getValue('text') || {}"
      :post="post"
      @input="$emit('input', { ...value, text: $event })"
    >
    </Editor>
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
import Editor from "./Parts/Editor";
import ColorSelection from "../../../Common/ColorSelection";
export default {
  props: {
    value: Object,
    settings: Object,
    locales: Object,
    post: Object
  },
  components: {
    Editor,
    ColorSelection
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

<style></style>
