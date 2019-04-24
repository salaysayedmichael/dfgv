var app = new Vue({
    el: '#addBorrower',
    data: function (){
        return {
        contents : {
            borrower : {
                display: `Borrower's Information`,
                fields: {
                    firstname :{
                        text : 'First Name',
                        value : ''
                    },
                    middlename :{
                        text : 'Middle Name',
                        value : ''
                    },
                    lastname :{
                        text : 'Last Name',
                        value : ''
                    },
                    birthdate :{
                        text : 'Birthdate',
                        value : '',
                        placeholder: 'YYYY-MM-DD',
                        type : 'date',
                        size: '12'
                    },
                    gender :{
                        text : 'Gender',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'male',
                                display: 'Male'
                            },
                            1:{
                                value: 'female',
                                display: 'Female'
                            }
                        },
                        size: '6'
                    },
                    civilstatus :{
                        text : 'Civil Status',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'single',
                                display: 'Single'
                            },
                            1:{
                                value: 'married',
                                display: 'Married'
                            },
                            2:{
                                value: 'widow',
                                display: 'Widow'
                            }
                        },
                        size: '6'
                    },
                    presentaddress :{
                        text : 'Present Address',
                        value : ''
                    },
                    homeaddress :{
                        text : 'Home Address',
                        value : ''
                    },
                    houseowner :{
                        text : 'House Owner',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'yes',
                                display: 'Yes'
                            },
                            1:{
                                value: 'no',
                                display: 'No'
                            }
                        },
                        size: '6'
                    },
                    renting :{
                        text : 'Renting?',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'yes',
                                display: 'Yes'
                            },
                            1:{
                                value: 'no',
                                display: 'No'
                            }
                        },
                        size: '6'
                    },
                    lengthofstay :{
                        text : 'Length Of Stay',
                        value : '',
                        type : 'number',
                        size: '6'
                    },
                    numberofchildren :{
                        text : 'Number Of Children',
                        value : '',
                        type : 'number',
                        size: '6'
                    },
                    occupation :{
                        text : 'Occupation',
                        value : ''
                    },
                    validid :{
                        text : 'Valid ID',
                        value : ''
                    },
                    contactnumber :{
                        text : 'Contact Number',
                        value : '',
                        size: '8'
                    },
                    numberofloans :{
                        text : 'Number Of Loans',
                        value : '',
                        type : 'number',
                        size: '4'
                    },
                    employer :{
                        text : 'Employer',
                        value : '',
                        tag : 'select',
                        options : {},
                        size: '12'
                    }
                }
            },
            spouse : {
                display: `Spouse's Information`,
                fields: {
                    name :{
                        text : 'Name of Spouse',
                        value : ''
                    },
                    birthdate :{
                        text : 'Birthdate',
                        value : '',
                        placeholder: 'YYYY-MM-DD',
                        type : 'date',
                        size: '12'
                    },
                    birthdate :{
                        text : 'Birthdate',
                        value : '',
                        placeholder: 'YYYY-MM-DD',
                        type : 'date',
                        size: '12'
                    },
                    gender :{
                        text : 'Gender',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'male',
                                display: 'Male'
                            },
                            1:{
                                value: 'female',
                                display: 'Female'
                            }
                        },
                        size: '6'
                    },
                    civilstatus :{
                        text : 'Civil Status',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'single',
                                display: 'Single'
                            },
                            1:{
                                value: 'married',
                                display: 'Married'
                            },
                            2:{
                                value: 'widow',
                                display: 'Widow'
                            }
                        },
                        size: '6'
                    },
                    presentaddress :{
                        text : 'Present Address',
                        value : ''
                    },
                    homeaddress :{
                        text : 'Home Address',
                        value : ''
                    },
                    occupation :{
                        text : 'Occupation',
                        value : ''
                    },
                    validid :{
                        text : 'Valid ID',
                        value : ''
                    },
                    contactnumber :{
                        text : 'Contact Number',
                        value : ''
                    }
                }
            },
            income : {
                display: `Source Of Income`,
                fields: {
                    incomeorsalary :{
                        text : 'Income Or Salary',
                        value : 0,
                        size : '6',
                        type : 'number'
                    },
                    otherincome :{
                        text : 'Other Income',
                        value : 0,
                        size : '6',
                        type : 'number'
                    },
                    otherincomedetails :{
                        text : 'Other Income Details',
                        value : ''
                    },
                    netincome :{
                        text : '[Total Income (0.00) - Total Expenses (0.00)] =',
                        value : 0,
                        placeholder: 'Net Income',
                        disabled : true
                    }
                }
            },
            expense : {
                display: `Expenses`,
                fields: {
                    food :{
                        text : 'Food',
                        value : 0,
                        type: 'number',
                        size: '6'
                    },
                    bills :{
                        text : 'Bills',
                        value : 0,
                        placeholder: 'Electricity, Internet etc.',
                        type: 'number',
                        size: '6'
                    },
                    education :{
                        text : 'Education',
                        value : 0,
                        type: 'number',
                        size: '6'
                    },
                    rentals :{
                        text : 'Rentals',
                        value : 0,
                        type: 'number',
                        size: '6'
                    },
                    repairormaintenance :{
                        text : 'Repair Or Maintenance',
                        value : 0,
                        type: 'number',
                        size: '6'
                    },
                    miscellaneous :{
                        text : 'Miscellaneous',
                        value : 0,
                        type: 'number',
                        size: '6'
                    }
                }
            }
        }
    }
    },
    computed: {
        netIncome: function(){
            totalIncome = Number(this.contents.income.fields.incomeorsalary.value) + Number(this.contents.income.fields.otherincome.value)

            totalExpenses = Number(this.contents.expense.fields.food.value) + Number(this.contents.expense.fields.bills.value) + Number(this.contents.expense.fields.education.value) + Number(this.contents.expense.fields.rentals.value) + Number(this.contents.expense.fields.repairormaintenance.value) + Number(this.contents.expense.fields.miscellaneous.value)

            this.contents.income.fields.netincome.text = `[Total Income (${totalIncome}.00) - Total Expenses (${totalExpenses}.00)] =`
            this.contents.income.fields.netincome.value = Number(totalIncome) - Number(totalExpenses)
        }
    },
    methods: {
        setUpWatchers(array,name) {
            for (let i in array) {
                let key = `contents.${name}.fields.${i}.value`;
                this.$watch(key, function() {
                    this.netIncome
                });
            }
        }
    },
    created() {
        this.setUpWatchers(this.contents.income.fields,'income');
        this.setUpWatchers(this.contents.expense.fields,'expense');
    }
})