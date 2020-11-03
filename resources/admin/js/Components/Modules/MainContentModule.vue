<template>
  <b-tabs content-class="mt-3">
    <b-tab
      v-for="(values, lang) in fields"
      :key="lang"
      :title="locales[lang].native"
    >
      <b-form-group description="Обязательный параметр" label="Название">
        <b-form-input v-model="values.title" trim></b-form-input>
      </b-form-group>
      <b-form-group description="Выводится в списке" label="Краткое содержание">
        <b-form-textarea v-model="values.excerpt"></b-form-textarea>
      </b-form-group>
      <b-form-group label="Основное содержание">
        <b-form-textarea v-model="values.content"></b-form-textarea>
      </b-form-group>
    </b-tab>
  </b-tabs>
</template>
<script>
// Обязательные поля
const valuesDefault = {
  title: "",
  content: "",
  excerpt: ""
};
export default {
  props: ["translations", "locales"],
  data() {
    return {
      fields: {}
    };
  },
  created() {
    // Формируем данные
    for (let lang in this.locales) {
      this.fields[lang] = {
        ...valuesDefault,
        ...this.translations.find(item => item.lang === lang)
      };
    }
  }
};
</script>
<style></style>
