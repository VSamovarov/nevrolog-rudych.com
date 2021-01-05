<template>
  <div>
    <p>Название</p>
    <multilingual-text-input
      :value="settings.title"
      :locales="locales"
      @input="settings.title = { ...settings.title, ...$event }"
    ></multilingual-text-input>
    <p>Url</p>
    <multilingual-text-input
      :value="settings.url"
      :locales="locales"
      @input="settings.url = { ...settings.url, ...$event }"
    ></multilingual-text-input>
  </div>
</template>

<script>
import MultilingualTextInput from "./../../Common/Values/MultilingualTextInput";

export default {
  name: "menu-settings",
  components: { MultilingualTextInput },
  props: {
    locales: Object,
    settings: Object
  },
  data() {
    return {
      slugShow: false
    };
  }
};
</script>

<style></style>
