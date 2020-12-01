<template>
  <component
    :is="loader"
    :module="module"
    :locales="locales"
    :post="post"
    @changeModule="$emit(`changeModule`, $event)"
  >
  </component>
</template>

<script>
import LoadingComponent from "./StartModuleLoading";
import ErrorComponent from "./ErrorModuleLoading";
export default {
  props: ["module", "locales", "post"],
  components: {
    LoadingComponent,
    ErrorComponent
  },
  computed: {
    loader() {
      return () => ({
        component: import(`./Modules/${this.module.name}`),
        loading: LoadingComponent,
        error: ErrorComponent,
        delay: 100,
        timeout: 3000
      });
    }
  }
};
</script>

<style></style>
