<template>
  <b-form-group :description="data.hint || null" :state="data.state || null">
    <b-form-textarea
      :value="value"
      @input="$emit('input', $event)"
      :placeholder="data.placeholder"
      rows="3"
      max-rows="6"
    ></b-form-textarea>
  </b-form-group>
</template>

<script>
export default {
  props: ["value", "data"]
};
</script>

<style></style>
