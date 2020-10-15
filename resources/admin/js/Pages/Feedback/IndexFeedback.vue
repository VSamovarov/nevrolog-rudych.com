<template>
  <AdminLayout>
    <b-container fluid class="mb-4">
      <AdminIndexMenu :items="indexMenu"></AdminIndexMenu>
    </b-container>
    <b-container fluid class="mb-4">
      <FeedbackFilters></FeedbackFilters>
    </b-container>
    <FeedbackList :items="feedback.data" class="flex-row mb-4"></FeedbackList>
    <b-container fluid class="mb-4 d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-between">
        <b-form-select  v-model="massActionSelected" :options="massActionOptions" class="mr-2">
        </b-form-select>
        <b-button>Button</b-button>
      </div>
      <Pagination :links="feedback.links"></Pagination>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import FeedbackList from "./../../Components/Content/Feedback/FeedbackList";
import FeedbackFilters from "./../../Components/Content/Feedback/FeedbackFilters";
import AdminIndexMenu from "./../../Components/Common/AdminIndexMenu";
import Pagination from "./../../Components/Common/Pagination";

export default {
  components: { AdminLayout, FeedbackList, AdminIndexMenu, Pagination, FeedbackFilters },
  props: ['feedback', 'indexMenu'],
  data() {
    return {
      massActionSelected: null,
      massActionOptions: [
        { value: null, text: 'Please select an option' },
        { value: 'a', text: 'This is First option' },
        { value: 'b', text: 'Selected Option', disabled: true },
        {
          label: 'Grouped options',
          options: [
            { value: { C: '3PO' }, text: 'Option with object value' },
            { value: { R: '2D2' }, text: 'Another option with object value' }
          ]
        }
      ]
    }
  },
  mounted: function () {
    console.log(this.feedback);
  },
};
</script>

<style></style>
