<template>
  <div>
    <template v-if="settings.showIcone">
      <p class="text-black-50 small">Иконка</p>
      <div class="d-flex">
        <span
          class="mr-4"
          :class="getValue('icone')"
          :style="{ fontSize: `2rem` }"
        >
        </span>
        <b-form-group>
          <b-form-input
            :value="getValue('icone')"
            @input="changeModule('icone', $event)"
            trim
          ></b-form-input>
        </b-form-group>
      </div>
    </template>
    <MultilingualInput
      title="Заглавие"
      :module="getModule('title')"
      :locales="locales"
      @changeModule="changeModule('title', $event)"
      v-if="settings.showTitle"
    ></MultilingualInput>
    <MultilingualTextarea
      title="Текст"
      :module="getModule('text')"
      :locales="locales"
      @changeModule="changeModule('text', $event)"
      v-if="settings.showText"
    ></MultilingualTextarea>
    <template v-if="settings.showUrl">
      <p class="text-black-50 small">Ссылка</p>
      <b-form-group>
        <b-form-input
          :value="getValue('link')"
          @input="changeModule('link', $event)"
          trim
        ></b-form-input>
      </b-form-group>
    </template>
  </div>
</template>

<script>
import MultilingualTextarea from "../Modules/MultilingualTextarea";
import MultilingualInput from "../Modules/MultilingualInput";
import MatadataMixin from "./../mixin";
const titleModuleDefaul = "";
export default {
  mixins: [MatadataMixin],
  data() {
    return {
      reverse: false
    };
  },
  components: {
    MultilingualInput,
    MultilingualTextarea
  },
  props: {
    module: Object,
    settings: Object,
    locales: Object,
    post: Object,
    title: {
      type: String,
      default: titleModuleDefaul
    }
  }
};
</script>

<style scoped></style>
