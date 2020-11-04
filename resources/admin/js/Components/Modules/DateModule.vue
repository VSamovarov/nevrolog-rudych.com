<template>
  <ModuleWrapper title="Время создания">
    <b-form-group
      label="Дата"
      label-cols-sm="2"
      label-align-sm="right"
    >
      <b-form-input type="date" v-model="dateModule" trim></b-form-input>
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
    date: {
      default: null
    },
  },
  data() {
    return {
      moduleId: 'date-module',
      dateModule: this.date
    }
  },
  watch: {
    date:  {
      handler () {
        this.$emit('updateDataModules', { key: this.moduleId, data: this.dateModule })
      },
      immediate: true
    }
  },
}
</script>

<style>

</style>
