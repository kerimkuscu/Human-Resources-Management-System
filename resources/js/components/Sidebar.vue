<template>
    <sidebar-menu :menu="menu" :collapsed="true" v-if="$auth.check()"/>
</template>

<script>
    export default {
        data() {
            return {
                menu: [
                    {
                        header: true,
                        title: 'Main Navigation'
                    },
                    {
                        href: '/',
                        title: 'Home',
                        icon: 'fas fa-home'
                    },
                    {
                        title: 'Users',
                        icon: 'fas fa-user-plus',
                        child: [
                            {
                                href:'/users/list',
                                title: 'Users List'
                            },
                            {
                                href: '/users/role',
                                title: 'Users Role'
                            }
                        ]
                    },
                    {
                        title: 'Leaves',
                        icon: 'fas fa-calendar',
                        child: [
                            {
                                href: '/leaves/types',
                                title: 'Leave Type'
                            },
                            {
                                href: '/leaves/employee-list',
                                title: 'Employee Leave List'
                            }
                        ]
                    },
                    {
                        title: 'People',
                        icon: 'fas fa-users',
                        child: [
                            {
                                href: '/peoples/employees',
                                title: 'Employees'
                            }
                        ]
                    },
                    {
                        title: 'Attendance',
                        icon : 'fas fa-clock',
                        child: [
                            {
                                href: '/attendance/attendance',
                                title: 'Monitor Attendance'
                            }
                        ]
                    },
                    {
                        title: 'Applicants',
                        icon : 'fas fa-user-tie',
                        child: [
                            {
                                href: '/applicants/candidates',
                                title: 'Candidates'
                            }
                        ]
                    }
                ]
            }
        }
    }
</script>