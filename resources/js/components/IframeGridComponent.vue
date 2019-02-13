<template>
	<div class="container">
        <v-iframe-row v-for="(row, index) in rows" :id="index" :atom_grid="atom_grid[index]" :key="index" :width="grid_width"></v-iframe-row>
   	</div>
</template>

<script>
import IframeRowComponent from './IframeRowComponent'

    export default {
    	components: {
    		"v-iframe-row": IframeRowComponent
    	},
    	props: {
    		atoms: {
    			type: Array,
    			required: true
    		},
            rows: {
                type: Number,
                required: true
            },
            records_per_row: {
                type: Number,
                required: true
            }
    	},
        computed: {
            atom_grid: function() {
                var grid = [];
                for (var i = 0,j = 0; i < this.rows; i++,j+=this.records_per_row) {
                    grid[i] = this.atoms.slice(j, j + this.records_per_row);
                }
                return grid;
            },
            grid_width: function () {
                return 12 / this.records_per_row;
            }
        },
        mounted() {
            console.log('Iframe Grid Component mounted.');
        }
    }
</script>
