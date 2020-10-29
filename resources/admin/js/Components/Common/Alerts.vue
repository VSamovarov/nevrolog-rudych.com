<template>
<div>
  <b-container fluid v-if="$page.errors">
    <b-alert class="my-4"  variant="danger" show dismissible v-for="(error, key) of $page.errors" :key="key">
      {{error}}
    </b-alert>
  </b-container>
  <b-container fluid v-if="$page.flash.errors">
    <b-alert class="my-4"  variant="danger" show dismissible v-for="(error, key) of $page.flash.errors" :key="key">
      {{error}}
    </b-alert>
  </b-container>
  <b-container fluid v-if="$page.flash.success">
    <b-alert class="my-4" variant="success" show dismissible v-for="(success, key) of $page.flash.success" :key="key">
      {{success}}
    </b-alert>
  </b-container>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>
