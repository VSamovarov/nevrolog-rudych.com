<template>
<AdminLayout>
  <b-container fluid class="my-5">
    <b-row>
      <b-col md="10" class="d-flex align-items-center justify-content-between">
        <h1>Редактировать</h1>
      </b-col>
      <b-col md="2" class="d-flex align-items-center justify-content-end">
        <b-button>К списку</b-button>
      </b-col>
    </b-row>
  </b-container>

  <FeedbackEditForm :feedback="feedback"></FeedbackEditForm>

</AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import FeedbackEditForm from "./../../Components/Content/Feedback/FeedbackEditForm";
export default {
  components: { AdminLayout, FeedbackEditForm },
  props: ['feedback'],
  mounted: function() {
    console.log(this.feedback)
  }
}

</script>

<style>

</style>
