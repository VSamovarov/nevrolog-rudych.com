<template>
  <AdminLayout>
    <b-container fluid>
    <AdminMenuIndex :items="indexMenu"></AdminMenuIndex>
    </b-container>
    <FeedbackList :items="feedback.items"></FeedbackList>
    <b-container fluid>
      <Pagination :links="feedback.links"></Pagination>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import FeedbackList from "./../../Components/Content/Feedback/List";
import AdminMenuIndex from "./../../Components/Common/AdminMenuIndex";
import Pagination from "./../../Components/Common/Pagination";

export default {
  components: { AdminLayout, FeedbackList, AdminMenuIndex, Pagination },
  props: ['feedback', 'indexMenu'],
  mounted: function () {
    console.log(this.feedback.links);
  },
};
</script>

<style></style>
