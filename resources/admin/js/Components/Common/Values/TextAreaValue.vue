<template>
  <b-form-group :description="hint" :label="label" :state="state">
    <b-form-textarea
      :value="value"
      :input="(value = $event.target.value)"
      :placeholder="placeholder"
      rows="3"
      max-rows="6"
    ></b-form-textarea>

    <pre class="mt-3 mb-0">{{ text }}</pre>
  </b-form-group>
</template>

<script>
export default {
  props: ["type", "label", "placeholder", "value", "hint"]
};
</script>

<style></style>
