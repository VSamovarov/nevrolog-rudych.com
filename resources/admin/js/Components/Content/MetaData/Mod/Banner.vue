<template>
  <div>
    <div class="row">
      <div class="col-md-4">
        <ImageInput
          :locales="locales"
          :post="post"
          :value="getValue('image') || {}"
          @input="$emit('input', { ...value, image: $event })"
        ></ImageInput>
      </div>
      <div class="col-md-8">
        <p class="text-black-50 small">Заглавие</p>
        <MultilingualInput
          :locales="locales"
          :value="getValue('title') || {}"
          @input="$emit('input', { ...value, title: $event })"
        ></MultilingualInput>

        <p class="text-black-50 small">Текст</p>
        <MultilingualTextarea
          :locales="locales"
          :value="getValue('text') || {}"
          @input="$emit('input', { ...value, text: $event })"
        ></MultilingualTextarea>
        <p class="text-black-50 small">Ссылка</p>
        <b-form-group>
          <b-form-input
            :value="getValue('link') || ''"
            @input="$emit('input', { ...value, link: $event })"
            trim
          ></b-form-input>
        </b-form-group>
        <p class="text-black-50 small">Текст кнопки</p>
        <MultilingualInput
          :locales="locales"
          :value="getValue('action_name') || {}"
          @input="$emit('input', { ...value, action_name: $event })"
        ></MultilingualInput>
      </div>
    </div>
  </div>
</template>
<script>
import MultilingualInput from "./Parts/MultilingualInput";
import MultilingualTextarea from "./Parts/MultilingualTextarea";
import ImageInput from "./Parts/ImageInput";
export default {
  components: {
    MultilingualInput,
    MultilingualTextarea,
    ImageInput
  },
  props: {
    value: Object,
    settings: Object,
    locales: Object,
    post: Object
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
