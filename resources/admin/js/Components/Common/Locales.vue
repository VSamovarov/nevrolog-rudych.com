<template>
  <b-button-group  size="sm" v-if="locales">
    <b-button v-for="(localeData, localeSlug) in locales" :key="localeSlug" :variant="(localeSlug===locale)?'success':'secondary'">
      {{ localeSlug }}
    </b-button>
  </b-button-group>
</template>

<script>
export default {
  data() {
    return {
      locales: {...this.$page.locales},
      locale: this.$page.locale
    }
  },
  // async created (){
  //   this.getLocales()
  // },
  // methods: {
  //   async getLocales () {
  //     try {
  //       const { data } = await axios.get(this.$route("admin.api.locales"));
  //       this.locales = data;
  //     } catch (e) {
  //       throw new Error(e)
  //     }
  //   }
  // },
}
</script>

<style>

</style>
