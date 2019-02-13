<template>
    <div class="col" :class="col">
        <div class="iframe-card">
            <div class="iframe-header">
                <div class="box">
                    <a href="#"><img class="user-gravatar" src="https://www.gravatar.com/avatar/5b7920e60af0fe2fab7ea95045d3d024.jpg?s=40&d=mm&r=g" height="20" width="20" /></a> <a href="#">Utkarsh Vishnoi</a>
                </div>
                <div class="box views"><i class="fa fa-eye" aria-hidden="true"></i>14K</div>
            </div>
            <div class="iframe-body">
                <div class="iframe"><iframe scrolling="no" :src="data.preview_url" /></iframe></div>
                <a href="#"><div class="iframe-overlay"></div></a></div>
            <div class="iframe-view">
                <span class="view-small">15,483 Likes</span>
            </div>
            <div class="iframe-footer">
                <div class="box">
                    <a href="#">Beauty Text</a>
                </div>
                <div class="box"><i class="fa fa-heart-o"></i></div>
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
