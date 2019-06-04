<template>
    <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" style="padding-bottom: 15px; padding-top: 15px;" >
        <div class="iframe-card">
            <div class="iframe-header">
                <div class="box">
                    <a href="#"><img class="user-gravatar" :src="gravatarURL" height="20" width="20" /></a> <a href="#" style="font-size: 1rem">{{ data.user.name }}</a>
                </div>
                <div class="box views">{{data.views_count | viewFilter}} <font-awesome-icon icon="eye" aria-hidden="true" /></div>
            </div>
            <div class="iframe-body">
                <div class="iframe">
                    <iframe scrolling="no" :src="route('atom.preview', {id: data.id})" /></iframe>
                </div>
                <a :href="route('atom.edit', {id: data.id})"><div class="iframe-overlay"></div></a></div>
            <div class="iframe-view">
                <span class="view-small" :id="'like_' + data.id">{{data.likes_count}} {{data.likes_count | pluralize('Like')}}</span>
            </div>
            <div class="iframe-footer">
                <div class="box">
                    <a :href="route('atom.edit', {id: data.id})">{{ data.title }}</a>
                </div>
                <div class="box">
                    <a style="cursor: pointer;" v-show="!data.is_liked" v-on:click="like(1, $event)"><font-awesome-icon :icon="['far', 'heart']" title="Like" style="color: rgba(0, 0, 0, 0.5); font-size: 1rem" /></a>
                    <a style="cursor: pointer;" v-show="data.is_liked" v-on:click="like(0, $event)"><font-awesome-icon :icon="['fas', 'heart']" title="Unlike" class="hoverLike" style="color: rgba(0, 0, 0, 0.5); font-size: 1rem" /></a>
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
                highlight: false,
                loaded: false
            };
        },
        computed: {
            gravatarURL: function () {
              return gravatar.url(this.data.user.email, {s: '40', r: 'g', d: 'mm'}, true);
            }
        },
        methods: {
            like: function(state, event) {
                var url = state ? route('atom.like', {id: this.data.id}) : route('atom.unlike', {id: this.data.id});
                if ($user) {
                    if (url.url() === route('atom.like', {id: this.data.id}).url()) {
                        $(event.target).parents('a').hide();
                        $(event.target).parents('a').next().show();
                        var like_wrapper = $('#like_' + this.data.id);
                        like_wrapper.html(parseInt(like_wrapper.html().split(' ')[0]) + 1 + ' ' + pluralize('Like', parseInt(like_wrapper.html().split(' ')[0] + 1)));
                    }
                    else {
                        $(event.target).parents('a').hide();
                        $(event.target).parents('a').prev().show();
                        var like_wrapper = $('#like_' + this.data.id);
                        like_wrapper.html(parseInt(like_wrapper.html().split(' ')[0]) - 1 + ' ' + pluralize('Like', parseInt(like_wrapper.html().split(' ')[0] - 1)));
                    }
                    axios.get(url);
                }
                else {
                    var notifi = new Noty({
                        text: 'Please login/signup to like this creation.',
                        buttons: [
                            Noty.button('Sign Up', 'btn btn-noty btn-outline-dark', function () {
                                window.location.href = route('register');
                            }, {id: 'btn_sign_up'}),
                            Noty.button('Login', 'btn btn-noty btn-outline-dark', function () {
                                window.location.href = route('login');
                            }, {id: 'btn_log_in'})
                          ]
                    }).show();
                }
                
            }
        }
    }
</script>
