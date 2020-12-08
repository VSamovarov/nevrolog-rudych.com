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
      <p class="ml-4" v-if="getValue('show-section-title')">
        <b-form-checkbox
          switch
          :checked="getValue('show-link-section-title')"
          @input="changeModule('show-link-section-title', $event || false)"
        >
          Добавить ссылку
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
    <template
      v-if="
        getValue('show-section-title') && getValue('show-link-section-title')
      "
    >
      <p class="text-black-50 small">Ссылка</p>
      <b-form-group>
        <b-form-input
          :value="getValue('link-section-title')"
          @input="changeModule('link-section-title', $event)"
          trim
        ></b-form-input>
      </b-form-group>
    </template>
    <hr />
  </div>
</template>

<script>
import MultilingualInput from "./MultilingualInput";
import MatadataMixin from "./../mixin";
export default {
  mixins: [MatadataMixin],
  props: {
    module: Object,
    locales: Object
  },
  components: { MultilingualInput }
};
</script>

<style></style>
