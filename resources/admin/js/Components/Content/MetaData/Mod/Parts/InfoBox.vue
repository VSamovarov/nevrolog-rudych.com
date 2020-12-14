<template>
  <div>
    <div v-show="showicone">
      <p class="text-black-50 small">Иконка</p>
      <div class="d-flex">
        <span class="mr-4" :class="preview" :style="{ fontSize: `2rem` }">
        </span>
        <b-form-group>
          <b-form-input :value="preview" @input="setIcone" trim></b-form-input>
        </b-form-group>
      </div>
    </div>
    <div v-show="showtitle">
      <p class="text-black-50 small">Заглавие</p>
      <MultilingualInput
        :locales="locales"
        :value="getValue('title') || {}"
        @input="$emit('input', { ...value, title: $event })"
      ></MultilingualInput>
    </div>
    <div v-show="showtext">
      <p class="text-black-50 small">Текст</p>
      <MultilingualTextarea
        :locales="locales"
        :value="getValue('text') || {}"
        @input="$emit('input', { ...value, text: $event })"
      ></MultilingualTextarea>
    </div>
    <div v-show="showlink">
      <p class="text-black-50 small">Ссылка</p>
      <b-form-group>
        <b-form-input
          :value="getValue('link') || ''"
          @input="$emit('input', { ...value, link: $event })"
          trim
        ></b-form-input>
      </b-form-group>
    </div>
  </div>
</template>

<script>
import MultilingualInput from "./MultilingualInput";
import MultilingualTextarea from "./MultilingualTextarea";
export default {
  components: {
    MultilingualInput,
    MultilingualTextarea
  },
  props: {
    value: Object,
    locales: Object,

    showicone: Boolean,
    showtext: Boolean,
    showtitle: Boolean,
    showlink: Boolean
  },
  data() {
    return {
      preview: this.getValue("icone") || ""
    };
  },
  methods: {
    getValue(name) {
      return this.value && this.value[name] !== undefined
        ? this.value[name]
        : null;
    },
    setIcone(icone) {
      this.preview = icone;
      this.$emit("input", { ...this.value, icone });
    }
  }
};
</script>

<style></style>
