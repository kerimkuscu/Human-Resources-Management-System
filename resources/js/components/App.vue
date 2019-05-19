<template>
    <div class="background-color">
        <div>
            <navbar v-if="$auth.check()"></navbar>
        </div>

        <div>
            <sidebar v-if="$auth.check()"></sidebar>
        </div>

        <div class="card-group" style="margin: 10px; padding-top:50px; padding-left:50px" v-if="$auth.check()">
            <div class="card">
                <div class="card-body">
                    <router-view></router-view>
                </div>
            </div>
        </div>

        <div class="bg-image" v-else>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>

    import Navbar from './Navbar';
    import Sidebar from './Sidebar';

    export default {
        el: '#app',

        components: {
            Navbar,
            Sidebar
        }
    }
</script>