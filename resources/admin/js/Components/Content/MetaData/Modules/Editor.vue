<template>
  <div>
    <p v-if="title" class="text-black-50 small">{{ title }}</p>
    <b-tabs small>
      <b-tab
        v-for="(values, lang) in locales"
        :key="lang"
        :title="lang"
        vertical
        end
      >
        <b-form-group>
          <Editor
            :value="(module && module.content && module.content[lang]) || null"
            @input="changeInput(lang, $event)"
            :post_id="post.id"
          ></Editor>
        </b-form-group>
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>
import Editor from "./../../../Common/CkEditor/CkEditorClassic";
export default {
  components: { Editor },
  props: {
    module: Object,
    locales: Object,
    post: Object,
    title: {
      type: String,
      default: "Текст"
    }
  },
  data() {
    return {
      type: "multilingual-editor"
    };
  },
  methods: {
    changeInput(lang, value) {
      const module = { ...this.module, type: this.type };
      module.content = { ...module.content, [lang]: value };
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style></style>
