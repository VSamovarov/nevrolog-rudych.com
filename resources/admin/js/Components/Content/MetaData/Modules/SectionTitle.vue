<template>
  <div>
    <div class="d-flex align-items-center">
      <p class="text-black-50 small mr-4">Название секции</p>
      <p>
        <b-form-checkbox
          switch
          :checked="getValue('show-section-title')"
          @input="changeModule('show-section-title', $event || false)"
        >
          Включить
        </b-form-checkbox>
      </p>
    </div>

    <MultilingualInput
      v-if="getValue('show-section-title')"
      title=""
      :locales="locales"
      :module="getModule('section-title')"
      @changeModule="changeModule('section-title', $event)"
    ></MultilingualInput>

    <hr />
  </div>
</template>

<script>
import MultilingualInput from "./MultilingualInput";
export default {
  props: {
    module: Object,
    locales: Object
  },
  components: { MultilingualInput },
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
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      this.$set(this.module._value, name, value);
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style></style>
