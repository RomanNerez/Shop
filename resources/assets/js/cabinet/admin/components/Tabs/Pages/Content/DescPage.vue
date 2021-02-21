<template>
    <v-container class="pt-0 content-page">
        <v-row>
            <v-col class="pt-0">
                <v-card-title class="pa-0 pb-4">Описание</v-card-title>

                <v-textarea
                    label="Описание страницы"
                    color="green"
                    rows="9"
                    outlined
                    hide-details
                    v-model="value.content[local].data.desc"
                ></v-textarea>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        props: ['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect', 'alert'],
        watch: {
            local: function (a, b) {
                let desc = this.value.content[a].data.desc;

                if (!desc) {
                    this.value.content[a].data.desc = this.value.content[b].data.desc;
                }
            }
        },
        methods: {
            validate: function () {
                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local,
                        lang = this.langs[i].id;

                    if (!this.value.content[local].data.desc) {
                        this.$emit('update:tabSelect', 1);
                        this.$emit('update:select', lang);

                        if (this.local === local) {
                            this.$emit('update:alert', {
                                type: 'warning',
                                text: 'Заполните описание страницы'
                            });
                        }

                        return false;
                    }
                }

                return true
            }
        }
    }
</script>
