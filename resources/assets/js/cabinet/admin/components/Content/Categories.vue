<template>
    <instance
        :items="items"
        :chosen="chosen"
        :related="related"
        :available="available"
    ></instance>
</template>

<script>
    import Instance from '../Common/Categories/Index.vue'

    export default {
        props: ['chosen'],
        components: {
            instance: Instance
        },
        data: function() {
            return {
                related: 'content',
                items: this.$store.getters.contentData.data.categories,
                available: {
                    template: true
                }
            }
        },
    }
</script>
