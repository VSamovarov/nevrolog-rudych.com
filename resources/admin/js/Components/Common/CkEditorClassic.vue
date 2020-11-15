<template>
    <ckeditor
        :editor="editor"
        :value="value"
        @change="$emit('input', $event)"
        :config="editorConfig"
    >
    </ckeditor>
</template>

<script>
    const routeName = "admin.api.tmp-files-upload";
    import Vue from "vue";

    import InlineEditor from '@blowstack/ckeditor5-full-free-build';
    export default {
        props: ["value"],
        data() {
            console.log(this.$page);
            return {
                editor: InlineEditor,
                editorData: '<p>Rich-text editor content.</p>',
                editorConfig: {
                    removePlugins: [ 'Title'],
                    simpleUpload: {
                        // The URL that the images are uploaded to.
                        uploadUrl: Vue.prototype.$route(routeName),

                        // Enable the XMLHttpRequest.withCredentials property.
                        withCredentials: true,

                        // Headers sent along with the XMLHttpRequest to the upload server.
                        headers: {
                            // 'X-Requested-With': 'XMLHttpRequest',
                            // 'X-CSRF-TOKEN': 'CSRF-Token',
                            // Authorization: 'Bearer <JSON Web Token>'
                            // 'X-CSRF-TOKEN': csrfToken,
                            // 'accept': 'application/json'
                        }
                    },
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
                            "redo",
                        ],
                    },
                    image: {
        styles: ["alignLeft", "alignCenter", "alignRight"],
        resizeOptions: [
            {
                name: "imageResize:original",
                label: "Original",
                value: null,
            },
            {
                name: "imageResize:50",
                label: "50%",
                value: "50",
            },
            {
                name: "imageResize:75",
                label: "75%",
                value: "75",
            },
        ],
        toolbar: [
            "imageStyle:alignLeft",
            "imageStyle:alignCenter",
            "imageStyle:alignRight",
            "|",
            "imageResize",
            "|",
            "imageTextAlternative",
            "|",
            "linkImage",
        ],
    },
    table: {
        contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"],
    },

                }
            };
        }
    }
</script>
