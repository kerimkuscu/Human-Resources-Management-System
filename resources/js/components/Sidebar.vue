<template>
  <sidebar-menu v-if="$auth.check()" :menu="menu" :collapsed="true" />
</template>

<script>
    export default {
        data(self = this) {
            return {
                menu: [
                    {
                        header: true,
                        title: self.$i18n.t('sidebar.main_navigation')
                    },
                    {
                        href: '/',
                        title: self.$i18n.t('sidebar.home'),
                        icon: 'fas fa-home'
                    },
                    {
                        title: self.$i18n.t('sidebar.users'),
                        icon: 'fas fa-user-plus',
                        child: [
                            {
                                href:'/users/list',
                                title: self.$i18n.t('sidebar.users_list'),
                            },
                            {
                                href: '/users/role',
                                title: self.$i18n.t('sidebar.users_role'),
                            }
                        ]
                    },
                    {
                        title: self.$i18n.t('sidebar.leaves'),
                        icon: 'fas fa-calendar',
                        child: [
                            {
                                href: '/leaves/types',
                                title: self.$i18n.t('sidebar.leave_type'),
                            },
                            {
                                href: '/leaves/employee-list',
                                title: self.$i18n.t('sidebar.employee_leave_list'),
                            }
                        ]
                    },
                    {
                        title: self.$i18n.t('sidebar.people'),
                        icon: 'fas fa-users',
                        child: [
                            {
                                href: '/peoples/employees',
                                title: self.$i18n.t('sidebar.employees'),
                            }
                        ]
                    },
                    {
                        title: self.$i18n.t('sidebar.attendance'),
                        icon : 'fas fa-clock',
                        child: [
                            {
                                href: '/attendance/attendance',
                                title: self.$i18n.t('sidebar.monitor_attendance'),
                            }
                        ]
                    },
                    {
                        title: self.$i18n.t('sidebar.applicants'),
                        icon : 'fas fa-user-tie',
                        child: [
                            {
                                href: '/applicants/candidates',
                                title: self.$i18n.t('sidebar.candidates'),
                            }
                        ]
                    }
                ]
            }
        }
    }
</script>
