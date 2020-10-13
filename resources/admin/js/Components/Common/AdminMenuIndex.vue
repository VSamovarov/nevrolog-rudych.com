<template>
  <ul class="nav nav-pills">
    <li v-for="(item, i) in items" :key="i" class="nav-item">
      <inertia-link v-if="item.url" :href="item.url" class="nav-link" :class="{active:item.active}">
        {{item.name}}
        <span class="badge badge-secondary">{{item.count}}</span>
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
