<template>
    <div class="col" :class="col">
        <div class="iframe-card">
            <div class="iframe-header">
                <div class="box">
                    <a href="#"><img class="user-gravatar" src="https://www.gravatar.com/avatar/5b7920e60af0fe2fab7ea95045d3d024.jpg?s=40&d=mm&r=g" height="20" width="20" /></a> <a href="#" style="font-size: 1rem">{{ data.user.name }}</a>
                </div>
                <div class="box views"><font-awesome-icon icon="eye" aria-hidden="true" />14K</div>
            </div>
            <div class="iframe-body">
                <div class="iframe"><iframe scrolling="no" :src="data.preview_url" /></iframe></div>
                <a href="#"><div class="iframe-overlay"></div></a></div>
            <div class="iframe-view">
                <span class="view-small">15,483 Likes</span>
            </div>
            <div class="iframe-footer">
                <div class="box">
                    <a href="#">{{ data.title }}</a>
                </div>
                <div class="box"><a style="cursor: pointer;" @mouseover="like = true" @mouseleave="like = false"><font-awesome-icon :class="{ hoverLike:like }" :icon="['far', 'heart']" title="Like" style="color: rgba(0, 0, 0, 0.5); font-size: 1rem" /></a></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Object,
                required: true
            },
            col_size: {
                type: Number,
                required: true
            }
        },
        computed: {
            col: function () {
                return "col-" + this.col_size;
            }
        },
        mounted() {
            console.log('Iframe Component mounted.');
        }
    }
</script>
