<template>
    <div class="iframe-item">
        <div class="iframe">
            <iframe scrolling="no" :src="data.preview_url" />
            <div class="iframe-overlay"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Object,
                required: true
            }
        },
        mounted() {
            $(this.$el).responsiveIframes();
            console.log('Iframe Component mounted.');
        }
    }
</script>
