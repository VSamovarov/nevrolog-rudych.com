<template>
  <div>
    <div class="d-flex align-items-center">
      <p class="text-black-50 small mr-4">Название секции</p>
      <p>
        <b-form-checkbox
          switch
          :checked="getValue('show-section-title') || false"
          @input="
            $emit('input', { ...value, 'show-section-title': $event || false })
          "
        >
          Включить
        </b-form-checkbox>
      </p>
      <p class="ml-4" v-if="getValue('show-section-title')">
        <b-form-checkbox
          switch
          :checked="getValue('show-link-section-title') || false"
          @input="
            $emit('input', {
              ...value,
              'show-link-section-title': $event || false
            })
          "
        >
          Добавить ссылку
        </b-form-checkbox>
      </p>
    </div>
    <b-tabs small v-if="getValue('show-section-title')">
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
            :value="getValueMultilang('section-title', lang)"
            @input="setValueMultilang('section-title', lang, $event)"
          ></b-form-input>
        </b-form-group>
        <template v-if="getValue('show-link-section-title')">
          <p class="text-black-50 small">Url</p>
          <b-form-group>
            <b-form-input
              trim
              :value="getValueMultilang('link-section-title', lang)"
              @input="setValueMultilang('link-section-title', lang, $event)"
            ></b-form-input>
          </b-form-group>
        </template>
      </b-tab>
    </b-tabs>
    <hr />
  </div>
</template>

<script>
import MultilingualInput from "./MultilingualInput";
export default {
  props: {
    value: Object | Array,
    locales: Object
  },
  components: { MultilingualInput },
  methods: {
    getValue(name) {
      return this.value[name] || null;
    },
    getValueMultilang(name, lang) {
      let input = this.value[name] || {};
      return input[lang] || null;
    },
    setValueMultilang(name, lang, value) {
      this.$emit("input", {
        ...this.value,
        [name]: { ...this.value[name], [lang]: value }
      });
    }
  }
};
</script>

<style></style>
