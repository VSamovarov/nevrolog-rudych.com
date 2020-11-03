<template>
  <b-tabs content-class="mt-3">
    <b-tab
      v-for="(fields, lang) in languages"
      :key="lang"
      :title="$page.locales[lang].native"
    >
      <b-form-group description="Обязательный параметр" label="Название">
        <b-form-input v-model="fields.title" trim></b-form-input>
      </b-form-group>
      <b-form-group description="Выводится в списке" label="Краткое содержание">
        <b-form-textarea v-model="fields.excerpt"></b-form-textarea>
      </b-form-group>
      <b-form-group label="Основное содержание">
        <b-form-textarea v-model="fields.content"></b-form-textarea>
      </b-form-group>
      <b-form-group label="Мета-заголовок">
        <b-form-input v-model="fields.metatitle" trim></b-form-input>
      </b-form-group>
      <b-form-group label="Мета-описание">
        <b-form-textarea v-model="fields.metadescription"></b-form-textarea>
      </b-form-group>
      <b-form-group label="Мета-ключи">
        <b-form-input v-model="fields.metakeys"></b-form-input>
      </b-form-group>
      <b-form-group label="Слаг" description="Используется в адресе">
        <b-form-input v-model="fields.slug"></b-form-input>
      </b-form-group>
    </b-tab>
  </b-tabs>
</template>

<script>
// Обязательные поля
const translateValues = {
  title: "",
  content: "",
  excerpt: "",
  metatitle: "",
  metadescription: "",
  metakeys: "",
  slug: ""
};
export default {
  props: ["translations"],
  data() {
    return {
      languages: {}
    };
  },
  created() {
    // Формируем данные
    for (let lang in this.$page.locales) {
      this.languages[lang] = {
        ...translateValues,
        ...this.translations.find(item => item.lang === lang)
      };
    }
  }
};
</script>

<style></style>
