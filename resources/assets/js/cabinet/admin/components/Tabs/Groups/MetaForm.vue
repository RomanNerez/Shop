<template>
    <v-container class="pa-0">
        <v-row>
            <v-col class="pt-0">
                <v-text-field
                    v-model.trim="value.content[local].metaTitle"
                    v-on:input="addContent('metaTitle')"
                    label="Meta Title"
                    color="green"
                    outlined
                ></v-text-field>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="pt-0">
                <v-textarea
                    v-model.trim="value.content[local].metaDesc"
                    v-on:input="addContent('metaDesc')"
                    label="Meta Description"
                    height="272px"
                    no-resize
                    color="green"
                    outlined
                ></v-textarea>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
	export default{
        props:['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect'],
		data: function() {
			return {
                input:{
                    metaTitle: true,
                    metaDesc: true
                },
                content: {},
			}
		},
        mounted: function () {
            for (var i = 0; i < this.langs.length; i++) {
                let local = this.langs[i].local;
                this.content[local] = {
                    metaTitle: 0,
                    metaDesc: 0
                };
            }
        },
        watch: {
            local: function (newLocal, oldLocal) {
                for (let keyValue in this.value.content[oldLocal]) {
                    if (keyValue in this.input){
                        if (!this.content[newLocal][keyValue] && !this.value.content[newLocal][keyValue]){
                            this.value.content[newLocal][keyValue] = this.value.content[oldLocal][keyValue];
                        }
                    }
                }
            }
        },
        methods:{
            addContent: function (key) {
                this.content[this.local][key] = 1
            },
            validate: function () {
                return true;
            }
        }
	}
</script>
