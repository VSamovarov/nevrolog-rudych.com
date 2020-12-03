<template>
  <div>
    <component
      :is="component"
      :module="module"
      :locales="locales"
      :post="post"
      :class="module.type"
      @changeModule="$emit(`changeModule`, $event)"
    >
    </component>
  </div>
</template>

<script>
import LoadingComponent from "./StartModuleLoading";
import ErrorComponent from "./ErrorModuleLoading";

export default {
  props: ["module", "locales", "post"],
  data() {
    return {
      component: LoadingComponent
    };
  },
  components: {
    LoadingComponent,
    ErrorComponent
  },
  computed: {
    loader() {
      return () => import(`./Modules/${this.module.name}`);
    }
  },
  created() {
    this.loader()
      .then(() => {
        this.$emit("isLoaded", true);
        this.component = () => this.loader();
      })
      .catch(e => {
        this.component = ErrorComponent;
        console.error(e);
      });
  }
};
</script>

<style></style>
