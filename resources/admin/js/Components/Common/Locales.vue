<template>
  <b-button-group size="sm" v-if="locales">
    <b-button
      v-for="(localeData, localeSlug) in locales"
      :key="localeSlug"
      :variant="(localeSlug === locale)?'success':'secondary'"
      @click="setLocale(localeSlug)"
      >
      {{ localeSlug }}
    </b-button>
  </b-button-group>
</template>

<script>
export default {
  props: ['locale'],
  data() {
    return {
      locales: {...this.$page.locales},
    }
  },
  methods: {
    setLocale(locale) {
      this.$emit('setLocale', locale );
    },
  }
}
</script>

<style>

</style>
