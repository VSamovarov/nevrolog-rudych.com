<template>
<AdminLayout class="edit-post">
  <b-container fluid class="my-5">
    <b-row>
      <b-col md="10" class="d-flex align-items-center justify-content-between">
        <h1>{{ $page.pageTitle }}</h1>
      </b-col>
      <b-col md="2" class="d-flex align-items-center justify-content-end">

      <inertia-link :href="$route('admin.post.index', { type: data.type })" class="btn btn-secondary">
        Вернутся к списку
      </inertia-link>
      </b-col>
    </b-row>
    {{data}}
  </b-container>
</AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
export default {
  props: ['data'],
  components: { AdminLayout },

}
</script>

<style>

</style>
