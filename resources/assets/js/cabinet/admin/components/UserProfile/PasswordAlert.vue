<template>
    <v-snackbar
          v-model="active"
          color="error"
          :top="true"
          :right="true"
          timeout="-1"
      >
          <div v-html="text"></div>
    </v-snackbar>
</template>

<script>
    export default {
        props: ['active', 'text'],
    }
</script>