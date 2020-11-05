<template>
  <div>
    <quillEditor
    :value="value"
    @change="$emit('input', $event.html)"
    :options="editorOption"
    ></quillEditor>
  </div>
</template>

<script>
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'

import { quillEditor, Quill } from 'vue-quill-editor'
import ImageUploader from "quill-image-uploader";
Quill.register("modules/imageUploader", ImageUploader);

export default {
  props: ["value"],
  components: {
    quillEditor
  },
    data() {
    return {
      editorOption: {
        modules: {
          imageUploader: {
            upload: (file) => {
              console.log(file);
              return new Promise((resolve, reject) => {
                setTimeout(() => {
                  resolve(
                    "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/480px-JavaScript-logo.png"
                  );
                }, 3500);
              });
            }
          },
          toolbar: [
            ["bold", "italic", "underline", "strike"],
            ["blockquote", "code-block"],
            // [{ header: 1 }, { header: 2 }],
            [{ list: "ordered" }, { list: "bullet" }],
            [{ script: "sub" }, { script: "super" }],
            [{ indent: "-1" }, { indent: "+1" }],
            // [{ direction: "rtl" }],
            //[{ size: ["small", false, "large", "huge"] }],
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            // [{ font: [] }],
            [{ color: [] }, { background: [] }],
            [{ align: [] }],
            ["clean"],
            ["link", "image", "video"]
          ]
        }
      }
    };
  },
}
</script>

<style>

</style>
