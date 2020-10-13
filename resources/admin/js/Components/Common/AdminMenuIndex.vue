<template>
  <ul class="list-group list-group-horizontal">
    <li v-for="(item, i) in items" :key="i" class="list-group-item">
      <inertia-link v-if="item.url" :href="item.url" class="page-link">
        {{item.name}}
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
