import Home from '../views/Home'

//User Settings
import UsersSettings from '../views/UserSettings/UsersSettings'
import UsersRolesList from '../views/UserSettings/UsersRoles/UsersRolesList'
import UsersRolesDeleteForm from '../views/UserSettings/UsersRoles/UsersRolesDeleteForm'
import UsersIndex from '../views/UserSettings/UsersList/UsersList'
import UsersListDetails from '../views/UserSettings/UsersList/UsersListDetails'
import UsersRoleForm from '../views/UserSettings/UsersList/UsersRoleForm'
//Leaves Settings
import LeavesSettings from '../views/LeaveSettings/LeavesSettings'
//Leave Type
import LeaveType from '../views/LeaveSettings/LeaveType/LeaveTypeList'
import LeaveTypeForm from '../views/LeaveSettings/LeaveType/LeaveTypeForm'
import LeaveTypeDeleteForm from '../views/LeaveSettings/LeaveType/LeaveTypeDeleteForm'
//Employee Leave Type
import EmployeeLeaveList from "../views/LeaveSettings/EmployeeLeaveList/EmployeeLeaveList"
import EmployeeLeaveForm from '../views/LeaveSettings/EmployeeLeaveList/EmployeeLeaveForm'

import NotFound from '../components/NotFound'

import AuthLogin from '../pages/AuthLogin'
//Peoples
import PeoplesSettings from '../views/PeopleSettings/PeoplesSettings'
import EmployeesList from '../views/PeopleSettings/Employees/EmployeesList'
import EmployeesForm from '../views/PeopleSettings/Employees/EmployeesForm'
import EmployeesDeleteForm from '../views/PeopleSettings/Employees/EmployeesDeleteForm'
import EmployeesListDetails from "../views/PeopleSettings/Employees/EmployeesListDetails";
//Attendance
import AttendanceSettings from '../views/AttendanceSettings/AttendanceSettings'
import AttendanceList from '../views/AttendanceSettings/Attendance/AttendanceList'
import AttendanceForm from '../views/AttendanceSettings/Attendance/AttendanceForm'
import AttendanceDeleteForm from '../views/AttendanceSettings/Attendance/AttendanceDeleteForm'
//Project
import ProjectSettings from '../views/ProjectSettings/ProjectSettings'
import ProjectList from '../views/ProjectSettings/Project/ProjectList'
import ProjectForm from '../views/ProjectSettings/Project/ProjectForm'
import ProjectDeleteForm from '../views/ProjectSettings/Project/ProjectDeleteForm'
//Documentation
import DocumentationList from '../views/ProjectSettings/Documentation/DocumentationList'
import DocumentationForm from '../views/ProjectSettings/Documentation/DocumentationForm'
import DocumentationDeleteForm from '../views/ProjectSettings/Documentation/DocumentationDeleteForm'


export default [
    {
        path: '/login',
        name: 'auth.login',
        component: AuthLogin,
        meta: {
            auth: false,
        },
    },
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            auth: true
        }
    },
    {
        path: '/users/',
        name: 'user',
        component: UsersSettings,
        meta: {
            auth: true
        },
        children: [
            {
                path: 'list/',
                name: 'user.list',
                component: UsersIndex,
                children: [
                    {
                        path: ':id',
                        name: 'user.show',
                        component: UsersListDetails,
                    },
                    {
                        path: ':id/role',
                        name: 'user.user-role-form',
                        component: UsersRoleForm,
                    }
                ]
            },
            {
                path: 'role/',
                name: 'user.role',
                component: UsersRolesList,
                children: [
                    {
                        path: ':id/delete',
                        name: 'user.role-delete',
                        component: UsersRolesDeleteForm
                    }
                ]
            }
        ]
    },
    {
        path: '/leaves/',
        name: 'leaves',
        component: LeavesSettings,
        meta: {
            auth: true
        },
        children: [
            {
                path: 'types/',
                name: 'leaves.leave-type',
                component: LeaveType,
                children: [
                    {
                        path: 'create',
                        name: 'leaves.leave-type-form',
                        component: LeaveTypeForm,

                    },
                    {
                        path: ':id/edit',
                        name: 'leaves.leave-type-edit',
                        component: LeaveTypeForm,
                    },
                    {
                        path: ':id/delete',
                        name: 'leaves.leave-type-delete',
                        component: LeaveTypeDeleteForm,
                    }
                ]
            },
            {
                path: '/leaves/employee-list/',
                name: 'leaves.employee-list',
                component: EmployeeLeaveList,
                children: [
                    {
                        path: 'create',
                        name: 'leaves.form',
                        component: EmployeeLeaveForm
                    },
                    {
                        path: ':id/edit',
                        name: 'leaves.edit',
                        component: EmployeeLeaveForm
                    },
                ]
            },
        ]
    },
    {
        path: '/peoples/',
        name: 'peoples',
        component: PeoplesSettings,
        meta: {
            auth: true
        },
        children: [
            {
                path: 'employees/',
                name: 'peoples.employees',
                component: EmployeesList,
                children: [
                    {
                        path: 'create',
                        name: 'peoples.employees-form',
                        component: EmployeesForm,

                    },
                    {
                        path: ':id',
                        name: 'peoples.employees-show',
                        component: EmployeesListDetails,
                    },
                    {
                        path: ':id/edit',
                        name: 'peoples.employees-edit',
                        component: EmployeesForm,
                    },
                    {
                        path: ':id/delete',
                        name: 'peoples.employees-delete',
                        component: EmployeesDeleteForm,
                    }
                ]
            },
        ]
    },
    {
        path: '/attendance/',
        name: 'attendance',
        component: AttendanceSettings,
        meta: {
            auth: true
        },
        children: [
            {
                path: 'attendance/',
                name: 'attendance.attendance-list',
                component: AttendanceList,
                children: [
                    {
                        path: 'create',
                        name: 'attendance.attendance-form',
                        component: AttendanceForm,

                    },
                    {
                        path: ':id/edit',
                        name: 'attendance.attendance-edit',
                        component: AttendanceForm,
                    },
                    {
                        path: ':id/delete',
                        name: 'attendance.attendance-delete',
                        component: AttendanceDeleteForm,
                    }
                ]
            },
        ]
    },
    {
        path: '/project/',
        name: 'project',
        component: ProjectSettings,
        meta: {
            auth: true
        },
        children: [
            {
                path: 'project/',
                name: 'project.project-list',
                component: ProjectList,
                children: [
                    {
                        path: 'create',
                        name: 'project.project-form',
                        component: ProjectForm,

                    },
                    {
                        path: ':id/edit',
                        name: 'project.project-edit',
                        component: ProjectForm,
                    },
                    {
                        path: ':id/delete',
                        name: 'project.project-delete',
                        component: ProjectDeleteForm,
                    }
                ]
            },
            {
                path: 'documentation/',
                name: 'project.documentation-list',
                component: DocumentationList,
                children: [
                    {
                        path: 'create',
                        name: 'project.documentation-form',
                        component: DocumentationForm,

                    },
                    {
                        path: ':id/edit',
                        name: 'project.documentation-edit',
                        component: DocumentationForm,
                    },
                    {
                        path: ':id/delete',
                        name: 'project.documentation-delete',
                        component: DocumentationDeleteForm,
                    }
                ]
            },
        ]
    },

    {path: '*', component: NotFound}
];