<template>
  <div style="max-width: 400px">
    <q-form @submit.prevent="onSubmit">
      <q-input
        v-model="email"
        input-class="webmail-form-input"
        label="Digite o e-mail para acessar"
        type="email"
        lazy-rules=""
        :rules="[emailValidation]"
      />

      <div class="q-mt-md">
        <q-btn
          label="Acessar Webmail"
          type="submit"
          text-color="white"
          style="background: #d3d800; width: 100%"
          size="lg"
          no-caps
        />
      </div>
    </q-form>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { emailValidation } from '../utils/validations'
//
export default defineComponent({
  name: 'WebmailForm',

  data () {
    return {
      email: null
    }
  },

  methods: {
    onSubmit () {
      const splittedEmail = this.email.split('@')
      const webmailDomain = splittedEmail[1]

      const userWebmailUrl = `https://webmail.${webmailDomain}`

      window.open(userWebmailUrl, '_blank').focus()
    },
    emailValidation
  }
})
</script>
