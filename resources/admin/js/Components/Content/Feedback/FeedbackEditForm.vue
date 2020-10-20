<template>

  <b-container fluid class="my-5">
    <b-row>
      <b-col cols="8">
        <b-form-group
          label="Имя"
          label-for="name"
          label-cols-sm="2"
          label-align-sm="right"
          :invalid-feedback="invalidNameFeedback"
          :state="stateName"
        >
          <b-form-input id="name" v-model="form.name" :state="stateName" trim></b-form-input>
        </b-form-group>
        <b-form-group
          label="Email"
          label-for="email"
          label-cols-sm="2"
          label-align-sm="right"
          :invalid-feedback="invalidEmailFeedback"
          :state="stateEmail"
        >
          <b-form-input id="email" v-model="form.email" :state="stateEmail" trim></b-form-input>
        </b-form-group>
        <b-form-group
          label="Телефон"
          label-for="phone"
          label-cols-sm="2"
          label-align-sm="right"
          :invalid-feedback="invalidPhoneFeedback"
          :state="statePhone"
        >
          <b-form-input id="phone" v-model="form.phone" :state="statePhone" trim></b-form-input>
        </b-form-group>
        <b-form-group
          label="Дата"
          label-for="date"
          label-cols-sm="2"
          label-align-sm="right"
        >
          <b-form-input type="date" id="date" v-model="form.created_at" trim></b-form-input>
        </b-form-group>
        <b-form-group
          label="Сообщение"
          label-for="message"
          label-cols-sm="2"
          label-align-sm="right"

        >
          <b-form-textarea id="message" v-model="form.message" rows="4" trim></b-form-textarea>
        </b-form-group>
        <div  class="my-4 text-right">
          <b-button variant="primary" @click="submit">Применить</b-button>
        </div>

      </b-col>

    </b-row>

  </b-container>

</template>

<script>
const defautData = {
      'name': null,
      'email': null,
      'phone': null,
      'message': null,
      'form_data': null,
      'created_at' : null,
};
export default {
  props: ['feedback'],
  data() {
    return {
      form: {
      ...defautData,
      ...this.feedback
      }
    }
  },
  computed: {
    stateName() {
      return this.form.name.length >= 4
    },
    invalidNameFeedback() {
      if (this.form.name.length > 0) {
        return 'Enter at least 4 characters.'
      }
      return 'Please enter something.'
    },
    stateEmail() {
      return  this.form.email.length === 0 || (this.form.email.length > 4 && this.form.email.indexOf('@') > -1)
    },
    invalidEmailFeedback() {
      if(this.form.email.indexOf('@') === -1 ) {
        return 'Email должен содержать символ @';
      }
      return 'Email должен содержать больше 4-х символов';
    },
    statePhone() {
      const re = /[^\d\s-]/i;
      return this.form.phone.length === 0 || (this.form.phone.length >= 10 && !re.test(this.form.phone))
    },
    invalidPhoneFeedback() {
      const re = /[^\d\s-]/i;
      if (re.test(this.form.phone)) {
        return 'Телефон может содержать только цифры';
      }
      return 'Телефон должен содержать 10 цифры';
    }
  },

  methods: {
    submit() {
      this.$inertia.put(this.$route('admin.feedback.show',this.form.id), {...this.form})
    },
  },

}
</script>

<style>

</style>
