<template>
  <b-form-group :description="hint" :label="label" :state="state">
    <b-form-input
      :type="type"
      :value="value"
      :input="(value = $event.target.value)"
    ></b-form-input>
  </b-form-group>
</template>

<script>
export default {
  props: ["type", "label", "placeholder", "value", "hint"]
};
</script>

<style></style>
