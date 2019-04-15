<template>
    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="card dark-theme-border">
                <h5 class="card-header">Login</h5>

                <div class="card-body">
                    <div class="alert alert-danger" v-if="errors.has('error')">
                        {{ errors.first('error') }}
                    </div>

                    <form autocomplete="off" @submit.prevent="login" method="post">
                        <div class="form-group">
                            <label for="email" class="col-form-label required">E-mail</label>
                            <input type="email" id="email" class="form-control" :class="{ 'is-invalid': errors.has('email') }" placeholder="user@example.com" v-model="email">

                            <span class="invalid-feedback">{{ errors.first('email') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label required">Password</label>
                            <input type="password" id="password" class="form-control" :class="{ 'is-invalid': errors.has('password') }" v-model="password">

                            <span class="invalid-feedback">{{ errors.first('password') }}</span>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" v-model="remember_me" :true-value="1" :false-value="0">
                            <label class="form-check-label"> Remember Me</label>
                        </div>

                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Login</button>
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