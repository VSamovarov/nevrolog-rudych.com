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
    <p class="text-black-50 small">Ссылка</p>
    <b-form-group>
      <b-form-input
        :value="getValue('link')"
        @input="changeModule('link', $event)"
        trim
        v-if="settings.showUrl"
      ></b-form-input>
    </b-form-group>
  </div>
</template>

<script>
import MultilingualTextarea from "../Modules/MultilingualTextarea";
import MultilingualInput from "../Modules/MultilingualInput";
const titleModuleDefaul = "";
export default {
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
  },

  methods: {
    /**
     * Общая часть
     */
    getValue(name) {
      const value =
        (this.module && this.module._value && this.module._value[name]) || null;
      return value;
    },

    getModule(name) {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      if (this.module._value[name] === undefined) {
        this.$set(this.module._value, name, {});
      }
      return this.module._value[name];
    },

    changeModule(name, value) {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      this.$set(this.module._value, name, value);
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style scoped></style>
