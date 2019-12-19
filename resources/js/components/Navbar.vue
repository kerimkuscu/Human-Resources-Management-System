<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-laravel">
            <router-link class="navbar-brand" :to="{ name: 'home' }">
                {{ $t('general.page_title') }}
            </router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"/>
            </button>

            <div v-if="$auth.check()" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto"/>

                <ul class="navbar-nav">
                    <div class="locale-changer">
                        <select class="form-control form-control-sm" v-model="$i18n.locale">
                            <option v-for="language in languageOptions" :key="`Lang${language.text}`" :value="language.value">{{ language.text }}</option>
                        </select>
                    </div>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link" @click="logout"><i class="fas fa-sign-out-alt"/> {{ $t('general.logout') }}</a>
                    </li>
                </ul>
            </div>

            <div v-else class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'auth.login' }">
                            {{ $t('general.login') }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>

    export default {

        data: (self = this) => ({
            languageOptions: [
                {value: 'tr', text: self.$i18n.t('general.tr')},
                {value: 'en', text: self.$i18n.t('general.en')},
            ]
        }),

        methods: {
            logout() {
                this.$auth.logout();
                this.$router.push('/login');
            },
        }
    }
</script>
