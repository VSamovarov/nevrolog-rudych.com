<template>
  <div :class="this.module._name">
    <p v-if="title" class="text-black-50 small">{{ title }}</p>
    <b-tabs small>
      <b-tab v-for="(values, lang) in locales" :key="lang" :title="lang">
        <b-form-group>
          <b-form-input
            :value="getValue([lang])"
            @input="changeModule(lang, $event)"
            trim
          ></b-form-input>
        </b-form-group>
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>
const titleModuleDefaul = "Текст";
import MatadataMixin from "./../mixin";
export default {
  mixins: [MatadataMixin],
  props: {
    module: Object | null,
    locales: Object,
    title: {
      type: String,
      default: titleModuleDefaul
    }
  }
};
</script>

<style></style>
