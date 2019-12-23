<template>
  <div>
    <h4 class="card-title">
      {{ $t('leave_type.page_title') }}
    </h4>

    <hr>

    <div id="leaveSettingsTab">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link :to="{ name:'leaves.leave-type'}" class="nav-link">
              {{ $t('leave_type.leave_type') }}
          </router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name:'leaves.employee-list' }" class="nav-link">
              {{ $t('employee_leave.employee_leave_list') }}
          </router-link>
        </li>
      </ul>
    </div>

    <div id="leaveSettingsTabContent" class="tab-content clearfix">
      <router-view />
    </div>
  </div>
</template>
