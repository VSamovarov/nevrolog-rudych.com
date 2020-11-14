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

    import InlineEditor from '@blowstack/ckeditor5-full-free-build';
    export default {
        props: ["value"],
        data() {
            return {
                editor: InlineEditor,
                editorData: '<p>Rich-text editor content.</p>',
                editorConfig: {
                    removePlugins: [ 'Title'],
                    simpleUpload: {
                        // The URL that the images are uploaded to.
                        uploadUrl: 'http://example.com',

                        // Enable the XMLHttpRequest.withCredentials property.
                        withCredentials: true,

                        // Headers sent along with the XMLHttpRequest to the upload server.
                        headers: {
                            'X-CSRF-TOKEN': 'CSRF-Token',
                            Authorization: 'Bearer <JSON Web Token>'
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
