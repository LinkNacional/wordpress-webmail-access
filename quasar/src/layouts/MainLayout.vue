<template>
  <WebmailForm />
</template>

<script>
import { defineComponent } from 'vue'
import WebmailForm from 'components/WebmailForm.vue'

export default defineComponent({
  name: 'MainLayout',
  components: { WebmailForm }
})
</script>
