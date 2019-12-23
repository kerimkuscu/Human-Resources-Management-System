module.exports = {
    data:(self = this) => ({
        genderOptions: [
            {value: null, text: self.$i18n.t('gender_options.selected')},
            {value: 'Male', text: self.$i18n.t('gender_options.male')},
            {value: 'Female', text: self.$i18n.t('gender_options.female')}],

        maritalStatusOptions: [
            {value: null, text: self.$i18n.t('marital_status_options.selected')},
            {value: 'Married', text: self.$i18n.t('marital_status_options.married')},
            {value: 'Single', text: self.$i18n.t('marital_status_options.single')},
            {value: 'Divorced', text: self.$i18n.t('marital_status_options.divorced')},
            {value: 'Widowed', text: self.$i18n.t('marital_status_options.widowed')},
            {value: 'Other', text: self.$i18n.t('marital_status_options.other')}],

        driverLicenseOptions: [
            {value: null, text: self.$i18n.t('driver_license_options.selected')},
            {value: 'Yes', text: self.$i18n.t('driver_license_options.yes')},
            {value: 'No', text: self.$i18n.t('driver_license_options.no')}],

        employmentStatusOptions: [
            {value: null, text: self.$i18n.t('employment_status_options.selected')},
            {value: 'Full Time Contract', text: self.$i18n.t('employment_status_options.full_time_contract')},
            {value: 'Full Time Internship', text: self.$i18n.t('employment_status_options.full_time_internship')},
            {value: 'Full Time Permanent', text: self.$i18n.t('employment_status_options.full_time_permanent')},
            {value: 'Part Time Contract', text: self.$i18n.t('employment_status_options.part_time_contract')},
            {value: 'Part Time Internship', text: self.$i18n.t('employment_status_options.part_time_internship')},
            {value: 'Part Time Permanent', text: self.$i18n.t('employment_status_options.part_time_permanent')}],
    }),
}
