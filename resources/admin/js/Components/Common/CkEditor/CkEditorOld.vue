<template>
    <div id="app">
        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
    </div>
</template>

<script>

    const routeName = "admin.api.tmp-files-upload";
    import Vue from "vue";
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    class MyUploadAdapter {
      constructor( loader , route ) {
          // The file loader instance to use during the upload.
          this.loader = loader;
          this.route = route;
      }

      async upload() {
        const file = await this.loader.file;
        const formData = new FormData();
        formData.append("files[0]", file);
        try {
          const { data } = await axios.post(this.route, formData, {
            headers: {
              "Content-Type": "multipart/form-data"
            }
          });
          return {
            default: data[0].url
          };
        } catch (e) {
          console.log(e);
        }
      }
      abort() {
        console.log("Abort upload.");
      }
    }
    //https://ckeditor.com/docs/ckeditor5/latest/framework/guides/deep-dive/upload-adapter.html
    //https://ckeditor.com/docs/ckeditor5/latest/api/module_upload_filerepository-UploadAdapter.html
    function MyUploadAdapterPlugin( editor ) {
      editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
          return new MyUploadAdapter( loader, Vue.prototype.$route(routeName) );
      };
    }

    console.log(ClassicEditor.builtinPlugins.map( plugin => plugin.pluginName ));
    export default {
        name: 'app',
        data() {
            return {
                editor: ClassicEditor,
                editorData: '<p>Rich-text editor content.</p>',
                editorConfig: {
                  // The configuration of the rich-text editor.
                  extraPlugins: [ MyUploadAdapterPlugin ],
                  image: {
                    // Configure the available styles.
                    styles: [
                        'alignLeft', 'alignCenter', 'alignRight'
                    ],

                    resizeUnit: "%",
                    resizeOptions: [ {
                      name: 'imageResize:original',
                      value: null
                    },
                    {
                      name: 'imageResize:50',
                      value: '50'
                    },
                    {
                      name: 'imageResize:75',
                      value: '75'
                    } ],

                    // You need to configure the image toolbar, too, so it shows the new style
                    // buttons as well as the resize buttons.
                    toolbar: [
                        'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                        '|',
                        'imageResize',
                        '|',
                        'imageTextAlternative'
                    ]
                  }
                }
            };
        }
    }
</script>
