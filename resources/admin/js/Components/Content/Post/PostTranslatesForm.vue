<template>
<div>
  {{translations}}
  <b-tabs content-class="mt-3">
    <b-tab
    v-for="(localeData, localeSlug) in locales"
    :key="localeSlug"
    :title="localeData.native"
    >

    {{ localeData }}

    </b-tab>

  </b-tabs>
</div>
</template>

<script>
export default {
  props:['translations'],
  data() {
    return {
      locales: {...this.$page.locales},
    }
  },
}

</script>

<style>

</style>
