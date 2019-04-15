<template>
	<div class="row" style="margin-bottom: 30px">
        <v-iframe v-for="atom in atom_grid" :key="atom.id" :data="atom" :col_size="width"></v-iframe>
   	</div>
</template>

<script>
import IframeComponent from './IframeComponent'

    export default {
    	components: {
    		"v-iframe": IframeComponent
    	},
    	props: {
    		atom_grid: {
    			type: Array,
    			required: true
    		},
            id: {
                type: Number,
                required: true
            },
            width: {
                type: Number,
                required: true
            }
    	}
    }
</script>
