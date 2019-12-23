<template>
  <div>
    <h4 class="card-title">
      {{ $t('attendance.page_title') }}
    </h4>

    <hr>

    <div id="attendanceSettingsTab">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link :to="{ name:'attendance.attendance-list'}" class="nav-link">
            {{ $t('attendance.attendance_list') }}
          </router-link>
        </li>
      </ul>
    </div>

    <div id="attendanceSettingsTabContent" class="tab-content clearfix">
      <router-view />
    </div>
  </div>
</template>
