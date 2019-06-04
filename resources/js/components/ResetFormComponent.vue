<template>
    <form>
        <input type="hidden" name="token" v-model="fields.token">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" :class="{ 'is-invalid': errors.email }" name="email" required autofocus>

                <span class="invalid-feedback" role="alert">
                    <strong>{{ errors.email }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" :class="{ 'is-invalid': errors.password }" name="password" required>

                <span class="invalid-feedback" role="alert">
                    <strong>{{ errors.password }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" id="reset_btn" class="btn btn-primary">Reset Password
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
                action: route('password.reset'),
                method: 'POST'
            }
        },
        methods: {
            handleSuccess() {
                window.location.href = route('home');
            },
            beforeSubmit() {
                $('button#reset_btn').attr('disabled', true);
            }
        },
    }
</script>