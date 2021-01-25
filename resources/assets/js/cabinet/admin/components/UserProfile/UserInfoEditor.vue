<template>
    <v-card>
        <v-card-title class="py-0">
            <v-sheet style="position: relative; top: -24px; transition: .3s ease; z-index: 1" class="pa-7 text-center green rounded"
                elevation="5"
            >
                <v-icon class="theme--dark" style="font-size: 32px;">
                    mdi-account
                </v-icon>

            </v-sheet>
            <span class="mb-6 font-weight-light user-info__title">Редактирование профиля</span>
        </v-card-title>
        <v-card-text>
            <v-form
                ref="form"
                v-model="valid"
            >
                <v-container class="py-0">
                    <v-row justify="center">
                        <div class="user-avatar">
                            <label class="user_add_avatar"
                                :class="{active: file}"
                                v-on:click="fileManager"
                            >
                                <span>Аватар</span>
                                <img width="100px" v-bind:src="file" v-if="file"/>
                                <svg fill="#949494" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"></path></svg>
                            </label>
                        </div>
                        <div class="user-info__group">
                            <v-text-field
                                v-model="edit.fullname"
                                color="green"
                                label="ФИО"
                                class="purple-input"
                                :rules="generalRule"
                            />
                            
                            <v-text-field
                                v-model="edit.position"
                                color="green"
                                label="Должность"
                                class="purple-input"
                                :rules="generalRule"
                            />

                            <v-text-field
                                v-model="edit.email"
                                color="green"
                                label="E-mail"
                                class="purple-input"
                                :rules="generalRule"
                            />
                        </div>
                    </v-row>
                    <v-row justify="center" class="user-info__row">

                        <v-col
                            cols="12"
                            md="6"
                        >
                            <v-text-field
                                type="password"
                            	v-model="password.new"
                                color="green"
                                label="Новый пароль"
                                class="purple-input"
                            />
                        </v-col>

                        <v-col
                            cols="12"
                            md="6"
                        >
                            <v-text-field
                                type="password"
                            	v-model="password.confirmation"
                                color="green"
                                label="Пароль еще раз"
                                class="purple-input"
                            />
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col
                            class="text-right"
                            cols="12"
                        >
                            <v-btn 
                                class="mr-0 b-btn"
                                color="green darken-1"
                                v-on:click="editorUser"
                                :disabled="!editModeActive"
                            >
                                Сохранить
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
            </v-form>
        </v-card-text>
    </v-card>
</template>

<script>
    export default {
        name: 'userinfoeditor',
        props: ['userInf','editModeActive', 'passwordAlertActive', 'passwordMessage'],
        data: function() {
            return {
                location: window.location.origin,
                file: '',
                password: {
                    error: false
                },
                edit: {},
                valid: false,
                generalRule: [],
            }
        },
        computed: {
            saveButton: function() {
                if(this.editModeActive === true){
                } 
                return false;
            },

        },
        watch: {
            editModeActive: function(a){
                if(a) {
                    for(var key in this.userInf) {
                        this.edit[key] = this.userInf[key];
                    }
                    this.file = this.userInf.avatar ? this.location + '/upload/blog/' + this.userInf.avatar : '';
                } else {
                    this.edit = {};
                    this.password = {};
                    this.file = '';
                    this.$emit('update:passwordAlertActive', false);
                    this.$refs.form.reset();
                }
            },
            edit: function(val) {
                this.numberRules = []
            }
        },
        methods: {
            passwordCheck: function() {
                var password = this.password.new;
                if(password) {
                    if(password !== this.password.confirmation) {
                        this.$emit('update:passwordMessage', 'Пароли не совпадают!');
                        return false;
                    } 

                    var message = "Пароль должен содержть:<br>  -  только латинские буквы <br>  -  6 символов и более <br>  -  символы верхнего регистра<br>  -  символы нижнего регистра <br>  -  цифры";                
                    var regularExpression = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{6,}$/;
                    if(!regularExpression.test(password)) {
                        this.$emit('update:passwordMessage', message);
                        return false;
                    }
                }
                return true;
            },
            fileManager: function(type){
                let that = this;
                window.open('/editor/laravel-filemanager' + '?type=' + type || 'file', 'FileManager', 'width=900,height=600');
    
                window.SetUrl = function (items) {
                    var file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');
                    that.file = file_path;
                };
            },
            editorUser: function(){
                this.generalRule = [
                    v => !!v || 'Это обязательное поле!',
                ]
                let self = this
                setTimeout(function () {
                    if (self.$refs.form.validate()){
                        if(!self.passwordCheck()){
                            self.$emit('update:passwordAlertActive', true);
                            return;
                        }
                        
                        var input = {},
                            editor = self.edit;

                        input.fullname = editor.fullname;
                        input.email = editor.email;
                        input.avatar = self.file;
                        input.position = editor.position;

                        if(self.password.new && self.password.confirmation) {
                            if(self.password.new !== self.password.confirmation) {
                                self.password.error = true;
                                return 0;
                            } else {
                                input.password = self.password.new;
                            }
                        }

                        axios.post('/editor/edit/user', {
                            _token: window._token,
                            input: input
                        })
                        .then((response) => {
                            self.password = {error: false};
                            var data = {};
                            for(var key in self.userInf) {
                                if(key in editor) {
                                    data[key] = editor[key];
                                }
                            }
                            data.avatar = response.data;

                            self.$emit('update:editModeActive', false);

                            self.$store.commit('newUserData', data);

                            self.file = '';
                            self.$refs.form.reset();
                        })
                        .catch((error)=> {
                            console.log(error);
                        })
                        .finally(()=>{
                        })
                    }  
                })
            },
        }
    }
</script>
