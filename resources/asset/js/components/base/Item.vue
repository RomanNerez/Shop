<template>
  <v-list-item
    :active-class="`primary ${!isDark ? 'black' : 'white'}--text`"
    link
    v-on:click="component = item.component"
  >
    <v-list-item-icon
      v-if="text"
      class="v-list-item__icon--text"
      v-text="computedText"
    />

    <v-list-item-icon v-else-if="item.icon">
      <v-icon v-text="item.icon" />
    </v-list-item-icon>

    <v-list-item-content v-if="item.title || item.subtitle">
      <v-list-item-title v-text="item.title" />

      <v-list-item-subtitle v-text="item.subtitle" />
    </v-list-item-content>
  </v-list-item>
</template>

<script>
  import Themeable from 'vuetify/lib/mixins/themeable'

  export default {
    name: 'Item',

    mixins: [Themeable],

    props: {
      item: {
        type: Object,
        default: () => ({
          component: undefined,
          icon: undefined,
          title: undefined,
        }),
      },
      text: {
        type: Boolean,
        default: false,
      },
    },

    computed: {
        computedText () {
            if (!this.item || !this.item.title) return ''

            let text = ''

            this.item.title.split(' ').forEach(val => {
              text += val.substring(0, 1)
            })

            return text
        },
        component: {
            get () {
              return this.$store.state.component
            },
            set (val) {
              this.$store.commit('SET_COMPONENT', val)
            },
        },
    },
  }
</script>
