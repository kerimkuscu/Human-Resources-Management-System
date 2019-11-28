<template>
  <div>
    <h4 class="card-title">
      Attendance Settings
    </h4>

    <hr>

    <div id="attendanceSettingsTab">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link :to="{ name:'attendance.attendance-list'}" class="nav-link">
            Attendance List
          </router-link>
        </li>
      </ul>
    </div>

    <div id="attendanceSettingsTabContent" class="tab-content clearfix">
      <router-view />
    </div>
  </div>
</template>