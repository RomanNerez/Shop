<template>
    <v-container class="pt-0 content-page">
        <v-row>
            <v-col class="pt-0">
                <v-card-title class="pa-0 pb-4">Карта</v-card-title>

                <v-textarea
                    label="Код карты"
                    color="green"
                    rows="9"
                    outlined
                    hide-details
                    v-model="value.data.map"
                ></v-textarea>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        props: ['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect', 'alert'],
        methods: {
            validate: function () {
                if (!this.value.data.map) {
                    this.$emit('update:tabSelect', 1);

                    this.$emit('update:alert', {
                        type: 'warning',
                        text: 'Введите код карты'
                    });

                    return false;
                }

                return true
            }
        }
    }
</script>
