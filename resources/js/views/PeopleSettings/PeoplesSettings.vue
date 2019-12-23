<template>
  <div>
    <h4 class="card-title">
      {{ $t('employees.page_title') }}
    </h4>

    <hr>

    <div id="peoplesSettingsTab">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link :to="{ name:'peoples.employees'}" class="nav-link">
            {{ $t('employees.employees') }}
          </router-link>
        </li>
      </ul>
    </div>

    <div id="peoplesSettingsTabContent" class="tab-content clearfix">
      <router-view />
    </div>
  </div>
</template>
