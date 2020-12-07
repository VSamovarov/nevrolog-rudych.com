<template>
  <div :class="this.module._name">
    <p v-if="title" class="text-black-50 small">{{ title }}</p>
    <b-tabs small>
      <b-tab v-for="(values, lang) in locales" :key="lang" :title="lang">
        <b-form-group>
          <b-form-textarea
            :value="getValue([lang])"
            @input="changeModule(lang, $event)"
            rows="3"
            max-rows="6"
            trim
          ></b-form-textarea>
        </b-form-group>
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>
const titleModuleDefaul = "Текст";
export default {
  props: {
    module: Object | null,
    locales: Object,
    title: {
      type: String,
      default: titleModuleDefaul
    }
  },
  /**
   * Общая часть
   */
  methods: {
    getValue(name) {
      return (
        (this.module && this.module._value && this.module._value[name]) || null
      );
    },
    changeModule(name, value) {
      const module = this.module || { _value: {} };
      module._value = {
        ...((this.module && this.module._value) || {}),
        [name]: value
      };
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style></style>
