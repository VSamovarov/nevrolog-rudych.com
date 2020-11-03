<template>
  <div class="card">
    <div class="card-header d-flex justify-content-between" @click="visible=!visible">
      <div>
        {{ title }}
      </div>
      <div>
        <span v-if="visible">-</span>
        <span v-else>+</span>
      </div>
    </div>
    <div v-show="visible" class="card-body text-right">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: "Модуль"
    },
  },
  data() {
    return {
      visible: true
    }
  },
}
</script>

<style>

</style>
