<template>
  <b-form-group
    :description="data.hint"
    :label="data.label"
    :state="data.state"
  >
    <b-form-file></b-form-file>
  </b-form-group>
</template>

<script>
export default {
  props: ["data"]
};
</script>

<style></style>
