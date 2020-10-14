<template>
  <ul class="nav nav-pills">
    <template v-for="(item, i) in items">
    <li class="nav-item" :key="i" v-if="item.count">
      <inertia-link v-if="item.url" :href="item.url" class="nav-link" :class="{active:item.active}">
        {{item.name}}
        <span class="badge badge-secondary">{{item.count}}</span>
      </inertia-link>
    </li>
    </template>
  </ul>
</template>

<script>
export default {
  props:['items']
}
</script>

<style>

</style>
