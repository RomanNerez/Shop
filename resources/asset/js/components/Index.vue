<template>
	<v-app>
		<dashboard-core-app-bar />

    	<dashboard-core-drawer />

    	<dashboard-core-view />
 
    	<dashboard-core-settings />
	</v-app>
</template>

<script>
	import DashboardCoreAppBar from './core/AppBar';
	import DashboardCoreDrawer from './core/Drawer';
	import DashboardCoreSettings from './core/Settings';
	import DashboardCoreView from './core/View';
	export default{
		data: function () {
			return {

			}
		},
		components: {
	    	DashboardCoreAppBar,
	    	DashboardCoreDrawer,
	    	DashboardCoreSettings,
	    	DashboardCoreView,
	    },
	}
</script>