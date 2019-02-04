<template>
	<div class="iframe-wrapper">
    	<v-iframe v-for="atom in atoms" :key="atom.id" :data="atom"></v-iframe>
   	</div>
</template>

<script>
import IframeComponent from './IframeComponent'

    export default {
    	components: {
    		"v-iframe": IframeComponent
    	},
    	props: {
    		atoms: {
    			type: Array,
    			required: true
    		}
    	},
        mounted() {
            console.log('Iframe Grid Component mounted.');
        }
    }
</script>
