<template>
    <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" style="padding-bottom: 15px; padding-top: 15px;" >
        <div class="iframe-card">
            <div class="iframe-header">
                <div class="box">
                    <a href="#"><img class="user-gravatar" :src="data.user_image_url" height="20" width="20" /></a> <a href="#" style="font-size: 1rem">{{ data.user.name }}</a>
                </div>
                <div class="box views">{{data.views_count | viewFilter}} <font-awesome-icon icon="eye" aria-hidden="true" /></div>
            </div>
            <div class="iframe-body">
                <div class="iframe"><iframe scrolling="no" :src="data.preview_url" /></iframe></div>
                <a :href="data.edit_url"><div class="iframe-overlay"></div></a></div>
            <div class="iframe-view">
                <span class="view-small">{{data.likes_count}} {{data.likes_count | pluralize('Like')}}</span>
            </div>
            <div class="iframe-footer">
                <div class="box">
                    <a :href="data.preview_url">{{ data.title }}</a>
                </div>
                <div class="box">
                    <a style="cursor: pointer;" @mouseover="highlight = true" v-show="!data.is_liked" @mouseleave="highlight = false" v-on:click="like(1)"><font-awesome-icon :class="{ hoverLike:highlight }" :icon="['far', 'heart']" title="Like" style="color: rgba(0, 0, 0, 0.5); font-size: 1rem" /></a>
                    <a style="cursor: pointer;" v-show="data.is_liked" v-on:click="like(0)"><font-awesome-icon :icon="['fas', 'heart']" title="Unlike" class="hoverLike" style="color: rgba(0, 0, 0, 0.5); font-size: 1rem" /></a>
                </div>
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
            }
        },
        data() {
            return {
                highlight: false
            };
        },
        methods: {
            like: function(state) {
                var url = state ? this.data.like_url : this.data.unlike_url;
                if ($user) {
                    this.data.is_liked = !this.data.is_liked;
                    axios.get(url);
                }
                else {
                    var notifi = new Noty({
                        text: 'Please login/signup to like this creation.',
                        buttons: [
                            Noty.button('Sign Up', 'btn btn-noty btn-outline-light', function () {
                                console.log('SignUp clicked');
                            }, {id: 'btn_sign_up'}),
                            Noty.button('Login', 'btn btn-noty btn-outline-light', function () {
                                console.log('Login clicked');
                                notifi.close();
                            }, {id: 'btn_log_in'}),
                            Noty.button('Cancel', 'btn btn-noty btn-outline-light', function () {
                                console.log('Cancel clicked');
                                notifi.close();
                            }, {id: 'btn_cancel'})
                          ]
                    }).show();
                }
                
            }
        }
    }
</script>
