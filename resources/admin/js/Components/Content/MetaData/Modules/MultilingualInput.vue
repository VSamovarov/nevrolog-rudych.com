<template>
  <b-tabs content-class="mt-3">
    <b-tab
      v-for="(values, lang) in locales"
      :key="lang"
      :title="locales[lang].native"
    >
      <b-form-group>
        <b-form-input
          :value="(module && module.content && module.content[lang]) || null "
          @input="changeInput(lang,  $event)"
          trim
        ></b-form-input>
      </b-form-group>
    </b-tab>
  </b-tabs>
</template>

<script>
export default {
  props: ["module", "locales"],
  data() {
    return {
      type: 'multilingual-input'
    }
  },
  methods: {
    changeInput(lang, value) {
      const module = { ...this.module, type: this.type};
      module.content = {...module.content, [lang]: value };
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style></style>
