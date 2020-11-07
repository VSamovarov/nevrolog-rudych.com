<template>
  <ModuleWrapper title="Изображение">
    <div class="preview">
      <img :src="preview" />
    </div>
    <input type="file" size="sm" @change="fileChange" />
  </ModuleWrapper>
</template>

<script>
import ModuleWrapper from "./../../Components/Common/ModuleWrapper";

export default {
  components: {
    ModuleWrapper,
  },
  data() {
    return {
      file: null,
      src: null,
      srcNew: null,
    }
  },
  computed: {
    preview() {
      let url = this.src;
      if (this.srcNew) {
        url = this.srcNew;
      } else if (this.files && this.files[0]) {
        url = URL.createObjectURL(this.files[0]);
      }
      return url;
    }
  },
  methods: {
    async fileChange(e) {
      const routeUploadFiles = this.$route("admin.api.tmp-files-upload");

      this.files = e.target.files;
      let formData = new FormData();
      console.log(this.files);
      [...this.files].forEach( (file, i)=> {
        formData.append(`files[${i}]`, file)
      });
      try {
        const data = await axios({
          method: "POST",
          url: routeUploadFiles,
          data: formData,
          headers: {
            "Content-Type": "multipart/form-data"
          }
        });
        console.log(data);
      } catch(e) {
        console.log(e);
      } finally {
      }


    },
    // submitFiles(){
    //   let formData = new FormData();
    //   for( var i = 0; i < this.files.length; i++ ){
    //     let file = this.files[i];
    //     formData.append('files[' + i + ']', file);
    //   }
    //   axios.post( '/file-multiple-preview',
    //     formData,
    //     {
    //       headers: {
    //           'Content-Type': 'multipart/form-data'
    //       }
    //     }
    //   ).then(function(){
    //     console.log('SUCCESS!!');
    //   })
    //   .catch(function(){
    //     console.log('FAILURE!!');
    //   });
    // },
  }
}
</script>

<style scoped>
.preview img {
  max-width: 100%;
  height: auto;
}
</style>
