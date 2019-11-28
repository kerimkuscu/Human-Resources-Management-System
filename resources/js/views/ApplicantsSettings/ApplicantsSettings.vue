<template>
  <div>
    <h4 class="card-title">
      Applicants Settings
    </h4>

    <hr>

    <div id="applicantsSettingsTab">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link :to="{ name:'applicants.candidates-list'}" class="nav-link">
            Candidates List
          </router-link>
        </li>
      </ul>
    </div>

    <div id="applicantsSettingsTabContent" class="tab-content clearfix">
      <router-view />
    </div>
  </div>
</template>