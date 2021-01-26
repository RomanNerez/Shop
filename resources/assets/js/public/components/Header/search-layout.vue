<template>
    <div>
        <autocomplete
            :search="search"
            :placeholder="__('Введите название магнита, который хотите найти')"
            :aria-label="__('Введите название магнита, который хотите найти')"
            :get-result-value="resultSearch"
            :default-value="defaultValue"
            @submit="submitSearch"
            ref="autocomplete"
            :debounce-time="250"
        ></autocomplete>
        <img class="search__svg" :src="_asset('library/img/search-blue.svg')" alt="">
    </div>
</template>

<script>
    import Autocomplete from '@trevoreyre/autocomplete-vue';

    export default {
        data: function() {
            return {
                value: ''
            }
        },
        components: {
            Autocomplete
        },
        computed: {
            defaultValue: function () {
                let query = this.$store.state.data.query;

                return query ? query : '';
            }
        },
        methods: {
            search(input) {
                this.value = input;

                return new Promise(resolve => {
                    if (input.length < 3) {
                        return resolve([])
                    }

                    axios.get(this._locale('search?is-async=1&query='+ input))
                    .then((response) => {
                        if (this.value) {
                            let data = response.data;

                            if (data.length) {
                                resolve(response.data)
                            }else{
                                resolve([
                                    {
                                        url: false,
                                        content: {
                                            title: this.__('Нет совпадений...')
                                        }
                                    }
                                ])
                            }
                        } else {
                            resolve([])
                        }
                    })
                    .catch(() => {
                        this.$notify({
                            group: 'foo',
                            type: 'error',
                            title: this.__('Произошла ошибка'),
                            text: this.__('Во время обработки запроса произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз')
                        });
                    })
                })
            },
            resultSearch(result) {
                return result.content.title;
            },
            submitSearch(result) {
                if (result) {
                    if (result.url) {
                        window.open(result.url);
                    }else{
                        return false;
                    }
                }else if (this.value){
                    clearTimeout(window._debounce);
                    window._debounce = setTimeout(() => {
                        window.open( this._locale('search?query='+ encodeURI(this.value)) )
                    }, 50)
                }else{
                    return false;
                }
            },
        }
    }
</script>
