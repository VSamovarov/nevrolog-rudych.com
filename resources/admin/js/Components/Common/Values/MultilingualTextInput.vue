<template>
  <b-tabs small>
    <b-tab v-for="(langData, lang) in locales" :key="lang" :title="lang">
      <b-form-group>
        <b-form-input
          :value="value[lang] || null"
          @input="$emit('input', { [lang]: $event })"
          trim
        ></b-form-input>
      </b-form-group>
    </b-tab>
  </b-tabs>
</template>

<script>
export default {
  name: "multilingual-text-input",
  props: {
    locales: Object,
    value: Object
  }
};
</script>

<style></style>
