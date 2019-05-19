<template>
    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="card login">

                <div class="card-header">
                    <h1 class="text-center">HRMS</h1>
                </div>

                <div class="card-body">
                    <div class="alert alert-danger" v-if="errors.has('error')">
                        {{ errors.first('error') }}
                    </div>

                    <form autocomplete="off" @submit.prevent="login" method="post">
                        <div class="form-group row" style="padding: 15px">
                            <label for="email" class="col-1 col-form-label"><i class="fas fa-user fa-2x"></i></label>
                            <div class="col-11">
                                <input type="email" id="email" class="form-control" :class="{ 'is-invalid': errors.has('email') }" placeholder="user@example.com" v-model="email">
                            </div>

                            <span class="invalid-feedback">{{ errors.first('email') }}</span>
                        </div>

                        <hr>

                        <div class="form-group row" style="padding: 15px">
                            <label for="password" class="col-1 col-form-label"><i class="fas fa-lock fa-2x"></i></label>
                            <div class="col-11">
                                <input type="password" id="password" class="form-control" :class="{ 'is-invalid': errors.has('password') }" v-model="password">
                            </div>

                            <span class="invalid-feedback">{{ errors.first('password') }}</span>
                        </div>

                        <hr>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" v-model="remember_me" :true-value="1" :false-value="0">
                            <label class="form-check-label"> Remember Me</label>
                        </div>

                        <div class="text-center" style="padding: 15px">
                            <button type="submit" class="btn btn-primary" style="padding-right: 100px; padding-left: 100px">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {Errors} from 'form-backend-validation';

    export default {
        data: () => ({
            errors: new Errors,

            email: null,
            password: null,
            remember_me: 1,
        }),

        mounted() {
            //
        },

        methods: {
            login() {
                const app = this;

                this.errors.clear();

                this.$auth.login({
                    data: {
                        email: app.email,
                        password: app.password,
                        remember_me: app.remember_me
                    },

                    success: () => {
                        let redirect = this.$auth.redirect();

                        const redirectTo = redirect ? redirect.from.fullPath : '/';

                        this.$router.push(redirectTo)
                    },

                    error: (error) => {
                        if (error.response && error.response.data.errors) {
                            this.errors.record(error.response.data.errors);
                            return;
                        }

                        this.errors.record({error: ['Something went wrong']});
                    },

                    rememberMe: true,
                    fetchUser: true
                })
            }
        }
    }
</script>