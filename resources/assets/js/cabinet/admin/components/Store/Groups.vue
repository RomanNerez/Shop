<template>
    <instance
        :items="items"
        :chosen="chosen"
        :related="related"
        :available="available"
    ></instance>
</template>

<script>
    import Instance from '../Common/Groups/Index.vue'

    export default {
        props: ['chosen'],
        components: {
            instance: Instance
        },
        data: function() {
            return {
                related: 'store',
                items: this.$store.getters.storeData.data.groups,
                available: {
                    root: true
                }
            }
        },
    }
</script>
