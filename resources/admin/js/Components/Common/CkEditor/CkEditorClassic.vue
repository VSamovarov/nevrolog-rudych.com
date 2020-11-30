<template>
  <ckeditor
    :editor="editor"
    :value="value"
    @input="$emit('input', $event)"
    :config="editorConfig"
  >
  </ckeditor>
</template>

<script>
import Vue from "vue";

import UploadAdapter from "./UploadAdapter";

import InlineEditor from "@blowstack/ckeditor5-full-free-build";

function UploadAdapterPlugin(editor) {
  editor.plugins.get("FileRepository").createUploadAdapter = loader => {
    return new UploadAdapter(loader, url);
  };
}
export default {
  props: ["value", "post_id"],
  methods: {
    changeContent(value) {}
  },
  data() {
    return {
      editor: InlineEditor,
      url: this.$route("admin.api.post.add-image", this.post_id),
      editorConfig: {
        removePlugins: ["Title", "simpleUpload"],
        extraPlugins: [UploadAdapterPlugin],
        toolbar: {
          items: [
            "heading",
            "|",
            "bold",
            "italic",
            "underline",
            "strikethrough",
            "subscript",
            "superscript",
            "link",
            "bulletedList",
            "numberedList",
            "|",
            "alignment",
            "indent",
            "outdent",
            "|",
            "imageUpload",
            "blockQuote",
            "insertTable",
            "mediaEmbed",
            "undo",
            "redo"
          ]
        },
        image: {
          styles: ["alignLeft", "alignCenter", "alignRight"],
          resizeOptions: [
            {
              name: "imageResize:original",
              label: "Original",
              value: null
            },
            {
              name: "imageResize:50",
              label: "50%",
              value: "50"
            },
            {
              name: "imageResize:75",
              label: "75%",
              value: "75"
            }
          ],
          toolbar: [
            "imageStyle:alignLeft",
            "imageStyle:alignCenter",
            "imageStyle:alignRight",
            "|",
            "imageResize",
            "|",
            "imageTextAlternative"
            // "|",
            // "linkImage",
          ]
        },
        table: {
          contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"]
        }
      }
    };
  }
};
</script>
