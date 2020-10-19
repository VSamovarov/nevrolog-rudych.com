<template>
  <b-nav-item :to="href" prefetch>{{ title }}</b-nav-item>
</template>

<script>
export default {
  props: ["title", "href"],
};
</script>

<style></style>
