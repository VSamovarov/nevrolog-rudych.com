<template> </template>

<script>
import ImageInput from "../Modules/ImageInput";
import MultilingualInput from "../Modules/MultilingualInput";
const defaultData = {
  reverce: false
};
export default {
  components: {
    ImageInput,
    MultilingualInput
  },
  props: [moduleData],
  data() {
    return {
      reverse: false
    };
  }
};
</script>

<style></style>
