<template>
  <ModuleWrapper title="Ярлык">
    <b-form-group>
      <b-form-select
        v-model="slugModule"
        :options="slugs"
        size="sm"
      ></b-form-select>
    </b-form-group>
    <div class="small">{{ slugModule }}</div>
  </ModuleWrapper>
</template>

<script>
import ModuleWrapper from "./../../Components/Common/ModuleWrapper";

export default {
  components: {
    ModuleWrapper
  },
  props: {
    slug: {
      default: null
    },
    slugs: {
      default: []
    }
  },
  data() {
    return {
      moduleId: "post-slug-module",
      slugModule: this.slug
    };
  },
  watch: {
    slugModule: {
      handler() {
        this.$emit("updateDataModules", {
          key: this.moduleId,
          data: this.slugModule
        });
      },
      immediate: true
    }
  }
};
</script>

<style></style>
