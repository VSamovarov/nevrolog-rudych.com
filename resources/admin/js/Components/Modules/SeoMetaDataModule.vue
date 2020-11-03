<template>
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
      <b-form-group label="Слаг" description="Используется в адресе">
        <b-form-input v-model="values.slug"></b-form-input>
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
      moduleId: 'seo-meta-data-module',
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
  },
  watch: {
    fields:  {
      handler () {
        this.$emit('updateDataModules', { key: this.moduleId, data: this.fields })
      },
      immediate: true,
      deep: true
    }
  },
};
</script>
<style></style>
