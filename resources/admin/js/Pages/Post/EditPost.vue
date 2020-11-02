<template>
<AdminLayout class="edit-post">
  <b-container fluid class="my-5">
    <b-row>
      <b-col md="10" class="d-flex align-items-center justify-content-between">
        <h1>{{ $page.pageTitle }}</h1>
      </b-col>
      <b-col md="2" class="d-flex align-items-center justify-content-end">

      <inertia-link :href="$route('admin.post.index', { type: main.type })" class="btn btn-secondary">
        Вернутся к списку
      </inertia-link>
      </b-col>
    </b-row>
  </b-container>

  <PostTranslatesForm v-if="main.translations" :translates="main.translations"></PostTranslatesForm>
</AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import PostTranslatesForm from './../../Components/Content/Post/PostTranslatesForm';
export default {
  components: { AdminLayout, PostTranslatesForm},
  data() {
    return {
      main: {...this.$page.data}
    }
  },
}
</script>

<style>

</style>
