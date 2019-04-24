<template>
    <form method="POST" @submit.prevent="submit">
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" autocomplete="username email" :class="{ 'is-invalid': errors.email }" class="form-control" name="email" v-model="fields.email" required autofocus>
                <span class="invalid-feedback" role="alert" v-if="errors && errors.email">
                    <strong>{{ errors.email[0] }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input id="password" autocomplete="current-password" type="password" :class="{ 'is-invalid': errors.password }" class="form-control" name="password" v-model="fields.password" required>
                <span class="invalid-feedback" role="alert" v-if="errors && errors.password">
                    <strong>{{ errors.password[0] }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" v-model="fields.remember">

                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" id="login_btn" class="btn btn-primary">
                    Login
                </button>
                <a class="btn btn-link" :href="route('password.request')">
                    Forgot Your Password?
                </a>
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
                action: route('login')
            }
        },
        methods: {
            handleSuccess() {
                window.location.href = route('dashboard');
            },
            beforeSubmit() {
                $('button#login_btn').attr('disabled', true);
            }
        },
    }
</script>