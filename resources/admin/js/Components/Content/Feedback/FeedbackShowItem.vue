<template>
  <b-modal id="modal-feedback-show-item" centered>
    <template #modal-title>
      <b-skeleton v-if="!feedback.name" width="120px"></b-skeleton>{{feedback.name}}
    </template>
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
    <b-button class="mt-3" block @click="$bvModal.hide('modal-feedback-show-item')">Close Me</b-button>
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
          .then(
            response => {
              this.feedback = response.data;
              return response.data
            }
          )
          .then((data) => {
            if(!data.status) this.setViewedStatus(data.id)
          });
      }
    }
  },
  methods: {
    setViewedStatus: async function(id) {
        await axios.patch(
          this.$route('admin.api.feedback.viewed-status',id), {status:1})
          .then(response => console.log(response)
        );
    }
  },
}
</script>

<style>

</style>
