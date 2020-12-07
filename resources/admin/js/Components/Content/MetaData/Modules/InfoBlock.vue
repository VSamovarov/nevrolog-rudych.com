<template>
  <div>
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
    <MultilingualInput
      title="Заглавие"
      :module="getModule('title')"
      :locales="locales"
      @changeModule="changeModule('title', $event)"
    ></MultilingualInput>
    <MultilingualTextarea
      title="Текст"
      :module="getModule('text')"
      :locales="locales"
      @changeModule="changeModule('text', $event)"
    ></MultilingualTextarea>
    <p class="text-black-50 small">Ссылка</p>
    <b-form-group>
      <b-form-input
        :value="getValue('link')"
        @input="changeModule('link', $event)"
        trim
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

    //?! Мутируем пропсы
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
      const module = this.module || { _value: {} };
      module._value = {
        ...((this.module && this.module._value) || {}),
        [name]: value
      };
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style scoped></style>
