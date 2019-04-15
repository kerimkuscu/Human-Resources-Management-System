<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-laravel">
            <router-link class="navbar-brand" :to="{ name: 'home' }">HRMS</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" v-if="$auth.check()">
                <ul class="navbar-nav mr-auto">

                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link" @click="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse" v-else>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'auth.login' }"> Login</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>

    export default {

        methods: {
            logout() {
                this.$auth.logout();
                this.$router.push('/login');
            },
        }
    }
</script>
