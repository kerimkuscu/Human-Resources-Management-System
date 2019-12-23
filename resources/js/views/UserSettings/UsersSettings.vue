<template>
  <div>
    <h4 class="card-title">
      {{ $t('user_list.page_title') }}
    </h4>

    <hr>

    <div id="userSettingsTab">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link :to="{ name:'user.list'}" class="nav-link">
            {{ $t('user_list.user_list') }}
          </router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name:'user.role' }" class="nav-link">
            {{ $t('user_list.user_role') }}
          </router-link>
        </li>
      </ul>
    </div>

    <div id="userSettingsTabContent" class="tab-content clearfix">
      <router-view />
    </div>
  </div>
</template>
