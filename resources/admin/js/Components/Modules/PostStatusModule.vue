<template>
  <ModuleWrapper title="Статус">
    <b-form-group>
      <b-form-select v-model="statusModule" :options="statuses" size="sm"></b-form-select>
    </b-form-group>
  </ModuleWrapper>
</template>

<script>
import ModuleWrapper from "./../../Components/Common/ModuleWrapper";

export default {
  components: {
    ModuleWrapper,
  },
  props: {
    status: {
      default: null
    },
    statuses: {
      default: []
    },
  },
  data() {
    return {
      moduleId: 'post-status-module',
      statusModule: this.status
    }
  },
  watch: {
    statusModule:  {
      handler () {
        this.$emit('updateDataModules', { key: this.moduleId, data: this.statusModule })
      },
      immediate: true
    }
  },
}
</script>

<style>

</style>
