<template>
  <b-modal id="modal-center" centered :title="feedback.name">
      <b-container fluid class="my-5">
        <b-row>
          <b-col md="4" class="text-md-right font-weight-bold">Дата</b-col><b-col md="8"><b-skeleton v-if="!feedback.name" width="35%"></b-skeleton>{{feedback.date_add}}</b-col>
          <b-col md="4" class="text-md-right font-weight-bold">Имя</b-col><b-col md="8"><b-skeleton v-if="!feedback.name" width="85%"></b-skeleton>{{feedback.name}}</b-col>
          <b-col md="4" class="text-md-right font-weight-bold">Email</b-col><b-col md="8"><b-skeleton v-if="!feedback.name" width="75%"></b-skeleton>{{feedback.email}}</b-col>
          <b-col md="4" class="text-md-right font-weight-bold">Телефон</b-col><b-col md="8"><b-skeleton v-if="!feedback.name" width="65%"></b-skeleton>{{feedback.phone}}</b-col>
          <b-col md="4" class="text-md-right font-weight-bold">Сообщение</b-col><b-col md="8">
            <b-skeleton v-if="!feedback.name" width="85%"></b-skeleton>
            <b-skeleton v-if="!feedback.name" width="95%"></b-skeleton>
            <b-skeleton v-if="!feedback.name" width="65%"></b-skeleton>
            {{feedback.message}}
          </b-col>
        </b-row>
      </b-container>
  </b-modal>
</template>

<script>
export default {
  props: ['feedbackId'],
  data() {
    return {
      feedback: {}
    }
  },
  watch: {
    feedbackId: {
      // the callback will be called immediately after the start of the observation
      immediate: true,
      async handler (id, oldVal) {
        this.feedback = {};
        await axios
          .get(this.$route('admin.api.feedback.show',id))
          .then(response => this.feedback = response.data);
      }
    }
  },
}
</script>

<style>

</style>
