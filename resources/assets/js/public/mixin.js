import LocaleUA from '../../../lang/ua.json'

export default {
    computed: {
        getLocaleData: function() {
            return {
                selected: this.$store.state.header.locale,
                ua: LocaleUA
            }
        },
        lang: function () {
            return this.$store.state.header.lang;
        }
    },
    filters: {
        numFormat: function (number, decimals, decPoint, thousandsSep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            const n = !isFinite(+number) ? 0 : +number
            const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            const dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            let s = ''
            const toFixedFix = function (n, prec) {
                if (('' + n).indexOf('e') === -1) {
                    return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
                } else {
                    const arr = ('' + n).split('e')
                    let sig = ''
                    if (+arr[1] + prec > 0) {
                        sig = '+'
                    }
                    return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
                }
            }
            s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || ''
                s[1] += new Array(prec - s[1].length + 1).join('0')
            }
            return s.join(dec)
        }
    },
    methods: {
        addNotify: function(text, type, title){
            this.$notify({
                type,
                title,
                text,
                group: 'foo',
                duration: 10000,
                speed: 100,
            })
        },
        __: function (value) {
            const data = this.getLocaleData;

            if ( data[data.selected] ) {
                let locale = data[data.selected][value];

                if (locale) {
                    return locale;
                }else{
                    return value;
                }
            }
            return value;
        },
        _asset: function (path) {
            return window.origin +'/'+ path;
        },
        _locale: function(path) {
            path = path[0] === '/' ? path.slice(1) : path;
            if ( this.lang.base !== this.lang.selected.local ) {
                path = this.lang.selected.local +'/'+ path;
            }

            return window.origin +'/'+ path;
        },
        declOfNum: function (number, titles) {
            const cases = [2, 0, 1, 1, 1, 2];
            return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
        },
        requestProduct: function(item, body) {
            this.$set(item, body.pending, true);

            axios.post(window.location.origin + body.path, {
                data: body.input
            })
            .then(() => {
                setTimeout(() => {
                    this.$store.commit(body.commit, body.input);
                }, 500)
            })
            .catch(() => {
                this.$notify({
                    group: 'foo',
                    type: 'error',
                    title: this.__('Произошла ошибка'),
                    text: this.__('Во время обработки запроса произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз')
                });
            })
            .finally(() => {
                setTimeout(() => {
                    item[body.pending] = false;
                }, 500)
            })
        }
    }
};
