<template>
  <b-tabs small>
    <b-tab v-for="(langData, lang) in locales" :key="lang" :title="lang">
      <b-form-group>
        <b-form-textarea
          :value="value[lang] || null"
          @input="$emit('input', { ...value, [lang]: $event })"
          rows="3"
          max-rows="6"
          trim
        ></b-form-textarea>
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
