<template>
  <AdminLayout>
    <FeedbackList></FeedbackList>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import FeedbackList from "./../../Components/Content/Feedback/List";

export default {
  components: { AdminLayout, FeedbackList },
  props: ["items"],
  mounted: function () {
    console.log(this.items);
  },
};
</script>

<style></style>
