<template>
  <div>
    <component
      :is="component"
      :module="module"
      :locales="locales"
      :post="post"
      @changeModule="$emit(`changeModule`, $event)"
    >
    </component>
  </div>
</template>

<script>
import LoadingComponent from "./StartModuleLoading";
import ErrorComponent from "./ErrorModuleLoading";
import { moduleNameCase } from "./../../../Helpers/Sting";
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
      const moduleName = moduleNameCase(this.module._name);
      return () => import(`./Modules/${moduleName}`);
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
