<template>
  <inertia-link class="menu-link" v-if="href" :href="href">
    <slot></slot>
  </inertia-link>
  <span class="menu-link" v-else>
    <slot></slot>
  </span>
</template>

<script>
export default {
  props: {
    href: { type: String },
  },
};
</script>

<style></style>
