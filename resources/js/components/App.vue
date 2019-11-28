<template>
  <div class="background-color">
    <div>
      <navbar v-if="$auth.check()" />
    </div>

    <div>
      <sidebar v-if="$auth.check()" />
    </div>

    <div v-if="$auth.check()" class="card-group" style="margin: 10px; padding-top:50px; padding-left:50px">
      <div class="card">
        <div class="card-body">
          <router-view />
        </div>
      </div>
    </div>

    <div v-else class="bg-image">
      <router-view />
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