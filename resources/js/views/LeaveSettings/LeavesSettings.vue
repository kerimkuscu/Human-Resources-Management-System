<template>
  <div>
    <h4 class="card-title">
      Leaves Settings
    </h4>

    <hr>

    <div id="leaveSettingsTab">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link :to="{ name:'leaves.leave-type'}" class="nav-link">
            Leave Type
          </router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name:'leaves.employee-list' }" class="nav-link">
            Employee Leave List
          </router-link>
        </li>
      </ul>
    </div>

    <div id="leaveSettingsTabContent" class="tab-content clearfix">
      <router-view />
    </div>
  </div>
</template>
