<template>
    <div>
        <h4 class="card-title">Peoples Settings</h4>

        <hr>

        <div id="leaveSettingsTab">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <router-link :to="{ name:'peoples.employees'}" class="nav-link">Employees</router-link>
                </li>
            </ul>
        </div>

        <div id="leaveSettingsTabContent" class="tab-content clearfix">
            <router-view></router-view>
        </div>
    </div>
</template>
