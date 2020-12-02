<template>
  <div>
    <p class="text-black-50 small">Название секции</p>
    <MultilingualInput
      :locales="locales"
      :module="(module && module.sectionTitle) || null"
      @changeModule="$emit(`changeModule`, $event)"
    ></MultilingualInput>
    <hr />
  </div>
</template>

<script>
import MultilingualInput from "./MultilingualInput";
export default {
  props: ["module", "locales"],
  components: { MultilingualInput }
};
</script>

<style></style>
