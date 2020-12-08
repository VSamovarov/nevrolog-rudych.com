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
            :value="getValue([lang])"
            @input="changeModule(lang, $event)"
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
    module: Object | null,
    locales: Object,
    post: Object,
    title: {
      type: String,
      default: "Текст"
    }
  },
  /**
   * Общая часть
   */
  methods: {
    /**
     * Общая часть
     */
    getValue(name) {
      const value =
        (this.module && this.module._value && this.module._value[name]) || null;
      return value;
    },

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
