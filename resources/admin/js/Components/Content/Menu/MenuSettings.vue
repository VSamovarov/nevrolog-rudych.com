<template>
  <div>
    <p>Название</p>
    <multilingual-text-input
      :value="settings.title"
      :locales="locales"
      @input="settings.title = { ...settings.title, ...$event }"
    ></multilingual-text-input>
    <p>Url</p>
    <b-form-group>
      <b-form-input v-model="settings.url" trim></b-form-input>
    </b-form-group>
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
