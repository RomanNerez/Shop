<template>
    <v-col>
        <validation-observer
            ref="observer"
        >
            <v-container
                fluid
                tag="section"
            >
                <v-row>
                    <v-col cols="12" sm="7">
                        <v-card>
                            <v-card-title class="py-0 table-header__btn">
                                <v-sheet style="position: relative; top: -24px; transition: .3s ease; z-index: 1" class="pa-7 text-center green rounded b-user-info__square"
                                         elevation="5"
                                >
                                    <v-icon class="theme--dark" style="font-size: 32px;">
                                        mdi-account-network-outline
                                    </v-icon>

                                    <v-tooltip
                                        top
                                    >
                                        <template v-slot:activator="{ on }">
                                            <v-icon
                                                v-on="on"
                                                v-on:click="addSocial"
                                            >
                                                mdi-plus
                                            </v-icon>
                                        </template>
                                        <span>Добавить соц. сеть</span>
                                    </v-tooltip>
                                </v-sheet>
                                <span class="mb-6 font-weight-regular user-info__title">Социальные сети</span>
                            </v-card-title>

                            <v-container class="px-8 pt-4 pb-5 content-page options-wrap" style="height: 292px">
                                <form action="#">
                                    <v-row v-for="(item, index) in data.socials"
                                           :key="index"
                                    >
                                        <v-col sm="2">
                                            <v-hover>
                                                <template v-slot:default="{ hover }">
                                                    <v-btn class="ma-0 pa-0 overflow-hidden set-media-item" fab
                                                           elevation="4"
                                                           color="#FAFAFA"
                                                           v-on:click="setMedia(item, 'image', -1)"
                                                    >
                                                        <template v-if="item.image">
                                                            <v-img :src="item.image"></v-img>
                                                        </template>
                                                        <template v-else>
                                                            <v-sheet
                                                                class="d-flex align-center justify-center"
                                                                color="#FAFAFA"
                                                            >
                                                                <v-icon color="#BDBDBD" medium>
                                                                    mdi-image-size-select-large
                                                                </v-icon>
                                                            </v-sheet>
                                                        </template>

                                                        <v-fade-transition>
                                                            <v-overlay
                                                                color="light-blue darken-1"
                                                                v-if="hover"
                                                                absolute
                                                            >
                                                                <v-icon medium>
                                                                    mdi-folder-multiple-image
                                                                </v-icon>
                                                            </v-overlay>
                                                        </v-fade-transition>
                                                    </v-btn>
                                                </template>
                                            </v-hover>
                                        </v-col>
                                        <v-col sm="5">
                                            <v-text-field
                                                label="Название"
                                                color="green"
                                                outlined
                                                hide-details
                                                v-model="item.name"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col sm="5">
                                            <v-text-field
                                                label="Ссылка"
                                                color="green"
                                                outlined
                                                hide-details
                                                v-model="item.link"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </form>
                            </v-container>
                        </v-card>
                    </v-col>

                    <v-col cols="12" sm="5">
                        <v-card>
                            <v-card-title class="py-0">
                                <v-sheet style="position: relative; top: -24px; transition: .3s ease; z-index: 1" class="pa-7 text-center green rounded"
                                         elevation="5"
                                >
                                    <v-icon class="theme--dark" style="font-size: 32px;">
                                        mdi-map-marker
                                    </v-icon>
                                </v-sheet>
                                <span class="mb-6 font-weight-regular user-info__title" style="margin-right: -80px">Адрес организации</span>

                                <v-select style="max-width: 80px"
                                          v-model="langs.select"
                                          :items="langs.items"
                                          item-value="id"
                                          item-text="local"
                                          label="Язык"
                                          color="green"
                                          solo dense
                                ></v-select>
                            </v-card-title>

                            <v-container class="pa-8 pt-4 content-page">
                                <v-row>
                                    <v-col cols="12" class="py-0" :key="local">
                                        <validation-provider
                                            v-slot="{ errors }"
                                            rules="required"
                                        >
                                            <v-text-field
                                                label="Страна"
                                                color="green"
                                                outlined
                                                hide-details dense
                                                class="mb-6"
                                                v-model="data.content[local].addr.country"
                                                :error-messages="errors"
                                            ></v-text-field>
                                        </validation-provider>

                                        <validation-provider
                                            v-slot="{ errors }"
                                            rules="required"
                                        >
                                            <v-text-field
                                                label="Город"
                                                color="green"
                                                outlined
                                                hide-details dense
                                                class="mb-6"
                                                v-model="data.content[local].addr.city"
                                                :error-messages="errors"
                                            ></v-text-field>
                                        </validation-provider>

                                        <validation-provider
                                            v-slot="{ errors }"
                                            rules="required"
                                        >
                                            <v-text-field
                                                label="Улица"
                                                color="green"
                                                outlined
                                                hide-details dense
                                                class="mb-6"
                                                v-model="data.content[local].addr.street"
                                                :error-messages="errors"
                                            ></v-text-field>
                                        </validation-provider>
                                        <v-row>
                                            <v-col class="py-0" sm="8">
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                >
                                                    <v-text-field
                                                        label="Дом / офис / квартира"
                                                        color="green"
                                                        outlined
                                                        hide-details dense
                                                        v-model="data.content[local].addr.house"
                                                        :error-messages="errors"
                                                    ></v-text-field>
                                                </validation-provider>
                                            </v-col>

                                            <v-col class="py-0" sm="4">
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                >

                                                    <v-text-field
                                                        label="Индекс"
                                                        color="green"
                                                        outlined
                                                        hide-details dense
                                                        v-model="data.content[local].addr.code"
                                                        :error-messages="errors"
                                                    ></v-text-field>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card>
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-card>
                            <v-card-title class="py-0">
                                <v-sheet style="position: relative; top: -24px; transition: .3s ease; z-index: 1" class="pa-7 text-center green rounded"
                                         elevation="5"
                                >
                                    <v-icon class="theme--dark" style="font-size: 32px;">
                                        mdi-contacts-outline
                                    </v-icon>
                                </v-sheet>
                                <span class="mb-6 font-weight-regular user-info__title">Контакты</span>
                            </v-card-title>

                            <v-container class="pa-8 pt-4 content-page options-wrap" style="height: 464px">
                                <v-row>
                                    <v-col class="py-0">
                                        <validation-provider
                                            v-slot="{ errors }"
                                            rules="required"
                                        >
                                            <v-textarea
                                                label="Номера телефонов"
                                                color="green"
                                                outlined
                                                hide-details
                                                class="mb-8"
                                                rows="8"
                                                v-model="data.phones"
                                                :error-messages="errors"
                                            ></v-textarea>
                                        </validation-provider>

                                        <validation-provider
                                            v-slot="{ errors }"
                                            rules="required"
                                        >
                                            <v-textarea
                                                label="E-mail адреса"
                                                color="green"
                                                outlined
                                                hide-details
                                                rows="5"
                                                v-model="data.emails"
                                                :error-messages="errors"
                                            ></v-textarea>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card>
                    </v-col>

                    <v-col sm="8">
                        <v-card>
                            <v-card-title class="py-0">
                                <v-sheet style="position: relative; top: -24px; transition: .3s ease; z-index: 1" class="pa-7 text-center green rounded"
                                         elevation="5"
                                >
                                    <v-icon class="theme--dark" style="font-size: 32px;">
                                        mdi-message-cog-outline
                                    </v-icon>
                                </v-sheet>
                                <span class="mb-6 font-weight-regular user-info__title" style="margin-right: -80px">Данные магазина</span>

                                <v-select style="max-width: 80px"
                                          v-model="langs.select"
                                          :items="langs.items"
                                          item-value="id"
                                          item-text="local"
                                          label="Язык"
                                          color="green"
                                          solo dense
                                ></v-select>
                            </v-card-title>

                            <v-container class="pa-8 pt-4 content-page">
                                <v-row>
                                    <v-col sm="10" class="pr-10 py-0">
                                        <validation-provider
                                            v-slot="{ errors }"
                                            rules="required"
                                        >
                                            <v-text-field
                                                label="Заголовок"
                                                color="green"
                                                outlined dense
                                                hide-details
                                                class="mb-6"
                                                v-model="data.content[local].title"
                                                :error-messages="errors"
                                            ></v-text-field>
                                        </validation-provider>

                                        <validation-provider
                                            v-slot="{ errors }"
                                            rules="required"
                                        >
                                            <v-text-field
                                                label="Короткое описание"
                                                color="green"
                                                outlined dense
                                                hide-details
                                                class="mb-6"
                                                v-model="data.content[local].short_desc"
                                                :error-messages="errors"
                                            ></v-text-field>
                                        </validation-provider>

                                        <validation-provider
                                            v-slot="{ errors }"
                                            rules="required"
                                        >
                                            <v-textarea
                                                height="132px"
                                                no-resize
                                                label="Основное описание"
                                                color="green"
                                                outlined
                                                hide-details
                                                class="mb-6"
                                                v-model="data.content[local].desc"
                                                :error-messages="errors"
                                            ></v-textarea>
                                        </validation-provider>

                                        <validation-provider
                                            v-slot="{ errors }"
                                            rules="required"
                                        >
                                            <v-textarea
                                                height="132px"
                                                no-resize
                                                label="График работы"
                                                color="green"
                                                outlined
                                                hide-details
                                                v-model="data.content[local].schedule"
                                                :error-messages="errors"
                                            ></v-textarea>
                                        </validation-provider>
                                    </v-col>
                                    <v-col cols="12" sm="2" class="py-0">
                                        <v-row class="mb-6">
                                            <span class="option-store-logo">Цветной режим</span>
                                            <v-col cols="12" class="media-box my-0" style="height: 104px">
                                                <v-hover>
                                                    <template v-slot:default="{ hover }">
                                                        <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                                               elevation="4"
                                                               color="#FAFAFA"
                                                               v-on:click="setMedia(data, 'logo_color', -1)"
                                                        >

                                                            <template v-if="data.logo_color">
                                                                <v-img :src="data.logo_color"></v-img>
                                                            </template>
                                                            <template v-else>
                                                                <v-sheet
                                                                    class="d-flex align-center justify-center"
                                                                    color="#FAFAFA"
                                                                >
                                                                    <v-icon size="50" color="#BDBDBD">
                                                                        mdi-image-size-select-large
                                                                    </v-icon>
                                                                </v-sheet>
                                                            </template>
                                                        </v-btn>
                                                    </template>
                                                </v-hover>
                                            </v-col>
                                        </v-row>

                                        <v-row class="mb-6">
                                            <span class="option-store-logo">Светлый режим</span>
                                            <v-col cols="12" class="media-box my-0" style="height: 104px">
                                                <v-hover>
                                                    <template v-slot:default="{ hover }">
                                                        <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                                               elevation="4"
                                                               color="#FAFAFA"
                                                               v-on:click="setMedia(data, 'logo_light', -1)"
                                                        >

                                                            <template v-if="data.logo_light">
                                                                <v-img :src="data.logo_light"></v-img>
                                                            </template>
                                                            <template v-else>
                                                                <v-sheet
                                                                    class="d-flex align-center justify-center"
                                                                    color="#FAFAFA"
                                                                >
                                                                    <v-icon size="50" color="#BDBDBD">
                                                                        mdi-image-size-select-large
                                                                    </v-icon>
                                                                </v-sheet>
                                                            </template>
                                                        </v-btn>
                                                    </template>
                                                </v-hover>
                                            </v-col>
                                        </v-row>

                                        <v-row>
                                            <span class="option-store-logo">Темный режим</span>
                                            <v-col cols="12" class="media-box my-0" style="height: 104px">
                                                <v-hover>
                                                    <template v-slot:default="{ hover }">
                                                        <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                                               elevation="4"
                                                               color="#FAFAFA"
                                                               v-on:click="setMedia(data, 'logo_dark', -1)"
                                                        >

                                                            <template v-if="data.logo_dark">
                                                                <v-img :src="data.logo_dark"></v-img>
                                                            </template>
                                                            <template v-else>
                                                                <v-sheet
                                                                    class="d-flex align-center justify-center"
                                                                    color="#FAFAFA"
                                                                >
                                                                    <v-icon size="50" color="#BDBDBD">
                                                                        mdi-image-size-select-large
                                                                    </v-icon>
                                                                </v-sheet>
                                                            </template>
                                                        </v-btn>
                                                    </template>
                                                </v-hover>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </validation-observer>

        <div class="save-options-store">
            <v-tooltip
                top
            >
                <template v-slot:activator="{ on }">
                    <v-btn
                        class="mx-2"
                        fab
                        dark
                        large
                        color="green"
                        v-on="on"
                        @click="update"
                        :disabled="alert.option.type === 'loading'"
                    >
                        <v-icon dark>
                            mdi-content-save-outline
                        </v-icon>
                    </v-btn>
                </template>
                <span>Обновить данные</span>
            </v-tooltip>
        </div>

        <v-snackbar
            v-model="alert.show"
            absolute top right
            elevation="24"
            :color="alertColor"
            :timeout="alert.option.type === 'loading' ? -1 : 4000"
        >
            {{ alert.option.text }}

            <template v-slot:action="{ attrs }">
                <v-btn
                    :loading="alert.option.type === 'loading'"
                    color="white"
                    text
                    v-bind="attrs"
                    @click="alert.show = false"
                >
                    Закрыть
                </v-btn>
            </template>
        </v-snackbar>
    </v-col>
</template>

<script>
    import { ValidationObserver, ValidationProvider } from 'vee-validate'

    export default {
        props: ['chosen'],
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        data: function() {
            return {
                alert: {
                    show: false,
                    option: {
                        type: null,
                        text: null
                    }
                },
                location: window.location.origin,
                langs: {
                    items: this.$store.state.data.langs,
                    select: 1
                }
            }
        },
        watch: {
            local: function (a, b) {
                for (let key in this.data.content[b]) {
                    let item = this.data.content[a][key];

                    if ( key !== 'addr' ) {
                        if (!item) {
                            this.data.content[a][key] = this.data.content[b][key]
                        }
                    }else{
                        for (let name in this.data.content[b][key]) {
                            let addr = this.data.content[a][key][name];

                            if (!addr) {
                                this.data.content[a][key][name] = this.data.content[b][key][name]
                            }
                        }
                    }
                }
            },
            'alert.option': {
                deep: true,
                handler: function() {
                    this.alert.show = true;
                }
            }
        },
        computed: {
            alertColor: function () {
                switch (this.alert.option.type) {
                    case 'loading':
                        return 'blue darken-1';
                    default:
                        return this.alert.option.type;
                }
            },
            data: function () {
                return this.$store.getters.optionsData;
            },
            local: function () {
                return this.langs.items.find(item => item.id === this.langs.select).local;
            }
        },
        methods: {
            selectFile: function () {
                window.open('/laravel-filemanager?type=image', 'FileManager', 'width=1280,height=700');
                return new Promise(resolve => {
                    window.SetUrl = (items) => {
                        resolve(items.slice(0, 6));
                    };
                })
            },
            setMedia: function(current, index, type) {
                this.selectFile().then(response => {
                    if (type !== -1) {
                        const replace = type ? 0 : response.length;

                        current.splice(index, replace, ...response.map((item, index) => {
                            return {
                                id: index + (+new Date()),
                                source: item.url
                            }
                        }))

                        if ( current.length > 6 ) {
                            const delta = current.length - 6;
                            current.splice(-delta, delta);
                        }
                    }else{
                        let source = response[0].url;

                        if ( typeof index === 'number') {
                            current.splice(index, 1, source)
                        }else{
                            current[index] = source
                        }
                    }
                })
            },
            addSocial: function () {
                if (!this.data.socials) {
                    this.data.socials = [];
                }
                this.data.socials.push({
                    image: '',
                    name: '',
                    link: ''
                });
            },
            update: function () {
                this.$refs.observer.validate().then(check => {
                    for (let i = 0; i < this.langs.items.length; i++) {
                        let local = this.langs.items[i].local,
                            lang = this.langs.items[i].id;

                        for (let key in this.data.content[local]) {
                            let item = this.data.content[local][key];

                            if ( key !== 'addr' ) {
                                if (!item) {
                                    this.langs.select = lang;
                                    return;
                                }
                            }else{
                                for (let name in this.data.content[local][key]) {
                                    let addr = this.data.content[local][key][name];

                                    if (!addr) {
                                        this.langs.select = lang
                                        return;
                                    }
                                }
                            }
                        }
                    }

                    if (check) {
                        let data = JSON.parse( JSON.stringify(this.data) );

                        if (data.socials) {
                            data.socials = data.socials.filter(item => {
                                return item.image && item.link && item.name
                            })
                        }

                        this.alert.option.type = 'loading';
                        this.alert.option.text = 'Обновление данных...';

                        axios.post(window.location.pathname +'/options/update', {
                            input: data
                        })
                        .then(response => {
                            this.$store.commit('updateOptions', response.data);

                            this.alert.option.type = 'success';
                            this.alert.option.text = 'Данные успешно обновлены';
                        })
                        .catch(() => {
                            this.alert.option.type = 'error';
                            this.alert.option.text = 'Неизвестная ошибка, повторите попытку';
                        })
                    }
                })
            }
        },
    }
</script>
