<template>
  <ModuleWrapper title="Основной контент">
    <b-tabs content-class="mt-3">
      <b-tab
        v-for="(values, lang) in fields"
        :key="lang"
        :title="locales[lang].native"
      >
        <b-form-group description="Обязательный параметр" label="Название">
          <b-form-input v-model="values.title" trim></b-form-input>
        </b-form-group>
        <b-form-group
          description="Выводится в списке"
          label="Краткое содержание"
        >
          <b-form-textarea v-model="values.excerpt"></b-form-textarea>
        </b-form-group>
        <b-form-group label="Основное содержание">
          <Editor v-model="values.content" :post_id="post_id"></Editor>
        </b-form-group>
      </b-tab>
    </b-tabs>
  </ModuleWrapper>
</template>
<script>
// Обязательные поля
const defaultProperties = {
  title: null,
  content: null,
  excerpt: null
};

import { fillDefaultProperties } from "./../../Helpers/Obj";
import ModuleWrapper from "./../../Components/Common/ModuleWrapper";
import Editor from "./../../Components/Common/CkEditor/CkEditorClassic";

export default {
  components: {
    ModuleWrapper,
    Editor
  },
  props: ["translations", "locales", "post_id"],
  data() {
    return {
      moduleId: "main-content-module",
      fields: {}
    };
  },
  created() {
    // Формируем данные
    for (let lang in this.locales) {
      this.fields[lang] = fillDefaultProperties(
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
