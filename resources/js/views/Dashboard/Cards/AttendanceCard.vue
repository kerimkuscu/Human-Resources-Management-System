<template>
    <div>
        <div class="card text-center card-border">
            <div class="card-body">
                <h5 class="card-title">Attendance</h5>
                <p class="card-text">0 Entries Last Week</p>
            </div>
        </div>
        <div class="card-footer text-center card-border" style="border-top:0">
            <router-link :to="{ name:'leaves.leave-type'}">Monitor Attendance <i class="fas fa-arrow-circle-right"></i></router-link>
        </div>
    </div>
</template>