<template>
    <div class="iframe-item">
        <div class="iframe">
            <iframe :src="url" />
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            url: {
                type: String,
                required: true
            }
        },
        mounted() {
            $(this.$el).responsiveIframes();
            console.log('Iframe Component mounted.');
        }
    }
</script>
