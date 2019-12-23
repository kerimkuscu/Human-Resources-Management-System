<template>
  <div>
    <h4 class="card-title">
      {{ $t('genaral.home') }}
    </h4>
    <hr>

    <div class="row" style="margin-bottom: 15px">
      <div class="col-3">
        <peoples-card />
      </div>

      <div class="col-3">
        <users-card />
      </div>

      <div class="col-3">
        <leaves-card />
      </div>

      <div class="col-3">
        <attendance-card />
      </div>
    </div>

    <div class="row" style="margin-bottom: 15px">
      <div class="col-3">
        <user-roles-card />
      </div>

      <div class="col-3">
        <applicants-card />
      </div>
    </div>
  </div>
</template>

<script>
    import PeoplesCard from './Dashboard/Cards/PeoplesCard';
    import UsersCard from './Dashboard/Cards/UsersCard';
    import LeavesCard from './Dashboard/Cards/LeavesCard';
    import AttendanceCard from './Dashboard/Cards/AttendanceCard';
    import UserRolesCard from './Dashboard/Cards/UserRolesCard';
    import ApplicantsCard from './Dashboard/Cards/ApplicantsCard';

    export default {
        components: {
            PeoplesCard,
            UsersCard,
            LeavesCard,
            AttendanceCard,
            UserRolesCard,
            ApplicantsCard
        }
    }
</script>
