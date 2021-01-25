<template>
    <base-material-card
	    class="v-card-profile"
	    :avatar="location + '/upload/blog/' + userInf.avatar"
	>
	    <v-card-text class="text-center user-info__finish">
	        <h6 class="display-1 mb-1 grey--text">
	            {{userInf.position}}
	        </h6>

	        <h4 class="display-1 font-weight-light mb-3 black--text">
	           {{userInf.fullname}}
	        </h4>

	        <h3 class="display-0 font-weight-light mb-1 grey--text">
	            {{userInf.email}}
	        </h3>

            <v-btn 
                class="mr-0 mt-5 v-btn--rounded b-btn"
                color="green darken-1"   
                v-on:click="$emit('update:editModeActive', !editModeActive)"
            >
                {{!editModeActive ? 'Редактировать' : 'Сбросить'}}
            </v-btn>
	    </v-card-text>
	</base-material-card> 
</template>


<script>
    export default {
    	name: 'userinfo',
    	props: ['userInf', 'editModeActive'],
        data: function() {
            return {
                location: window.location.origin,
            }
        },
    }
</script>
