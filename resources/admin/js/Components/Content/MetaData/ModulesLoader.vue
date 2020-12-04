<template>
  <div>
    <SectionTitle :module="module" :locales="locales"></SectionTitle>
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
import SectionTitle from "./Modules/SectionTitle";
import { moduleNameCase } from "./../../../Helpers/Sting";
export default {
  props: {
    module: Object | null,
    locales: Object,
    post: Object
  },
  data() {
    return {
      component: LoadingComponent
    };
  },
  components: {
    LoadingComponent,
    ErrorComponent,
    SectionTitle
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
