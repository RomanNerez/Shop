<template>
    <transition name="overlay">
        <div class="overlay"
             v-on:click.self="closeModal"
             v-show="config.show"
        >
            <div class="modal signin">
                <form method="POST" class="signin-from"
                      v-on:submit.prevent="submit"
                >
                    <component
                        :token="token"
                        :component.sync="component"
                        :urls="urls"
                        :user="user"
                        :is="component"
                        :ref="component"
                    ></component>
                    <button type="button" class="modal-close"
                            v-on:click="closeModal"
                    >
                        <svg height="329pt" viewBox="0 0 329.26933 329" width="329pt">
                            <path d="m21.339844 329.398438c-5.460938 0-10.925782-2.089844-15.082032-6.25-8.34375-8.339844-8.34375-21.824219 0-30.164063l286.589844-286.59375c8.339844-8.339844 21.824219-8.339844 30.164063 0 8.34375 8.339844 8.34375 21.824219 0 30.164063l-286.589844 286.59375c-4.183594 4.179687-9.621094 6.25-15.082031 6.25zm0 0"/>
                            <path d="m307.929688 329.398438c-5.460938 0-10.921876-2.089844-15.082032-6.25l-286.589844-286.59375c-8.34375-8.339844-8.34375-21.824219 0-30.164063 8.339844-8.339844 21.820313-8.339844 30.164063 0l286.589844 286.59375c8.34375 8.339844 8.34375 21.824219 0 30.164063-4.160157 4.179687-9.621094 6.25-15.082031 6.25zm0 0"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </transition>
</template>

<script>
    import Login from './Login.vue';
    import Register from './Register.vue';
    import Reset from './passwords/Reset.vue';
    import Email from './passwords/Email.vue';
    import Verify from './passwords/Verify.vue';
    export default {
        components:{
            Login,
            Register,
            Reset,
            Email,
            Verify
        },
        props: {
            token:{
                type: String,
                required: true
            },
            urls:{
                type: Object,
                required: true
            },
            config: {
                type: Object,
                required: true
            },
            user: {
                type: Object,
                required: true
            }
        },
        data: function() {
            return {
                component: 'Login',
                params: ['auth', 'token', 'email']
            }
        },
        watch:{
            'config.show': function (){
                scroll_hidden();
            }
        },
        mounted: function (){
            this.checkAuth();
        },
        methods:{
            deleteParam: function (param){
                var url = new URL(window.location.href);
                if (url.searchParams.has(param)){
                    url.searchParams.delete(param);
                    window.history.pushState(null, null, url.href);
                }
            },
            closeModal: function (){
                this.params.forEach((param)=>{
                    this.deleteParam(param);
                });

                this.$root.auth.show = false;
            },
            checkAuth: function (){
                if (Object.keys(this.user).length && this.user.email_verified_at) {
                    this.deleteParam('auth');
                    return;
                }
                var params = (new URL(document.location)).searchParams;
                if (params.get('auth')) {
                    switch(params.get('auth')){
                        case 'reset':
                            this.component = 'Reset';
                            break;
                        case 'verify':
                            this.component = 'Verify';
                            break;
                        case 'config':
                            this.component = 'Confirm';
                            break;
                        case 'login':
                            break;
                    }
                    this.$root.auth.show = true;
                }
            },
            submit: function () {
                this.$refs[this.component].submit();
            }
        }
    }
</script>

<style>
    .form-enter-active, .form-leave-active {
        transition: opacity .3s;
    }
    .form-enter, .form-leave-to {
        opacity: 0;
    }
</style>
