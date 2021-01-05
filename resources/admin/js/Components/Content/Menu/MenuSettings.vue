<template>
  <b-tabs small>
    <b-tab
      class="py-2"
      v-for="(langData, lang) in locales"
      :key="lang"
      :title="lang"
    >
      <p class="text-black-50 small">Название</p>
      <b-form-group>
        <b-form-input
          trim
          :value="settings.title[lang]"
          @input="settings.title[lang] = $event"
        ></b-form-input>
      </b-form-group>

      <p class="text-black-50 small">Url</p>
      <b-form-group>
        <b-form-input
          trim
          :value="settings.url[lang]"
          @input="settings.url[lang] = $event"
        ></b-form-input>
      </b-form-group>
    </b-tab>
  </b-tabs>
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
