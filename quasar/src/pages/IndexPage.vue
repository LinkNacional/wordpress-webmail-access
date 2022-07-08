<template>
  <q-page>
    <WebmailForm/>
  </q-page>
</template>

<script>
import { defineComponent } from 'vue'
import WebmailForm from 'components/WebmailForm.vue'

export default defineComponent({
  name: 'IndexPage',
  components: {WebmailForm}
})
</script>
