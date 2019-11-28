<template>
  <div>
    <h4 class="card-title">
      Users Settings
    </h4>

    <hr>

    <div id="userSettingsTab">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link :to="{ name:'user.list'}" class="nav-link">
            User List
          </router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name:'user.role' }" class="nav-link">
            User Role
          </router-link>
        </li>
      </ul>
    </div>

    <div id="userSettingsTabContent" class="tab-content clearfix">
      <router-view />
    </div>
  </div>
</template>