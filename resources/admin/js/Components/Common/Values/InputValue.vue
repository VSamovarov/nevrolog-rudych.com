<template>
  <b-form-group :description="data.hint" :state="data.state">
    <b-form-input
      :type="data.type || `text`"
      :value="value"
      @input="$emit('input', $event)"
    ></b-form-input>
  </b-form-group>
</template>

<script>
export default {
  props: ["data", "value"]
};
</script>

<style></style>
