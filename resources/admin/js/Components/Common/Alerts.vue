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

    <template v-if="alerts">
      <b-container fluid v-for="(alert, keyModule) of alerts" :key="keyModule">
        <b-alert class="my-4" :variant="variantName(alert.type)" show dismissible v-for="(message, keyMessage) of alert.messages" :key="keyMessage">
          {{message}}
        </b-alert>
      </b-container>
    </template>
  </div>
</template>

<script>
export default {
  props: ['alerts'],
  methods: {
    variantName(value) {
      if(value.includes('error') > -1) {
        return 'danger';
      } else {
        return 'success'
      }
    }
  },
}
</script>

<style>

</style>
