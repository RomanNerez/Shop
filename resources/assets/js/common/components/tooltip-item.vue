<template>
	<div id="tooltip-wrapper">
		<transition name="fade-tooltip">
			<template v-if="content">
				<span class="tooltip" :style="position">{{ content }}</span>
			</template>
		</transition>
	</div>
</template>

<script>
    export default {
        data: function() {
            return {
				content: '',
				position: {
					top: 0,
					left: 0
				}
			}
        },
        methods: {
	    	show: function(e, str, cls) {
	    		var target = e.target.getBoundingClientRect();

	    		this.content = str;
	    		this.position.top = Math.round(target.top) + window.pageYOffset - 7 +'px';
	    		this.position.left = Math.round(target.left + (target.width / 2)) +'px';
	    	},
	    	hide: function() {
	    		this.content = ''
	    	}
	    }
    }
</script>