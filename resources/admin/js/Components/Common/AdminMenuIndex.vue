<template>
  <ul class="list-group list-group-horizontal">
    <li v-for="(item, key) in items" :key="key" class="list-group-item">
      <inertia-link v-if="item.url" :href="item.url" class="page-link">
        {{item.label}}
      </inertia-link>
    </li>
  </ul>
</template>

<script>
export default {
  props:['items']
}
</script>

<style>

</style>
