<template>
  <b-tabs small>
    <b-tab v-for="(values, lang) in locales" :key="lang" :title="lang">
      <b-form-group>
        <b-form-input
          :value="(module && module.content && module.content[lang]) || null"
          @input="changeInput(lang, $event)"
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
      type: "multilingual-input"
    };
  },
  methods: {
    changeInput(lang, value) {
      this.$emit(`changeModule`, {
        ...this.module,
        ...{ type: this.type, content: { ...this.module, [lang]: value } }
      });
    }
  }
};
</script>

<style></style>
