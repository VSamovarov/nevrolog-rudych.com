<template>
  <b-tabs small>
    <b-tab v-for="(langData, lang) in locales" :key="lang" :title="lang">
      <b-form-group>
        <b-form-input
          trim
          :value="value[lang] || null"
          @input="$emit('input', { ...value, [lang]: $event })"
        ></b-form-input>
      </b-form-group>
    </b-tab>
  </b-tabs>
</template>

<script>
export default {
  props: {
    locales: Object,
    value: Object
  }
};
</script>

<style></style>
