<template>
    <div>
        <h4 class="card-title">Home</h4>
        <hr>

        <div class="row">
            <div class="col-3">
                <peoples-card></peoples-card>
            </div>

            <div class="col-3">
                <users-card></users-card>
            </div>

            <div class="col-3">
                <leaves-card></leaves-card>
            </div>

            <div class="col-3">
                <attendance-card></attendance-card>
            </div>
        </div>
    </div>
</template>

<script>
    import PeoplesCard from './Dashboard/Cards/PeoplesCard';
    import UsersCard from './Dashboard/Cards/UsersCard';
    import LeavesCard from './Dashboard/Cards/LeavesCard';
    import AttendanceCard from './Dashboard/Cards/AttendanceCard';

    export default {
        components: {
            PeoplesCard,
            UsersCard,
            LeavesCard,
            AttendanceCard
        }
    }
</script>