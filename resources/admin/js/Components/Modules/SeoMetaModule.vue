<template>
  <ModuleWrapper title="SEO">
    <b-tabs content-class="mt-3">
      <b-tab
        v-for="(values, lang) in fields"
        :key="lang"
        :title="locales[lang].native"
      >
        <b-form-group label="Мета-заголовок">
          <b-form-input v-model="values.metatitle" trim></b-form-input>
        </b-form-group>
        <b-form-group label="Мета-описание">
          <b-form-textarea v-model="values.metadescription"></b-form-textarea>
        </b-form-group>
        <b-form-group label="Мета-ключи">
          <b-form-input v-model="values.metakeys"></b-form-input>
        </b-form-group>
      </b-tab>
    </b-tabs>
  </ModuleWrapper>
</template>
<script>
// Обязательные поля
const defaultProperties = {
  metatitle: null,
  metadescription: null,
  metakeys: null
};
import {
  fillDefaultProperties,
  fillDefaultPropertiesNative
} from "./../../Helpers/Obj";
import ModuleWrapper from "./../../Components/Common/ModuleWrapper";

export default {
  components: {
    ModuleWrapper
  },
  props: ["translations", "locales"],
  data() {
    return {
      moduleId: "seo-meta-data-module",
      fields: {}
    };
  },
  created() {
    // Формируем данные
    for (let lang in this.locales) {
      this.fields[lang] = fillDefaultPropertiesNative(
        defaultProperties,
        this.translations.find((item, key) => item.lang === lang)
      );
    }
  },
  watch: {
    fields: {
      handler() {
        this.$emit("updateDataModules", {
          key: this.moduleId,
          data: this.fields
        });
      },
      immediate: true,
      deep: true
    }
  }
};
</script>
<style></style>
