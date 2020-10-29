<template>
<AdminLayout :adminSidebarMenu="adminSidebarMenu">
  <b-container fluid class="my-5">
    <b-row>
      <b-col md="10" class="d-flex align-items-center justify-content-between">
        <h1>Редактировать</h1>
      </b-col>
      <b-col md="2" class="d-flex align-items-center justify-content-end">

      <inertia-link :href="$route('admin.feedback.index')" class="btn btn-secondary">
        Вернутся к списку
      </inertia-link>
      </b-col>
    </b-row>
  </b-container>

  <FeedbackEditForm :feedback="feedback" :errors="errors"></FeedbackEditForm>

</AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import FeedbackEditForm from "./../../Components/Content/Feedback/FeedbackEditForm";
export default {
  components: { AdminLayout, FeedbackEditForm },
  props: ['feedback','errors','adminSidebarMenu'],
  mounted: function() {
    console.log(this.feedback)
  }
}

</script>

<style>

</style>
