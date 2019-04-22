<template>
    <div>
        <h4 class="card-title">Attendance Settings</h4>

        <hr>

        <div id="leaveSettingsTab">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <router-link :to="{ name:'project.project-list'}" class="nav-link">Project List</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name:'project.documentation-list'}" class="nav-link">Documentation</router-link>
                </li>
            </ul>
        </div>

        <div id="leaveSettingsTabContent" class="tab-content clearfix">
            <router-view></router-view>
        </div>
    </div>
</template>