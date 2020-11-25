<template>
	<div>
		<v-container
	        id="regular-tables"
	        fluid
	        tag="section"
	    >
			<v-tabs
				v-model="tab"
			    background-color="success accent-4"
			    dark
			    :centered="centered"
			    :grow="grow"
			    :vertical="vertical"
			    :right="right"
			    :prev-icon="prevIcon ? 'mdi-arrow-left-bold-box-outline' : undefined"
			    :next-icon="nextIcon ? 'mdi-arrow-right-bold-box-outline' : undefined"
			    :icons-and-text="icons"
			>
			    <v-tabs-slider></v-tabs-slider>
			    <v-tab
		        	v-for="(tab, index) in tabs"
		        	:key="index"
		        	:href="`#tab-${index}`"
		      	>
		        	{{tab.title}}
		        	<v-icon v-if="tab.icons">mdi-phone</v-icon>
		      	</v-tab>
			    
			    <v-tab-item
			        v-for="(tab, index) in tabs"
			        :key="index"
			        :value="'tab-' + index"
			    >
			        <component :is="tab.component"></component>
			    </v-tab-item>
			</v-tabs>
		</v-container>
	</div>
</template>

<script>
	import EditMenu from './EditMenu.vue';
	import AreaManagement from './AreaManagement.vue'

	export default{
		components:{
			EditMenu,
			AreaManagement
		},
		data: function(){
			return {
		        tab: null,
		        icons: false,
		        centered: false,
		        grow: false,
		        vertical: false,
		        prevIcon: false,
		        nextIcon: false,
		        right: false,
		        myArray: [
		        	{
		        		id: 1,
		        		name:'Roman',
		        	},
		        	{	
		        		id: 2,
		        		name:'Bogdan',
		        	},
		        	{
		        		id: 3,
		        		name:'Yura',
		        	}
		        ],
		        tabs: [
		        	{
		        		title: 'Редактор Меню',
		        		component: 'edit-menu'
		        	},
		        	{
		        		title: 'Управление областями',
		        		component: 'area-management'
		        	},
		        ],
		      }
		}
	}
</script>