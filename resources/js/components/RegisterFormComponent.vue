<template>
    <form @submit.prevent="submit">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }" v-model="fields.name" name="name" autocomplete="username" required autofocus>
                <span class="invalid-feedback" role="alert" v-if="errors && errors.name">
                    <strong>{{ errors.name[0] }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" autocomplete="username email" class="form-control" :class="{ 'is-invalid': errors.email }" name="email" v-model="fields.email" required>

                <span class="invalid-feedback" role="alert" v-if="errors && errors.email">
                    <strong>{{ errors.email[0] }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" :class="{ 'is-invalid': errors.password }" class="form-control" name="password" v-model="fields.password" autocomplete="new-password" required>

                <span class="invalid-feedback" role="alert" v-if="errors && errors.password">
                <strong>{{ errors.password[0] }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" :class="{ 'is-invalid': errors.password_confirmation }" name="password_confirmation" v-model="fields.password_confirmation" autocomplete="new-password" required>
                <span class="invalid-feedback" role="alert" v-if="errors && errors.password_confirmation">
                    <strong>{{ errors.password_confirmation[0] }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6    offset-md-4">
                <button type="submit" id="register_btn" class="btn btn-primary">
                    Register
                </button>
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
                action: route('register'),
                method: 'POST'
            }
        },
        methods: {
            handleSuccess() {
                window.location.href = route('home');
            },
            beforeSubmit() {
                $('button#register_btn').attr('disabled', true);
            }
        },
    }
</script>