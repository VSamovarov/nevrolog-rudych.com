<template>
  <component
    :is="moduleComponent"
    :module="module"
    :locales="locales"
    :post="post"
    @changeModule="$emit(`changeModule`, $event)"
  >
  </component>
</template>

<script>
import Vue from "vue";
export default {
  props: ["module", "locales", "post"],
  data() {
    return {
      moduleComponent: null
    };
  },
  computed: {
    loader() {
      if (!this.module.name) {
        return null;
      }
      return () => import(`./Modules/${this.module.name}`);
    }
  },
  mounted: function() {
    this.loader()
      .then(() => {
        this.moduleComponent = () => this.loader();
      })
      .catch(() => {
        this.module = () => import("./ErrorModuleLoading.vue");
      });
  }
};
</script>

<style></style>
