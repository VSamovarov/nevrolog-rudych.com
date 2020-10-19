<template>
  <ul class="mb-0 pagination">
    <li
      class="page-item"
      v-for="(item,i) in links"
      :key="i"
      :class="{active:item.active,disabled:!item.url}"
    >
      <inertia-link v-if="item.url" :href="item.url" class="page-link">
        {{item.label}}
      </inertia-link>
      <span v-else class="page-link">
        {{item.label}}
      </span>

    </li>
  </ul>
</template>

<script>
export default {
  props: ['links']
}
</script>

<style>

</style>
