<template>
    <v-container
        id="user-profile"
        fluid
        tag="section"
    >
        <passwordalert
            :active="passwordAlertActive"
            :text="passwordMessage"
        ></passwordalert>
        

        <v-row justify="center" class="user-info__fd-reverse">
            <v-col
                cols="12"
                md="8"
            >
                <userinfoeditor
                    :userInf="userInfo"
                    :editModeActive.sync="editModeActive"
                    :passwordAlertActive.sync="passwordAlertActive"
                    :passwordMessage.sync="passwordMessage"
                ></userinfoeditor>
            </v-col>

            <v-col
                cols="12"
                md="4"
            >
                <userinfo
                    :userInf="userInfo"
                    :editModeActive.sync="editModeActive"
                ></userinfo>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import PasswordAlert from './PasswordAlert.vue'
    import UserInfo from './UserInfo.vue'
    import UserInfoEditor from './UserInfoEditor.vue'
    export default {
        name: 'userprofile',
        components: {
            userinfo: UserInfo,
            userinfoeditor: UserInfoEditor,
            passwordalert: PasswordAlert,
        },
        data: function() {
            return {
                location: window.location.origin,
                editModeActive: false,
                passwordAlertActive: false,
                passwordMessage: ''
            }
        },
        computed: {
            userInfo: function() {
                return this.$store.getters.userData;
            }
        }
    }
</script>
