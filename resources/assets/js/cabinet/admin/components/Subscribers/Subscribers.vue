<template>
	 <v-container
        fluid
        tag="section"
    >
    	 <v-row>
		    <v-col
		        cols="12"
		        sm="12"
		    >
		    	<question-table></question-table>
		    </v-col>
		    <v-col
		        cols="12"
		        sm="12"
		    >
		    	<subscribers-table></subscribers-table>
		   </v-col>
		</v-row>
    	
	</v-container>
</template>

<script>
	import QuetionTable from './QuestionTable.vue'
	import SubscribersTable from './SubscribersTable.vue'
	export default{
		name: 'subscribers',
		components: {
			'question-table': QuetionTable,
			'subscribers-table': SubscribersTable
		},
		data: function() {
			return {
				dat: this.$store.state.data.blogs,
			}
		},
	}
</script>