<template>
	<div class="iframe-wrapper">
    	<v-iframe v-for="(link, index) in frames" :key="index" :url="link"></v-iframe>
   	</div>
</template>

<script>
import IframeComponent from './IframeComponent'

    export default {
    	components: {
    		"v-iframe": IframeComponent
    	},
    	props: {
    		frames: {
    			type: Array,
    			required: true
    		}
    	},
        mounted() {
            console.log('Iframe Grid Component mounted.');
        }
    }
</script>
