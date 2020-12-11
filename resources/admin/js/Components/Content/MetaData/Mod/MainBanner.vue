<template>
  <div>
    <div class="row">
      <div class="col-md-4">
        <ImageInput
          :locales="locales"
          :post="post"
          :value="getValue('image') || {}"
          @input="changeModule('image', $event)"
        ></ImageInput>
      </div>
      <div class="col-md-8">
        <p class="text-black-50 small">Заглавие</p>
        <MultilingualInput
          :locales="locales"
          :value="getValue('title') || {}"
          @input="changeModule('title', $event)"
        ></MultilingualInput>

        <p class="text-black-50 small">Текст</p>
        <MultilingualTextarea
          :locales="locales"
          :value="getValue('text') || {}"
          @input="changeModule('text', $event)"
        ></MultilingualTextarea>
        <p class="text-black-50 small">Ссылка</p>
        <b-form-group>
          <b-form-input
            :value="getValue('link') || ''"
            @input="changeModule('link', $event)"
            trim
          ></b-form-input>
        </b-form-group>
        <p class="text-black-50 small">Текст кнопки</p>
        <MultilingualInput
          :locales="locales"
          :value="getValue('action-name') || {}"
          @input="changeModule('action-name', $event)"
        ></MultilingualInput>
      </div>
    </div>
  </div>
</template>
<script>
import MultilingualInput from "./Parts/MultilingualInput";
import MultilingualTextarea from "./Parts/MultilingualTextarea";
import ImageInput from "./Parts/ImageInput";
const titleModuleDefaul = "";
export default {
  components: {
    MultilingualInput,
    MultilingualTextarea,
    ImageInput
  },
  props: {
    module: Object,
    settings: Object,
    locales: Object,
    post: Object,
    title: {
      type: String,
      default: titleModuleDefaul
    }
  },
  methods: {
    getValue(name) {
      let value =
        this.module &&
        this.module._value &&
        this.module._value[name] !== undefined
          ? this.module._value[name]
          : null;
      return value;
    },
    changeModule(name, value) {
      this.$emit(`changeModule`, { [name]: value });
    }
  }
};
</script>

<style></style>
