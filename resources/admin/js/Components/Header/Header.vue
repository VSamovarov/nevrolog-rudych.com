<template>
  <header class="header">
    <MainMenu :items="main_menu" />
  </header>
</template>

<script>
import MainMenu from "./../Header/MainMenu";
export default {
  props: ["main_menu"],
  components: {
    MainMenu,
  },
  methods: {
    hiddeSidbar: function () {
      this.$emit("toddle");
    },
  },
};
</script>

<style>
.header {
  background-color: var(--gray-dark);
  margin-bottom: -1px;
}
</style>
