<template>
	<form @submit.prevent="submit">
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" autocomplete="username email" class="form-control" :class="{ 'is-invalid': errors.email }" name="email" v-model="fields.email" required autofocus>

                <span class="invalid-feedback" role="alert" v-if="errors && errors.email">
                    <strong>{{ errors.email[0] }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="email_btn">Send Password Reset Link</button>
            </div>
        </div>
    </form>
</template>

<script>
    import FormMixin from '../mixins/FormMixin';

    export default {
        mixins: [ FormMixin ],
        data() {
            return {
                action: route('password.email'),
                method: 'POST'
            }
        },
        methods: {
            handleSuccess() {
                // window.location.href = route('home');
                var notifi = new Noty({
                    text: 'Test Notification'
                }).show();
            },
            beforeSubmit() {
                $('button#email_btn').attr('disabled', true);
            }
        },
    }
</script>