<template>

  <b-container fluid class="my-5">
    <b-row>
      <b-col cols="8">
        <b-form-group
          label="Имя"
          label-for="name"
          label-cols-sm="2"
          label-align-sm="right"
          description="Обязательное поле. Больше 4-х символов"
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
          description="Больше 4-х символов и содержать знак @"
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
          description="Больше 10-ти цифр"
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
      'created_at' : null
};
export default {
  props: ['feedback','errors'],
  data() {
    return {
      form: {
      ...defautData,
      ...this.feedback
      }
    }
  },
  computed: {
    /**
     * Name
     */
    stateName() {
      if(!!this.errors.name || this.form.name.length < 4) return false;
    },
    invalidNameFeedback() {
      if(!!this.errors.name) {
        return this.errors.name
      }
    },
    /**
     * Email
     */
    stateEmail() {
      if(!!this.errors.email || (this.form.email.length > 0 && this.form.email.length < 4) || this.form.email.indexOf('@') < 0) {
        return false;
      }
    },
    invalidEmailFeedback() {
      if(!!this.errors.email) {
        return this.errors.email;
      }
    },
    statePhone() {
      const re = /[^\d\s-]/i;
      if( !!this.errors.phone || re.test(this.form.phone) || (this.form.phone.length > 0 && this.form.phone.length < 10)) {
        return false
      }
    },
    invalidPhoneFeedback() {
      if(!!this.errors.phone) {
        return this.errors.phone;
      }
    }
  },

  methods: {
    submit() {
      this.$inertia.put(this.$route('admin.feedback.show',this.form.id), {...this.form})
    },
  }
}
</script>

<style>

</style>
